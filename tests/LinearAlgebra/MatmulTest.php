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

namespace PHPSci\Tests\LinearAlgebra;

use PHPSci\PHPSci;
use PHPSci\PHPSci as ps;
use PHPUnit\Framework\TestCase;

/**
 * Class MatmulTest
 *
 * @category Test
 * @package  PHPSci\Tests\LinearAlgebra
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class MatmulTest extends TestCase
{
    /**
     * Test (2,3) * (3,2) dot product using matmul
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testMatmul()
    {
        $expected = [
            [58, 64],
            [139, 154],
        ];
        $a = ps::fromArray([[1, 2, 3], [4, 5, 6]]);
        $b = ps::fromArray([[7, 8], [9, 10], [11, 12]]);
        $returned = ps::matmul($a, $b);
        $this->assertEquals($expected, ps::toArray($returned));
    }

    /**
     * Test 2 rows identity dot product
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testMatmulSmallIdentity()
    {
        $a = ps::identity(2);
        $expected = ps::toArray($a);
        $result = ps::toArray(ps::matmul($a, $a));
        $this->assertEquals($expected, $result);
    }

    /**
     * Test identity dot product with CArray with shape (1000,1000)
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testMatmulBigIdentity()
    {
        $a = ps::identity(100);
        $expected = ps::toArray($a);
        $result = ps::toArray(ps::matmul($a, $a));
        $this->assertEquals($expected, $result);
    }

    /**
     * Test matmul() with two 1D matrices
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testMatmul1D1D()
    {
        $expected = 33;
        $a = ps::fromArray([1, 2, 3, 4]);
        $b = ps::fromArray([4, 9, 1, 2]);
        $this->assertEquals($expected,  ps::toDouble(ps::matmul($a, $b)));
    }
}
