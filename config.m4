PHP_ARG_WITH(carray, whether to enable CArray computing library,
[  --witch-carray          Disable CArray computing library], yes)

PHP_ARG_ENABLE(carray-opencl, whether to enable OpenCL support,
[  --enable-carray-opencl     whether to enable OpenCL support], no, no)


if test "$PHP_CARRAY" != "no"; then
  AC_DEFINE([HAVE_CARRAY],1 ,[whether to enable  CArray computing library])

AC_CHECK_HEADERS(
    [/opt/OpenBLAS/include/lapacke.h],
    [
        PHP_ADD_INCLUDE(/opt/OpenBLAS/include/)
    ],
    ,
    [[#include "/opt/OpenBLAS/include/lapacke.h"]]
)
AC_CHECK_HEADERS(
    [/usr/include/openblas/lapacke.h],
    [
        PHP_ADD_INCLUDE(/usr/include/openblas/)
    ],
    ,
    [[#include "/usr/include/openblas/lapacke.h"]]
)
AC_CHECK_HEADERS(
    [/usr/include/lapacke.h],
    [
        PHP_ADD_INCLUDE(/usr/include/)
    ],
    ,
    [[#include "/usr/include/lapacke.h"]]
)


AC_CHECK_HEADERS(
    [/opt/OpenBLAS/include/cblas.h],
    [
        PHP_ADD_INCLUDE(/opt/OpenBLAS/include/)
    ],
    ,
    [[#include "/opt/OpenBLAS/include/cblas.h"]]
)
AC_CHECK_HEADERS(
    [/usr/include/cblas.h],
    [
        PHP_ADD_INCLUDE(/usr/include/)
    ],
    ,
    [[#include "/usr/include/cblas.h"]]
)
AC_CHECK_HEADERS(
    [/usr/include/atlas/cblas.h],
    [
        PHP_ADD_INCLUDE(/usr/include/atlas/)
    ],
    ,
    [[#include "/usr/include/atlas/cblas.h"]]
)
AC_CHECK_HEADERS(
    [/usr/include/openblas/cblas.h],
    [
        PHP_ADD_INCLUDE(/usr/include/openblas/)
    ],
    ,
    [[#include "/usr/include/openblas/cblas.h"]]
)


AC_CHECK_HEADERS(
    [/usr/include/clBLAS.h],
    [
        PHP_ADD_INCLUDE(/usr/include/)
    ],
    ,
    [[#include "/usr/include/clBLAS.h"]]
)

if test "$PHP_CARRAY_OPENCL" != "no"; then
    PHP_CHECK_LIBRARY(clBLAS,clblasSgemm,
    [
      PHP_ADD_LIBRARY(clBLAS,,CARRAY_SHARED_LIBADD)
      AC_DEFINE(HAVE_CLBLAS,1,[Have CLBLAS support])

      PHP_CHECK_LIBRARY(OpenCL,clGetPlatformIDs,
      [
        PHP_ADD_LIBRARY(OpenCL,,CARRAY_SHARED_LIBADD)
        AC_DEFINE(HAVE_OPENCL,1,[Have OpenCL support])
        AC_MSG_RESULT([OpenCL detected ])
      ],[
        AC_MSG_WARN([OpenCL not detected (OpenCL BLAS not available).])
      ],[
        -lOpenCL
      ])
    ],[
      AC_MSG_RESULT([clBLAS not detected (OpenCL BLAS not available).])
    ],[
      -LclBLAS
    ])
fi

PHP_CHECK_LIBRARY(cblas,cblas_sdot,
[
  AC_DEFINE(HAVE_CBLAS,1,[ ])
  AC_DEFINE(HAVE_BLAS,1,[ ])
  PHP_ADD_LIBRARY(cblas,,CARRAY_SHARED_LIBADD)
  AC_MSG_RESULT([CBlas detected ])
],[
  PHP_CHECK_LIBRARY(openblas,cblas_sdot,
  [
    PHP_ADD_LIBRARY(openblas,,CARRAY_SHARED_LIBADD)
    AC_MSG_RESULT([OpenBLAS detected ])
    AC_DEFINE(HAVE_BLAS,1,[ ])
  ],[
    AC_MSG_RESULT([wrong openblas/blas version or library not found.])
  ],[
    -lopenblas
  ])
],[
  -lcblas
])

PHP_CHECK_LIBRARY(lapacke,LAPACKE_sgetrf,
[
  AC_DEFINE(HAVE_LAPACKE,1,[ ])
  PHP_ADD_LIBRARY(lapacke,,CARRAY_SHARED_LIBADD)
],[
  AC_MSG_RESULT([wrong lapacke version or library not found])
],[
  -llapacke
])

PHP_CHECK_LIBRARY(omp,omp_get_num_threads,
[
  AC_DEFINE(HAVE_OMP,1,[ ])
  AC_MSG_RESULT([OpenMP found])
  PHP_ADD_LIBRARY(omp,,CARRAY_SHARED_LIBADD)
],[
  AC_MSG_RESULT([OpenMP not found])
],[
  -fopenmp
])

PHP_NEW_EXTENSION(carray,
	  phpsci.c \
	  kernel/alloc.c \
	  kernel/carray.c \
      kernel/iterators.c \
      kernel/flagsobject.c \
      kernel/assign.c \
      kernel/convert.c \
      kernel/casting.c \
      kernel/linalg.c \
      kernel/calculation.c \
      kernel/shape.c \
      kernel/common/common.c \
      kernel/common/cblas_funcs.c \
      kernel/common/clblas_funcs.c \
      kernel/common/mem_overlap.c \
      kernel/number.c \
      kernel/convert_type.c \
      kernel/trigonometric.c \
      kernel/matlib.c \
      kernel/statistics.c \
      kernel/arraytypes.c \
      kernel/join.c \
      kernel/ctors.c \
      kernel/scalar.c \
      kernel/round.c \
      kernel/getset.c \
      kernel/common/strided_loops.c \
      kernel/convert_datatype.c \
      kernel/dtype_transfer.c \
      kernel/assign_scalar.c \
      kernel/gpu.c \
      kernel/common/exceptions.c \
      kernel/item_selection.c \
      kernel/clip.c \
      kernel/search.c \
      kernel/common/sort.c \
      kernel/interfaces/rubix.c \
      kernel/common/compare.c \
      kernel/exp_logs.c \
      kernel/random.c \
      kernel/storage.c \
      kernel/range.c \
      kernel/random/distributions.c \
      kernel/conversion_utils.c \
	  kernel/buffer.c ,
	  $ext_shared)
  PHP_INSTALL_HEADERS([ext/carray], [phpsci.h, kernel/carray.h, kernel/types.h, kernel/buffer.h])
  PHP_SUBST(CARRAY_SHARED_LIBADD)
fi
