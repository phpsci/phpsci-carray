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
use PHPSci\Kernel\Exceptions\BroadcastErrorException;
use PHPSci\Kernel\Orchestrator\MemoryPointer;
use PHPSci\PHPSci;

/**
 * Trait Arithmetic
 *
 * Allow arithmetic operations with CArrays
 *
 * @category Arithmetic_Operations
 * @package  PHPSci\Kernel\Math
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
trait Arithmetic
{
    /**
     * Add arguments element-wise.
     *
     * If both arguments are scalars (0D), a scalar is returned.
     *
     * @param CArrayWrapper $a CArray A
     * @param CArrayWrapper $b CArray B
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return CArrayWrapper The sum of A x B element-wise
     * @throws BroadcastErrorException
     */
    public static function add(CArrayWrapper $a, CArrayWrapper $b) : CArrayWrapper
    {
        try {
            $result = \CArray::add(
                $a->ptr()->getUUID(),
                $a->ptr()->getRows(),
                $a->ptr()->getCols(),
                $b->ptr()->getUUID(),
                $b->ptr()->getRows(),
                $b->ptr()->getCols()
            );
        } catch (\Exception $e) {
            throw new BroadcastErrorException(
                [$a->rows, $a->cols],
                [$b->rows, $b->cols]
            );
        }
        return new PHPSci(
            new MemoryPointer(
                $result,
                $result->x,
                $result->y
            )
        );
    }
}
