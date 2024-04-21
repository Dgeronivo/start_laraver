start:
	@php artisan serve --port 8000

docker-start:
	@docker-compose up -d --build
docker-stop:
	@docker-compose down
docker-restart:
	@docker-compose down
	@docker-compose up -d --build
