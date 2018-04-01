<?php
namespace PHPSci;

use PHPSci\Kernel\CArray\CArrayWrapper;
use PHPSci\Kernel\Orchestrator\MemoryPointer;
use PHPSci\Kernel\Printable;

/**
 * Main PHPSci Object
 *
 * @author  Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci
 */
class PHPSci extends CArrayWrapper
{
    /**
     * PHPSci constructor.
     */
    public function __construct($input)
    {
        if (is_object($input) && get_class($input) == "PHPSci\Kernel\Orchestrator\MemoryPointer") {
            $this->internal_pointer = $input;
            return;
        }
        if (is_array($input)) {
            $new_carray = PHPSci::fromArray($input);
            $this->internal_pointer = new MemoryPointer(
                $new_carray->ptr()->getInternalCArray(),
                $new_carray->ptr()->getRows(),
                $new_carray->ptr()->getCols()
            );
            return;
        }
        if (is_double($input) || is_int($input) || is_float($input)) {
            $new_carray = PHPSci::fromDouble($input);
            $this->internal_pointer = new MemoryPointer(
                $new_carray->ptr()->getInternalCArray(),
                $new_carray->ptr()->getRows(),
                $new_carray->ptr()->getCols()
            );
            return;
        }
    }
}
