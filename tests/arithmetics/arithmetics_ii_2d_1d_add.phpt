--TEST--
CArray Arithmetics ([[INT]] + [INT]): new CArray([[1, 2], [3, 4]]) plus [1, 2]
--FILE--
<?php
$a = new CArray([[1, 2], [3, 4]]);
$b = $a + [1, 2];
echo $b[0][1];
--EXPECT--
4