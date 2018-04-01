<?php
/**
 * PHP Version 7
 * Class LogspaceTest
 *
 * @category Test
 * @package  PHPSci\Tests\Ranges
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
namespace PHPSci\Tests\Ranges;

use PHPSci\PHPSci;
use PHPUnit\Framework\TestCase;

/**
 * Class LogspaceTest
 *
 * @category Test
 * @package  PHPSci\Tests\Ranges
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class LogspaceTest extends TestCase
{
    /**
     * Test logspace static range initializer
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function testLogspaceRangeInitializer()
    {
        $expected = [100, 215.4434356689453, 464.1589660644531, 1000];
        $returned = PHPSci::logspace(2, 3, 4)->toArray();
        $this->assertEquals($expected, $returned);

        $expected = [4, 5.039683818817139, 6.349604606628418, 8];
        $returned = PHPSci::logspace(2, 3, 4, 2)->toArray();
        $this->assertEquals($expected, $returned);
    }
}
