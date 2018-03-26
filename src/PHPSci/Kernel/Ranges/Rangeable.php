<?php

namespace PHPSci\Kernel\Ranges;

use PHPSci\Kernel\CArray\CArrayWrapper;
use PHPSci\Kernel\Orchestrator\MemoryPointer;
use PHPSci\PHPSci;

/**
 * Trait Rangeable
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\Ranges
 */
trait Rangeable
{

    /**
     * Return evenly spaced CArray with values within a given interval.
     *
     * Values are generated within the half-open interval [start, stop)
     * (in other words, the interval including start but excluding stop)
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param float $stop
     * @param float $start
     * @param float $step
     * @return CArrayWrapper
     */
    public static function arange(float $stop, float $start = 0., float $step = 1.) : CArrayWrapper {
        $new_ptr = \CArray::arange($start, $stop, $step);
        return new PHPSci(
                new MemoryPointer(
                    $new_ptr,
                    $new_ptr->rows,
                    $new_ptr->cols
                )
        );
    }

}