# BABY PROJECT
We are doing our best!

# PHPSci
PHPSci is a PHP Library for scientific computing powered by C. You **must** compile and install
[phpsci-ext](https://www.github.com/phpsci/php-ext). 

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

