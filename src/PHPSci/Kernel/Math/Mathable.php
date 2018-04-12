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

namespace PHPSci\Kernel\Math;

use PHPSci\Kernel\CArray\CArrayWrapper;
use PHPSci\Kernel\Orchestrator\MemoryPointer;
use PHPSci\PHPSci;

/**
 * Trait Mathable
 *
 * Allow basic math operations with CArrays
 *
 * @category Basic_Operations
 * @package  PHPSci\Kernel\Math
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
trait Mathable
{
    use Arithmetic;

    /**
     * Sum of array elements over a given axis.
     *
     * If axis = NULL, will sum all elements of the input CArray
     *
     * @param CArrayWrapper $a    Target CArray
     * @param int|null      $axis Axis or axes along which a sum is performed.
     *                            The default, axis = null, will sum all of the
     *                            elements of the input array.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return PHPSci
     */
    public static function sum(CArrayWrapper $a, int $axis = null): PHPSci
    {
        if (!isset($axis)) {
            $out = \CArray::sum(
                $a->ptr()->getUUID(),
                $a->ptr()->getRows(),
                $a->ptr()->getCols()
            );
        }
        if (isset($axis)) {
            $out = \CArray::sum(
                $a->ptr()->getUUID(),
                $a->ptr()->getRows(),
                $a->ptr()->getCols(),
                $axis
            );
        }

        return new PHPSci(
            new MemoryPointer(
                $out,
                $out->x,
                $out->y
            )
        );
    }
}
