<?php
/**
 * PHP Version 7
 * Class Identity
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
 * Class Identity
 *
 * @category Test
 * @package  PHPSci\Tests\Initializers
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class IdentityTest extends TestCase
{

    /**
     * Test big Identity Creation
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testCreateBigIdentity() : void
    {
        $wanted = [
            [1, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 1, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 1, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 1, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 1, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 1, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 1, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 1, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 1, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 1],
        ];
        $generated = PHPSci::identity(10)->toArray();
        $this->assertEquals($wanted, (array)$generated);
    }


    /**
     * Test small Identity Creation
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testCreateSmallIdentity() : void
    {
        $wanted = [
            [1, 0],
            [0, 1],
        ];
        $generated = PHPSci::identity(2)->toArray();
        $this->assertEquals($wanted, (array)$generated);
    }

}
