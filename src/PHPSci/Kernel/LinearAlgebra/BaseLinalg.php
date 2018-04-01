<?php
/**
 * PHP Version 7
 * Class BaseLinalg
 *
 * @category Linear_Algebra_Operations
 * @package  PHPSci\Kernel\LinearAlgebra
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
namespace PHPSci\Kernel\LinearAlgebra;

/**
 * Class BaseLinalg
 *
 * @category Linear_Algebra_Operations
 * @package  PHPSci\Kernel\LinearAlgebra
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
abstract class BaseLinalg implements Operation
{
    /**
     * Parameters passed by users for operations
     *
     * @var mixed
     */
    protected $params;

    /**
     * BaseLinalg constructor.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function __construct()
    {
        $a = func_get_args();
        $this->params = $a;
    }
}
