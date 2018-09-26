<?php
namespace PHPSci\Exceptions;

/**
 * Class InvalidCArrayInputException
 * @package PHPSci\Exceptions
 */
class InvalidCArrayInputException extends BaseException
{
    /**
     * @var string
     */
    protected $message = "CArray inputs must be of type double or array";
}