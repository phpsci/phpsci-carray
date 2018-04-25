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

/**
 * Interface CInterface
 *
 * @author  Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\CArray
 */
interface CInterface
{
    /**
     * @param \CArray $a
     * @param \CArray $b
     * @return \CArray
     */
    public static function add(\CArray $a, \CArray $b): \CArray;

    /**
     * @param \CArray $a
     * @param \CArray $b
     * @return \CArray
     */
    public static function subtract(\CArray $a, \CArray $b): \CArray;

    /**
     * @param \CArray $a
     * @param int $axis
     * @return \CArray
     */
    public static function sum(\CArray $a, int $axis): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function exp(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function log(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function log10(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function log2(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function log1p(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function tan(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function sin(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function cos(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function arctan(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function arcsin(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function arccos(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function sinh(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function cosh(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function tanh(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function transpose(\CArray $a): \CArray;

    /**
     * @return \CArray
     */
    public function flatten();

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function atleast_1d(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function atleast_2d(\CArray $a): \CArray;

    /**
     * @param int $x
     * @param int $y
     * @param int $k
     * @return \CArray
     */
    public static function eye(int $x, int $y, int $k): \CArray;

    /**
     * @param int $n
     * @return \CArray
     */
    public static function identity(int $n): \CArray;

    /**
     * @param int $x
     * @param int $y
     * @return \CArray
     */
    public static function ones(int $x, int $y): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function ones_like(\CArray $a): \CArray;

    /**
     * @param array $shape
     * @return \CArray
     */
    public static function zeros(array $shape): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function zeros_like(\CArray $a): \CArray;

    /**
     * @param $num
     * @param int $x
     * @param int $y
     * @return \CArray
     */
    public static function full($num, int $x, int $y): \CArray;

    /**
     * @param \CArray $a
     * @param $num
     * @return \CArray
     */
    public static function full_like(\CArray $a, $num): \CArray;

    /**
     * @param array $a
     * @return \CArray
     */
    public static function fromArray(array $a): \CArray;

    /**
     * @param $stop
     * @param $start
     * @param $step
     * @return \CArray
     */
    public static function arange($stop, $start, $step): \CArray;

    /**
     * @param $start
     * @param $stop
     * @param int $num
     * @return \CArray
     */
    public static function linspace($start, $stop, int $num): \CArray;

    /**
     * @param $start
     * @param $stop
     * @param int $num
     * @param $base
     * @return \CArray
     */
    public static function logspace($start, $stop, int $num, $base): \CArray;

    /**
     * @param int $x
     * @param int $y
     * @return \CArray
     */
    public static function standard_normal(int $x): \CArray;

    /**
     * @param \CArray $a
     * @param \CArray $b
     * @return \CArray
     */
    public static function matmul(\CArray $a, \CArray $b): \CArray;

    /**
     * @param \CArray $a
     * @param \CArray $b
     * @return \CArray
     */
    public static function inner(\CArray $a, \CArray $b): \CArray;

    /**
     * @param \CArray $a
     * @return array
     */
    public static function svd(\CArray $a): array;

    /**
     * @param \CArray $a
     * @return array
     */
    public static function eig(\CArray $a): array;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function eigvals(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @param \CArray $b
     * @return \CArray
     */
    public static function solve(\CArray $a, \CArray $b): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function inv(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @param string $order
     * @return \CArray
     */
    public static function norm(\CArray $a, string $order = 'fro'): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function cond(\CArray $a): \CArray;

    /**
     * @param \CArray $a
     * @return \CArray
     */
    public static function det(\CArray $a): \CArray;

    /**
     * @param object $a
     * @return mixed
     */
    public static function toArray(\CArray $a): array;

    /**
     * @param \CArray $a
     * @return mixed
     */
    public static function toDouble(\CArray $a);
}
