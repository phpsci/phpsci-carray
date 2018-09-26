<?php
namespace PHPSci\Utils\Datasets;

use PHPSci\CArray;

/**
 * Class ArrayDataset
 * @package PHPSci\Utils\Datasets
 */
class ArrayDataset extends SequentialDataset
{

    /**
     * ArrayDataset constructor.
     * @param $X
     * @param $y
     * @param $sample_weights
     * @param $seed
     */
    public function __construct($X, $y, $sample_weights, $seed)
    {
        $this->X = $X;
        $this->y = $y;
        $this->sample_weights = $sample_weights;
        $this->seed = $seed;

        $this->n_samples = $X->x;
        $this->n_features = $X->y;

        $feature_indices = CArray::arange(0, $this->n_features, 1);
        $this->feature_indices = $feature_indices;

        $this->feature_indices_ptr = $feature_indices;

        $this->current_index = -1;

        $this->X_data_ptr = $X;
        $this->Y_data_ptr = $y;

        $this->sample_weight_data = $sample_weights;

        $index = CArray::arange(0, $this->n_samples, 1);
        $this->index = $index;
        $this->index_data_ptr = $index;
        # seed should not be 0 for our_rand_r
        $this->seed = max($seed, 1);
    }

    /**
     * @param int $idx
     * @return mixed
     */
    public function sample_weight(int $idx)
    {
        return $this->sample_weight_data[[$idx]];
    }

    public function _sample(\CArray $x_data_ptr, \CArray $x_ind_ptr, \CArray $nnz, \CArray $y, \CArray $sample_weight,
                            int $current_index)
    {
        $sample_idx = $this->index_data_ptr[[$current_index]];
        $offset = $sample_idx;

        $y[[0]] = $this->Y_data_ptr[[$sample_idx]];
        $x_data_ptr[[0]] = $this->X_data_ptr[[$offset]];
        $x_ind_ptr[[0]] = $this->feature_indices_ptr;
        $nnz[[0]] = $this->n_features;
        $sample_weight[[0]] = $this->sample_weight_data[[$sample_idx]];
    }
}