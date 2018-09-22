<?php
namespace PHPSci;

use PHPSci\Kernel\CArray\CInterface;
use PHPSci\Kernel\CArray\Wrapper;

/**
 * Class CArray
 * @package PHPSci
 */
class CArray extends \CArray implements CInterface
{
    use Wrapper;
}