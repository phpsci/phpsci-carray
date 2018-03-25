<?php
namespace PHPSci\PropertiesProcessor;


use PHPSci\PHPSci;

class took extends PropertiesProcessor
{

    public static function run(PHPSci $obj)
    {
        return $obj->getTook();
    }
}