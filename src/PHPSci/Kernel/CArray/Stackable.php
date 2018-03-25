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
     * @return mixed
     */
    public function fromMemoryPointer(MemoryPointer $ptr);
}