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

use PHPSci\PHPSci;
use PHPUnit\Framework\TestCase;

/**
 * Class LogspaceTest
 *
 * @category Test
 * @package  PHPSci\Tests\Ranges
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class LogspaceTest extends TestCase
{
    /**
     * Test logspace static range initializer
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testLogspaceRangeInitializer()
    {
        $expected = [100.0, 215.44346900318845, 464.15888336127773, 1000.0];
        $returned = PHPSci::toArray(PHPSci::logspace(2, 3, 4, 10));
        $this->assertEquals($expected, $returned);

        $expected = [4.0, 5.039684199579493, 6.3496042078727974, 8.0];
        $returned = PHPSci::toArray(PHPSci::logspace(2, 3, 4, 2));
        $this->assertEquals($expected, $returned);
    }
}
