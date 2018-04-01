<?php
namespace PHPSci\Kernel\Initializers;

/**
 * Class Initializer
 *
 * @author  Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\Initializers
 */
abstract class Initializer implements Initializable
{
    /**
     * @var array
     */
    protected $params;

    /**
     * Initializer constructor.
     */
    public function __construct()
    {
        $this->params = func_get_args();
    }
}
