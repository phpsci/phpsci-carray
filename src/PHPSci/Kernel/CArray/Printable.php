<?php
namespace PHPSci\Kernel\CArray;


/**
 * Trait Printable
 *
 * @author  Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\CArray
 */
trait Printable
{
    /**
     * Print current CArray
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function __toString()
    {
        echo \CArray::print_r($this->ptr()->getPointer(), $this->rows, $this->cols);
        return '';
    }
}