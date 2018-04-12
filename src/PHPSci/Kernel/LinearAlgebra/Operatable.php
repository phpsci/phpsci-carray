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

use PHPSci\Kernel\CArray\CArrayWrapper;
use PHPSci\PHPSci;

/**
 * Trait Operatable
 *
 * @category Linear_Algebra_Operations
 * @package  PHPSci\Kernel\LinearAlgebra
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
trait Operatable
{
    /**
     * Interface for ProductOperations matmul.
     *
     * @param CArrayWrapper $a CArray A
     * @param CArrayWrapper $b CArray B
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return PHPSci
     */
    public static function matmul(CArrayWrapper $a, CArrayWrapper $b): PHPSci
    {
        return new PHPSci(
            (
                new ProductOperations($a, $b)
            )->matmul()
        );
    }

    /**
     * Interface for ProductOperations inner
     *
     * @param CArrayWrapper $a
     * @param CArrayWrapper $b
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return PHPSci
     */
    public static function inner(CArrayWrapper $a, CArrayWrapper $b): PHPSci
    {
        return new PHPSci(
            (
                new ProductOperations($a, $b)
            )->inner()
        );
    }
}
