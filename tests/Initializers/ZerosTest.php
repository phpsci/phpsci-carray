<?php
namespace PHPSci\Tests\Initializers;


use PHPSci\PHPSci;
use PHPUnit\Framework\TestCase;

/**
 * Class ZerosTest
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Tests\Initializers
 */
class ZerosTest extends TestCase
{

    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testCreateSmallZeros() {
        $wanted = [
            [ 0 , 0 ],
            [ 0 , 0 ],
            [ 0 , 0 ]
        ];
        $generated = PHPSci::zeros([3,2])->toArray();
        $this->assertEquals($wanted, $generated);
    }

    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testCreateSquareZeros() {
        $wanted = [
            [ 0 , 0 ],
            [ 0 , 0 ]
        ];
        $generated = PHPSci::zeros([2,2])->toArray();
        $this->assertEquals($wanted, $generated);
    }

    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testCreateBigZeros() {
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