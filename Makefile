srcdir = /home/henrique/Repos/phpsci-ext
builddir = /home/henrique/Repos/phpsci-ext
top_srcdir = /home/henrique/Repos/phpsci-ext
top_builddir = /home/henrique/Repos/phpsci-ext
EGREP = /usr/bin/grep -E
SED = /usr/bin/sed
CONFIGURE_COMMAND = './configure'
CONFIGURE_OPTIONS =
SHLIB_SUFFIX_NAME = so
SHLIB_DL_SUFFIX_NAME = so
AWK = gawk
shared_objects_carray = phpsci.lo kernel/alloc.lo kernel/carray.lo kernel/iterators.lo kernel/flagsobject.lo kernel/assign.lo kernel/convert.lo kernel/casting.lo kernel/linalg.lo kernel/calculation.lo kernel/shape.lo kernel/common/common.lo kernel/common/cblas_funcs.lo kernel/common/clblas_funcs.lo kernel/common/mem_overlap.lo kernel/number.lo kernel/convert_type.lo kernel/trigonometric.lo kernel/matlib.lo kernel/statistics.lo kernel/arraytypes.lo kernel/join.lo kernel/ctors.lo kernel/scalar.lo kernel/round.lo kernel/getset.lo kernel/common/strided_loops.lo kernel/convert_datatype.lo kernel/dtype_transfer.lo kernel/assign_scalar.lo kernel/gpu.lo kernel/common/exceptions.lo kernel/item_selection.lo kernel/clip.lo kernel/search.lo kernel/common/sort.lo kernel/common/compare.lo kernel/exp_logs.lo kernel/random.lo kernel/storage.lo kernel/range.lo kernel/conversion_utils.lo kernel/buffer.lo
PHP_PECL_EXTENSION = carray
CARRAY_SHARED_LIBADD =
PHP_MODULES = $(phplibdir)/carray.la
PHP_ZEND_EX =
all_targets = $(PHP_MODULES) $(PHP_ZEND_EX)
install_targets = install-modules install-headers
prefix = /usr
exec_prefix = $(prefix)
libdir = ${exec_prefix}/lib
prefix = /usr
phplibdir = /home/henrique/Repos/phpsci-ext/modules
phpincludedir = /usr/include/php
CC = cc
CFLAGS = -g -O2 -lopenblas -llapacke -lblas -llapack -lclBLAS -lOpenCL
CFLAGS_CLEAN = $(CFLAGS)
CPP = cc -E
CPPFLAGS = -DHAVE_CONFIG_H
CXX =
CXXFLAGS =
CXXFLAGS_CLEAN = $(CXXFLAGS)
EXTENSION_DIR = /usr/lib/php/modules
PHP_EXECUTABLE = /usr/bin/php
EXTRA_LDFLAGS =
EXTRA_LIBS =
INCLUDES = -I/usr/include/php -I/usr/include/php/main -I/usr/include/php/TSRM -I/usr/include/php/Zend -I/usr/include/php/ext -I/usr/include/php/ext/date/lib -I/usr/include/
LFLAGS =
LDFLAGS =
SHARED_LIBTOOL =
LIBTOOL = $(SHELL) $(top_builddir)/libtool
SHELL = /bin/sh
INSTALL_HEADERS = ext/carray/phpsci.h, ext/carray/kernel/carray.h, ext/carray/kernel/types.h
mkinstalldirs = $(top_srcdir)/build/shtool mkdir -p
INSTALL = $(top_srcdir)/build/shtool install -c
INSTALL_DATA = $(INSTALL) -m 644

DEFS = -DPHP_ATOM_INC -I$(top_builddir)/include -I$(top_builddir)/main -I$(top_srcdir)
COMMON_FLAGS = $(DEFS) $(INCLUDES) $(EXTRA_INCLUDES) $(CPPFLAGS) $(PHP_FRAMEWORKPATH)

all: $(all_targets)
	@echo
	@echo "Build complete."
	@echo "Don't forget to run 'make test'."
	@echo

build-modules: $(PHP_MODULES) $(PHP_ZEND_EX)

build-binaries: $(PHP_BINARIES)

libphp$(PHP_MAJOR_VERSION).la: $(PHP_GLOBAL_OBJS) $(PHP_SAPI_OBJS)
	$(LIBTOOL) --mode=link $(CC) $(CFLAGS) $(EXTRA_CFLAGS) -rpath $(phptempdir) $(EXTRA_LDFLAGS) $(LDFLAGS) $(PHP_RPATHS) $(PHP_GLOBAL_OBJS) $(PHP_SAPI_OBJS) $(EXTRA_LIBS) $(ZEND_EXTRA_LIBS) -o $@
	-@$(LIBTOOL) --silent --mode=install cp $@ $(phptempdir)/$@ >/dev/null 2>&1

libs/libphp$(PHP_MAJOR_VERSION).bundle: $(PHP_GLOBAL_OBJS) $(PHP_SAPI_OBJS)
	$(CC) $(MH_BUNDLE_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS) $(LDFLAGS) $(EXTRA_LDFLAGS) $(PHP_GLOBAL_OBJS:.lo=.o) $(PHP_SAPI_OBJS:.lo=.o) $(PHP_FRAMEWORKS) $(EXTRA_LIBS) $(ZEND_EXTRA_LIBS) -o $@ && cp $@ libs/libphp$(PHP_MAJOR_VERSION).so

install: $(all_targets) $(install_targets)

install-sapi: $(OVERALL_TARGET)
	@echo "Installing PHP SAPI module:       $(PHP_SAPI)"
	-@$(mkinstalldirs) $(INSTALL_ROOT)$(bindir)
	-@if test ! -r $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME); then \
		for i in 0.0.0 0.0 0; do \
			if test -r $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME).$$i; then \
				$(LN_S) $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME).$$i $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME); \
				break; \
			fi; \
		done; \
	fi
	@$(INSTALL_IT)

install-binaries: build-binaries $(install_binary_targets)

install-modules: build-modules
	@test -d modules && \
	$(mkinstalldirs) $(INSTALL_ROOT)$(EXTENSION_DIR)
	@echo "Installing shared extensions:     $(INSTALL_ROOT)$(EXTENSION_DIR)/"
	@rm -f modules/*.la >/dev/null 2>&1
	@$(INSTALL) modules/* $(INSTALL_ROOT)$(EXTENSION_DIR)

install-headers:
	-@if test "$(INSTALL_HEADERS)"; then \
		for i in `echo $(INSTALL_HEADERS)`; do \
			i=`$(top_srcdir)/build/shtool path -d $$i`; \
			paths="$$paths $(INSTALL_ROOT)$(phpincludedir)/$$i"; \
		done; \
		$(mkinstalldirs) $$paths && \
		echo "Installing header files:          $(INSTALL_ROOT)$(phpincludedir)/" && \
		for i in `echo $(INSTALL_HEADERS)`; do \
			if test "$(PHP_PECL_EXTENSION)"; then \
				src=`echo $$i | $(SED) -e "s#ext/$(PHP_PECL_EXTENSION)/##g"`; \
			else \
				src=$$i; \
			fi; \
			if test -f "$(top_srcdir)/$$src"; then \
				$(INSTALL_DATA) $(top_srcdir)/$$src $(INSTALL_ROOT)$(phpincludedir)/$$i; \
			elif test -f "$(top_builddir)/$$src"; then \
				$(INSTALL_DATA) $(top_builddir)/$$src $(INSTALL_ROOT)$(phpincludedir)/$$i; \
			else \
				(cd $(top_srcdir)/$$src && $(INSTALL_DATA) *.h $(INSTALL_ROOT)$(phpincludedir)/$$i; \
				cd $(top_builddir)/$$src && $(INSTALL_DATA) *.h $(INSTALL_ROOT)$(phpincludedir)/$$i) 2>/dev/null || true; \
			fi \
		done; \
	fi

PHP_TEST_SETTINGS = -d 'open_basedir=' -d 'output_buffering=0' -d 'memory_limit=-1'
PHP_TEST_SHARED_EXTENSIONS =  ` \
	if test "x$(PHP_MODULES)" != "x"; then \
		for i in $(PHP_MODULES)""; do \
			. $$i; $(top_srcdir)/build/shtool echo -n -- " -d extension=$$dlname"; \
		done; \
	fi; \
	if test "x$(PHP_ZEND_EX)" != "x"; then \
		for i in $(PHP_ZEND_EX)""; do \
			. $$i; $(top_srcdir)/build/shtool echo -n -- " -d zend_extension=$(top_builddir)/modules/$$dlname"; \
		done; \
	fi`
PHP_DEPRECATED_DIRECTIVES_REGEX = '^(magic_quotes_(gpc|runtime|sybase)?|(zend_)?extension(_debug)?(_ts)?)[\t\ ]*='

test: all
	@if test ! -z "$(PHP_EXECUTABLE)" && test -x "$(PHP_EXECUTABLE)"; then \
		INI_FILE=`$(PHP_EXECUTABLE) -d 'display_errors=stderr' -r 'echo php_ini_loaded_file();' 2> /dev/null`; \
		if test "$$INI_FILE"; then \
			$(EGREP) -h -v $(PHP_DEPRECATED_DIRECTIVES_REGEX) "$$INI_FILE" > $(top_builddir)/tmp-php.ini; \
		else \
			echo > $(top_builddir)/tmp-php.ini; \
		fi; \
		INI_SCANNED_PATH=`$(PHP_EXECUTABLE) -d 'display_errors=stderr' -r '$$a = explode(",\n", trim(php_ini_scanned_files())); echo $$a[0];' 2> /dev/null`; \
		if test "$$INI_SCANNED_PATH"; then \
			INI_SCANNED_PATH=`$(top_srcdir)/build/shtool path -d $$INI_SCANNED_PATH`; \
			$(EGREP) -h -v $(PHP_DEPRECATED_DIRECTIVES_REGEX) "$$INI_SCANNED_PATH"/*.ini >> $(top_builddir)/tmp-php.ini; \
		fi; \
		TEST_PHP_EXECUTABLE=$(PHP_EXECUTABLE) \
		TEST_PHP_SRCDIR=$(top_srcdir) \
		CC="$(CC)" \
			$(PHP_EXECUTABLE) -n -c $(top_builddir)/tmp-php.ini $(PHP_TEST_SETTINGS) $(top_srcdir)/run-tests.php -n -c $(top_builddir)/tmp-php.ini -d extension_dir=$(top_builddir)/modules/ $(PHP_TEST_SHARED_EXTENSIONS) $(TESTS); \
		TEST_RESULT_EXIT_CODE=$$?; \
		rm $(top_builddir)/tmp-php.ini; \
		exit $$TEST_RESULT_EXIT_CODE; \
	else \
		echo "ERROR: Cannot run tests without CLI sapi."; \
	fi

clean:
	find . -name \*.gcno -o -name \*.gcda | xargs rm -f
	find . -name \*.lo -o -name \*.o | xargs rm -f
	find . -name \*.la -o -name \*.a | xargs rm -f
	find . -name \*.so | xargs rm -f
	find . -name .libs -a -type d|xargs rm -rf
	rm -f libphp$(PHP_MAJOR_VERSION).la $(SAPI_CLI_PATH) $(SAPI_CGI_PATH) $(SAPI_LITESPEED_PATH) $(SAPI_FPM_PATH) $(OVERALL_TARGET) modules/* libs/*

distclean: clean
	rm -f Makefile config.cache config.log config.status Makefile.objects Makefile.fragments libtool main/php_config.h main/internal_functions_cli.c main/internal_functions.c Zend/zend_dtrace_gen.h Zend/zend_dtrace_gen.h.bak Zend/zend_config.h
	rm -f main/build-defs.h scripts/phpize
	rm -f ext/date/lib/timelib_config.h ext/mbstring/libmbfl/config.h ext/oci8/oci8_dtrace_gen.h ext/oci8/oci8_dtrace_gen.h.bak
	rm -f scripts/man1/phpize.1 scripts/php-config scripts/man1/php-config.1 sapi/cli/php.1 sapi/cgi/php-cgi.1 sapi/phpdbg/phpdbg.1 ext/phar/phar.1 ext/phar/phar.phar.1
	rm -f sapi/fpm/php-fpm.conf sapi/fpm/init.d.php-fpm sapi/fpm/php-fpm.service sapi/fpm/php-fpm.8 sapi/fpm/status.html
	rm -f ext/iconv/php_have_bsd_iconv.h ext/iconv/php_have_glibc_iconv.h ext/iconv/php_have_ibm_iconv.h ext/iconv/php_have_iconv.h ext/iconv/php_have_libiconv.h ext/iconv/php_iconv_aliased_libiconv.h ext/iconv/php_iconv_supports_errno.h ext/iconv/php_php_iconv_h_path.h ext/iconv/php_php_iconv_impl.h
	rm -f ext/phar/phar.phar ext/phar/phar.php
	if test "$(srcdir)" != "$(builddir)"; then \
	  rm -f ext/phar/phar/phar.inc; \
	fi
	$(EGREP) define'.*include/php' $(top_srcdir)/configure | $(SED) 's/.*>//'|xargs rm -f

prof-gen:
	CCACHE_DISABLE=1 $(MAKE) PROF_FLAGS=-fprofile-generate all

prof-clean:
	find . -name \*.lo -o -name \*.o | xargs rm -f
	find . -name \*.la -o -name \*.a | xargs rm -f
	find . -name \*.so | xargs rm -f
	rm -f libphp$(PHP_MAJOR_VERSION).la $(SAPI_CLI_PATH) $(SAPI_CGI_PATH) $(SAPI_LITESPEED_PATH) $(SAPI_FPM_PATH) $(OVERALL_TARGET) modules/* libs/*

prof-use:
	CCACHE_DISABLE=1 $(MAKE) PROF_FLAGS=-fprofile-use all


.PHONY: all clean install distclean test prof-gen prof-clean prof-use
.NOEXPORT:
phpsci.lo: /home/henrique/Repos/phpsci-ext/phpsci.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/phpsci.c -o phpsci.lo 
kernel/alloc.lo: /home/henrique/Repos/phpsci-ext/kernel/alloc.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/alloc.c -o kernel/alloc.lo 
kernel/carray.lo: /home/henrique/Repos/phpsci-ext/kernel/carray.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/carray.c -o kernel/carray.lo 
kernel/iterators.lo: /home/henrique/Repos/phpsci-ext/kernel/iterators.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/iterators.c -o kernel/iterators.lo 
kernel/flagsobject.lo: /home/henrique/Repos/phpsci-ext/kernel/flagsobject.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/flagsobject.c -o kernel/flagsobject.lo 
kernel/assign.lo: /home/henrique/Repos/phpsci-ext/kernel/assign.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/assign.c -o kernel/assign.lo 
kernel/convert.lo: /home/henrique/Repos/phpsci-ext/kernel/convert.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/convert.c -o kernel/convert.lo 
kernel/casting.lo: /home/henrique/Repos/phpsci-ext/kernel/casting.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/casting.c -o kernel/casting.lo 
kernel/linalg.lo: /home/henrique/Repos/phpsci-ext/kernel/linalg.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/linalg.c -o kernel/linalg.lo 
kernel/calculation.lo: /home/henrique/Repos/phpsci-ext/kernel/calculation.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/calculation.c -o kernel/calculation.lo 
kernel/shape.lo: /home/henrique/Repos/phpsci-ext/kernel/shape.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/shape.c -o kernel/shape.lo 
kernel/common/common.lo: /home/henrique/Repos/phpsci-ext/kernel/common/common.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/common/common.c -o kernel/common/common.lo 
kernel/common/cblas_funcs.lo: /home/henrique/Repos/phpsci-ext/kernel/common/cblas_funcs.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/common/cblas_funcs.c -o kernel/common/cblas_funcs.lo 
kernel/common/clblas_funcs.lo: /home/henrique/Repos/phpsci-ext/kernel/common/clblas_funcs.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/common/clblas_funcs.c -o kernel/common/clblas_funcs.lo 
kernel/common/mem_overlap.lo: /home/henrique/Repos/phpsci-ext/kernel/common/mem_overlap.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/common/mem_overlap.c -o kernel/common/mem_overlap.lo 
kernel/number.lo: /home/henrique/Repos/phpsci-ext/kernel/number.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/number.c -o kernel/number.lo 
kernel/convert_type.lo: /home/henrique/Repos/phpsci-ext/kernel/convert_type.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/convert_type.c -o kernel/convert_type.lo 
kernel/trigonometric.lo: /home/henrique/Repos/phpsci-ext/kernel/trigonometric.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/trigonometric.c -o kernel/trigonometric.lo 
kernel/matlib.lo: /home/henrique/Repos/phpsci-ext/kernel/matlib.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/matlib.c -o kernel/matlib.lo 
kernel/statistics.lo: /home/henrique/Repos/phpsci-ext/kernel/statistics.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/statistics.c -o kernel/statistics.lo 
kernel/arraytypes.lo: /home/henrique/Repos/phpsci-ext/kernel/arraytypes.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/arraytypes.c -o kernel/arraytypes.lo 
kernel/join.lo: /home/henrique/Repos/phpsci-ext/kernel/join.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/join.c -o kernel/join.lo 
kernel/ctors.lo: /home/henrique/Repos/phpsci-ext/kernel/ctors.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/ctors.c -o kernel/ctors.lo 
kernel/scalar.lo: /home/henrique/Repos/phpsci-ext/kernel/scalar.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/scalar.c -o kernel/scalar.lo 
kernel/round.lo: /home/henrique/Repos/phpsci-ext/kernel/round.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/round.c -o kernel/round.lo 
kernel/getset.lo: /home/henrique/Repos/phpsci-ext/kernel/getset.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/getset.c -o kernel/getset.lo 
kernel/common/strided_loops.lo: /home/henrique/Repos/phpsci-ext/kernel/common/strided_loops.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/common/strided_loops.c -o kernel/common/strided_loops.lo 
kernel/convert_datatype.lo: /home/henrique/Repos/phpsci-ext/kernel/convert_datatype.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/convert_datatype.c -o kernel/convert_datatype.lo 
kernel/dtype_transfer.lo: /home/henrique/Repos/phpsci-ext/kernel/dtype_transfer.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/dtype_transfer.c -o kernel/dtype_transfer.lo 
kernel/assign_scalar.lo: /home/henrique/Repos/phpsci-ext/kernel/assign_scalar.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/assign_scalar.c -o kernel/assign_scalar.lo 
kernel/gpu.lo: /home/henrique/Repos/phpsci-ext/kernel/gpu.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/gpu.c -o kernel/gpu.lo 
kernel/common/exceptions.lo: /home/henrique/Repos/phpsci-ext/kernel/common/exceptions.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/common/exceptions.c -o kernel/common/exceptions.lo 
kernel/item_selection.lo: /home/henrique/Repos/phpsci-ext/kernel/item_selection.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/item_selection.c -o kernel/item_selection.lo 
kernel/clip.lo: /home/henrique/Repos/phpsci-ext/kernel/clip.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/clip.c -o kernel/clip.lo 
kernel/search.lo: /home/henrique/Repos/phpsci-ext/kernel/search.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/search.c -o kernel/search.lo 
kernel/common/sort.lo: /home/henrique/Repos/phpsci-ext/kernel/common/sort.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/common/sort.c -o kernel/common/sort.lo 
kernel/common/compare.lo: /home/henrique/Repos/phpsci-ext/kernel/common/compare.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/common/compare.c -o kernel/common/compare.lo 
kernel/exp_logs.lo: /home/henrique/Repos/phpsci-ext/kernel/exp_logs.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/exp_logs.c -o kernel/exp_logs.lo 
kernel/random.lo: /home/henrique/Repos/phpsci-ext/kernel/random.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/random.c -o kernel/random.lo 
kernel/storage.lo: /home/henrique/Repos/phpsci-ext/kernel/storage.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/storage.c -o kernel/storage.lo 
kernel/range.lo: /home/henrique/Repos/phpsci-ext/kernel/range.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/range.c -o kernel/range.lo 
kernel/conversion_utils.lo: /home/henrique/Repos/phpsci-ext/kernel/conversion_utils.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/conversion_utils.c -o kernel/conversion_utils.lo 
kernel/buffer.lo: /home/henrique/Repos/phpsci-ext/kernel/buffer.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/henrique/Repos/phpsci-ext $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/henrique/Repos/phpsci-ext/kernel/buffer.c -o kernel/buffer.lo 
$(phplibdir)/carray.la: ./carray.la
	$(LIBTOOL) --mode=install cp ./carray.la $(phplibdir)

./carray.la: $(shared_objects_carray) $(CARRAY_SHARED_DEPENDENCIES)
	$(LIBTOOL) --mode=link $(CC) $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS) $(LDFLAGS)  -o $@ -export-dynamic -avoid-version -prefer-pic -module -rpath $(phplibdir) $(EXTRA_LDFLAGS) $(shared_objects_carray) $(CARRAY_SHARED_LIBADD)

