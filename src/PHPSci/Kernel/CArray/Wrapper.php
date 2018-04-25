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
 * Class Wrapper
 *
 * @author  Henrique Borba <henrique.borba.dev@gmail.com>
 * @package PHPSci\Kernel\CArray
 */
trait Wrapper
{
    /**
     * Add arguments element-wise.
     *
     * @param \CArray $a Target CArray a
     * @param \CArray $b Target CArray b
     *
     * @return \CArray The sum of $a and $b, element-wise.
     */
    public static function add(\CArray $a, \CArray $b): \CArray
    {
        return parent::add($a, $b);
    }

    /**
     * Subtract two CArrays, element-wise.
     *
     * @param \CArray $a Target CArray $a
     * @param \CArray $b Target CArray $b
     *
     * @return \CArray The difference of $a and $b, element-wise.
     */
    public static function subtract(\CArray $a, \CArray $b): \CArray
    {
        return parent::subtract($a, $b);
    }

    /**
     * Sum of target CArray elements over a given axis.
     *
     * @param \CArray $a Target CArray
     * @param int $axis  (Optional) Axis or axes along which a sum is performed.
     *                   Defaults to null.
     *
     * @return \CArray   An CArray with the same shape as $a, with the specified axis removed.
     */
    public static function sum(\CArray $a, int $axis = null): \CArray
    {
        if (!isset($axis)) {
            return parent::sum($a);
        }

        return parent::sum($a, $axis);
    }

    /**
     * Calculate the exponential of all elements in the input CArray.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Output CArray
     */
    public static function exp(\CArray $a): \CArray
    {
        return parent::exp($a);
    }

    /**
     * Natural logarithm of target CArray, element-wise.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Output CArray
     */
    public static function log(\CArray $a): \CArray
    {
        return parent::log($a);
    }

    /**
     * Base-10 logarithm of target CArray.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Output CArray
     */
    public static function log10(\CArray $a): \CArray
    {
        return parent::log10($a);
    }

    /**
     * Base-2 logarithm of target CArray.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Output CArray
     */
    public static function log2(\CArray $a): \CArray
    {
        return parent::log2($a);
    }

    /**
     * Natural logarithm of one plus the input CArray, element-wise.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Output CArray
     */
    public static function log1p(\CArray $a): \CArray
    {
        return parent::log1p($a);
    }

    /**
     * Tangent element-wise.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Output CArray
     */
    public static function tan(\CArray $a): \CArray
    {
        return parent::tan($a);
    }

    /**
     * Sine element-wise.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Output CArray
     */
    public static function sin(\CArray $a): \CArray
    {
        return parent::sin($a);
    }

    /**
     * Cosine element-wise.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Output CArray
     */
    public static function cos(\CArray $a): \CArray
    {
        return parent::cos($a);
    }

    /**
     * Trigonometric inverse tangent, element-wise.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Output CArray
     */
    public static function arctan(\CArray $a): \CArray
    {
        return parent::arctan($a);
    }

    /**
     * Inverse sine, element-wise.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Output CArray
     */
    public static function arcsin(\CArray $a): \CArray
    {
        return parent::arcsin($a);
    }

    /**
     * Trigonometric inverse cosine, element-wise.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Output CArray
     */
    public static function arccos(\CArray $a): \CArray
    {
        return parent::arccos($a);
    }

    /**
     * Hyperbolic sine, element-wise.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Output CArray
     */
    public static function sinh(\CArray $a): \CArray
    {
        return parent::sinh($a);
    }

    /**
     * Hyperbolic cosine, element-wise.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Output CArray
     */
    public static function cosh(\CArray $a): \CArray
    {
        return parent::cosh($a);
    }

    /**
     * Compute hyperbolic tangent element-wise.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Output CArray
     */
    public static function tanh(\CArray $a): \CArray
    {
        return parent::tanh($a);
    }

    /**
     * Permute the dimensions of an CArray.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Transposed $a CArray
     */
    public static function transpose(\CArray $a): \CArray
    {
        return parent::transpose($a);
    }

    /**
     * Return target CArray with at least one dimension.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray $a with at least one dimensions.
     */
    public static function atleast_1d(\CArray $a): \CArray
    {
        return parent::atleast_1d($a);
    }

    /**
     * Return target CArray with at least two dimensions.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray $a with at least two dimensions.
     */
    public static function atleast_2d(\CArray $a): \CArray
    {
        return parent::atleast_2d($a);
    }

    /**
     * Return CArray filled with zeros and ones in the
     * diagonal provided diagonal index.
     *
     * @param int $x Number of rows (2-D) or width (1-D)
     * @param int $y Number of cols (2-D) or 0 (1-D)
     * @param int $k (Optional) Diagonal Index. Defaults to 0.
     *
     * @return \CArray
     */
    public static function eye(int $x, int $y, int $k = 0): \CArray
    {
        return parent::eye($x, $y, $k);
    }

    /**
     * Return the identity CArray (CArray filled with zeros and
     * ones in the diagonal)
     *
     * @param int $n   Size of Identity Matrix
     *
     * @return \CArray Identity Matrix with shape ($n, $n)
     */
    public static function identity(int $n): \CArray
    {
        return parent::identity($n);
    }

    /**
     * Return new CArray with same shape as target CArray filled
     * with zeros.
     *
     * @param int $x Number of rows (2-D) or width (1-D)
     * @param int $y Number of cols (2-D) or 0 (1-D)
     *
     * @return \CArray   CArray with shape ($x, $y) filled with ones.
     */
    public static function ones(int $x, int $y): \CArray
    {
        return parent::ones($x, $y);
    }

    /**
     * Return new CArray with same shape as target CArray filled
     * with ones.
     *
     * @param \CArray $a Target CArray to copy shape
     *
     * @return \CArray   CArray with shape ($a->x, $a->y) filled with ones.
     */
    public static function ones_like(\CArray $a): \CArray
    {
        return parent::ones_like($a);
    }

    /**
     * Return new CArray filled with zeros.
     *
     * @param array $shape Shape of new array
     *
     * @return \CArray New CArray with shape ($shape[0],...) filled with zeros
     */
    public static function zeros(array $shape): \CArray
    {
        return parent::zeros($shape);
    }

    /**
     * Return new CArray with same shape as target CArray filled
     * with zeros.
     *
     * @param \CArray $a Target CArray to copy shape
     *
     * @return \CArray   CArray with shape ($a->x, $a->y) filled with zero.
     */
    public static function zeros_like(\CArray $a): \CArray
    {
        return parent::zeros_like($a);
    }

    /**
     * Return new CArray filled with user provided number.
     *
     * @param double $num Number to fill the new CArray
     * @param int $x      Number of rows (2-D) or width (1-D)
     * @param int $y      Number of cols (2-D) or 0 (1-D)
     *
     * @return \CArray New CArray with shape ($x, $y) filled with $num
     */
    public static function full($num, int $x, int $y): \CArray
    {
        return parent::full($num, $x, $y);
    }

    /**
     * Return new CArray with same shape as target CArray filled
     * with provided number.
     *
     * @param \CArray $a Target CArray to copy shape
     * @param $num       Target number to fill new CArray.
     *
     * @return \CArray   CArray with shape ($a->x, $a->y) filled with $num
     */
    public static function full_like(\CArray $a, $num): \CArray
    {
        return parent::full_like($a, $num);
    }

    /**
     * Convert PHP Array to CArray
     * It must be 1-D or 2-D, multidimensional matrices are not
     * supported yet.
     *
     * @param array $a Target PHP array to convert.
     *
     * @return \CArray CArray with same shape and values of $a
     */
    public static function fromArray(array $a): \CArray
    {
        return parent::fromArray($a);
    }

    /**
     * Convert CArray to PHP Array
     *
     * @param \CArray $a Target CArray to convert to PHP Array
     *
     * @return array PHP Array with same values of $a.
     */
    public static function toArray(\CArray $a): array
    {
        return parent::toArray($a);
    }

    /**
     * CArray with evenly spaced values within a given interval.
     *
     * @param $stop   End of interval
     * @param $start (Optional) Start of interval. Default is 0.
     * @param $step  (Optional) Spacing between values. Default is 1.
     *
     * @return \CArray CArray with evenly spaced values.
     */
    public static function arange($stop, $start, $step): \CArray
    {
        return parent::arange($stop, $start, $step);
    }

    /**
     * CArray with evenly spaced numbers over a specified interval.
     *
     * @param $start    The starting value of the sequence.
     * @param $stop     The end value of the sequence
     * @param int $num  Number of samples to generate. Default is 50.
     *
     * @return \CArray
     */
    public static function linspace($start, $stop, int $num): \CArray
    {
        return parent::linspace($start, $stop, $num);
    }

    /**
     * CArray with numbers spaced evenly on a log scale.
     *
     * @param $start    The starting value of the sequence.
     * @param $stop     The final value of the sequence
     * @param int $num  (optional) Number of samples to generate. Default is 50.
     * @param $base     (optional) The base of the log space.
     *
     * @return \CArray  $num samples, equally spaced on a log scale.
     */
    public static function logspace($start, $stop, int $num, $base): \CArray
    {
        return parent::logspace($start, $stop, $num, $base);
    }

    /**
     * CArray vector filled with samples from a standard Normal distribution
     *
     * @param int $x Width of output CArray vector.
     *
     * @return \CArray CArray vector filled with random samples from a
     *         standard normal distribution with shape ($x,)
     */
    public static function standard_normal(int $x): \CArray
    {
        return parent::standard_normal($x);
    }

    /**
     * Matrix product of two CArrays.
     *
     * - If both arguments are 2-D they are multiplied like conventional matrices.
     * - If the first argument is 1-D, it is promoted to a matrix by prepending a
     *   1 to its dimensions. After matrix multiplication the prepended 1 is removed.
     * - If the second argument is 1-D, it is promoted to a matrix by appending a
     *   1 to its dimensions. After matrix multiplication the appended 1 is removed.
     *
     * Multiplication by a scalar is not allowed.
     *
     * @param \CArray $a Target $a CArray
     * @param \CArray $b Target $b CArray
     *
     * @return \CArray Dot product of $a and $b. If both are 1D, them a 0 dimensional (scalar) CArray will
     * be returned
     */
    public static function matmul(\CArray $a, \CArray $b): \CArray
    {
        return parent::matmul($a, $b);
    }

    /**
     * Inner product of two CArrays.
     *
     * If 1D - Ordinary inner product of vectors
     * If 2D - Sum product over the last axes.
     *
     * @param \CArray $a Target $a CArray - Last Dimension must match $b
     * @param \CArray $b Target $b CArray - Last Dimension must match $a
     *
     * @return \CArray Inner product of $a and $b
     */
    public static function inner(\CArray $a, \CArray $b): \CArray
    {
        return parent::inner($a, $b);
    }

    /**
     * Singular Value Decomposition of target CArray
     *
     * CArray must have two dimensions
     *
     * @param \CArray $a Target CArray
     *
     * @return array [0] Unitary array [1] Vector(s) with the singular values [2] Unitary array
     */
    public static function svd(\CArray $a): array
    {
        return parent::svd($a);
    }

    /**
     * Compute the eigenvalues and right eigenvectors of a square CArray.
     *
     * @param \CArray $a CArrays for which the eigenvalues and right eigenvectors will be computed
     *
     * @return array [0] The eignvalues of CArray $a [1] The right eignvectors of CArray $a
     */
    public static function eig(\CArray $a): array
    {
        return parent::eig($a);
    }

    /**
     * Compute the eigenvalues of target CArray
     *
     * CArray must have two dimensions.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Computed eigenvalues
     */
    public static function eigvals(\CArray $a): \CArray
    {
        return parent::eigvals($a);
    }

    /**
     * Solve a linear matrix equation
     *
     * @param \CArray $a Coefficient CArray
     * @param \CArray $b Ordinate CArray
     *
     * @return \CArray Solution of the system $a x = $b. Returned shape is same as $b.
     */
    public static function solve(\CArray $a, \CArray $b): \CArray
    {
        return parent::solve($a, $b);
    }

    /**
     * Matrix Invert
     *
     * CArray must have two dimensions.
     *
     * @param \CArray $a Target CArray
     *
     * @return \CArray Inverse of matrix $a
     */
    public static function inv(\CArray $a): \CArray
    {
        return parent::inv($a);
    }

    /**
     * Matrix Norm
     *
     * CArray must have two dimensions.
     *
     * @param \CArray $a    Target CArray to compute norm
     * @param string $order (Optional) Order of the norm, can be 'fro' (default - Frobenius Norm), '1'
     *                      (1-Norm), 'inf' (Infinity Norm) and 'm'  ( max(abs(Aij)) )
     *
     * @return \CArray
     */
    public static function norm(\CArray $a, string $order = 'fro'): \CArray
    {
        return parent::norm($a, $order);
    }

    /**
     * Compute the condition number of target CArray using
     * Frobenius Norm (root-of-sum-of squares norm)
     *
     * CArray must have two dimensions.
     *
     * @param \CArray $a Target CArray to compute determinant
     *
     * @return \CArray The condition number of $a
     */
    public static function cond(\CArray $a): \CArray
    {
        return parent::cond($a);
    }

    /**
     * Compute the determinant of an CArray
     *
     * @param \CArray $a Target CArray to compute determinant
     *
     * @return \CArray Determinant of $a
     */
    public static function det(\CArray $a): \CArray
    {
        return parent::det($a);
    }

    /**
     * Convert target CArray to PHP double (useful for PHP arithmetic
     * operations).
     *
     * @param \CArray $a Target scalar CArray (0D) to convert
     *
     * @return \CArray $a double equivalent
     */
    public static function toDouble(\CArray $a)
    {
        return parent::toDouble($a);
    }
}
