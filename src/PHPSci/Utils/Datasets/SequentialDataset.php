<?php
namespace PHPSci\Utils\Datasets;

/**
 * Class SequentialDataset
 * @package PHPSci\Utils\Datasets
 */
abstract class SequentialDataset extends Dataset
{
    /**
     * @var
     */
    protected $current_index;

    /**
     * @var
     */
    protected $seed;

    /**
     * @var
     */
    protected $X;

    /**
     * @var
     */
    protected $y;

    /**
     * @var
     */
    protected $sample_weights;

    /**
     * @var
     */
    protected $n_samples;

    /**
     * @var
     */
    protected $feature_indices;

    /**
     * @var
     */
    protected $feature_indices_ptr;

    /**
     * @var
     */
    protected $sample_weight_data;

    /**
     * @var \CArray
     */
    protected $index;

    /**
     * @var \CArray
     */
    protected $index_data_ptr;

    /**
     * @param $x_data_ptr
     * @param $x_ind_ptr
     * @param $nnz
     * @param $y
     * @param $sample_weight
     * @param $current_index
     */
    private function _sample($x_data_ptr, $x_ind_ptr, $nnz, $y, $sample_weight, $current_index)
    {

    }

    /**
     * @return int
     */
    private function _get_next_index()
    {
        $current_index = $this->current_index;
        if ($current_index >= ($this->n_samples - 1)) {
            $current_index = -1;
        }
        $current_index += 1;
        $this->current_index = $current_index;
        return $this->current_index;
    }

    /**
     * Get the next example ``x`` from the dataset.
     *
     * This method gets the next sample looping sequentially over all samples.
     * The order can be shuffled with the method ``shuffle``.
     * Shuffling once before iterating over all samples corresponds to a
     * random draw without replacement. It is used for instance in SGD solver.
     *
     * @param \CArray $x_data_ptr A pointer to the double array which holds the feature values of the next example.
     * @param int $x_ind_ptr A pointer to the int array which holds the feature indices of the next example.
     * @param int $nnz A pointer to an int holding the number of non-zero values of the next example.
     * @param float $y The target value of the next example.
     * @param float $sample_weight The weight of the next example.
     */
    public function next(\CArray $x_data_ptr = null, int $x_ind_ptr = null, int $nnz = null, float $y, float $sample_weight = null)
    {
        $current_index = $this->_get_next_index();
        return $this->_sample($x_data_ptr, $x_ind_ptr, $nnz, $y, $sample_weight, $current_index);
    }
}