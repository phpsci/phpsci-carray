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

namespace PHPSci\Tests\Math;

use PHPSci\PHPSci as ps;
use PHPUnit\Framework\TestCase;

/**
 * Class ArithmeticTest
 *
 * @category Test
 * @package  PHPSci\Tests\Math
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class ArithmeticTest extends TestCase
{
    /**
     * Check add() with scalars
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @throws \PHPSci\Kernel\Exceptions\BroadcastErrorException
     * @return void
     */
    public function testAddScalars()
    {
        $expected = 5;

        $a = ps::fromDouble(1);
        $b = ps::fromDouble(4);

        $this->assertEquals($expected, ps::add($a, $b)->toDouble());
    }

    /**
     * Test add with 1D matrices
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @throws \PHPSci\Kernel\Exceptions\BroadcastErrorException
     * @return void
     */
    public function testAdd1D()
    {
        $expected = [2, 3, 4, 5];

        $a = ps::fromArray([1, 2, 3, 4]);
        $b = ps::fromDouble(1);

        $this->assertEquals($expected, ps::add($a, $b)->toArray());

        $expected = [2, 4, 6, 8];

        $a = ps::fromArray([1, 2, 3, 4]);

        $this->assertEquals($expected, ps::add($a, $a)->toArray());
    }

    /**
     * Test add() with 2D matrices
     *
     * @author            Henrique Borba <henrique.borba.dev@gmail.com>
     * @return            void
     * @throws \PHPSci\Kernel\Exceptions\BroadcastErrorException
     */
    public function testAdd2D()
    {
        $expected = [[2, 3, 4, 5]];

        $a = ps::fromArray([[1, 2, 3, 4]]);
        $b = ps::fromDouble(1);

        $this->assertEquals($expected, ps::add($a, $b)->toArray());
    }

    public function testAdd2Dv2()
    {
        $expected = [[2, 3, 4, 5]];

        $a = ps::fromArray([[1, 2, 3, 4]]);
        $b = ps::fromArray([1, 1, 1, 1]);

        $this->assertEquals($expected, ps::add($a, $b)->toArray());
    }

    public function testAdd2Dv3()
    {
        $expected = [[2, 3, 4, 5]];

        $a = ps::fromArray([[1, 2, 3, 4]]);
        $b = ps::fromArray([[1, 1, 1, 1]]);

        $this->assertEquals($expected, ps::add($a, $b)->toArray());
    }

    public function testAdd2Dv4()
    {
        $expected = [[2, 3, 4, 5], [2, 3, 4, 5]];
        $a = ps::fromArray([[1, 2, 3, 4], [1, 2, 3, 4]]);
        $b = ps::fromArray([[1, 1, 1, 1]]);

        $this->assertEquals($expected, ps::add($a, $b)->toArray());
    }

    public function testAdd2Dv5()
    {
        $expected = [[2, 3, 4, 5], [2, 3, 4, 5]];
        $a = ps::fromArray([[1, 2, 3, 4], [1, 2, 3, 4]]);
        $b = ps::fromArray([[1, 1, 1, 1], [1, 1, 1, 1]]);

        $this->assertEquals($expected, ps::add($a, $b)->toArray());
    }


}
