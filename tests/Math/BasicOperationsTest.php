<?php
/**
 * PHP Version 7
 * Class BasicOperationsTest
 *
 * @category Test
 * @package  PHPSci\Tests\Math
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
namespace PHPSci\Tests\Math;

use PHPSci\PHPSci as ps;
use PHPUnit\Framework\TestCase;

/**
 * Class BasicOperationsTest
 *
 * @category Test
 * @package  PHPSci\Tests\Math
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class BasicOperationsTest extends TestCase
{

    /**
     * Test basic sum with axis = null
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testBasicSumNoAxis()
    {
        $expected = 2;
        $carray = ps::fromArray([0.5, 1.5]);
        $result = ps::sum($carray)->toDouble();
        $this->assertEquals($expected, $result);
    }

    /**
     * Test basic sum using axis
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testBasicSumAxis()
    {
        $expected_y = [0,6];
        $expected_x = [1,5];

        $carray = ps::fromArray([[0,1], [0,5]]);
        $result_y = ps::sum($carray, 0);
        $result_x = ps::sum($carray, 1);

        $this->assertEquals($expected_y, $result_y->toArray());
        $this->assertEquals($expected_x, $result_x->toArray());
    }


}
