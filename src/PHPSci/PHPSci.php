<?php
namespace PHPSci;

use PHPSci\Backend\CArray;
use PHPSci\Backend\Exceptions\ExtensionMissingException;
use PHPSci\Backend\Exceptions\UndefinedPropertyException;
use PHPSci\Core\ElementWise;
use PHPSci\Core\Initializable;
use PHPSci\Core\LinearAlgebra;
use PHPSci\Core\Randomizable;
use PHPSci\Core\Transformable;

/**
 * Main PHPSci Object
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci
 */
class PHPSci extends CArray {

    use LinearAlgebra, Randomizable, Initializable, ElementWise, Transformable;

    private $value;

    /**
     * PHPSci constructor.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param array $input
     * @throws ExtensionMissingException
     */
    public function __construct($input = array())
    {
        if (!extension_loaded('phpsci')) {
            throw new ExtensionMissingException("PHPSci Extension is required. Download it here: https://github.com/phpsci/phpsci");
        }
        if(is_array($input)){
            if(isset($input[0][0]) && is_string($input[0][0])) {
                $this->value = $input;
            }
            $this->generateCArray($input);
        }
        if(is_int($input) || is_double($input)) {
            $this->value = $input;
        }
        if(is_object($input) && get_class($input) == "PHPSci\Backend\MemoryPointer") {
            $this->cArrayFromPointer($input);
        }
        if(is_object($input) && get_class($input) == "stdClass") {
            $this->cArrayFromStd($input);
        }
    }



    /**
     * Set value if not CArray
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param $value
     */
    private function setValue($value) {
        $this->value = $value;
    }

    /**
     * Get value if not CArray
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * __get() Magic Method
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param $name Properties Overloading
     * @return mixed
     * @throws UndefinedPropertyException
     */
    public function __get($name)
    {
        if(!isset($this->$name)){
            if(is_callable("PHPSci\PropertiesProcessor\\$name::run"))
                return call_user_func("PHPSci\PropertiesProcessor\\$name::run", $this);
            else
                throw new UndefinedPropertyException("PHPSci", $name);
        } else {
            switch($name) {
                case 'c_array':
                    return $this->c_array;
                    break;
                default:
                    throw new UndefinedPropertyException("PHPSci", $name);
            }
        }
    }


    /**
     * Print CArray or Value
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function __toString()
    {
        return parent::__toString();
    }

}