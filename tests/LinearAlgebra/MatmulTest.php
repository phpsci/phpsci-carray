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
     * Test (2,3) * (3,2) dot product using matmul
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
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

    /**
     * Test 2 rows identity dot product
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testMatmulSmallIdentity() {
        $a = ps::identity(2);
        $expected = $a->toArray();
        $result = ps::matmul($a, $a)->toArray();
        $this->assertEquals($expected, $result);

    }

    /**
     * Test identity dot product with CArray with shape (1000,1000)
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function testMatmulBigIdentity() {
        $a = ps::identity(1000);
        $expected = $a->toArray();
        $result = ps::matmul($a, $a)->toArray();
        $this->assertEquals($expected, $result);
    }



}