<?php
namespace PHPSci\Core;
use PHPSci\Backend\CArray;
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
     * @param CArray $x
     * @param CArray $y
     * @return PHPSci
     */
    public static function matmul(CArray $x, CArray $y) : PHPSci {
       return CPHPSci::matmul($x, $y);
    }

}