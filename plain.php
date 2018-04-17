<?php
require_once "vendor/autoload.php";

use PHPSci\PHPSci as ps;

$a = ps::fromArray([[1, 2], [3, 4]]);
$b = ps::inv($a);
print_r($b->toArray());