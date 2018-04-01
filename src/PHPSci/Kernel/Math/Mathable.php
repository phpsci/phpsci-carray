<?php
namespace PHPSci\Kernel\Math;
use PHPSci\Kernel\CArray\CArrayWrapper;
use PHPSci\Kernel\Orchestrator\MemoryPointer;
use PHPSci\PHPSci;

/**
 * Trait Mathable
 *
 * Allow basic math operations with CArrays
 *
 * @package PHPSci\Kernel\Math
 */
trait Mathable
{

    use Arithmetic;

    /**
     * Sum of array elements over a given axis.
     *
     * If axis = NULL, will sum all elements of the input CArray
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param CArrayWrapper $a
     * @param int|null $axis
     * @return PHPSci
     */
    public static function sum(CArrayWrapper $a, int $axis = null) : PHPSci
    {
        if(!isset($axis))
            $out = \CArray::sum($a->ptr()->getUUID(), $a->ptr()->getRows(), $a->ptr()->getCols());
        if(isset($axis)) {
            $out = \CArray::sum($a->ptr()->getUUID(), $a->ptr()->getRows(), $a->ptr()->getCols(), $axis);
        }
        return new PHPSci(
            new MemoryPointer(
                $out,
                $out->x,
                $out->y
            )
        );
    }
}