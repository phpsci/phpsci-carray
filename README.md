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


It enables scientific operations in PHP to be performed up to 800 
times faster than current implementations.


## Installation
You can install PHPSci using composer:
```
composer require phpsci/phpsci:dev-master
```

> **ATTENTION:** You must install PHPSci extension, otherwise it won't work.


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
CArray Object
(
    [uuid] => 0
    [x] => 2
    [y] => 2
)
```

This happens because `print_r` only works with PHP's natural functions, objects, and arrays, 
which is not the case for a CArray. 
An array of PHPSci is just a pointer to memory. It carries with it the position of memory 
where its data has been allocated.

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
