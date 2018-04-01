<?php
/**
 * PHP Version 7
 * Class Product
 *
 * @category Linear_Algebra_Operations
 * @package  PHPSci\Kernel\LinearAlgebra
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
namespace PHPSci\Kernel\LinearAlgebra;

use PHPSci\Kernel\Orchestrator\MemoryPointer;

/**
 * Class Product
 *
 * @category Linear_Algebra_Operations
 * @package  PHPSci\Kernel\LinearAlgebra
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class ProductOperations extends BaseLinalg
{
    /**
     * Matrix product of two arrays.
     *
     * Operates like Numpy:
     *
     * If both CArrays are 2-D they are multiplied like conventional matrices.
     *
     * If either argument is N-D, N > 2, it is treated as a stack of matrices
     * residing in the last two indexe and broadcast accordingly.
     *
     * If the first argument is 1-D, it is promoted to a matrix by prepending
     * a 1 to its dimensions. After matrix multiplication the prepended 1 is removed.
     *
     * If the second argument is 1-D, it is promoted to a matrix by appending a 1 to
     * its dimensions. After matrix multiplication the appended 1 is removed.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return MemoryPointer
     */
    public function matmul() : MemoryPointer
    {
        $rtn = \CArray::matmul(
            $this->params[0]->ptr()->getUUID(),
            $this->params[0]->ptr()->getRows(),
            $this->params[0]->ptr()->getCols(),
            $this->params[1]->ptr()->getUUID(),
            $this->params[1]->ptr()->getCols()
        );
        if ($this->params[0]->ptr()->getCols() == 0
            and $this->params[1]->ptr()->getCols() > 0
        ) {
            return new MemoryPointer(
                $rtn,
                $this->params[1]->ptr()->getRows(),
                $this->params[0]->ptr()->getCols()
            );
        }
        if ($this->params[0]->ptr()->getCols() > 0) {
            return new MemoryPointer(
                $rtn,
                $this->params[0]->ptr()->getRows(),
                $this->params[1]->ptr()->getCols()
            );
        }
        if ($this->params[0]->ptr()->getCols() == 0
            and $this->params[1]->ptr()->getCols() == 0
        ) {
            return new MemoryPointer(
                $rtn,
                0,
                0
            );
        }
    }
}
