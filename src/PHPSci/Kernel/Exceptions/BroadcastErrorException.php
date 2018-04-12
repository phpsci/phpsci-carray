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
namespace PHPSci\Kernel\Exceptions;

use Throwable;

/**
 * Class BroadcastError
 *
 * @category Kernel_Exceptions
 * @package  PHPSci\Kernel\Exceptions
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  Apache 2.0
 * @link     https://www.github.com/phpsci/phpsci
 */
class BroadcastErrorException extends \Exception
{
    /**
     * Exception Code
     *
     * @var int
     */
    protected $code = 1590;

    /**
     * BroadcastError constructor.
     *
     * @param array          $shape_a  Shape of Matrix A
     * @param array          $shape_b  Shape of Matrix B
     * @param Throwable|null $previous Previous Throwable
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return void
     */
    public function __construct(
        array $shape_a,
        array $shape_b,
        Throwable $previous = null
    ) {
        $message = "Could not broadcast operands with shapes 
        ($shape_b[0],$shape_b[1]) ($shape_a[0],$shape_a[1])";

        parent::__construct($message, $this->code, $previous);
    }
}
