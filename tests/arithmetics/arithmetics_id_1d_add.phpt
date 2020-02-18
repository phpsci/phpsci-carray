--TEST--
CArray Arithmetics ([INT] + DOUBLE): new CArray([1, 2, 3]) plus 1.5
--FILE--
<?php
$a = new CArray([1, 2, 3]);
$b = $a + 1.5;
echo $b[1];
--EXPECT--
3.500000