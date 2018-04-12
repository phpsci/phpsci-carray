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

namespace PHPSci\Kernel\Transform;

use PHPSci\Kernel\CArray\CArrayWrapper;
use PHPSci\Kernel\Orchestrator\MemoryPointer;
use PHPSci\PHPSci;

/**
 * Trait Transformable
 *
 * @author  Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\Transform
 */
trait Transformable
{
    /**
     * Load CArray from Array
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public static function fromArray(array $arr): PHPSci
    {
        $ptr = \CArray::fromArray($arr);

        return new PHPSci(new MemoryPointer($ptr, $ptr->x, $ptr->y));
    }

    /**
     * Return PHP Array mirror of CArray
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function toArray()
    {
        return \CArray::toArray($this->ptr()->getPointer(), $this->ptr()->getRows(), $this->ptr()->getCols());
    }

    /**
     * Return Double of CArray 0D
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function toDouble()
    {
        return \CArray::toDouble($this->ptr()->getPointer());
    }

    /**
     * Convert PHP double to CArray 0D
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param  float $input
     * @return CArrayWrapper
     */
    public static function fromDouble(float $input): CArrayWrapper
    {
        $ptr = \CArray::fromDouble($input);

        return new PHPSci((new MemoryPointer($ptr, $ptr->x, $ptr->y)));
    }

    /**
     * Convert the input CArray to an array.
     *
     * Created for NumPy compatibility.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param  PHPSci $obj
     * @return array
     */
    public static function asarray(PHPSci $obj): array
    {
        return $obj->toArray();
    }

    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public static function transpose(CArrayWrapper $arr): CArrayWrapper
    {
        $rtn_carray = \CArray::transpose(
            $arr->ptr()->getUUID(),
            $arr->ptr()->getRows(),
            $arr->ptr()->getCols()
        );

        return new PHPSci(
            new MemoryPointer(
                $rtn_carray,
                $rtn_carray->x,
                $rtn_carray->y
            )
        );
    }
}
