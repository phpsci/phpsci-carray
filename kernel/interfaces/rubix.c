/**
 * CArray Interface for RubixML
 */

#include "rubix.h"
#include "../carray.h"
#include "../../phpsci.h"
#include "php.h"
#include "php_ini.h"
#include "../common/exceptions.h"
#include "../scalar.h"

/**
 * RubixML/Tensor/Matrix::identity
 */
PHP_METHOD(CRubix, identity)
{
    MemoryPointer ptr;
    zend_long n;
    CArray *output;

    ZEND_PARSE_PARAMETERS_START(1, 1)
        Z_PARAM_LONG(n)
    ZEND_PARSE_PARAMETERS_END();

    if (n < 1) {
        throw_valueerror_exception(
                "Dimensionality must be greater than 0 on all axes.");
        return NULL;
    }

    output = CArray_Eye((int)n, (int)n, 0, NULL, &ptr);

    if (output != NULL) {
        RETURN_MEMORYPOINTER(return_value, &ptr);
    }
}

/**
 * RubixML/Tensor/Matrix::zeros
 */
PHP_METHOD(CRubix, zeros)
{
    zend_long m, n;
    MemoryPointer ptr;
    char dtype = 'd', order = 'C';
    int ndim = 2;

    ZEND_PARSE_PARAMETERS_START(2, 2)
        Z_PARAM_LONG(m)
        Z_PARAM_LONG(n)
    ZEND_PARSE_PARAMETERS_END();

    if (m < 1 || n < 1) {
        throw_valueerror_exception("Dimensionality must be greater than 0 on all axes.");
        return NULL;
    }

    int *shape = emalloc(sizeof(int) * 2);
    shape[0] = (int)m;
    shape[1] = (int)n;

    CArray_Zeros(shape, ndim, dtype, &order, &ptr);

    RETURN_MEMORYPOINTER(return_value,&ptr);
    efree(shape);
}

/**
 * RubixML/Tensor/Matrix::ones
 */
PHP_METHOD(CRubix, ones)
{
    zend_long m, n;
    MemoryPointer ptr;
    char dtype = 'd', order = 'C';
    int ndim = 2;

    ZEND_PARSE_PARAMETERS_START(2, 2)
        Z_PARAM_LONG(m)
        Z_PARAM_LONG(n)
    ZEND_PARSE_PARAMETERS_END();

    if (m < 1 || n < 1) {
        throw_valueerror_exception("Dimensionality must be greater than 0 on all axes.");
        return NULL;
    }

    int *shape = emalloc(sizeof(int) * 2);
    shape[0] = (int)m;
    shape[1] = (int)n;

    CArray_Ones(shape, ndim, &dtype, &order, &ptr);

    RETURN_MEMORYPOINTER(return_value,&ptr);
    efree(shape);
}

/**
 * RubixML/Tensor/Matrix::diagonal
 */
PHP_METHOD(CRubix, diagonal)
{
    int i;
    char dtype = 'd', order = 'C';
    MemoryPointer a_ptr, rtn_ptr;
    CArray *target_array, *outarray;
    int len, *dims;
    zval *elements;
    ZEND_PARSE_PARAMETERS_START(1, 1)
        Z_PARAM_ARRAY(elements)
    ZEND_PARSE_PARAMETERS_END();

    dims = ZVAL_TO_TUPLE(elements, &len);

    if (zend_hash_num_elements(Z_ARRVAL_P(elements)) < 1) {
        throw_valueerror_exception("Dimensionality must be greater than 0 on all axes.");
        return NULL;
    }

    ZVAL_TO_MEMORYPOINTER(elements, &a_ptr, &dtype);
    target_array = CArray_FromMemoryPointer(&a_ptr);

    int *shape = emalloc(sizeof(int) * 2);
    shape[0] = zend_hash_num_elements(Z_ARRVAL_P(elements));
    shape[1] = shape[0];

    CArray_Zeros(shape, 2, dtype, &order, &rtn_ptr);
    outarray = CArray_FromMemoryPointer(&rtn_ptr);

    for (i = 0; i < shape[0]; i++) {
        DDATA(outarray)[(i * shape[0]) + i] = DDATA(target_array)[i];
    }

    RETURN_MEMORYPOINTER(return_value, &rtn_ptr);
}

/**
 * RubixML/Tensor/Matrix::fill
 */
PHP_METHOD(CRubix, fill)
{
    CArray *outarray;
    char dtype = 'd', order = 'C';
    MemoryPointer rtn_ptr;
    zend_long m, n;
    double value;
    CArrayScalar *scalar;

    ZEND_PARSE_PARAMETERS_START(3, 3)
        Z_PARAM_DOUBLE(value)
        Z_PARAM_LONG(m)
        Z_PARAM_LONG(n)
    ZEND_PARSE_PARAMETERS_END();

    if (m < 1 || n < 1) {
        throw_valueerror_exception("Dimensionality must be greater than 0 on all axes.");
        return NULL;
    }

    int *shape = emalloc(sizeof(int) * 2);
    shape[0] = (int)m;
    shape[1] = (int)n;

    CArray_Zeros(shape, 2, dtype, &order, &rtn_ptr);
    outarray = CArray_FromMemoryPointer(&rtn_ptr);

    scalar = CArrayScalar_NewDouble(value);
    CArray_FillWithScalar(outarray, scalar);

    CArrayScalar_FREE(scalar);
    RETURN_MEMORYPOINTER(return_value, &rtn_ptr);
}

/**
 * RubixML/Tensor/Matrix::rand
 */
PHP_METHOD(CRubix, rand)
{

}

PHP_METHOD(CRubix, gaussian)
{

}

PHP_METHOD(CRubix, poisson)
{

}

PHP_METHOD(CRubix, uniform)
{

}

PHP_METHOD(CRubix, minimum)
{

}

PHP_METHOD(CRubix, maximum)
{

}

PHP_METHOD(CRubix, stack)
{

}

PHP_METHOD(CRubix, implodeRow)
{

}

PHP_METHOD(CRubix, shape)
{

}

PHP_METHOD(CRubix, shapeString)
{

}

PHP_METHOD(CRubix, isSquare)
{

}

PHP_METHOD(CRubix, size)
{

}

PHP_METHOD(CRubix, m)
{

}

PHP_METHOD(CRubix, n)
{

}

PHP_METHOD(CRubix, row)
{

}

PHP_METHOD(CRubix, rowAsVector)
{

}

PHP_METHOD(CRubix, column)
{

}

PHP_METHOD(CRubix, columnAsVector)
{

}

PHP_METHOD(CRubix, diagonalAsVector)
{

}

PHP_METHOD(CRubix, asArray)
{

}

PHP_METHOD(CRubix, asVectors)
{

}

PHP_METHOD(CRubix, asColumnVectors)
{

}

PHP_METHOD(CRubix, flatten)
{

}

PHP_METHOD(CRubix, argmin)
{

}

PHP_METHOD(CRubix, argmax)
{

}

PHP_METHOD(CRubix, map)
{

}

PHP_METHOD(CRubix, reduce)
{

}

PHP_METHOD(CRubix, transpose)
{

}

PHP_METHOD(CRubix, inverse)
{

}

PHP_METHOD(CRubix, det)
{

}

PHP_METHOD(CRubix, trace)
{

}

PHP_METHOD(CRubix, rank)
{

}

PHP_METHOD(CRubix, fullRank)
{

}

PHP_METHOD(CRubix, symmetric)
{

}

PHP_METHOD(CRubix, positiveDefinite)
{

}

PHP_METHOD(CRubix, positiveSemidefinite)
{

}

PHP_METHOD(CRubix, matmul)
{

}

PHP_METHOD(CRubix, dot)
{

}

PHP_METHOD(CRubix, convolve)
{

}

PHP_METHOD(CRubix, ref)
{

}

PHP_METHOD(CRubix, rref)
{

}

PHP_METHOD(CRubix, lu)
{

}

PHP_METHOD(CRubix, cholesky)
{

}

PHP_METHOD(CRubix, eig)
{

}

PHP_METHOD(CRubix, solve)
{

}

PHP_METHOD(CRubix, l1Norm)
{

}

PHP_METHOD(CRubix, l2Norm)
{

}

PHP_METHOD(CRubix, infinityNorm)
{

}

PHP_METHOD(CRubix, maxNorm)
{

}

PHP_METHOD(CRubix, multiply)
{

}

PHP_METHOD(CRubix, divide)
{

}

PHP_METHOD(CRubix, add)
{

}

PHP_METHOD(CRubix, subtract)
{

}

PHP_METHOD(CRubix, pow)
{

}

PHP_METHOD(CRubix, mod)
{

}

PHP_METHOD(CRubix, equal)
{

}

PHP_METHOD(CRubix, notEqual)
{

}

PHP_METHOD(CRubix, greater)
{

}

PHP_METHOD(CRubix, greaterEqual)
{

}

PHP_METHOD(CRubix, less)
{

}

PHP_METHOD(CRubix, lessEqual)
{

}

PHP_METHOD(CRubix, reciprocal)
{

}

PHP_METHOD(CRubix, abs)
{

}
PHP_METHOD(CRubix, square)
{

}

PHP_METHOD(CRubix, sqrt)
{

}

PHP_METHOD(CRubix, exp)
{

}

PHP_METHOD(CRubix, expm1)
{

}

PHP_METHOD(CRubix, log)
{

}

PHP_METHOD(CRubix, log1p)
{

}

PHP_METHOD(CRubix, sin)
{

}

PHP_METHOD(CRubix, asin)
{

}

PHP_METHOD(CRubix, cos)
{

}

PHP_METHOD(CRubix, acos)
{

}

PHP_METHOD(CRubix, tan)
{

}

PHP_METHOD(CRubix, atan)
{

}

PHP_METHOD(CRubix, rad2deg)
{

}

PHP_METHOD(CRubix, deg2rad)
{

}

PHP_METHOD(CRubix, sum)
{

}

PHP_METHOD(CRubix, product)
{

}

PHP_METHOD(CRubix, min)
{

}

PHP_METHOD(CRubix, max)
{

}

PHP_METHOD(CRubix, mean)
{

}

PHP_METHOD(CRubix, variance)
{

}

PHP_METHOD(CRubix, median)
{

}

PHP_METHOD(CRubix, quantile)
{

}

PHP_METHOD(CRubix, covariance)
{

}

PHP_METHOD(CRubix, round)
{

}

PHP_METHOD(CRubix, floor)
{

}

PHP_METHOD(CRubix, ceil)
{

}

PHP_METHOD(CRubix, clip)
{

}

PHP_METHOD(CRubix, clipLower)
{

}

PHP_METHOD(CRubix, clipUpper)
{

}

PHP_METHOD(CRubix, sign)
{

}

PHP_METHOD(CRubix, negate)
{

}

PHP_METHOD(CRubix, insert)
{

}

PHP_METHOD(CRubix, subMatrix)
{

}

PHP_METHOD(CRubix, augmentAbove)
{

}

PHP_METHOD(CRubix, augmentBelow)
{

}

PHP_METHOD(CRubix, augmentLeft)
{

}

PHP_METHOD(CRubix, augmentRight)
{

}

PHP_METHOD(CRubix, repeat)
{

}

PHP_METHOD(CRubix, multiplyMatrix)
{

}

PHP_METHOD(CRubix, divideMatrix)
{

}

PHP_METHOD(CRubix, addMatrix)
{

}

PHP_METHOD(CRubix, subtractMatrix)
{

}

PHP_METHOD(CRubix, powMatrix)
{

}

PHP_METHOD(CRubix, modMatrix)
{

}

PHP_METHOD(CRubix, equalMatrix)
{

}

PHP_METHOD(CRubix, notEqualMatrix)
{

}

PHP_METHOD(CRubix, greaterMatrix)
{

}

PHP_METHOD(CRubix, greaterEqualMatrix)
{

}

PHP_METHOD(CRubix, lessMatrix)
{

}

PHP_METHOD(CRubix, lessEqualMatrix)
{

}

PHP_METHOD(CRubix, multiplyVector)
{

}

PHP_METHOD(CRubix, divideVector)
{

}

PHP_METHOD(CRubix, addVector)
{

}

PHP_METHOD(CRubix, subtractVector)
{

}

PHP_METHOD(CRubix, powVector)
{

}

PHP_METHOD(CRubix, modVector)
{

}

PHP_METHOD(CRubix, equalVector)
{

}

PHP_METHOD(CRubix, notEqualVector)
{

}

PHP_METHOD(CRubix, greaterVector)
{

}

PHP_METHOD(CRubix, greaterEqualVector)
{

}

PHP_METHOD(CRubix, lessVector)
{

}

PHP_METHOD(CRubix, lessEqualVector)
{

}

PHP_METHOD(CRubix, multiplyColumnVector)
{

}

PHP_METHOD(CRubix, divideColumnVector)
{

}

PHP_METHOD(CRubix, addColumnVector)
{

}

PHP_METHOD(CRubix, subtractColumnVector)
{

}

PHP_METHOD(CRubix, powColumnVector)
{

}

PHP_METHOD(CRubix, modColumnVector)
{

}

PHP_METHOD(CRubix, equalColumnVector)
{

}

PHP_METHOD(CRubix, notEqualColumnVector)
{

}

PHP_METHOD(CRubix, greaterColumnVector)
{

}

PHP_METHOD(CRubix, greaterEqualColumnVector)
{

}

PHP_METHOD(CRubix, lessColumnVector)
{

}

PHP_METHOD(CRubix, lessEqualColumnVector)
{

}

PHP_METHOD(CRubix, multiplyScalar)
{

}

PHP_METHOD(CRubix, divideScalar)
{

}

PHP_METHOD(CRubix, addScalar)
{

}

PHP_METHOD(CRubix, subtractScalar)
{

}

PHP_METHOD(CRubix, powScalar)
{

}

PHP_METHOD(CRubix, modScalar)
{

}

PHP_METHOD(CRubix, equalScalar)
{

}

PHP_METHOD(CRubix, notEqualScalar)
{

}

PHP_METHOD(CRubix, greaterScalar)
{

}

PHP_METHOD(CRubix, greaterEqualScalar)
{

}

PHP_METHOD(CRubix, lessScalar)
{

}

PHP_METHOD(CRubix, lessEqualScalar)
{

}

PHP_METHOD(CRubix, count)
{

}

PHP_METHOD(CRubix, offsetSet)
{

}

PHP_METHOD(CRubix, offsetExists)
{

}

PHP_METHOD(CRubix, offsetUnset)
{

}

PHP_METHOD(CRubix, offsetGet)
{

}

PHP_METHOD(CRubix, getIterator)
{

}