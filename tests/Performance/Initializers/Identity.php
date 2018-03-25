<?php
namespace PHPSci\Tests\Perfomance\Initializers;


use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\OutputTimeUnit;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use PHPSci\PHPSci;

class Identity
{


    public function init() : void
    {

    }

    public function small_identity()
    {
        PHPSci::identity(10);
    }

}