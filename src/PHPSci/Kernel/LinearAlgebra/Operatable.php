<?php
namespace PHPSci\Kernel\LinearAlgebra;


use PHPSci\Kernel\Orchestrator\MemoryPointer;
use PHPSci\PHPSci;

trait Operatable
{

    public static function matmul($a, $b) : PHPSci {

        return new PHPSci((new MemoryPointer(CArray::matmul())));
    }


}