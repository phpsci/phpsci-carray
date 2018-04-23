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
 * Class LinspaceTest
 *
 * @category Test
 * @package  PHPSci\Tests\Ranges
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class LinspaceTest extends TestCase
{
    /**
     * Test Small Linear Space
     *
     * @return void
     */
    public function testSmallLinspace()
    {
        $expected = [2.,  2.25,  2.5,  2.75,  3.];
        $this->assertEquals($expected, PHPSci::toArray(PHPSci::linspace(2, 3, 5)));
    }
}
