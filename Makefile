start:
	@sh artisan.sh  serve --port 8080 --host 0.0.0.0

docker-stop:
	@docker-compose down

docker-start:
	@docker-compose down
	@docker-compose up -d --build

deploy-app:
	@$(MAKE) docker-start
	@$(MAKE) start
