<?php
/**
 * PHP Version 7
 * Class ArangeTest
 *
 * @category Test
 * @package  PHPSci\Tests\Ranges
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
namespace PHPSci\Tests\Ranges;

use PHPSci\PHPSci as ps;
use PHPUnit\Framework\TestCase;

/**
 * Class ArangeTest
 *
 * @category Test
 * @package  PHPSci\Tests\Ranges
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class ArangeTest extends TestCase
{
    /**
     * Basic Arange Test
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return null
     */
    public function testArangeBasic()
    {
        $expected = [0, 1, 2];
        $this->assertEquals($expected, ps::arange(3)->toArray());

        $expected = [3,4,5,6];
        $this->assertEquals($expected, ps::arange(7, 3)->toArray());

        $expected = [3,5];
        $this->assertEquals($expected, ps::arange(7, 3, 2)->toArray());
    }
}
