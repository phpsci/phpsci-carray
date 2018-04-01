<?php
namespace PHPSci\Kernel\Math;

use PharIo\Version\Exception;
use PHPSci\Kernel\CArray\CArrayWrapper;
use PHPSci\Kernel\Exceptions\BroadcastErrorException;
use PHPSci\Kernel\Orchestrator\MemoryPointer;
use PHPSci\PHPSci;

/**
 * Trait Mathable
 *
 * Allow arithmetic operations with CArrays
 *
 * @author Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\Math
 */
trait Arithmetic
{
    /**
     * Add arguments element-wise.
     *
     * If both arguments are scalars (0D), a scalar is returned.
     *
     * @author               Henrique Borba <henrique.borba.dev@gmail.com>
     * @param CArrayWrapper $a CArray A
     * @param CArrayWrapper $b CArray B
     * @return CArrayWrapper The sum of A x B element-wise
     * @throws BroadcastErrorException
     */
    public static function add(CArrayWrapper $a, CArrayWrapper $b) : CArrayWrapper
    {
        try {
            $result = \CArray::add(
                $a->ptr()->getUUID(),
                $a->ptr()->getRows(),
                $a->ptr()->getCols(),
                $b->ptr()->getUUID(),
                $b->ptr()->getRows(),
                $b->ptr()->getCols()
            );
        } catch (\Exception $e) {
            throw new BroadcastErrorException([$a->rows, $a->cols],[$b->rows, $b->cols]);
        }
        return new PHPSci(
            new MemoryPointer(
                $result,
                $result->x,
                $result->y
            )
        );
    }

}