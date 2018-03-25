<?php
namespace PHPSci\Kernel\Initializers;


use PHPSci\Kernel\Orchestrator\MemoryPointer;

class ZerosInitializer extends Initializer
{

    /**
     * Run this function for every initializer
     *
     * @return mixed
     */
    public function run(): MemoryPointer
    {
        return new MemoryPointer(\CArray::zeros($this->params[0],$this->params[1]), $this->params[0], $this->params[1]);
    }
}