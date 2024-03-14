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

up:
	@$(MAKE) start
	@$(MAKE) composeri
	@#$(MAKE) npmi
	@$(MAKE) won

composeri:
	@$(MAKE) composer-install

composer-install:
	docker-compose run --rm php-fpm composer install

npmi:
	@$(MAKE) npm-install

npm-install:
	docker-compose run --rm php-fpm npm install

npmd:
	@$(MAKE) npm-dev

npm-dev:
	docker-compose run --rm php-fpm npm run dev

npmp:
	@$(MAKE) npm-production

npm-production:
	docker-compose run --rm php-fpm npm run production

tailwind:
	docker-compose run --rm php-fpm npx tailwindcss -i ./resources/css/app.css -o ./public/dist/css/app.css
	@$(MAKE) won

migrate:
	@$(MAKE) artisan-migrate

artisan-migrate:
	docker-compose run --rm php-fpm php artisan migrate

seed:
	@$(MAKE) artisan-seed

artisan-seed:
	docker-compose run --rm php-fpm php artisan db:seed

logs:
	docker-compose logs -f

tinker:
	docker-compose run --rm php-fpm php artisan tinker

stan:
	docker-compose run --rm php-fpm ./vendor/bin/phpstan analyse

pest:
	docker-compose run --rm php-fpm ./vendor/bin/pest

test:
	docker-compose run --rm php-fpm ./vendor/bin/phpunit

pint:
	docker-compose run --rm php-fpm ./vendor/bin/pint

all:
	@$(MAKE) pint
	@$(MAKE) stan
	@$(MAKE) pest

clean:
	rm -rf vendor
	rm -rf src/vendor
	rm -rf src/storage
	rm -f src/.env
	docker-compose down
