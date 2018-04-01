<?php
namespace PHPSci\Kernel\Orchestrator;

/**
 * Class MemoryPointer
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\Orchestrator
 */
class MemoryPointer
{
    /**
     * Unique memory ID
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @var
     */
    protected $uuid;
    protected $x;
    protected $y;
    protected $_carray_internal;

    /**
     * MemoryPointer constructor.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param \CArray $ptr
     * @param int $x
     * @param int $y
     */
    public function __construct(\CArray $ptr, int $x, int $y)
    {
        $this->_carray_internal = $ptr;
        $this->uuid = $ptr->uuid;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Get current memory pointer
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function getPointer() {
        return $this->uuid;
    }

    /**
     * Get current internal CArray
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function getInternalCArray() {
        return $this->_carray_internal;
    }

    /**
     * Get current UUID (alias of getPointer)
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function getUUID() {
        return $this->getPointer();
    }

    /**
     * Get number of rows in MemoryPointer
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function getRows() : int {
        return $this->x;
    }

    /**
     * Get number of columns in MemoryPointer
     *
     * @return int
     */
    public function getCols() : int {
        return $this->y;
    }
}