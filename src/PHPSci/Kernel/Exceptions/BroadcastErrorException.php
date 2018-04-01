<?php
namespace PHPSci\Kernel\Exceptions;

use Throwable;

/**
 * Class BroadcastError
 *
 * @package PHPSci\Kernel\Exceptions
 */
class BroadcastErrorException extends \Exception
{
    /**
     * @var int
     */
    protected $code = 1590;

    /**
     * BroadcastError constructor.
     *
     * @param array $shape_a
     * @param array $shape_b
     * @param Throwable|null $previous
     */
    public function __construct(array $shape_a, array $shape_b, Throwable $previous = null)
    {
        $message = "Could not broadcast operands with shapes ($shape_b[0],$shape_b[1]) ($shape_a[0],$shape_a[1])";
        parent::__construct($message, $this->code, $previous);
    }

}