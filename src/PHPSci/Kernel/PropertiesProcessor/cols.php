<?php
namespace PHPSci\Kernel\PropertiesProcessor;


use PHPSci\PHPSci;

/**
 * MAGIC PROPERTY $cols
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\PropertiesProcessor
 */
class cols extends PropertiesProcessor
{
    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param PHPSci $obj
     * @return int
     */
    public static function run(PHPSci $obj)
    {
        return $obj->ptr()->getCols();
    }
}