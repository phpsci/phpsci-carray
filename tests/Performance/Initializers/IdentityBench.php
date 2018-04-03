<?php
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


    public function init() : void
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
