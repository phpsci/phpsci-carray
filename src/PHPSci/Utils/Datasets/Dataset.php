<?php
namespace PHPSci\Utils\Datasets;

/**
 * Class Dataset
 * @package PHPSci\Utils\Datasets
 */
abstract class Dataset
{
    /**
     * @return mixed
     */
    public function getX() {
        return $this->X;
    }

    /**
     * @return mixed
     */
    public function getY() {
        return $this->y;
    }
}