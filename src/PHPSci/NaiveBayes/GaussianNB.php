<?php
namespace PHPSci\NaiveBayes;

use Nette\Caching\Cache;
use PHPSci\CArray;
use PHPSci\Exceptions\ValueErrorException;
use PHPSci\Interfaces\Classifier;
use PHPSci\Utils\MulticlassUtils;
use PHPSci\Utils\ValidationUtils;

/**
 * Class GaussianNB
 * @package PHPSci\NaiveBayes
 */
class GaussianNB extends BaseNaiveBayes implements Classifier
{
    /**
     * GaussianNB constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param null $classes
     * @return mixed
     */
    public function classes_($classes = null)
    {
        if(isset($classes)) {
            if(is_array($classes)) {
                $this->classes_ = CArray::fromArray($classes);
            }
            if(!is_array($classes) && is_a($classes, '\CArray')) {
                $this->classes_ = $classes;
            }
        }
        return $this->classes_;
    }

    /**
     * @param $n_past
     * @param $mu
     * @param $var
     * @param $X
     * @param null $sample_weight
     * @return array
     */
    public static function _update_mean_variance($n_past, $mu, $var, \CArray $X, $sample_weight=null)
    {
        if ($X->x == 0) {
            return [$mu, $var];
        }

        # Compute (potentially weighted) mean and variance of new datapoints
        if (isset($sample_weight)) {

        }
        if (!isset($sample_weight)) {
            $n_new = $X->x;
            $new_var = CArray::var($X);
            $new_mu = CArray::mean($X, 0);
        }

        if ($n_past == 0)
            return [$new_mu, $new_var];

        $n_total = (float)$n_past + $n_new;

        # Combine mean of old and new data, taking into consideration
        # (weighted) number of observations
        $total_mu = ($n_new * $new_mu + $n_past * $mu) / $n_total;

        # Combine variance of old and new data, taking into consideration
        # (weighted) number of observations. This is achieved by combining
        # the sum-of-squared-differences (ssd)
        $old_ssd = $n_past * $var;
        $new_ssd = $n_new * $new_var;
        $total_ssd = ($old_ssd + $new_ssd +
            ($n_past / (float)($n_new * $n_total)) *
            ($n_new * $mu - $n_new * $new_mu) ** 2);

        $total_var = $total_ssd / $n_total;

        return [$total_mu, $total_var];
    }

    /**
     * @param \CArray $X
     * @param \CArray $y
     * @param \CArray|null $classes
     * @param bool $_refit
     * @param \CArray|null $sample_weight
     * @throws \PHPSci\Exceptions\ValueErrorException
     */
    private function _partial_fit(\CArray $X, \CArray $y, \CArray $classes= null, $_refit= False, \CArray $sample_weight=null)
    {
        list($X, $y) = ValidationUtils::check_X_y($X, $y);

        $epsilon = 1e-9 * CArray::amax(CArray::var($X));

        if ($_refit) {
            $this->classes_ = null;
        }

        if(MulticlassUtils::_check_partial_fit_first_call($this, $classes)) {
            $n_features = $X->y;
            $n_classes = CArray::unique($y)->x;

            for($i = 0; $i < $n_classes; $i++) {
                $this->theta_[$i] = CArray::zeros([$n_features]);
                $this->sigma_[$i] = CArray::zeros([$n_features]);
            }

            $this->class_count_ = CArray::zeros([$n_classes]);

            # Initialise the class prior
            # Take into account the priors
            if (isset($this->priors)) {
                $priors = $this->priors;
                # Check that the provide prior match the number of classes
                if($this->priors->x != $n_classes) {
                    throw new ValueErrorException('Number of priors must match number of classes.');
                }
                # Check that the sum is 1
                if (CArray::sum($this->priors) == 1) {
                    throw new ValueErrorException('The sum of the priors should be 1.');
                }
                # Check that the prior are non-negative
                //@todo implement
            }
            if (!isset($this->priors)) {
                $this->class_prior_ = CArray::zeros([$this->classes_->x, 0]);
            }

        } else {
            if ($X->y != $this->theta_->y) {
                throw new ValueErrorException("Number of features $X->y does not match previous data ".$this->theta_->y.".");
            }
            # Put epsilon back in each time
            $this->sigma_ = CArray::subtract($this->sigma_, $this->epsilon_);
        }

        $classes = $this->classes_;
        $unique_y = CArray::unique($y);
        $unique_y_in_classes = CArray::in1d($unique_y, $classes);

        if(!CArray::all($unique_y_in_classes)) {
            throw new ValueErrorException("The target label(s) in y do not exist in the initial classes");
        }
        for($i = 0; $i < $unique_y->x; $i++) {
            $indices = CArray::search_keys($y, $classes[[$i]]);
            $X_i = $X[$indices];

            if (isset($sample_weight)) {
                $sw_i = $sample_weight[$indices];
                $N_i = CArray::sum($sw_i );
            }

            if (!isset($sample_weight)) {
                $sw_i = null;
                $N_i = $X_i->x;
            }

            list($new_theta, $new_sigma) = self::_update_mean_variance(
                $this->class_count_[$i],
                $this->theta_[$i],
                $this->sigma_[$i],
                $X_i,
                $sw_i
            );

            // @todo There is no necessity to convert back to PHP Array
            $this->theta_[$i] = $new_theta;
            $this->sigma_[$i] = $new_sigma;
            $this->class_count_[[$i]] += $N_i;

            $this->sigma_[$i] = CArray::add($this->sigma_[$i], CArray::fromDouble($epsilon));
        }
        # Update if only no priors is provided
        if ($this->priors == null) {
            $this->class_prior_ = CArray::divide($this->class_count_ ,CArray::sum($this->class_count_));
        }
    }

    /**
     * Fit Gaussian Naive Bayes according to X, y
     *
     * @param \CArray $X
     * @param \CArray $y
     * @param \CArray|null $sample_weight
     * @return void
     * @throws \PHPSci\Exceptions\ValueErrorException
     */
    public function fit(\CArray $X, \CArray $y, \CArray $sample_weight = null)
    {
        list($X, $y) = ValidationUtils::check_X_y($X, $y);
        return $this->_partial_fit($X, $y, CArray::unique($y), true, $sample_weight);
    }

    /**
     * @param $X
     * @return array
     */
    protected function _joint_log_likelihood($X)
    {
        //check_is_fitted(self, "classes_")

        //X = check_array(X)
        $joint_log_likelihood = [];
        for($i = 0; $i < $this->classes_->x; $i++) {
            $jointi = log($this->class_prior_[[$i]]);
            $n_ij = -0.5 * CArray::toDouble(CArray::sum(CArray::log(CArray::multiply(CArray::multiply($this->sigma_[$i], CArray::fromDouble(pi())), CArray::fromDouble(2)))));
            $n_ij = CArray::subtract(CArray::fromDouble($n_ij), CArray::multiply(CArray::sum(CArray::divide(CArray::square(CArray::subtract($X, $this->theta_[$i])), $this->sigma_[$i]), 1), CArray::fromDouble(0.5)));
            $joint_log_likelihood[] = CArray::toArray(CArray::add($n_ij, CArray::fromDouble($jointi)));
        }
        $joint_log_likelihood = CArray::transpose(CArray::fromArray($joint_log_likelihood));
        return $joint_log_likelihood;
    }
}