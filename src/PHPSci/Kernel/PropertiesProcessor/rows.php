<?php
namespace PHPSci\Kernel\PropertiesProcessor;


use PHPSci\PHPSci;

/**
 * MAGIC PROPERTY: rows
 *
 * @package PHPSci\PropertiesProcessor
 */
class rows extends PropertiesProcessor
{

    /**
     * Magic $row property
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param PHPSci $obj
     * @return int
     */
    public static function run(PHPSci $obj)
    {
        return $obj->ptr()->getRows();
    }
}