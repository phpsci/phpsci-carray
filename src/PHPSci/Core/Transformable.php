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


}