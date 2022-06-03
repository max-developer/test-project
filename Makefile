
up:
	docker-compose up -d

down:
	docker-compose down

console:
	docker-compose exec -u $$(id -u) php bash

generate:
	docker-compose exec -u $$(id -u) php php command redis generate

