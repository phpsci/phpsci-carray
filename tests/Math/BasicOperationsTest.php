<?php

namespace PHPSci\Tests\Math;
use PHPSci\PHPSci as ps;
use PHPUnit\Framework\TestCase;

/**
 * Class BasicOperationsTest
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Tests\Math
 */
class BasicOperationsTest extends TestCase
{

    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testBasicSumNoAxis() {
        $expected = 2;
        $carray = ps::fromArray([0.5, 1.5]);
        $result = ps::sum($carray)->toDouble();
        $this->assertEquals($expected, $result);
    }

    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testBasicSumAxis() {
        $expected_y = [0,6];
        $expected_x = [1,5];

        $carray = ps::fromArray([[0,1], [0,5]]);
        $result_y = ps::sum($carray, 0);
        $result_x = ps::sum($carray, 1);

        $this->assertEquals($expected_y, $result_y->toArray());
        $this->assertEquals($expected_x, $result_x->toArray());
    }


}