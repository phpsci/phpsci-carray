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
 * Class InvertTest
 *
 * @package PHPSci\Tests\LinearAlgebra
 */
class InvertTest extends TestCase
{
    public function testInvertBasic()
    {
        $expected = [
          [-2.0, 1.0],
          [1.5, -0.5]
        ];
        $a = ps::fromArray([[1, 2], [3, 4]]);
        $b = ps::inv($a);
        $this->assertEquals($expected, $b->toArray());
    }
}