<?php
namespace PHPSci\Kernel\CArray;

use PHPSci\Kernel\Orchestrator\MemoryPointer;

/**
 * Dummy Stackable Interface
 *
 * @package PHPSci\Kernel\CArray
 */
interface Stackable
{
    /**
     * @param MemoryPointer $ptr
     * @return mixed
     */
    public function fromMemoryPointer(MemoryPointer $ptr);
}
