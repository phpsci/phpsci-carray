<?php
/**
 * PHP Version 7
 * Trait Operatable
 *
 * @category Linear_Algebra_Operations
 * @package  PHPSci\Kernel\LinearAlgebra
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
namespace PHPSci\Kernel\LinearAlgebra;

use PHPSci\Kernel\CArray\CArrayWrapper;
use PHPSci\PHPSci;

/**
 * Trait Operatable
 *
 * @category Linear_Algebra_Operations
 * @package  PHPSci\Kernel\LinearAlgebra
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
trait Operatable
{
    /**
     * Interface for ProductOperations matmul.
     *
     * @param CArrayWrapper $a CArray A
     * @param CArrayWrapper $b CArray B
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return PHPSci
     */
    public static function matmul(CArrayWrapper $a, CArrayWrapper $b) : PHPSci
    {
        return new PHPSci(
            (
                new ProductOperations($a, $b)
            )->matmul()
        );
    }
}
