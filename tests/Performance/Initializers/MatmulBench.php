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
 * Class MatmulBench
 *
 * @BeforeMethods({"init"})
 * @OutputTimeUnit("seconds")
 * @category                  Benchmark
 * @package                   PHPSci\Tests\Performance\Initializers
 * @author                    Henrique Borba <henrique.borba.dev@gmail.com>
 * @license                   Apache 2.0
 * @link                      https://www.github.com/phpsci/phpsci
 */
class MatmulBench
{
    public $matrix_a_bb;
    public $matrix_b_bb;
    public $matrix_a_b;
    public $matrix_b_b;
    public $matrix_a_s;
    public $matrix_b_s;

    /**
     * @author   Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function init(): void
    {
        $this->matrix_a_bb = PHPSci::identity(5000);
        $this->matrix_b_bb = PHPSci::identity(5000);
        $this->matrix_a_b = PHPSci::identity(1000);
        $this->matrix_b_b = PHPSci::identity(1000);
        $this->matrix_a_s = PHPSci::identity(100);
        $this->matrix_b_s = PHPSci::identity(100);
    }

    /**
     * @Revs(1)
     * @Iterations(5)
     */
    public function benchReallyBigMatmul()
    {
        $r = PHPSci::matmul($this->matrix_a_b, $this->matrix_b_b);
    }

    /**
     * @Revs(1)
     * @Iterations(5)
     */
    public function benchBigMatmul()
    {
        $r = PHPSci::matmul($this->matrix_a_b, $this->matrix_b_b);
    }

    /**
     * @Revs(1)
     * @Iterations(5)
     */
    public function benchSmallMatmul()
    {
        $r = PHPSci::matmul($this->matrix_a_s, $this->matrix_b_s);
    }
}
