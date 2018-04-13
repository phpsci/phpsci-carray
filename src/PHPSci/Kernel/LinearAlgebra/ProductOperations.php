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

namespace PHPSci\Kernel\LinearAlgebra;

use PHPSci\Kernel\Orchestrator\MemoryPointer;

/**
 * Class Product
 *
 * @category Linear_Algebra_Operations
 * @package  PHPSci\Kernel\LinearAlgebra
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class ProductOperations extends BaseLinalg
{
    /**
     * Matrix product of two arrays.
     *
     * Operates like Numpy:
     *
     * If both CArrays are 2-D they are multiplied like conventional matrices.
     *
     * If either argument is N-D, N > 2, it is treated as a stack of matrices
     * residing in the last two indexe and broadcast accordingly.
     *
     * If the first argument is 1-D, it is promoted to a matrix by prepending
     * a 1 to its dimensions. After matrix multiplication the prepended 1 is removed.
     *
     * If the second argument is 1-D, it is promoted to a matrix by appending a 1 to
     * its dimensions. After matrix multiplication the appended 1 is removed.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return MemoryPointer
     */
    public function matmul(): MemoryPointer
    {
        $rtn = \CArray::matmul(
            $this->params[0]->ptr()->getInternalCArray(),
            $this->params[1]->ptr()->getInternalCArray()
        );
        if ($this->params[0]->ptr()->getCols() == 0
            and $this->params[1]->ptr()->getCols() > 0
        ) {
            return new MemoryPointer(
                $rtn,
                $this->params[1]->ptr()->getRows(),
                $this->params[0]->ptr()->getCols()
            );
        }
        if ($this->params[0]->ptr()->getCols() > 0) {
            return new MemoryPointer(
                $rtn,
                $this->params[0]->ptr()->getRows(),
                $this->params[1]->ptr()->getCols()
            );
        }
        if ($this->params[0]->ptr()->getCols() == 0
            and $this->params[1]->ptr()->getCols() == 0
        ) {
            return new MemoryPointer(
                $rtn,
                0,
                0
            );
        }
    }

    /**
     * Inner product of two arrays.
     *
     * Operated like Numpy:
     *
     * Ordinary inner product of vectors for 1-D arrays (without complex conjugation)
     * in higher dimensions a sum product over the last axes.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return MemoryPointer
     */
    public function inner(): MemoryPointer
    {
        $rtn = \CArray::inner(
            $this->params[0]->ptr()->getInternalCArray(),
            $this->params[1]->ptr()->getInternalCArray()
        );

        return new MemoryPointer(
            $rtn,
            $rtn->x,
            $rtn->y
        );
    }
}
