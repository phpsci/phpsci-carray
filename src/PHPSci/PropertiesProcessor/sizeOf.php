<?php
namespace PHPSci\PropertiesProcessor;
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
     * @throws \PHPSci\Backend\Exceptions\ParameterValueException
     */
    public static function run(PHPSci $obj) {
        return $obj->sizeOf();
    }

}