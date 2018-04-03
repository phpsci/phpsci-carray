<?php
/**
 * PHP Version 7
 * Class LinspaceTest
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
 * Class LinspaceTest
 *
 * @category Test
 * @package  PHPSci\Tests\Ranges
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class LinspaceTest extends TestCase
{
    /**
     * Test Small Linear Space
     *
     * @return void
     */
    public function testSmallLinspace()
    {
        $expected = [2.  ,  2.25,  2.5 ,  2.75,  3.];
        $this->assertEquals($expected, PHPSci::linspace(2, 3, 5)->toArray());
    }
}
