# Default task
all: install

# Install dependencies
install:
	@composer install --dev

# Run test suite
test-unit:
	@./vendor/bin/phpunit --testsuite unit
