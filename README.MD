<img src="https://i.imgur.com/QoIbhqj.png" alt="PHPSci CArray Logo" width="400"/>

# PHPSci CArray Extension

PHPSci CArray is a high-performance scientific computing library for PHP developed in C and based on the original NumPy code. CArrays offer a solid alternative to PHP arrays as well as compatibility with codes developed using NumPy.

- High Performance Indexing and Data Access
- Low memory footprint compared to PHP Arrays
- Efficient shape, initializers, linear algebra and mathematical methods.
- Out of the box GPU integration (Cuda)

--------------------------------------------------------------------------------

## Installing

It's really easy to compile this extension using Linux environments.

### Requirements

- php-devel (php-dev)
- PHP 7.2
- OpenBLAS

### Optional

- cuBLAS (For GPU Integration)

### Ubuntu 20.04

```commandline
$ sudo add-apt-repository -y ppa:ondrej/php
$ sudo apt-get update
$ sudo apt-get install libopenblas-dev libatlas-base-dev liblapacke-dev php7.4-dev
$ phpize
$ ./configure
$ make test
$ sudo make install
$ echo 'extension=carray' | sudo tee /etc/php/7.4/cli/conf.d/20-carray.ini
$ echo 'extension=carray' | sudo tee /etc/php/7.4/fpm/conf.d/20-carray.ini
$ echo 'extension=carray' | sudo tee /etc/php/7.4/cgi/conf.d/20-carray.ini
$ echo 'extension=carray' | sudo tee /etc/php/7.4/apache2/conf.d/20-carray.ini
```

### Ubuntu 16.04

```commandline
$ add-apt-repository -y ppa:ondrej/php
$ apt-get update
$ apt-get install libblas-dev libatlas-base-dev liblapacke-dev php7.2-dev
$ phpize
$ ./configure
$ make test
$ make install
```

### Ubuntu 14.04

```commandline
$ add-apt-repository -y ppa:ondrej/php
$ apt-get update
$ apt-get install libopenblas-dev liblapacke-dev php7.2-dev
$ phpize
$ ./configure
$ make test
$ make install
```

> Don't forget to check if the extension is enabled in your php.ini file.

> **Apache/NGINX Users:** Don't forget to restart your services.
