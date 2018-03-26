<?php
namespace PHPSci\Tests\Ranges;

use PHPSci\PHPSci as ps;
use PHPUnit\Framework\TestCase;

/**
 * Class ArangeTest
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Tests\Ranges
 */
class ArangeTest extends TestCase
{

    /**
     *  @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testArangeBasic() {
        $expected = [0, 1, 2];
        $this->assertEquals($expected, ps::arange(3)->toArray());

        $expected = [3,4,5,6];
        $this->assertEquals($expected, ps::arange(7, 3)->toArray());

        $expected = [3,5];
        $this->assertEquals($expected, ps::arange(7,3,2)->toArray());
    }

}