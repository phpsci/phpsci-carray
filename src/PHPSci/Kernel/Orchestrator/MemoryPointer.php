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

namespace PHPSci\Kernel\Orchestrator;

/**
 * Class MemoryPointer
 *
 * @author  Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\Orchestrator
 */
class MemoryPointer
{
    /**
     * Unique memory ID
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @var
     */
    protected $uuid;
    protected $x;
    protected $y;
    protected $carray_internal;

    /**
     * MemoryPointer constructor.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param  \CArray $ptr
     * @param  int     $x
     * @param  int     $y
     */
    public function __construct(\CArray $ptr, int $x, int $y)
    {
        $this->carray_internal = $ptr;
        $this->uuid = $ptr->uuid;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Get current memory pointer
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function getPointer()
    {
        return $this->uuid;
    }

    /**
     * Get current internal CArray
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function getInternalCArray()
    {
        return $this->carray_internal;
    }

    /**
     * Get current UUID (alias of getPointer)
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function getUUID()
    {
        return $this->getPointer();
    }

    /**
     * Get number of rows in MemoryPointer
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function getRows() : int
    {
        return $this->x;
    }

    /**
     * Get number of columns in MemoryPointer
     *
     * @return int
     */
    public function getCols() : int
    {
        return $this->y;
    }
}
