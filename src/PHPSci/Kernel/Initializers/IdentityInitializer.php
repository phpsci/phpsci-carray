<?php
namespace PHPSci\Kernel\Initializers;

use PHPSci\Kernel\Orchestrator\MemoryPointer;

/**
 * Class IdentityInitializer
 *
 * Initialize a new Identity CArray2D with target shape
 *
 * @author  Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\Initializers
 */
class IdentityInitializer extends Initializer
{
    /**
     * Run this function for every initializer
     *
     * @return mixed
     */
    public function run() : MemoryPointer
    {
        return new MemoryPointer(
            \CArray::identity($this->params[0]),
            $this->params[0],
            $this->params[0]
        );
    }
}
