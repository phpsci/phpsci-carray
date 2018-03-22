<?php
namespace PHPSci\Backend;

/**
 * Class MemoryPointer
 * @package PHPSci\Backend
 */
class MemoryPointer
{
    /**
     * @var
     */
    public $rows;

    /**
     * @var
     */
    public $cols;

    /**
     * @var
     */
    public $uuid;

    /**
     * @var
     */
    public $c_array_size;

    /**
     * @var int
     */
    public $took;

    /**
     * @var
     */
    public $dim;

    /**
     * MemoryPointer constructor.
     * @param \stdClass $ptr
     */
    public function __construct($ptr)
    {
        $this->dim = $ptr->dim;
        $this->rows = $ptr->rows;
        $this->cols = $ptr->cols;
        $this->uuid = $ptr->uuid;
        $this->c_array_size = $ptr->c_array_size;
        $this->took = 0;
    }

}