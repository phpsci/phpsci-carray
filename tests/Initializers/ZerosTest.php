<?php
/**
 * PHP Version 7
 * Class ZerosTest
 *
 * @category Test
 * @package  PHPSci\Tests\Initializers
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
namespace PHPSci\Tests\Initializers;

use PHPSci\PHPSci;
use PHPUnit\Framework\TestCase;

/**
 * Class ZerosTest
 *
 * @category Test
 * @package  PHPSci\Tests\Initializers
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class ZerosTest extends TestCase
{
    /**
     * Test zeros() with small shape
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testCreateSmallZeros()
    {
        $wanted = [
            [ 0 , 0 ],
            [ 0 , 0 ],
            [ 0 , 0 ]
        ];
        $generated = PHPSci::zeros([3,2])->toArray();
        $this->assertEquals($wanted, $generated);
    }

    /**
     * Test zeros() with square shape (2,2)
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testCreateSquareZeros()
    {
        $wanted = [
            [ 0 , 0 ],
            [ 0 , 0 ]
        ];
        $generated = PHPSci::zeros([2,2])->toArray();
        $this->assertEquals($wanted, $generated);
    }

    /**
     * Test zeros() with big shape (10,10)
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testCreateBigZeros()
    {
        $wanted = [
            [ 0 , 0, 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 ],
            [ 0 , 0, 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 ],
            [ 0 , 0, 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 ],
            [ 0 , 0, 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 ],
            [ 0 , 0, 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 ],
            [ 0 , 0, 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 ],
            [ 0 , 0, 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 ],
            [ 0 , 0, 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 ],
            [ 0 , 0, 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 ],
            [ 0 , 0, 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 ]
        ];
        $generated = PHPSci::zeros([10,10])->toArray();
        $this->assertEquals($wanted, $generated);
    }
}

