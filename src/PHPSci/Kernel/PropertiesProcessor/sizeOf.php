<?php
namespace PHPSci\Kernel\PropertiesProcessor;

use PHPSci\PHPSci;

/**
 * Class sizeOf
 *
 * @package PHPSci\PropertiesProcessor
 */
class sizeOf extends PropertiesProcessor
{
    /**
     * @param PHPSci $obj
     * @return int
     */
    public static function run(PHPSci $obj)
    {
        return $obj->ptr()->sizeOf();
    }
}
