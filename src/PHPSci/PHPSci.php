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
     * @param int $flags
     * @param string $iterator_class
     * @throws ExtensionMissingException
     */
    public function __construct($input = array(), int $flags = 0, string $iterator_class = "ArrayIterator")
    {
        if (!extension_loaded('phpsci')) {
            throw new ExtensionMissingException("PHPSci Extension is required. Download it here: https://github.com/phpsci/phpsci");
        }
        parent::__construct($input, $flags, $iterator_class);
    }


}