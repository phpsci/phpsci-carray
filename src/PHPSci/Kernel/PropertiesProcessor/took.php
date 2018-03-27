<?php
namespace PHPSci\Kernel\PropertiesProcessor;


use PHPSci\PHPSci;


/**
 * Class took
 *
 * @package PHPSci\Kernel\PropertiesProcessor
 */
class took extends PropertiesProcessor
{

    /**
     * @param PHPSci $obj
     * @return float
     */
    public static function run(PHPSci $obj)
    {
        return $obj->getTook();
    }
}