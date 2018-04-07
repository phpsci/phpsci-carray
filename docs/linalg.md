# Linear Algebra

- [Products](#Products)
    - [matmul](#matmul) - Product of two matrices.
    - [inner](#inner) - Inner product of two matrices.
    - [outer](#outer) - Outer product of two vectors.
    - [kron](#kron) - Kronecker product of two matrices.
- [Decomposition](#Decomposition)
    - [svd](#SVD) - Singular Value Decomposition.
- [Eigenvalues](#Eigenvalues)
    - [eig](#eigen) - Compute the eigenvalues and right eigenvectors of a square matrice.
    - [eigvals](#eigenvals) - Compute the eigenvalues of a general matrix.
- [Norms](#Norms)
    - [norm](#norm) - Matrix or vector norm.
    - [det](#det) - Compute the determinant of an array.
- [Solving](#Solving)
    - [solve](#solve) - Solve a linear matrix equation.
    - [inv](#inv) - Compute the (multiplicative) inverse of a matrix.
    - [lstsq](#lstsq) - Return the least-squares solution to a linear matrix equation.
    
---

## Products

### matmul
```php
public static function matmul(PHPSci $a, PHPSci $b);
```
Matrix product of two arrays.

Works like NumPY:

If both CArrays are 2-D they are multiplied like conventional matrices.

If the first argument is 1-D, it is promoted to a matrix by prepending
a 1 to its dimensions. After matrix multiplication the prepended 1 is removed.

If the second argument is 1-D, it is promoted to a matrix by appending a 1 to
its dimensions. After matrix multiplication the appended 1 is removed.

##### Parameters
- `PHPSci` **$a** - First matrix
- `PHPSci` **$b** - Second matrix

##### Returns
- `PHPSci array` - Returns the dot product of a and b. If a and b are both 1-D arrays then a scalar is returned; 
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
public static function inner(PHPSci $a, PHPSci $b);
```
Inner product of two arrays.

##### Parameters
- `PHPSci` **$a** - First matrix
- `PHPSci` **$b** - Second matrix

##### Returns
- `PHPSci array` - Inner product of `$a` `$b`

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
$c = ps::inner($a, $b);
echo $c;
```
```php
32.000000
```


---

## Decomposition

---

## Eigenvalues

---

## Norms

---

## Solving        