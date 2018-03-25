<?php
namespace PHPSci\Kernel\Initializers;

use PHPSci\Kernel\Orchestrator\MemoryPointer;

/**
 * Class Initializer
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\Initializers
 */
abstract class Initializer implements Initializable
{

    protected $params;

    /**
     * Initializer constructor.
     */
    public function __construct()
    {
        $this->params = func_get_args();
    }

}