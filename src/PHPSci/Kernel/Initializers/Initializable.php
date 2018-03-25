<?php
namespace PHPSci\Kernel\Initializers;


use PHPSci\Kernel\Orchestrator\MemoryPointer;

/**
 * Interface Initializable
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\Initializers
 */
interface Initializable
{
    /**
     * Run this function for every initializer
     *
     * @return mixed
     */
    public function run() : MemoryPointer;
}