<?php
namespace PHPSci;

use PHPSci\Backend\CArray;
use PHPSci\Backend\Exceptions\ExtensionMissingException;
use PHPSci\Core\Initializable;
use PHPSci\Core\LinearAlgebra;
use PHPSci\Core\Randomizable;

/**
 * Main PHPSci Object
 *
 * @package PHPSci
 */
class PHPSci extends CArray {

    use LinearAlgebra, Randomizable, Initializable;

    /**
     * PHPSci constructor.
     *
     * @param array $input
     * @throws ExtensionMissingException
     */
    public function __construct($input = array())
    {
        if (!extension_loaded('phpsci')) {
            throw new ExtensionMissingException("PHPSci Extension is required. Download it here: https://github.com/phpsci/phpsci");
        }
        # Generate C array of doubles
        if(is_array($input)){
            $this->generate_c_array($input);
        }
    }

    /**
     * __get() Magic Method
     *
     * @param $name Properties Overloading
     * @return mixed
     */
    public function __get($name)
    {
        if(!isset($this->$name)){
            return call_user_func("PHPSci\PropertiesProcessor\\$name::run", $this);
        }
    }


}