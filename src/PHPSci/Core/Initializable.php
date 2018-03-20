<?php
namespace PHPSci\Core;


use PHPSci\Backend\CArray;
use PHPSci\PHPSci;

trait Initializable
{

    /**
     * Return identity array
     *
     * @param int $n
     * @return PHPSci
     */
    public static function identity(int $n) : PHPSci
    {
        return new PHPSci(\CPHPSci::identity($n));
    }


}