#include "../phpsci.h"
#include "buffer.h"
#include "carray.h"

/**
 * MEMORY STACK
 *
 * CArrays Memory Buffer
 */
struct MemoryStack PHPSCI_MAIN_MEM_STACK;

/**
 * If CARRAY_GC_DEBUG env is True, CArray Garbage Collector
 * will print debug messages when destructing objects.
 */
static int
CArrayBuffer_ISDEBUGON()
{
    if (getenv("CARRAY_BUFFER_DEBUG") == NULL) {
        return 0;
    }
    if (!strcmp(getenv("CARRAY_BUFFER_DEBUG"), "0")) {
        return 0;
    }
    return 1;
}

/**
 * Initialize MemoryStack Buffer
 *
 * @todo Same from buffer_to_capacity
 */
void buffer_init(size_t size) {
    PHPSCI_MAIN_MEM_STACK.freed = 0;
    PHPSCI_MAIN_MEM_STACK.size = 0;
    PHPSCI_MAIN_MEM_STACK.capacity = 1;
    PHPSCI_MAIN_MEM_STACK.bsize = size;
    // Allocate first CArray struct to buffer
    PHPSCI_MAIN_MEM_STACK.buffer = (struct CArray**)emalloc(sizeof(CArray *));
    if (CArrayBuffer_ISDEBUGON()) {
       php_printf("\n[CARRAY_BUFFER_DEBUG] Buffer Initialized");
    }
}

void buffer_remove(MemoryPointer * ptr)
{
    PHPSCI_MAIN_MEM_STACK.freed = PHPSCI_MAIN_MEM_STACK.freed + 1;
    efree(PHPSCI_MAIN_MEM_STACK.buffer[ptr->uuid]);
    if(PHPSCI_MAIN_MEM_STACK.size == PHPSCI_MAIN_MEM_STACK.freed) {
        efree(PHPSCI_MAIN_MEM_STACK.buffer);
        PHPSCI_MAIN_MEM_STACK.buffer = NULL;
    }
}

/**
 * Grow MemoryStack buffer to new_capacity.
 *
 * @param new_capacity int New capacity for MemoryStack (Buffer)
 *
 * @todo Check if this won't fck everything as the computing requirements grow up
 */
void buffer_to_capacity(int new_capacity, size_t size) {
    PHPSCI_MAIN_MEM_STACK.bsize += size;
    PHPSCI_MAIN_MEM_STACK.buffer = (struct CArray**)erealloc(PHPSCI_MAIN_MEM_STACK.buffer, (new_capacity * sizeof(CArray *)));
    // Set new capacity to MemoryStack
    PHPSCI_MAIN_MEM_STACK.capacity = new_capacity;
}

/**
 * Add CArray to MemoryStack (Buffer) and retrieve MemoryPointer
 *
 * @param array CArray CArray to add into the stack
 * @param size  size_t Size of CArray in bytes
 */
void add_to_buffer(MemoryPointer * ptr, struct CArray * array, size_t size) {
    // If current MemoryStack buffer is empty, initialize it
    if(PHPSCI_MAIN_MEM_STACK.buffer == NULL) {
        buffer_init(size);
    }

    // If current capacity is smaller them the requested capacity, grow the MemoryStack
    if((PHPSCI_MAIN_MEM_STACK.size+1) > PHPSCI_MAIN_MEM_STACK.capacity) {
        buffer_to_capacity((PHPSCI_MAIN_MEM_STACK.capacity+1),size);
    }

    PHPSCI_MAIN_MEM_STACK.buffer[PHPSCI_MAIN_MEM_STACK.size] = array;

    // Associate CArray unique id
    ptr->uuid = (int)PHPSCI_MAIN_MEM_STACK.size;
    array->uuid = ptr->uuid;

    if (CArrayBuffer_ISDEBUGON()) {
       php_printf("\n[CARRAY_BUFFER_DEBUG] Added CArray ID %d", array->uuid);
    }
    // Set new size for MemoryStack
    PHPSCI_MAIN_MEM_STACK.size++;
}
