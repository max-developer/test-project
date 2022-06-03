
up:
	docker-compose up -d

console:
	docker-compose exec -u $$(id -u) php bash

