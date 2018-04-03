<?php
namespace PHPSci\Kernel\Initializers;

use PHPSci\PHPSci;

/**
 * Trait Creatable
 *
 * @author  Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\Initializers
 */
trait Creatable
{
    /**
     * Return the identity array.
     *
     * Square array with ones on the main diagonal.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param  int $n Number of rows
     * @return PHPSci
     */
    public static function identity(int $n) : PHPSci
    {
        return new PHPSci(
            (new IdentityInitializer($n))->run()
        );
    }

    /**
     * Return CArray full of zeros
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param  array $shape
     * @return PHPSci
     */
    public static function zeros(array $shape) : PHPSci
    {
        if (!isset($shape[1])) {
            $shape[1] = 0;
        }
        return new PHPSci(
            (new ZerosInitializer($shape[0], $shape[1]))->run()
        );
    }
}
