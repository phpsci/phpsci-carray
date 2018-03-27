<?php
namespace PHPSci\Kernel\PropertiesProcessor;

use PHPSci\PHPSci;

/**
 * Generic Property Interface
 *
 * @package PHPSci\PropertiesProcessor
 */
interface Property
{
    public static function run(PHPSci $obj);
}