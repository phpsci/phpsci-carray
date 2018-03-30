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

    /**
     * MemoryPointer constructor.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param \CArray $ptr
     * @param int $rows
     * @param int $cols
     */
    public function __construct(\CArray $ptr, int $x, int $y)
    {
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