start:
	@sh artisan.sh  serve --port 8080 --host 0.0.0.0

docker-start:
	@docker-compose up -d --build
docker-stop:
	@docker-compose down
docker-restart:
	@docker-compose down
	@docker-compose up -d --build
