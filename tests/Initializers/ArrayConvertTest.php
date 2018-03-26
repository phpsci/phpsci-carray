<?php
namespace PHPSci\Tests\Initializers;


use PHPUnit\Framework\TestCase;
use PHPSci\PHPSci as ps;

/**
 * Class ArrayConvertTest
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Tests\Initializers
 */
class ArrayConvertTest extends TestCase
{

    /**
     *  @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testFromArray2D() {
        $a = ps::fromArray([[1,0,1,0],[0,1,0,1]]);
        $this->assertObjectNotHasAttribute('uuid', $a);
    }

    /**
     *  @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testToArray2D() {
        $parr = [[1,0,1,0],[0,1,0,1]];
        $a = ps::fromArray($parr);
        $b = $a->toArray();
        $this->assertObjectNotHasAttribute('uuid', $a);
        $this->assertEquals($parr, $b);
    }

    /**
     *  @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testFromArray1D() {
        $a = ps::fromArray([1,0,1,0,0,1,0,1]);
        $this->assertObjectNotHasAttribute('uuid', $a);
    }

    /**
     *  @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testToArray1D() {
        $parr = [1,0,1,0,0,1,0,1];
        $a = ps::fromArray($parr);
        $b = $a->toArray();
        $this->assertObjectNotHasAttribute('uuid', $a);
        $this->assertEquals($parr, $b);
    }

}