<?php
/**
 * PHP Version 7
 * Class MatmulTest
 *
 * @category Test
 * @package  PHPSci\Tests\LinearAlgebra
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
namespace PHPSci\Tests\LinearAlgebra;

use PHPSci\PHPSci;
use PHPUnit\Framework\TestCase;
use PHPSci\PHPSci as ps;

/**
 * Class MatmulTest
 *
 * @category Test
 * @package  PHPSci\Tests\LinearAlgebra
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class MatmulTest extends TestCase
{

    /**
     * Test (2,3) * (3,2) dot product using matmul
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testMatmul()
    {
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
     * @return void
     */
    public function testMatmulSmallIdentity()
    {
        $a = ps::identity(2);
        $expected = $a->toArray();
        $result = ps::matmul($a, $a)->toArray();
        $this->assertEquals($expected, $result);

    }

    /**
     * Test identity dot product with CArray with shape (1000,1000)
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testMatmulBigIdentity()
    {
        $a = ps::identity(100);
        $expected = $a->toArray();
        $result = ps::matmul($a, $a)->toArray();
        $this->assertEquals($expected, $result);
    }

    /**
     * Test matmul() using 2D * 1D
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testMatmul2D1D()
    {
        $expected = [30,33,51,24];
        $expected_2 = [19,45,24,41];
        $a = ps::fromArray([[1,2,3,4],[4,9,1,2],[2,3,5,7],[1,4,1,3]]);
        $b = ps::fromArray([1,2,3,4]);
        $this->assertEquals($expected, ps::matmul($a, $b)->toArray());
        $this->assertEquals($expected_2, ps::matmul($b, $a)->toArray());
    }

    /**
     * Test matmul() with two 1D matrices
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testMatmul1D1D()
    {
        $expected = 33;
        $a = PHPSci::fromArray([1,2,3,4]);
        $b = PHPSci::fromArray([4,9,1,2]);
        $this->assertEquals($expected, ps::matmul($a, $b)->toDouble());
    }



}
