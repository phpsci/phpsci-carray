<?php
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
     * @return \CArray
     */
    public static function add();

    /**
     * @return \CArray
     */
    public static function subtract();

    /**
     * @return \CArray
     */
    public static function sum();

    /**
     * @return \CArray
     */
    public static function exp();

    /**
     * @return \CArray
     */
    public static function log();

    /**
     * @return \CArray
     */
    public static function log10();

    /**
     * @return \CArray
     */
    public static function log2();

    /**
     * @return \CArray
     */
    public static function log1p();

    /**
     * @return \CArray
     */
    public static function tan();

    /**
     * @return \CArray
     */
    public static function sin();

    /**
     * @return \CArray
     */
    public static function cos();

    /**
     * @return \CArray
     */
    public static function arctan();

    /**
     * @return \CArray
     */
    public static function arcsin();

    /**
     * @return \CArray
     */
    public static function arccos();

    /**
     * @return \CArray
     */
    public static function sinh();

    /**
     * @return \CArray
     */
    public static function cosh();

    /**
     * @return \CArray
     */
    public static function tanh();

    /**
     * @return \CArray
     */
    public static function transpose();

    /**
     * @return \CArray
     */
    public function flatten();

    /**
     * @return \CArray
     */
    public static function atleast_1d();

    /**
     * @return \CArray
     */
    public static function atleast_2d();

    /**
     * @return \CArray
     */
    public static function eye();

    /**
     * @return \CArray
     */
    public static function identity();

    /**
     * @return \CArray
     */
    public static function ones();

    /**
     * @return \CArray
     */
    public static function ones_like();

    /**
     * @return \CArray
     */
    public static function zeros();

    /**
     * @return \CArray
     */
    public static function zeros_like();

    /**
     * @return \CArray
     */
    public static function full();

    /**
     * @return \CArray
     */
    public static function full_like();

    /**
     * @return \CArray
     */
    public static function fromArray();

    /**
     * @return \CArray
     */
    public static function arange();

    /**
     * @return \CArray
     */
    public static function linspace();

    /**
     * @return \CArray
     */
    public static function logspace();

    /**
     * @return \CArray
     */
    public static function standard_normal();

    /**
     * @return \CArray
     */
    public static function matmul();

    /**
     * @return \CArray
     */
    public static function inner();

    /**
     * @return \CArray
     */
    public static function svd();

    /**
     * @return \CArray
     */
    public static function eig();

    /**
     * @return \CArray
     */
    public static function eigvals();

    /**
     * @return \CArray
     */
    public static function solve();

    /**
     * @return \CArray
     */
    public static function inv();

    /**
     * @return \CArray
     */
    public static function norm();

    /**
     * @return \CArray
     */
    public static function cond();

    /**
     * @return \CArray
     */
    public static function det();
}