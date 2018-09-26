<?php
namespace PHPSci\Utils;

use PHPSci\CArray;
use PHPSci\Exceptions\ValueErrorException;
use PHPSci\Preprocessing\LabelEncoder;

/**
 * Class WeightUtils
 * @package PHPSci\Utils
 */
class WeightUtils
{
    /**
     * Estimate class weights for unbalanced datasets.
     *
     * @see https://github.com/scikit-learn/scikit-learn/blob/a7e17117bb15eb3f51ebccc1bd53e42fcb4e6cd8/sklearn/utils/class_weight.py#L9
     * @param \CArray $class_weight
     * @param \CArray $classes
     * @param \CArray $y
     * @return \CArray|void
     * @throws ValueErrorException
     */
    public static function compute_class_weight(\CArray $class_weight = null, \CArray $classes, \CArray $y) : \CArray
    {
        if(CArray::unique($y)->x - CArray::unique($classes)->x) {
            throw new ValueErrorException("classes should include all valid labels that can be in y");
        }

        if(!isset($class_weight) || $class_weight->x == 0) {
            # uniform class weights
            $weight = CArray::ones($classes->x, 0);
        }
        return $weight;
    }
}