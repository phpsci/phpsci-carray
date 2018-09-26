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

namespace PHPSci;

use PHPSci\Exceptions\InvalidCArrayInputException;
use PHPSci\Kernel\CArray\CInterface;
use PHPSci\Kernel\CArray\Wrapper;
use PHPSci\CArray;

/**
 * Main PHPSci Object
 *
 * @author  Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci
 */
class PHPSci
{
    /**
     * @param $input
     * @return \CArray
     * @throws InvalidCArrayInputException
     */
    public static function carray($input)
    {
        if(is_array($input)) {
            return \PHPSci\CArray::fromArray($input);
        }
        if(is_double($input) || is_float($input)) {
            return \PHPSci\CArray::fromDouble($input);
        }
        throw new InvalidCArrayInputException();
    }
}
