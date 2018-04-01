<?php
namespace PHPSci\Tests\Math;

use PHPSci\Kernel\Exceptions\BroadcastError;
use PHPSci\PHPSci as ps;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\TestCase;

/**
 * Class ArithmeticTest
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Tests\Math
 */
class ArithmeticTest extends TestCase
{

    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testAddScalars()
    {
        $expected = 5;

        $a = ps::fromDouble(1);
        $b = ps::fromDouble(4);

        $this->assertEquals($expected, ps::add($a, $b)->toDouble());
    }

    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
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
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @expectedException PHPSci\Kernel\Exceptions\BroadcastErrorException
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