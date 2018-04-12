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

namespace PHPSci\Kernel\Initializers;

use PHPSci\PHPSci;

/**
 * Trait Creatable
 *
 * @author  Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\Initializers
 */
trait Creatable
{
    /**
     * Return the identity array.
     *
     * Square array with ones on the main diagonal.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param  int $n Number of rows
     * @return PHPSci
     */
    public static function identity(int $n) : PHPSci
    {
        return new PHPSci(
            (new IdentityInitializer($n))->run()
        );
    }

    /**
     * Return CArray full of zeros
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param  array $shape
     * @return PHPSci
     */
    public static function zeros(array $shape) : PHPSci
    {
        if (!isset($shape[1])) {
            $shape[1] = 0;
        }
        return new PHPSci(
            (new ZerosInitializer($shape[0], $shape[1]))->run()
        );
    }
}
