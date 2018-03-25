<?php
namespace PHPSci\Kernel\LinearAlgebra;

use PHPSci\Kernel\Orchestrator\MemoryPointer;

/**
 * Class Product
 *
 * @package PHPSci\Kernel\LinearAlgebra
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
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function matmul() : MemoryPointer {
        return new MemoryPointer(
            \CArray::matmul(
                $this->params[0]->ptr()->getUUID(),
                $this->params[0]->ptr()->getRows(),
                $this->params[0]->ptr()->getCols(),
                $this->params[1]->ptr()->getUUID(),
                $this->params[1]->ptr()->getCols()
            ),
            $this->params[0]->ptr()->getRows(),
            $this->params[1]->ptr()->getCols()
        );
    }


}