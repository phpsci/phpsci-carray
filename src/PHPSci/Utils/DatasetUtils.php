<?php
namespace PHPSci\Utils;

use PHPSci\Utils\Datasets\ArrayDataset;

/**
 * Class DatasetUtils
 * @package PHPSci\Utils
 */
class DatasetUtils
{
    /**
     * Create ``Dataset`` abstraction for sparse and dense inputs.
     *
     * This also returns the ``intercept_decay`` which is different
     * for sparse datasets.
     * @param \CArray $X
     * @param \CArray $y
     * @param $sample_weight
     * @param null $random_state
     * @return array
     */
    public static function make_dataset(\CArray $X, \CArray $y, $sample_weight, $random_state=null) : array
    {
        $seed = rand(0, 10);
        $dataset = new ArrayDataset($X, $y, $sample_weight, $seed);
        $intercept_decay = 1.0;
        return [$dataset, $intercept_decay];
    }
}