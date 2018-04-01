<?php
namespace PHPSci\Kernel\PropertiesProcessor;

/**
 * Trait Inflatable
 *
 * Dynamic properties.
 *
 * @author  Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\PropertiesProcessor
 */
trait Inflatable
{
    /**
     * Emulates properties based on available classes.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param  $name
     * @return mixed
     */
    public function __get($name)
    {
        return call_user_func('PHPSci\\Kernel\\PropertiesProcessor\\'.$name.'::run', $this);
    }
}
