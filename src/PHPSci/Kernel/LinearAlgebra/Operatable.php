<?php
namespace PHPSci\Kernel\LinearAlgebra;


use PHPSci\Kernel\Orchestrator\MemoryPointer;
use PHPSci\PHPSci;

/**
 * Trait Operatable
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\LinearAlgebra
 */
trait Operatable
{
    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param $a
     * @param $b
     * @return PHPSci
     */
    public static function matmul($a, $b) : PHPSci {
        return new PHPSci((
                new ProductOperations($a, $b)
            )->matmul()
        );
    }
}