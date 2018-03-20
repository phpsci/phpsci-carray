<?php
namespace PHPSci\Core;

use PHPSci\Backend\CArray;
use PHPSci\PHPSci;

/**
 * Handle ElementWise Operations on CArrays
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Core
 */
trait ElementWise
{

    /**
     * Sum of array elements over a given axis.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param CArray $a
     * @return PHPSci
     */
    public static function sum(CArray $a) {
        return new PHPSci(\CPHPSci::sum($a->toArray(), 0));
    }

}