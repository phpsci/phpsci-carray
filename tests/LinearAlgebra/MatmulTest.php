<?php
namespace PHPSci\Tests\LinearAlgebra;

use PHPUnit\Framework\TestCase;
use PHPSci\PHPSci as ps;

/**
 * Class MatmulTest
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Tests\LinearAlgebra
 *
 */
class MatmulTest extends TestCase
{

    /**
     *
     */
    public function testMatmul() {
        $expected = [
            [58, 64],
            [139, 154]
        ];
        $a = ps::fromArray([[1,2,3],[4,5,6]]);
        $b = ps::fromArray([[7,8],[9,10],[11,12]]);
        $returned = ps::matmul($a, $b);
        $this->assertEquals($expected, $returned->toArray());
    }

}