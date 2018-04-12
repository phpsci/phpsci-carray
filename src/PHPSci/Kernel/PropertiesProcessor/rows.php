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

namespace PHPSci\Kernel\PropertiesProcessor;

use PHPSci\PHPSci;

/**
 * MAGIC PROPERTY: rows
 *
 * @package PHPSci\PropertiesProcessor
 */
class rows extends PropertiesProcessor
{
    /**
     * Magic $row property
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param  PHPSci $obj
     * @return int
     */
    public static function run(PHPSci $obj)
    {
        return $obj->ptr()->getRows();
    }
}
