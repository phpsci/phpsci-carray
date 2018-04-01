<?php
/**
 * PHP Version 7
 * Class BroadcastError
 *
 * @category Kernel_Exceptions
 * @package  PHPSci\Kernel\Exceptions
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
namespace PHPSci\Kernel\Exceptions;

use Throwable;

/**
 * Class BroadcastError
 *
 * @category Kernel_Exceptions
 * @package  PHPSci\Kernel\Exceptions
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class BroadcastErrorException extends \Exception
{
    /**
     * Exception Code
     *
     * @var int
     */
    protected $code = 1590;

    /**
     * BroadcastError constructor.
     *
     * @param array          $shape_a  Shape of Matrix A
     * @param array          $shape_b  Shape of Matrix B
     * @param Throwable|null $previous Previous Throwable
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function __construct(
        array $shape_a,
        array $shape_b,
        Throwable $previous = null
    ) {
        $message = "Could not broadcast operands with shapes 
        ($shape_b[0],$shape_b[1]) ($shape_a[0],$shape_a[1])";

        parent::__construct($message, $this->code, $previous);
    }
}
