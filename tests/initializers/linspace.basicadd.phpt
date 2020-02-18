--TEST--
CArray::linspace(2.0, 3.0, 5) plus 1
--FILE--
<?php
$a = CArray::linspace(2.0, 3.0, 5);
$b = $a + 1;
var_dump($b);
--EXPECT--
object(CArray)#2 (2) {
  ["uuid"]=>
  int(2)
  ["ndim"]=>
  int(1)
}