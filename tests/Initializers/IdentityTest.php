<?php
namespace PHPSci\Tests\Initializers;


use PHPSci\PHPSci;
use PHPUnit\Framework\TestCase;

/**
 * Class Identity
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Tests\Initializers
 */
class IdentityTest extends TestCase
{

    /**
     * Test big Identity Creation
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
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