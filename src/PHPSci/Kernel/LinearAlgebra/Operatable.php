<?php
namespace PHPSci\Kernel\LinearAlgebra;


use PHPSci\Kernel\Orchestrator\MemoryPointer;
use PHPSci\PHPSci;

trait Operatable
{

    /**
     *
     *
     * @param $a
     * @param $b
     *
     * @return PHPSci
     */
    public static function matmul($a, $b) : PHPSci {
        return new PHPSci((
                new ProductOperations($a, $b)
            )->matmul()
        );
    }


}