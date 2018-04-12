.PHONY: ci test prerequisites

# Use any most recent PHP version
PHP=$(shell which php7.2 || which php7.1 || which php)

# Default parallelism
JOBS=$(shell nproc)

# Default silencer if installed
SILENT= # disabled $(shell which chronic)

# PHP CS Fixer
PHP_CS_FIXER=build/php-cs-fixer-v2.phar
PHP_CS_FIXER_ARGS=--cache-file=build/cache/.php_cs.cache --verbose
export PHP_CS_FIXER_IGNORE_ENV=1

# PHPUnit
PHPUNIT=vendor/bin/phpunit
PHPUNIT_ARGS=--coverage-xml=coverage/coverage-xml --log-junit=coverage/phpunit.junit.xml

# Phan
PHAN=build/phan.phar
PHAN_ARGS=-j $(JOBS) --allow-polyfill-parser
PHAN_PHP_VERSION=7.1
export PHAN_DISABLE_XDEBUG_WARN=1

# PHPStan
PHPSTAN=build/phpstan.phar
PHPSTAN_ARGS=analyse src tests --level=2 -c .phpstan.neon

# Composer
COMPOSER=$(PHP) $(shell which composer)

# Infection
INFECTION=build/infection.phar
MIN_MSI=70
MIN_COVERED_MSI=80
INFECTION_ARGS=--min-msi=$(MIN_MSI) --min-covered-msi=$(MIN_COVERED_MSI) --threads=$(JOBS) --coverage=coverage

all: test

##############################################################
# Continuous Integration                                     #
##############################################################

ci: SILENT=
ci: prerequisites ci-phpunit ci-analyze

ci-phpunit: ci-cs
	$(SILENT) $(PHP) $(PHPUNIT) $(PHPUNIT_ARGS)
	$(SILENT) $(PHP) $(INFECTION) $(INFECTION_ARGS) || true

ci-analyze: ci-cs
	$(SILENT) $(PHP) $(PHPSTAN) $(PHPSTAN_ARGS) --no-progress || true
	$(SILENT) $(PHP) $(PHAN) $(PHAN_ARGS) || true

ci-cs: prerequisites
	$(SILENT) $(PHP) $(PHP_CS_FIXER) $(PHP_CS_FIXER_ARGS) --dry-run --stop-on-violation fix

##############################################################
# Development Workflow                                       #
##############################################################

test: phpunit analyze
	$(SILENT) $(COMPOSER) validate || true

test-prerequisites: prerequisites composer.lock

phpunit: cs
	$(SILENT) $(PHP) $(PHPUNIT) $(PHPUNIT_ARGS) --verbose
	$(SILENT) $(PHP) $(INFECTION) $(INFECTION_ARGS) --log-verbosity=2 --show-mutations

analyze: cs
	$(SILENT) $(PHP) $(PHPSTAN) $(PHPSTAN_ARGS) || true
	$(SILENT) $(PHP) $(PHAN) $(PHAN_ARGS) --color || true

cs: test-prerequisites
	$(SILENT) $(PHP) $(PHP_CS_FIXER) $(PHP_CS_FIXER_ARGS) --diff fix

##############################################################
# Prerequisites Setup                                        #
##############################################################

# We need both vendor/autoload.php and composer.lock being up to date
.PHONY: prerequisites
prerequisites: report-php-version build/cache vendor/autoload.php .phan composer.lock tools

# Do install if there's no 'vendor'
vendor/autoload.php:
	$(SILENT) $(COMPOSER) install --prefer-dist

# If composer.lock is older than `composer.json`, do update,
# and touch composer.lock because composer not always does that
composer.lock: composer.json
	$(SILENT) $(COMPOSER) update && touch composer.lock

.phan: $(PHAN)
	$(PHP) $(PHAN) --init --init-level=1 --init-overwrite --target-php-version=$(PHAN_PHP_VERSION) > /dev/null

build: build/cache
build/cache:
	mkdir -p build/cache

.PHONY: report-php-version
report-php-version:
	# Using $(PHP)

.PHONY: tools
tools: $(PHAN) $(PHP_CS_FIXER) $(PHPSTAN) $(INFECTION)

WGET=wget -nv -O

$(PHP_CS_FIXER):
	mkdir -p build
	$(WGET) $@ https://cs.sensiolabs.org/download/php-cs-fixer-v2.phar
	chmod +x $@
	touch $@

$(PHPSTAN):
	mkdir -p build
	$(WGET) $@ https://github.com/phpstan/phpstan/releases/download/0.9.1/phpstan.phar
	chmod +x $@
	touch $@

$(PHAN):
	mkdir -p build
	$(WGET) $@ https://github.com/phan/phan/releases/download/0.12.5/phan.phar
	chmod +x $@
	touch $@

$(INFECTION):
	mkdir -p build
	$(WGET) $@ https://github.com/infection/infection/releases/download/0.8.0/infection.phar
	$(WGET) build/infection.phar.pubkey https://github.com/infection/infection/releases/download/0.8.0/infection.phar.pubkey
	chmod +x build/infection.phar

##############################################################
# Quick development testing procedure                        #
##############################################################

PHP_VERSIONS=php7.1 php7.2

.PHONY: quick
quick:
	make --no-print-directory -j test-all

.PHONY: test-all
test-all: $(PHP_VERSIONS)

.PHONY: $(PHP_VERSIONS)
$(PHP_VERSIONS): cs
	@make --no-print-directory PHP=$@ PHP_CS_FIXER=/bin/true
