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
    function testBasicSumNoAxis() {
        $expected = 2;
        $carray = ps::fromArray([0.5, 1.5]);
        $result = ps::sum($carray)->toDouble();
        $this->assertEquals($expected, $result);
    }

    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    function testBasicSubNoAxis() {
        $expected = -2;
        $carray = ps::fromArray([0.5, 1.5]);
        $result = ps::sub($carray)->toDouble();
        $this->assertEquals($expected, $result);
    }


}