<?php
require_once "vendor/autoload.php";

use PHPSci\PHPSci as ps;
use PHPSci\CArray as ca;
use PHPSci\Plot\Plotter as plt;


$data = ca::fromArray([
    [0 ,0],
    [1, 1],
    [0, 1],
    [1, 0]

]);

$labels = ca::fromArray([
    0, 1, 0, 0
]);

# var = mean(abs(x - x.mean())**2).

# echo ca::mean($data, 0);
# echo ca::mean(ca::square(ca::abs(ca::subtract($data, ca::mean($data, 0)))),0);


$classifier = new \PHPSci\NaiveBayes\GaussianNB();


$classifier->fit($data, $labels);
$prediction = $classifier->predict($data);

print_r($prediction);

//print_r($prediction);
