--TEST--
CArray Arithmetics ([DOUBLE] + DOUBLE): new CArray([1.0, 2.0, 3.0]) plus 1.5
--FILE--
<?php
$a = new CArray([1.0, 2.0, 3.0]);
$b = $a + 1.5;
echo $b[1];
--EXPECT--
3.500000