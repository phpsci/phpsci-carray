<?php
namespace PHPSci;

use PHPSci\Kernel\CArray\CArrayWrapper;
use PHPSci\Kernel\Orchestrator\MemoryPointer;
use PHPSci\Kernel\Printable;

/**
 * Main PHPSci Object
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci
 */
class PHPSci extends CArrayWrapper {

    /**
     * PHPSci constructor.
     */
    public function __construct(MemoryPointer $ptr)
    {
        $this->internal_pointer = $ptr;
    }


}