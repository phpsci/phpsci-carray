# PHPSci
[![Latest Stable Version](https://poser.pugx.org/phpsci/phpsci/v/stable)](https://packagist.org/packages/phpsci/phpsci)
[![Total Downloads](https://poser.pugx.org/phpsci/phpsci/downloads)](https://packagist.org/packages/phpsci/phpsci)
[![Latest Unstable Version](https://poser.pugx.org/phpsci/phpsci/v/unstable)](https://packagist.org/packages/phpsci/phpsci)
[![License](https://poser.pugx.org/phpsci/phpsci/license)](https://packagist.org/packages/phpsci/phpsci)

[![Documentation Status](https://readthedocs.org/projects/phpsci/badge/?version=latest)](http://phpsci.readthedocs.io/en/latest/?badge=latest)
[![Build Status](https://travis-ci.org/phpsci/phpsci.svg?branch=master)](https://travis-ci.org/phpsci/phpsci)
[![Build Status](https://scrutinizer-ci.com/g/phpsci/phpsci/badges/build.png?b=master)](https://scrutinizer-ci.com/g/phpsci/phpsci/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/phpsci/phpsci/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/phpsci/phpsci/?branch=master)

<p align="center">
  <img src="https://i.imgur.com/QoIbhqj.png" width="70%" />
</p>

# Efficient PHP library for data scientists   

PHPSci is a PHP Library for scientific computing powered by C. 
You **must** compile and install
[PHPSci CArray Extension](https://www.github.com/phpsci/phpsci-ext).


It enables scientific operations in PHP to be performed up to 2000 
times faster than current implementations.

[http://phpsci.readthedocs.io/en/latest/](http://phpsci.readthedocs.io/en/latest/)

## Installation
You can install PHPSci using composer:
```
composer require phpsci/phpsci:dev-master
```

> **ATTENTION:** You must install PHPSci extension, otherwise it won't work.

## Performance
`Orange` PHP `Blue` PHPSci

<p align="center">
  <img src="https://i.imgur.com/kAnaq2Y.png" width="70%" />
</p>

**PHP**
```php
(100,100): 0.036118984222412 sec
(200,200): 0.2786500453949 sec
(300,300): 0.96729803085327 sec
(400,400): 2.7810060977936 sec
(500,500): 5.2478280067444 sec
(600,600): 9.7698769569397 sec
(700,700): 14.908197879791 sec
```

**PHPSci**
```php
(100,100): 0.002432107925415 sec
(200,200): 0.00038599967956543 sec
(300,300): 0.0011770725250244 sec
(400,400): 0.0022358894348145 sec
(500,500): 0.0036449432373047 sec
(600,600): 0.00559401512146 sec
(700,700): 0.0095341205596924 sec
```


## Getting Started

PHPSci arrays are different from PHP arrays, they are called CArrays and work in a peculiar way. Let's look at the 
result of the `print_r` function in a PHP array and a twin CArray.


### PHP Array
```php
$a = [[1,2],[3,4]];
print_r($a);
```
```php
Array
(
    [0] => Array
        (
            [0] => 1
            [1] => 2
        )

    [1] => Array
        (
            [0] => 3
            [1] => 4
        )

)
```
### PHPSci CArray
```php
$a = PHPSci::fromArray([[1,2],[3,4]]);
print_r($a);
```
```php
PHPSci\PHPSci Object
(
    [internal_pointer:protected] => PHPSci\Kernel\Orchestrator\MemoryPointer Object
        (
            [uuid:protected] => 1
            [x:protected] => 2
            [y:protected] => 2
            [carray_internal:protected] => CArray Object
                (
                    [uuid] => 1
                    [x] => 2
                    [y] => 2
                )

        )

)
```

This happens because `print_r` only works with PHP's natural functions, objects, and arrays, 
which is not the case for a CArray. 
An array of PHPSci is just a pointer to memory. It carries with it the position of memory 
where its data has been allocated.


The `MemoryPointer` object is a mirror of the `CArray` object, it carries with it the information 
needed to communicate with the C backend.


To view your data, you can use the `echo` method or transform your CArray into a PHP array.

## Data Visualization
There are two ways to view your data in an PHPSci array:

### Using echo
```php
$a = PHPSci::fromArray([[1,2],[3,4]]);
echo $a;
```
```php
[
  [ 1.000000  2.000000 ]
  [ 3.000000  4.000000 ]
]
```
### Transforming into a PHP array
```php
$a = PHPSci::fromArray([[1,2],[3,4]]);
print_r($a->toArray());
```
```php
Array
(
    [0] => Array
        (
            [0] => 1
            [1] => 2
        )

    [1] => Array
        (
            [0] => 3
            [1] => 4
        )

)
```

Try to perform all the necessary calculations 
before turning your PHPSci array into a PHP array.

The `echo` command is considerably more efficient than the `toArray` 
command. Try to use the toArray only when you want to use the results in a natively PHP function.

