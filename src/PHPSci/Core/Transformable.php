<?php
namespace PHPSci\Core;


use PHPSci\Backend\CArray;
use PHPSci\PHPSci;

trait Transformable
{

    /**
     * Transpose 2-D CArray
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public static function transpose(CArray $a) {
        return new PHPSci(\CPHPSci::transpose($a->toArray()));
    }


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