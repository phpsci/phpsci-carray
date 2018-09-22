# Linear Algebra

- [Products](#Products)
    - [matmul](#matmul) - Product of two matrices.
    - [inner](#inner) - Inner product of two matrices.
- [Decomposition](#Decomposition)
    - [svd](#SVD) - Singular Value Decomposition.
- [Eigenvalues](#Eigenvalues)
    - [eig](#eig) - Compute the eigenvalues and right eigenvectors of a square matrice.
    - [eigvals](#eigvals) - Compute the eigenvalues of a general matrix.
- [Norms & Others](#Norms)
    - [cond](#cond) - Compute the condition number of target CArray using Frobenius Norm
    - [norm](#norm) - Matrix Norm
    - [det](#det) - Compute the determinant of an CArray
- [Solving & Inverting](#Solving)
    - [solve](#solve) - Solve a linear matrix equation.
    - [inv](#inv) - Compute the (multiplicative) inverse of a matrix.
    
---

## Products

### matmul
```php
public static function matmul(CArray $a, CArray $b);
```
Matrix product of two arrays.

Works like NumPY:

If both CArrays are 2-D they are multiplied like conventional matrices.

If the first argument is 1-D, it is promoted to a matrix by prepending
a 1 to its dimensions. After matrix multiplication the prepended 1 is removed.

If the second argument is 1-D, it is promoted to a matrix by appending a 1 to
its dimensions. After matrix multiplication the appended 1 is removed.

##### Parameters
- `CArray` **$a** - First matrix
- `CArray` **$b** - Second matrix

##### Returns
- `CArray` - Returns the dot product of a and b. If a and b are both 1-D arrays then a scalar is returned; 
otherwise an array is returned.

##### Example
```php
use PHPSci\PHPSci as ps;

$a = ps::fromArray([[1, 2, 3], [4, 5, 6]]);
$b = ps::fromArray([[7, 8], [9, 10], [11, 12]]);
$c = ps::matmul($a, $b);

echo $c;
```
```php
[
  [ 58.000000  64.000000 ]
  [ 139.000000  154.000000 ]
]
```
```php
use PHPSci\PHPSci as ps;

$a = ps::fromArray([1, 2, 3]);
$b = ps::fromArray([4, 5, 6]);
$c = ps::matmul($a, $b);

echo $c;
```
```php
32.000000
```

---

### inner
```php
public static function inner(CArray $a, CArray $b);
```
Inner product of two arrays.

##### Parameters
- `CArray` **$a** - First matrix
- `CArray` **$b** - Second matrix

##### Returns
- `CArray` - Inner product of `$a` `$b`

##### Example
```php
use PHPSci\PHPSci as ps;

$a = ps::fromArray([1, 2, 3]);
$b = ps::fromArray([4, 5, 6]);
$c = ps::inner($a, $b);
echo $c;
```
```php
32.000000
```


---

## Decomposition

### svd
```php
public static function svd(CArray $a);
```
Singular Value Decomposition of target CArray

##### Parameters
- `CArray` **$a** - Target CArray

##### Returns
- `PHP Array` 
    - `[0]` Unitary array 
    - `[1]` Vector(s) with the singular values 
    - `[2]` Unitary array

##### Example
```php
use PHPSci\PHPSci as ps;

$a = ps::fromArray([[1, 2], [3, 4]]);

list($un_a, $sv, $un_b) = ps::svd($a);
echo "Unitary Array\n";
echo $un_a;
echo "\nSingular Values\n";
echo $sv;
echo "\nUnitary Array\n";
echo $un_b;
```
```php
Unitary Array
[ 5.464986  0.365966 ]
Singular Values
[
  [ -0.404554  -0.914514 ]
  [ -0.914514  0.404554 ]
]
Unitary Array
[
  [ -0.576048  -0.817416 ]
  [ 0.817416  -0.576048 ]
]
```

---

## Eigenvalues

### eig
```php
public static function eig(CArray $a);
```
Compute the eigenvalues and right eigenvectors of a square CArray.

##### Parameters
- `CArray` **$a** - CArrays for which the eigenvalues and right eigenvectors will be computed

##### Returns
- `PHP Array` 
    - `[0]` The eignvalues of CArray `$a`
    - `[1]` The right eignvectors of CArray `$a`

##### Example
```php
use PHPSci\PHPSci as ps;

$a = ps::fromArray([[1, 2], [3, 4]]);

list($eig, $eig_v) = ps::eig($a);
echo "Eignvalues\n";
echo $eig;
echo "\nEignvectors\n";
echo $eig_v;
```
```php
Eignvalues
[ -0.372281  5.372281 ]
Eignvectors
[
  [ -0.824565  -0.415974 ]
  [ 0.565767  -0.909377 ]
]
```

---

### eigvals

```php
public static function eigvals(CArray $a);
```
Compute the eigenvalues of a square CArray.

##### Parameters
- `CArray` **$a** - CArrays for which the eigenvalues will be computed

##### Returns
- `CArray` - The eignvalues of CArray `$a`

##### Example
```php
use PHPSci\PHPSci as ps;

$a = ps::fromArray([[1, 2], [3, 4]]);

$eig = ps::eigvals($a);
echo $eig;
```
```php
[ -0.372281  5.372281 ]
```

---

## Norms & Others

### norm

```php
public static function eigvals(CArray $a);
```
Compute the eigenvalues of a square CArray.

##### Parameters
- `CArray` **$a** - CArrays for which the eigenvalues will be computed

##### Returns
- `CArray` - The eignvalues of CArray `$a`

##### Example
```php
use PHPSci\PHPSci as ps;

$a = ps::fromArray([[1, 2], [3, 4]]);

$eig = ps::eigvals($a);
echo $eig;
```
```php
[ -0.372281  5.372281 ]
```
---

### cond

```php
public static function eigvals(CArray $a);
```
Compute the eigenvalues of a square CArray.

##### Parameters
- `CArray` **$a** - CArrays for which the eigenvalues will be computed

##### Returns
- `CArray` - The eignvalues of CArray `$a`

##### Example
```php
use PHPSci\PHPSci as ps;

$a = ps::fromArray([[1, 2], [3, 4]]);

$eig = ps::eigvals($a);
echo $eig;
```
```php
[ -0.372281  5.372281 ]
```
---

### det

```php
public static function eigvals(CArray $a);
```
Compute the eigenvalues of a square CArray.

##### Parameters
- `CArray` **$a** - CArrays for which the eigenvalues will be computed

##### Returns
- `CArray` - The eignvalues of CArray `$a`

##### Example
```php
use PHPSci\PHPSci as ps;

$a = ps::fromArray([[1, 2], [3, 4]]);

$eig = ps::eigvals($a);
echo $eig;
```
```php
[ -0.372281  5.372281 ]
```
---

## Solving & Inverting

### solve

```php
public static function eigvals(CArray $a);
```
Compute the eigenvalues of a square CArray.

##### Parameters
- `CArray` **$a** - CArrays for which the eigenvalues will be computed

##### Returns
- `CArray` - The eignvalues of CArray `$a`

##### Example
```php
use PHPSci\PHPSci as ps;

$a = ps::fromArray([[1, 2], [3, 4]]);

$eig = ps::eigvals($a);
echo $eig;
```
```php
[ -0.372281  5.372281 ]
```
---

### inv

```php
public static function eigvals(CArray $a);
```
Compute the eigenvalues of a square CArray.

##### Parameters
- `CArray` **$a** - CArrays for which the eigenvalues will be computed

##### Returns
- `CArray` - The eignvalues of CArray `$a`

##### Example
```php
use PHPSci\PHPSci as ps;

$a = ps::fromArray([[1, 2], [3, 4]]);

$eig = ps::eigvals($a);
echo $eig;
```
```php
[ -0.372281  5.372281 ]
```