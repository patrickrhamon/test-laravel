.PHONY: help

help:
	@echo "Available targets:"
	@echo "  start                 - Build and start the Docker containers"
	@echo "  stop                  - Stop the Docker containers"
	@echo "  down                  - Stop and remove the Docker containers"
	@echo "  composer-install      - Install Composer dependencies"
	@echo "  artisan-migrate       - Run Laravel database migrations"
	@echo "  artisan-seed          - Seed the Laravel database"
	@echo "  test                  - Run Laravel tests"
	@echo "  logs                  - Show Docker container logs"
	@echo "  clean                 - Remove generated files and directories"

won:
	docker-compose run --rm php-fpm chmod 777 -Rf .

start:
	docker-compose up -d

stop:
	docker-compose stop

down:
	docker-compose down

composer-i:
	@$(MAKE) composer-install

composer-install:
	docker-compose run --rm php-fpm composer install

migrate:
	@$(MAKE) artisan-migrate

artisan-migrate:
	docker-compose run --rm php-fpm php artisan migrate

seed:
	@$(MAKE) artisan-seed

artisan-seed:
	docker-compose run --rm php-fpm php artisan db:seed

test:
	docker-compose run --rm php-fpm ./vendor/bin/phpunit

logs:
	docker-compose logs -f

stan:
	docker-compose run --rm php-fpm ./vendor/bin/phpstan analyse --memory-limit=2G

pest:
	docker-compose run --rm php-fpm ./vendor/bin/pest

pint:
	docker-compose run --rm php-fpm ./vendor/bin/pint

clean:
	rm -rf vendor
	rm -rf src/vendor
	rm -rf src/storage
	rm -f src/.env
	docker-compose down
