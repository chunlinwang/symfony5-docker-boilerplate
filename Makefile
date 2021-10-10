ALL_SERVICES := ${CORE_SERVICES} 

COMPOSE_ALL_FILES := ${CORE_SERVICES_FILES}
CORE_SERVICES_FILES := -f docker-compose.yml
SERVICE=app

# --------------------------

build:
	@docker-compose ${COMPOSE_ALL_FILES} up -d --build ${ALL_SERVICES}

down:
	@docker-compose ${COMPOSE_ALL_FILES} down

stop:
	@docker-compose ${COMPOSE_ALL_FILES} stop 

restart:
	@docker-compose ${COMPOSE_ALL_FILES} restart 

rm:
	@docker-compose $(COMPOSE_ALL_FILES) rm -f 

logs:
	@docker-compose $(COMPOSE_ALL_FILES) logs --follow --tail=1000 

images:
	@docker-compose $(COMPOSE_ALL_FILES) images 

clean: ## Remove all Containers and Delete Volume Data
	@docker-compose ${COMPOSE_ALL_FILES} down -v

install: ## Install project
	@docker-compose exec app bash -ic "composer install" 

cc: ## Clean cache
	@docker-compose exec app bash -ic "php bin/console c:c" 

cli: ## Clean cache
	@docker-compose exec $(SERVICE) sh