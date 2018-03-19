<?php
namespace PHPSci\Backend\Exceptions;
use Throwable;

/**
 * Class UndefinedPropertyException
 *
 * @package PHPSci\Backend\Exceptions
 */
class UndefinedPropertyException extends \Exception implements PHPSciException
{
    protected $code = 4;

    /**
     * UndefinedPropertyException constructor.
     *
     * @param $class
     * @param $property
     */
    public function __construct($class, $property)
    {
        parent::__construct("[PHPSci Notice] ($this->file:$this->line) Undefined property: $class::$property\n", $this->code, $this->getPrevious());
    }
}