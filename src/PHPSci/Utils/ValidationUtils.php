<?php
namespace PHPSci\Utils;

/**
 * Class ValidationUtils
 * @package PHPSci\Utils
 */
class ValidationUtils
{
    public static function check_random_state()
    {

    }

    /**
     * Input validation for standard estimators.
     * @param \CArray $X
     * @param \CArray $y
     * @param bool $accept_sparse
     * @param bool $copy
     * @param bool $force_all_finite
     * @param bool $ensure_2d
     * @param bool $allow_nd
     * @param bool $multi_output
     * @param int $ensure_min_samples
     * @param int $ensure_min_features
     * @param bool $y_numeric
     * @param bool $warn_on_dtype
     * @param null $estimator
     * @return array
     */
    public static function check_X_y(\CArray $X, \CArray $y, bool $accept_sparse=false, bool $copy=False,
                                     bool $force_all_finite=True, bool $ensure_2d=True, bool $allow_nd=False,
                                     bool $multi_output=False, int $ensure_min_samples=1, int $ensure_min_features=1,
                                     bool $y_numeric=False, $estimator=null)
    {
        return [$X, $y];
    }
}