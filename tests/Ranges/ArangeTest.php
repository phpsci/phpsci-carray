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

namespace PHPSci\Tests\Ranges;

use PHPSci\PHPSci as ps;
use PHPUnit\Framework\TestCase;

/**
 * Class ArangeTest
 *
 * @category Test
 * @package  PHPSci\Tests\Ranges
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class ArangeTest extends TestCase
{
    /**
     * Basic Arange Test
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return null
     */
    public function testArangeBasic()
    {
        $expected = [0, 1, 2];
        $this->assertEquals($expected, ps::toArray(ps::arange(0, 3, 1)));

        $expected = [3, 4, 5, 6];
        $this->assertEquals($expected, ps::toArray(ps::arange(3, 7, 1)));

        $expected = [3, 5];
        $this->assertEquals($expected, ps::toArray(ps::arange(3, 7, 2)));
    }
}
