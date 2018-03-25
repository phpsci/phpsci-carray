<?php
namespace PHPSci\Kernel\LinearAlgebra;

/**
 * Class BaseLinalg
 *
 * @package PHPSci\Kernel\LinearAlgebra
 */
abstract class BaseLinalg implements Operation
{

    /**
     * @var mixed
     */
    protected $params;

    /**
     * BaseLinalg constructor.
     */
    public function __construct()
    {
        $a = func_get_args();
        $this->params = $a;
    }


}