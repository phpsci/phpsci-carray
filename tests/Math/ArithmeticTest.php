<?php
/**
 * PHP Version 7
 * Class ArithmeticTest
 *
 * @category Test
 * @package  PHPSci\Tests\Math
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
namespace PHPSci\Tests\Math;

use PHPSci\Kernel\Exceptions\BroadcastError;
use PHPSci\PHPSci as ps;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\TestCase;

/**
 * Class ArithmeticTest
 *
 * @category Test
 * @package  PHPSci\Tests\Math
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class ArithmeticTest extends TestCase
{
    /**
     * Check add() with scalars
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     * @throws \PHPSci\Kernel\Exceptions\BroadcastErrorException
     */
    public function testAddScalars()
    {
        $expected = 5;

        $a = ps::fromDouble(1);
        $b = ps::fromDouble(4);

        $this->assertEquals($expected, ps::add($a, $b)->toDouble());
    }

    /**
     * Test add with 1D matrices
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     * @throws \PHPSci\Kernel\Exceptions\BroadcastErrorException
     */
    public function testAdd1D()
    {
        $expected = [2,3,4,5];

        $a = ps::fromArray([1,2,3,4]);
        $b = ps::fromDouble(1);

        $this->assertEquals($expected, ps::add($a, $b)->toArray());

        $expected = [2,4,6,8];

        $a = ps::fromArray([1,2,3,4]);

        $this->assertEquals($expected, ps::add($a, $a)->toArray());
    }

    /**
     * Test add() with 2D matrices
     *
     * @author            Henrique Borba <henrique.borba.dev@gmail.com>
     * @expectedException PHPSci\Kernel\Exceptions\BroadcastErrorException
     * @return            void
     * @throws            \PHPSci\Kernel\Exceptions\BroadcastErrorException
     */
    public function testAdd2D()
    {
        $expected = [[2,3,4,5]];

        $a = ps::fromArray([[1,2,3,4]]);
        $b = ps::fromDouble(1);

        $this->assertEquals($expected, ps::add($a, $b)->toArray());

        $a = ps::fromArray([[1,2,3,4]]);
        $b = ps::fromArray([1,1,1,1]);

        $this->assertEquals($expected, ps::add($a, $b)->toArray());

        $a = ps::fromArray([[1,2,3,4]]);
        $b = ps::fromArray([[1,1,1,1]]);

        $this->assertEquals($expected, ps::add($a, $b)->toArray());

        $expected = [[2,3,4,5],[2,3,4,5]];
        $a = ps::fromArray([[1,2,3,4],[1,2,3,4]]);
        $b = ps::fromArray([[1,1,1,1]]);

        $this->assertEquals($expected, ps::add($a, $b)->toArray());

        $expected = [[2,3,4,5],[2,3,4,5]];
        $a = ps::fromArray([[1,2,3,4],[1,2,3,4]]);
        $b = ps::fromArray([[1,1,1,1],[1,1,1,1]]);

        $this->assertEquals($expected, ps::add($a, $b)->toArray());

        $a = ps::fromArray([[1,2,3,4],[1,2,3,4],[1,2,3,4]]);
        $b = ps::fromArray([[1,1,1,1],[1,1,1,1]]);
        ps::add($a, $b);
    }
}
