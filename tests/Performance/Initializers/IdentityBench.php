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

declare(strict_types=1);

namespace PHPSci\Tests\Perfomance\Initializers;

use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\OutputTimeUnit;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use PHPSci\PHPSci;

/**
 * @BeforeMethods({"init"})
 * @OutputTimeUnit("seconds")
 */
class IdentityBench
{
    public function init(): void
    {
    }

    /**
     * @Revs(1)
     * @Iterations(5)
     */
    public function benchSmallIdentity()
    {
        $b = PHPSci::identity(10);
    }

    /**
     * @Revs(1)
     * @Iterations(5)
     */
    public function benchBigIdentity()
    {
        $a = PHPSci::identity(100);
    }
}
