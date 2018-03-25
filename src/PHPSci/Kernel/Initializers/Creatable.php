<?php
namespace PHPSci\Kernel\Initializers;


use PHPSci\PHPSci;

trait Creatable
{

    /**
     * Return the identity array.
     *
     * Square array with ones on the main diagonal.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param int $n Number of rows
     * @return PHPSci
     */
    public static function identity(int $n) : PHPSci{
        return new PHPSci((new IdentityInitializer($n))->run());
    }

    /**
     *
     *
     *
     *
     */
    public static function zeros(array $shape) : PHPSci {
        return new PHPSci((new ZerosInitializer($shape[0],$shape[1]))->run());
    }



}