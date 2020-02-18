--TEST--
CArray Arithmetics ([[INT]] + [INT]): Broadcast exception testing
--FILE--
<?php
error_reporting(0);
try {
    $a = new CArray([[1, 2], [3, 4]]);
    $b = $a + [1, 2, 3];
} catch (Exception $e) {
    echo $e->getMessage();
}
--EXPECT--
array is not broadcastable to correct shape