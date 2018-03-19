<?php
namespace PHPSci\Backend;

/**
 * Trait CArrayPrinter
 *
 * @package PHPSci\Backend
 */
trait CArrayPrinter
{
    /**
     * Print 2-D CArray
     *
     * @return string
     */
    public function print2d() : string {
        $str = "[\n";
        $tmp_arr = $this->toArray();
        foreach($tmp_arr as $m) {
            $str .= "   [";
            foreach($m as $n) {
                $str .= " $n";
            }
            $str .= " ]\n";
        }
        $str .= "]";
        return $str;
    }

    /**
     * Print 1-D CArray
     *
     * @return string
     */
    public function print1d() : string {
        $str = "[\n";
        $tmp_arr = $this->toArray();
        $str .= "   [";
        foreach($tmp_arr as $n) {
            $str .= " $n";
        }
        $str .= " ]\n";
        return $str;
    }

}