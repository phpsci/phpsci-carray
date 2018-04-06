<?php
namespace PHPSci\Tests\LinearAlgebra;

use PHPSci\PHPSci as ps;
use PHPUnit\Framework\TestCase;

/**
 * Class InnerProductTest
 *
 * @package PHPSci\Tests\LinearAlgebra
 */
class InnerProductTest extends TestCase
{
    /**
     * @author   Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testInner1Dv0D ()
    {
        $expected = [7, 14, 7];
        $a = ps::fromArray([1, 2, 1]);
        $b = ps::fromDouble(7);
        $this->assertEquals($expected, ps::inner($a, $b)->toArray());
    }

    /**
     * @author   Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testInner1Dv1D ()
    {
        $expected = 2;
        $a = ps::fromArray([1, 2, 3]);
        $b = ps::fromArray([0, 1, 0]);
        $this->assertEquals($expected, ps::inner($a, $b)->toDouble());
    }

    /**
     * @author   Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testInner2Dv0D ()
    {
        $expected = [
            [7, 0],
            [0, 7]
        ];
        $a = ps::identity(2);
        $b = ps::fromDouble(7);
        $this->assertEquals($expected, ps::inner($a, $b)->toArray());
    }

    /**
     * @author   Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testInner2Dv2D ()
    {
        $expected = [
            [6, 10],
            [7, 13]
        ];
        $a = ps::fromArray([[1,2,1],[1,3,1]]);
        $b = ps::fromArray([[2,1,2],[2,3,2]]);
        $this->assertEquals($expected, ps::inner($a, $b)->toArray());
    }
}