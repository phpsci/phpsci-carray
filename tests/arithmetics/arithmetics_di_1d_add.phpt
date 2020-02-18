--TEST--
CArray Arithmetics ([DOUBLE] + INT): new CArray([1.0, 2.0, 3.0]) plus one
--FILE--
<?php
$a = new CArray([1.0, 2.0, 3.0]);
$b = $a + 1;
echo $b[1];
--EXPECT--
3.000000