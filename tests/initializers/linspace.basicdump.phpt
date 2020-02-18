--TEST--
CArray::linspace(2.0, 3.0, 5) basic dump
--FILE--
<?php
$target = CArray::linspace(2.0, 3.0, 5);
print_r($target);
--EXPECT--
CArray Object
(
    [uuid] => 0
    [ndim] => 1
)
