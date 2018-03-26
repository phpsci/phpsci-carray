<?php
namespace PHPSci\Tests\Ranges;


use PHPSci\PHPSci;
use PHPUnit\Framework\TestCase;

class LinspaceTest extends TestCase
{

    public function testSmallLinspace() {
        $expected = [2.  ,  2.25,  2.5 ,  2.75,  3.];
        $this->assertEquals($expected, PHPSci::linspace(3,2,5)->toArray());
    }

}