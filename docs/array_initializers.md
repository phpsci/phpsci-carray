# Creating PHPSci arrays
Useful methods for initializing / creating arrays.

- [Ones and Zeros](#Ones and Zeros)
    - [zeros](#zeros) - Return PHPSci Array full of zeros
    - [identity](#identity) - Return the identity PHPSci array
- [Ranges](#Ranges)
    - [arange](#arange) - Return evenly spaced values within a given interval.
    - [logspace](#logspace) - Return numbers spaced evenly on a log scale.
    - [linspace](#linspace) - Return evenly spaced numbers over a specified interval.
- [PHP native data](#PHP native data)
    - [fromArray](#fromarray) - Return PHPSci Array from input array
    - [toArray](#toarray)  - Return array from input PHPSci array
---

## Ones and Zeros

### zeros
```php
public static function zeros(array $shape);
```
Return PHPSci Array full of zeros.

##### Parameters
- `array` **$shape** - Shape of new array.

##### Returns
- `PHPSci array` - CArray of given shape.

##### Example
```php
use PHPSci\PHPSci as ps;

echo ps::zeros([2,2]);
```
```php
[
  [ 0.000000  0.000000 ]
  [ 0.000000  0.000000 ]
]
```
```php
use PHPSci\PHPSci as ps;

echo ps::zeros([2,]);
```
```php
[ 0.000000  0.000000 ]
```

---

### identity
```php
public static function identity(int $n);
```
Return the identity PHPSci array.

##### Parameters
- `array` **$n** - Size of identity matrix (n,n)

##### Returns
- `PHPSci array` - Identity CArray of given size.

##### Example
```php
use PHPSci\PHPSci as ps;

echo ps::identity(5);
```
```php
[
  [ 1.000000  0.000000  0.000000  0.000000  0.000000 ]
  [ 0.000000  1.000000  0.000000  0.000000  0.000000 ]
  [ 0.000000  0.000000  1.000000  0.000000  0.000000 ]
  [ 0.000000  0.000000  0.000000  1.000000  0.000000 ]
  [ 0.000000  0.000000  0.000000  0.000000  1.000000 ]
]
```

---

## Ranges

### arange
```php
public static function arange(double $stop, double $start, double $step);
```
Return evenly spaced values within a given interval.

##### Parameters
- `number` **$stop** - End of interval. The interval does not include this value. 
- `number` **$start** *Optional* - Start of interval. The interval includes this value. Defaults to 0. 
- `number` **$step** *Optional* - Spacing between values. Defaults to 1.

##### Returns
- `PHPSci` - PHPSci with array of evenly spaced values.

##### Example
```php
use PHPSci\PHPSci as ps;


$a = ps::arange(3);
echo $a;
```
```php
[ 0.000000  1.000000  2.000000 ]
```
```php
use PHPSci\PHPSci as ps;


$a = ps::arange(3,1,0.5);
echo $a;
```
```php
[ 1.000000  1.500000  2.000000  2.500000 ]
```

---

### linspace
```php
public static function linspace(float $start, float $stop, int $num);
```
Return evenly spaced numbers over a specified interval.

##### Parameters
- `number` **$start** - The starting value of the sequence. 
- `number` **$stop** - The end value of the sequence.
- `int` **$num** *Optional* - Number of samples to generate. Default is 50.

##### Returns
- `PHPSci` - PHPSci with array of equally spaced samples in the closed interval.

##### Example
```php
use PHPSci\PHPSci as ps;


$a = ps::linspace(1,5);
echo $a;
```
```php
[ 1.000000  1.020408  1.040816  1.061224  1.081633  1.102041  1.122449  1.142857  1.163265  1.183674  1.204082  1.224490  1.244898  1.265306  1.285714  1.306122  1.326531  1.346939  1.367347  1.387755  1.408163  1.428571  1.448980  1.469388  1.489796  1.510204  1.530612  1.551020  1.571429  1.591837  1.612245  1.632653  1.653061  1.673469  1.693877  1.714286  1.734694  1.755102  1.775510  1.795918  1.816326  1.836735  1.857143  1.877551  1.897959  1.918367  1.938776  1.959184  1.979592  2.000000 ]
```
```php
use PHPSci\PHPSci as ps;


$a = ps::linspace(1,5,5);
echo $a;
```
```php
[ 1.000000  1.250000  1.500000  1.750000  2.000000 ]
```

---

### logspace
```php
public static function logspace(float $start, float $stop, int $num, float $base);
```
Return numbers spaced evenly on a log scale.

##### Parameters
- `number` **$start** - ``$base ** $start`` is the starting value of the sequence. 
- `number` **$stop** - ``$base ** $stop`` is the final value of the sequence.
- `int` **$num** *Optional* - Number of samples to generate. Default is 50.
- `number` **$base** *Optional* - The base of the log space.

##### Returns
- `PHPSci` - PHPSci with array of equally spaced on a log scale.

##### Example
```php
use PHPSci\PHPSci as ps;


$a = ps::logspace(1, 2);
echo $a;
```
```php
[ 10.000000  10.481132  10.985411  11.513953  12.067925  12.648551  13.257112  13.894953  14.563486  15.264181  15.998588  16.768330  17.575106  18.420700  19.306976  20.235895  21.209507  22.229963  23.299522  24.420534  25.595482  26.826960  28.117689  29.470518  30.888435  32.374577  33.932217  35.564800  37.275936  39.069397  40.949146  42.919338  44.984318  47.148655  49.417122  51.794735  54.286755  56.898659  59.636230  62.505516  65.512848  68.664879  71.968582  75.431213  79.060440  82.864288  86.851143  91.029823  95.409554  100.000000 ]
```
```php
use PHPSci\PHPSci as ps;


$a = ps::logspace(1, 2, 5);
echo $a;
```
```php
[ 10.000000  17.782795  31.622776  56.234131  100.000000 ]
```
```php
use PHPSci\PHPSci as ps;


$a = ps::logspace(1, 2, 5, 5);
echo $a;
```
```php
[ 5.000000  7.476744  11.180340  16.718508  25.000000 ]
```
---

## PHP native data

### fromArray
```php
public static function fromArray(array $array);
```
Return PHPSci Array from PHP array.

##### Parameters
- `array` **$array** - PHP Array to be converted.

##### Returns
- `PHPSci` - PHPSci with array of with same shape and values of `$array`

##### Example
```php
$a = ps::fromArray([[1, 2],[3, 4]]);
echo $a;
```
```php
[
  [ 1.000000  2.000000 ]
  [ 3.000000  4.000000 ]
]
```

---

### toArray
```php
public function toArray();
```
Return a PHP array from PHPSci object.

##### Returns
- `array` - Array of with same shape and values of PHPSci array.

##### Example
```php
use PHPSci\PHPSci as ps;


$a = ps::fromArray([[1, 2],[3, 4]]);
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





