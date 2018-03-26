# PHPSci
[![Latest Stable Version](https://poser.pugx.org/phpsci/phpsci/v/stable)](https://packagist.org/packages/phpsci/phpsci)
[![Total Downloads](https://poser.pugx.org/phpsci/phpsci/downloads)](https://packagist.org/packages/phpsci/phpsci)
[![Latest Unstable Version](https://poser.pugx.org/phpsci/phpsci/v/unstable)](https://packagist.org/packages/phpsci/phpsci)
[![License](https://poser.pugx.org/phpsci/phpsci/license)](https://packagist.org/packages/phpsci/phpsci)
[![composer.lock](https://poser.pugx.org/phpsci/phpsci/composerlock)](https://packagist.org/packages/phpsci/phpsci)


[![Build Status](https://travis-ci.org/phpsci/phpsci.svg?branch=master)](https://travis-ci.org/phpsci/phpsci)
[![Build Status](https://scrutinizer-ci.com/g/phpsci/phpsci/badges/build.png?b=master)](https://scrutinizer-ci.com/g/phpsci/phpsci/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/phpsci/phpsci/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/phpsci/phpsci/?branch=master)
[![Coverage Status](https://coveralls.io/repos/github/phpsci/phpsci/badge.svg?branch=master)](https://coveralls.io/github/phpsci/phpsci?branch=master)



PHPSci is a PHP Library for scientific computing powered by C. You **must** compile and install
[phpsci-ext](https://www.github.com/phpsci/phpsci-ext). 

`
We will soon provide precompiled!
`

## Installation
You can install PHPSci using composer:
```
composer require phpsci/phpsci:dev-master
```



## Getting Started

You can create an CArray using the default constructor:

```php
$autoloader = require_once dirname(__DIR__) . '/vendor/autoload.php';

use PHPSci\PHPSci as psci;

$matrix = new psci([[2 , 4], [6 , 9]]);
echo $matrix;
```

```php
[
   [ 2 4 ]
   [ 6 9 ]
]
```

```php
echo psci::transpose($matrix);
```
```php
[
   [ 2 6 ]
   [ 4 9 ]
]
```


## How it works?

PHPSci is powered by **CArrays**.
In every executed operation, PHPSci turns your PHP array into a CArray, try to look at the CArray as something like 
Numpy's NDArray (NOTICE: they work extremely different, CArray just pretend to be equal using abtractions).

### Inside CArrays
A `print_r` look at a CArray
```php
PHPSci\PHPSci Object
(
    [value:PHPSci\PHPSci:private] => 
    [c_array:protected] => CPHPSci Object
        (
            [dim] => 2
            [rows] => 2
            [cols] => 2
            [c_array_size] => 48
            [php_array] => Array
                (
                    [0] => Array
                        (
                            [0] => 0
                            [1] => 1
                        )

                    [1] => Array
                        (
                            [0] => 2
                            [1] => 3
                        )

                )

        )

)
```
Everything inside `[c_array:protected] => CPHPSci Object` is generated
by C code.

## Performance
Some tests made with i5, 8GB RAM, 64-bits machine with Fedora 27 and
4GB available for PHP.

`Must recent tests`

#### PHP Array to CArray
Creating CArrays from PHP arrays with shape `(rows,cols)`.
NOTICE: This does'nt include the time PHP took to create it own array.
```php
CREATE CARRAY PHPSCI
========================================
CArray (100,100): 4.0E-6 sec(s)
CArray (200,200): 6.0E-6 sec(s)
CArray (300,300): 6.0E-6 sec(s)
CArray (400,400): 6.0E-6 sec(s)
CArray (500,500): 6.0E-6 sec(s)
CArray (600,600): 7.0E-6 sec(s)
CArray (700,700): 6.0E-6 sec(s)
CArray (800,800): 6.0E-6 sec(s)
CArray (900,900): 7.0E-6 sec(s)
```
With PHP array creation time:
```php
CREATE CARRAY PHPSCI W/ PHP TIME INCLUDED
========================================
CArray (100,100): 0.02138790133667 sec(s)
CArray (200,200): 0.070839967758179 sec(s)
CArray (300,300): 0.15959695954895 sec(s)
CArray (400,400): 0.28583201411438 sec(s)
CArray (500,500): 0.44160203118896 sec(s)
CArray (600,600): 0.63806594715881 sec(s)
CArray (700,700): 0.86629609246826 sec(s)
CArray (800,800): 1.1416860022125 sec(s)
CArray (900,900): 1.4429839515991 sec(s)
```
#### Matrix Multiplication
Matmul with CArrays from PHP arrays with shape `(rows,cols)`.
NOTICE: Only the operation time.
```php
MATMUL PHPSCI
========================================
CArray (100,100): 0.0044419765472412 sec(s)
CArray (200,200): 0.0084681510925293 sec(s)
CArray (300,300): 0.027091979980469 sec(s)
CArray (400,400): 0.069776773452759 sec(s)
CArray (500,500): 0.13852596282959 sec(s)
CArray (600,600): 0.24525594711304 sec(s)
CArray (700,700): 0.39853596687317 sec(s)
CArray (800,800): 0.57897710800171 sec(s)
CArray (900,900): 1.2307569980621 sec(s)
```
```php
MATMUL PHP IJK
========================================
PHP Array (100,100): 0.28780794143677 sec(s)
PHP Array (200,200): 2.2915270328522 sec(s)
PHP Array (300,300): 7.7198770046234 sec(s)
PHP Array (400,400): 18.349531173706 sec(s)
PHP Array (500,500): 36.395827054977 sec(s)
PHP Array (600,600): 62.111531972885 sec(s)
PHP Array (700,700): 98.794425010681 sec(s)
```

#### Matrix Transpose
Transpose CArray with shape `(rows,cols)`.
NOTICE: Only the operation time.
```php
TRANSPOSE PHPSCI CARRAY
========================================
CArray (100,100): 0.0037569999694824
CArray (200,200): 0.0010581016540527
CArray (300,300): 0.0028419494628906
CArray (400,400): 0.0050318241119385
CArray (500,500): 0.0081629753112793
CArray (600,600): 0.013552904129028
CArray (700,700): 0.019199848175049
CArray (800,800): 0.023442029953003
CArray (900,900): 0.030239820480347
```
```php
TRANSPOSE PHP IJ
========================================
PHP Array (100,100): 0.0057671070098877
PHP Array (200,200): 0.0091550350189209
PHP Array (300,300): 0.021449089050293
PHP Array (400,400): 0.037893056869507
PHP Array (500,500): 0.059904813766479
PHP Array (600,600): 0.087919950485229
PHP Array (700,700): 0.11952710151672
PHP Array (800,800): 0.15573596954346
PHP Array (900,900): 0.19703006744385
```