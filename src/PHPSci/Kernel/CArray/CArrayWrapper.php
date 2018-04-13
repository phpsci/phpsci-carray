<?php
/*
 * Copyright 2018 Henrique Borba and contributors
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace PHPSci\Kernel\CArray;

use PHPSci\Kernel\Initializers\Creatable;
use PHPSci\Kernel\LinearAlgebra\Operatable;
use PHPSci\Kernel\Math\Mathable;
use PHPSci\Kernel\Orchestrator\MemoryPointer;
use PHPSci\Kernel\PropertiesProcessor\Inflatable;
use PHPSci\Kernel\Ranges\Rangeable;
use PHPSci\Kernel\Transform\Transformable;

/**
 * Class CArrayWrapper
 *
 * @author  Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\CArray
 */
abstract class CArrayWrapper implements Stackable, \ArrayAccess, \Countable
{
    use Transformable, Creatable, Operatable, Rangeable, Printable, Inflatable, Mathable;

    /**
     * @var
     */
    protected $internal_pointer;

    /**
     * @return int|void
     */
    public function count()
    {
        // TODO: Implement count() method.
    }

    /**
     * Whether a offset exists
     *
     * @link   http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param  mixed $offset <p>
     *                       An offset to check for.
     *                       </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since  5.0.0
     */
    public function offsetExists($offset)
    {
    }

    /**
     * Offset to retrieve
     *
     * @link   http://php.net/manual/en/arrayaccess.offsetget.php
     * @param  mixed $offset <p>
     *                       The offset to retrieve.
     *                       </p>
     * @return mixed Can return all value types.
     * @since  5.0.0
     */
    public function offsetGet($offset)
    {
        return $offset;
    }

    /**
     * Offset to set
     *
     * @link   http://php.net/manual/en/arrayaccess.offsetset.php
     * @param  mixed $offset <p>
     *                       The offset to assign the value to.
     *                       </p>
     * @param  mixed $value  <p>
     *                       The
     *                       value
     *                       to
     *                       set.
     *                       </p>
     * @return void
     * @since  5.0.0
     */
    public function offsetSet($offset, $value)
    {
    }

    /**
     * Offset to unset
     *
     * @link   http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param  mixed $offset <p>
     *                       The offset to unset.
     *                       </p>
     * @return void
     * @since  5.0.0
     */
    public function offsetUnset($offset)
    {
    }

    /**
     * @param MemoryPointer $ptr
     */
    public function fromMemoryPointer(MemoryPointer $ptr)
    {
        $this->internal_pointer = $ptr;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
    }

    /**
     * Destroy CArray from stack
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function destroy()
    {
        \CArray::destroy($this->ptr()->getInternalCArray());
    }

    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }

    /**
     * Get current Pointer Object
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return MemoryPointer
     */
    public function ptr(): MemoryPointer
    {
        return $this->internal_pointer;
    }
}
