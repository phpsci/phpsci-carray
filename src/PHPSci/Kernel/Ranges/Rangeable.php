<?php
/*
 * Copyright 2018 Henrique Borba and contributors
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace PHPSci\Kernel\Ranges;

use PHPSci\Kernel\CArray\CArrayWrapper;
use PHPSci\Kernel\Orchestrator\MemoryPointer;
use PHPSci\PHPSci;

/**
 * Trait Rangeable
 *
 * @category Ranges
 * @package  PHPSci\Kernel\Ranges
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
trait Rangeable
{
    /**
     * Return evenly spaced CArray with values within a given interval.
     *
     * Values are generated within the half-open interval [start, stop)
     * (in other words, the interval including start but excluding stop)
     *
     * @param float $stop  End of interval. The interval does not include
     *                     this value, except in some cases where step is not an
     *                     integer and floating point round-off affects the length
     *                     of out.
     * @param float $start Start of interval. The interval includes this
     *                     value. The default start value is 0.
     * @param float $step  Spacing between values. For any output out, this
     *                     is the distance between two adjacent values,
     *                     out[i+1] - out[i]. The default step size is 1.
     *                     If step is specified as a position argument, start
     *                     must also be given.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return CArrayWrapper
     */
    public static function arange(
        $stop,
        $start = 0.,
        $step = 1.
    ): CArrayWrapper {
        $new_ptr = \CArray::arange($start, $stop, $step);

        return new PHPSci(
            new MemoryPointer(
                $new_ptr,
                $new_ptr->x,
                $new_ptr->y
            )
        );
    }

    /**
     * Return evenly spaced numbers over a specified interval.
     *
     * Returns num evenly spaced samples, calculated over the interval [start, stop].
     *
     * @param float $stop  The end value of the sequence.
     * @param float $start The starting value of the sequence.
     * @param float $num   Number of samples to generate. Default is 50.
     *                     Must be non-negative.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return CArrayWrapper
     */
    public static function linspace(
        $start,
        $stop,
        $num = 50
    ): CArrayWrapper {
        $new_ptr = \CArray::linspace($start, $stop, $num);

        return new PHPSci(
            new MemoryPointer(
                $new_ptr,
                $new_ptr->x,
                $new_ptr->y
            )
        );
    }

    /**
     * Return numbers spaced evenly on a log scale.
     *
     * @param float $start base ** start is the starting value of the sequence.
     * @param float $stop  base ** stop is the final value of the sequence
     * @param int   $num   Number of samples to generate. Default is 50.
     * @param float $base  The base of the log space.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return CArrayWrapper
     */
    public static function logspace(
        $start,
        $stop,
        int $num = 50,
        $base = 10
    ): CArrayWrapper {
        $new_ptr = \CArray::logspace($start, $stop, $num, $base);

        return new PHPSci(
            new MemoryPointer(
                $new_ptr,
                $new_ptr->x,
                $new_ptr->y
            )
        );
    }
}
