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

use PHPSci\PHPSci;
use PHPUnit\Framework\TestCase;

/**
 * Class ZerosTest
 *
 * @category Test
 * @package  PHPSci\Tests\Initializers
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class ZerosTest extends TestCase
{
    /**
     * Test zeros() with small shape
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testCreateSmallZeros()
    {
        $wanted = [
            [0, 0],
            [0, 0],
            [0, 0],
        ];
        $generated = PHPSci::toArray(PHPSci::zeros([3, 2]));
        $this->assertEquals($wanted, $generated);
    }

    /**
     * Test zeros() with square shape (2,2)
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testCreateSquareZeros()
    {
        $wanted = [
            [0, 0],
            [0, 0],
        ];
        $generated = PHPSci::toArray(PHPSci::zeros([2, 2]));
        $this->assertEquals($wanted, $generated);
    }

    /**
     * Test zeros() with big shape (10,10)
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testCreateBigZeros()
    {
        $wanted = [
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        ];
        $generated = PHPSci::toArray(PHPSci::zeros([10, 10]));
        $this->assertEquals($wanted, $generated);
    }
}
