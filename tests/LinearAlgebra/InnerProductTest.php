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

use PHPSci\PHPSci as ps;
use PHPUnit\Framework\TestCase;

/**
 * Class InnerProductTest
 *
 * @package PHPSci\Tests\LinearAlgebra
 */
class InnerProductTest extends TestCase
{
    /**
     * @author   Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testInner1Dv0D()
    {
        $expected = [7, 14, 7];
        $a = ps::fromArray([1, 2, 1]);
        $b = ps::fromDouble(7);
        $this->assertEquals($expected, ps::toArray(ps::inner($a, $b)));
    }

    /**
     * @author   Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testInner1Dv1D()
    {
        $expected = 2;
        $a = ps::fromArray([1, 2, 3]);
        $b = ps::fromArray([0, 1, 0]);
        $this->assertEquals($expected,  ps::toDouble(ps::inner($a, $b)));
    }

    /**
     * @author   Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testInner2Dv0D()
    {
        $expected = [
            [7, 0],
            [0, 7],
        ];
        $a = ps::identity(2);
        $b = ps::fromDouble(7);
        $this->assertEquals($expected, ps::toArray(ps::inner($a, $b)));
    }

    /**
     * @author   Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testInner2Dv2D()
    {
        $expected = [
            [6, 10],
            [7, 13],
        ];
        $a = ps::fromArray([[1, 2, 1], [1, 3, 1]]);
        $b = ps::fromArray([[2, 1, 2], [2, 3, 2]]);
        $this->assertEquals($expected, ps::toArray(ps::inner($a, $b)));
    }
}
