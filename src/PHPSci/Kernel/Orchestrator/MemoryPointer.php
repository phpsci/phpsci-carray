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
    protected $rows;
    protected $cols;

    /**
     * MemoryPointer constructor.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param \stdClass $ptr
     */
    public function __construct(\stdClass $ptr, int $rows, int $cols)
    {
        $this->uuid = $ptr->uuid;
        $this->rows = $rows;
        $this->cols = $cols;
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
     * Get current UUID
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function getUUID() {
        return $this->uuid;
    }

    /**
     * Get number of rows in MemoryPointer
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function getRows() : int {
        return $this->rows;
    }

    /**
     * Get number of columns in MemoryPointer
     *
     * @return int
     */
    public function getCols() : int {
        return $this->cols;
    }
}