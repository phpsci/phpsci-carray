<?php
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
class MatmulBench
{

    public $matrix_a_bb;
    public $matrix_b_bb;
    public $matrix_a_b;
    public $matrix_b_b;
    public $matrix_a_s;
    public $matrix_b_s;

    /**
     *
     */
    public function init() : void {
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
    public function benchReallyBigMatmul() {
        $r = PHPSci::matmul($this->matrix_a_b, $this->matrix_b_b);
    }


    /**
     * @Revs(1)
     * @Iterations(5)
     */
    public function benchBigMatmul() {
        $r = PHPSci::matmul($this->matrix_a_b, $this->matrix_b_b);
    }

    /**
     * @Revs(1)
     * @Iterations(5)
     */
    public function benchSmallMatmul() {
        $r = PHPSci::matmul($this->matrix_a_s, $this->matrix_b_s);
    }

}