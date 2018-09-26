<?php
namespace PHPSci\NaiveBayes;
use PHPSci\CArray;

/**
 * Class BaseNaiveBayes
 * @package PHPSci\NaiveBayes
 */
abstract class BaseNaiveBayes
{
    protected $classes_;

    protected $theta_;

    protected $sigma_;

    protected $class_count_;

    protected $class_prior_;

    public $priors;

    /**
     * Perform classification on an array of test vectors X.
     * @param \CArray $X
     * @return void
     */
    public function predict(\CArray $X)
    {
        $predicted_classes = [];
        $jll = $this->_joint_log_likelihood($X);
        $predictions = CArray::toArray(CArray::argmax($jll, 1));
        foreach($predictions as $pred) {
            $predicted_classes[] = $this->classes_[[(int)$pred]];
        }
        return $predicted_classes;
    }
}