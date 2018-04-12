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

namespace PHPSci\Tests\Initializers;

use PHPSci\PHPSci as ps;
use PHPUnit\Framework\TestCase;

/**
 * Class ArrayConvertTest
 *
 * @category Test
 * @package  PHPSci\Tests\Initializers
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class ArrayConvertTest extends TestCase
{
    /**
     * Test fromArray() with 2D array
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testFromArray2D()
    {
        $a = ps::fromArray([[1, 0, 1, 0], [0, 1, 0, 1]]);
        $this->assertObjectNotHasAttribute('uuid', $a);
    }

    /**
     * Test toArray() with 2D array
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testToArray2D()
    {
        $parr = [[1, 0, 1, 0], [0, 1, 0, 1]];
        $a = ps::fromArray($parr);
        $b = $a->toArray();
        $this->assertObjectNotHasAttribute('uuid', $a);
        $this->assertEquals($parr, $b);
    }

    /**
     * Test fromArray() with 1D array
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testFromArray1D()
    {
        $a = ps::fromArray([1, 0, 1, 0, 0, 1, 0, 1]);
        $this->assertObjectNotHasAttribute('uuid', $a);
    }

    /**
     * Test toArray() with 1D array
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testToArray1D()
    {
        $parr = [1, 0, 1, 0, 0, 1, 0, 1];
        $a = ps::fromArray($parr);
        $b = ps::asarray($a);
        $this->assertObjectNotHasAttribute('uuid', $a);
        $this->assertEquals($parr, $b);
    }

    /**
     * Test fromDouble() with 0D array
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testFromDouble0D()
    {
        $a = ps::fromDouble(1);
        $this->assertObjectNotHasAttribute('uuid', $a);
    }

    /**
     * Test toDouble() with scalar
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testToDouble0D()
    {
        $parr = 1;
        $a = ps::fromDouble(1);
        $b = $a->toDouble();
        $this->assertObjectNotHasAttribute('uuid', $a);
        $this->assertEquals($parr, $b);
    }
}
