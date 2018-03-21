<?php
namespace PHPSci\Core;

use PHPSci\Backend\CArray;
use PHPSci\Backend\Exceptions\ExtensionMissingException;
use PHPSci\Backend\MemoryPointer;
use PHPSci\PHPSci;

/**
 * Handle Linear Algebra Operations
 *
 * @package PHPSci\LinearAlgebra
 */
trait LinearAlgebra
{


    /**
     * Matrix product of two arrays.
     *
     * @param CArray $x
     * @param CArray $y
     * @return PHPSci
     */
    public static function matmul(CArray $x, CArray $y) {
        $ptr = \CPHPSci::fromUUID(
            \CPHPSci::matmul(
                $x->getUuid(),
                $y->getUuid(),
                $x->getRows(),
                $x->getCols(),
                $y->getCols()),
            $y->getCols(),
            $x->getRows()
        );
       return new PHPSci(
           new MemoryPointer($ptr)
       );
    }

}