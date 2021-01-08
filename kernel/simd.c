/*
 * Original File
 * Copyright (c) NumPy (/numpy/core/src/umath/simd.inc)
 * 
 * Modified for CArrays in 2020
 * 
 * Henrique Borba
 * henrique.borba.dev@gmail.com
 */
#include "simd.h"
#include "assign.h"
#include "config.h"

#ifdef CARRAY_HAVE_AVX2
#include <immintrin.h>
#endif

#define VECTOR_SIZE_BYTES 16

static inline uint
abs_ptrdiff(char *a, char *b)
{
    return (a > b) ? (a - b) : (b - a);
}

static inline int
carray_aligned_block_offset(const void * addr, const uint esize,
                            const uint alignment, const uint nvals)
{
    uint offset, peel;

    offset = (uint)addr & (alignment - 1);
    peel = offset ? (alignment - offset) / esize : 0;
    peel = (peel <= nvals) ? peel : nvals;
    assert(peel <= INT_MAX);
    return (int)peel;
}

static inline int
carray_blocked_end(const uint peel, const uint esize,
                   const uint vsz, const uint nvals)
{
    uint ndiff = nvals - peel;
    uint res = (ndiff - ndiff % (vsz / esize));

    assert(nvals >= peel);
    assert(res <= 4294967295);
    return (int)(res);
}

/*
 * stride is equal to element size and input and destination are equal or
 * don't overlap within one register. The check of the steps against
 * esize also quarantees that steps are >= 0.
 */
#define IS_BLOCKABLE_UNARY(esize, vsize) \
    (steps[0] == (esize) && steps[0] == steps[1] && \
     (carray_is_aligned(args[0], esize) && carray_is_aligned(args[1], esize)) && \
     ((abs_ptrdiff(args[1], args[0]) >= (vsize)) || \
      ((abs_ptrdiff(args[1], args[0]) == 0))))

#define IS_BLOCKABLE_BINARY(esize, vsize) \
    (steps[0] == steps[1] && steps[1] == steps[2] && steps[2] == (esize) && \
     carray_is_aligned(args[2], (esize)) && carray_is_aligned(args[1], (esize)) && \
     carray_is_aligned(args[0], (esize)) && \
     (abs_ptrdiff(args[2], args[0]) >= (vsize) || \
      abs_ptrdiff(args[2], args[0]) == 0) && \
     (abs_ptrdiff(args[2], args[1]) >= (vsize) || \
      abs_ptrdiff(args[2], args[1]) >= 0))

#define IS_BLOCKABLE_BINARY_SCALAR1(esize, vsize) \
    (steps[0] == 0 && steps[1] == steps[2] && steps[2] == (esize) && \
     carray_is_aligned(args[2], (esize)) && carray_is_aligned(args[1], (esize)) && \
     ((abs_ptrdiff(args[2], args[1]) >= (vsize)) || \
      (abs_ptrdiff(args[2], args[1]) == 0)) && \
     abs_ptrdiff(args[2], args[0]) >= (esize))

#define IS_BLOCKABLE_BINARY_SCALAR2(esize, vsize) \
    (steps[1] == 0 && steps[0] == steps[2] && steps[2] == (esize) && \
     carray_is_aligned(args[2], (esize)) && carray_is_aligned(args[0], (esize)) && \
     ((abs_ptrdiff(args[2], args[0]) >= (vsize)) || \
      (abs_ptrdiff(args[2], args[0]) == 0)) && \
     abs_ptrdiff(args[2], args[1]) >= (esize))

/* align var to alignment */
#define LOOP_BLOCK_ALIGN_VAR(var, type, alignment)\
    int i, peel = carray_aligned_block_offset(var, sizeof(type),\
                                                alignment, n);\
    for(i = 0; i < peel; i++)

#define LOOP_BLOCKED(type, vsize)\
    for(; i < carray_blocked_end(peel, sizeof(type), vsize, n);\
            i += (vsize / sizeof(type)))

#define LOOP_BLOCKED_END\
    for (; i < n; i++)


/* prototypes */
static void
sse2_binary_multiply_DOUBLE(double * op, double * ip1, double * ip2, int n);
static void
sse2_binary_scalar1_multiply_DOUBLE(double * op, double * ip1, double * ip2, int n);
static void
sse2_binary_scalar2_multiply_DOUBLE(double * op, double * ip1, double * ip2, int n);

#ifdef CARRAY_HAVE_AVX2
static void
sse2_binary_multiply_DOUBLE(double * op, double * ip1, double * ip2, int n)
{

    const int vector_size_bytes = 32;
    LOOP_BLOCK_ALIGN_VAR(op, double, vector_size_bytes)
        op[i] = ip1[i] * ip2[i];
        
    /* lots of specializations, to squeeze out max performance */
    if (carray_is_aligned(&ip1[i], vector_size_bytes) &&
            carray_is_aligned(&ip2[i], vector_size_bytes)) {
        if (ip1 == ip2) {
            LOOP_BLOCKED(double, vector_size_bytes) {
                __m256d a = _mm256_load_pd(&ip1[i]);
                __m256d c = _mm256_mul_pd(a, a);
                _mm256_store_pd(&op[i], c);
            }
        }
        else {
            LOOP_BLOCKED(double, vector_size_bytes) {
                __m256d a = _mm256_load_pd(&ip1[i]);
                __m256d b = _mm256_load_pd(&ip2[i]);
                __m256d c = _mm256_mul_pd(a, b);
                _mm256_store_pd(&op[i], c);
            }
        }
    }
    else if (carray_is_aligned(&ip1[i], vector_size_bytes)) {
        LOOP_BLOCKED(double, vector_size_bytes) {
            __m256d a = _mm256_load_pd(&ip1[i]);
            __m256d b = _mm256_loadu_pd(&ip2[i]);
            __m256d c = _mm256_mul_pd(a, b);
            _mm256_store_pd(&op[i], c);
        }
    }
    else if (carray_is_aligned(&ip2[i], vector_size_bytes)) {
        LOOP_BLOCKED(double, vector_size_bytes) {
            __m256d a = _mm256_loadu_pd(&ip1[i]);
            __m256d b = _mm256_load_pd(&ip2[i]);
            __m256d c = _mm256_mul_pd(a, b);
            _mm256_store_pd(&op[i], c);
        }
    }
    else {
        if (ip1 == ip2) {
            LOOP_BLOCKED(double, vector_size_bytes) {
                __m256d a = _mm256_loadu_pd(&ip1[i]);
                __m256d c = _mm256_mul_pd(a, a);
                _mm256_store_pd(&op[i], c);
            }
        }
        else {
            LOOP_BLOCKED(double, vector_size_bytes) {
                __m256d a = _mm256_loadu_pd(&ip1[i]);
                __m256d b = _mm256_loadu_pd(&ip2[i]);
                __m256d c = _mm256_mul_pd(a, b);
                _mm256_store_pd(&op[i], c);
            }
        }
    }
}
#endif

int
run_binary_simd_multiply_DOUBLE(char **args, int const *dimensions, int const *steps)
{       
#ifdef CARRAY_HAVE_AVX2
    double * ip1 = (double *)args[0];
    double * ip2 = (double *)args[1];
    double * op = (double *)args[2];
    int n = dimensions[0];
    const uint vector_size_bytes = 32;
    
    /* argument one scalar */
    if (IS_BLOCKABLE_BINARY_SCALAR1(sizeof(double), vector_size_bytes)) {
        sse2_binary_scalar1_multiply_DOUBLE(op, ip1, ip2, n);
        return 1;
    }
    /* argument two scalar */
    else if (IS_BLOCKABLE_BINARY_SCALAR2(sizeof(double), vector_size_bytes)) {
        sse2_binary_scalar2_multiply_DOUBLE(op, ip1, ip2, n);
        return 1;
    }
    else if (IS_BLOCKABLE_BINARY(sizeof(double), vector_size_bytes)) {
        sse2_binary_multiply_DOUBLE(op, ip1, ip2, n);
        return 1;
    }
#endif
    return 0;
}


static void
sse2_sqrt_DOUBLE(double * op, double * ip, const int n)
{
    /* align output to VECTOR_SIZE_BYTES bytes */
    LOOP_BLOCK_ALIGN_VAR(op, double, VECTOR_SIZE_BYTES) {
        op[i] = pow(ip[i], 2);
    }
    assert((int)n < (VECTOR_SIZE_BYTES / sizeof(double)) ||
           carray_is_aligned(&op[i], VECTOR_SIZE_BYTES));
    if (carray_is_aligned(&ip[i], VECTOR_SIZE_BYTES)) {
        LOOP_BLOCKED(double, VECTOR_SIZE_BYTES) {
            __m128d d = _mm_load_pd(&ip[i]);
            _mm_store_pd(&op[i], _mm_sqrt_pd(d));
        }
    }
    else {
        LOOP_BLOCKED(double, VECTOR_SIZE_BYTES) {
            __m128d d = _mm_loadu_pd(&ip[i]);
            _mm_store_pd(&op[i], _mm_sqrt_pd(d));
        }
    }
    LOOP_BLOCKED_END {
        op[i] = pow(ip[i], 2);
    }
}

int
run_unary_simd_sqrt_DOUBLE(char **args, int const *dimensions, int const *steps)
{
#ifdef CARRAY_HAVE_AVX2
    if (IS_BLOCKABLE_UNARY(sizeof(double), VECTOR_SIZE_BYTES)) {
        sse2_sqrt_DOUBLE((double*)args[1], (double*)args[0], dimensions[0]);
        return 1;
    }
#endif
    return 0;
}