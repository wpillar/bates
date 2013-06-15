# Default task
all: install

# Install dependencies
install:
	@php composer.phar install --dev

# Run test suite
test:
	@./vendor/bin/phpunit
