@default:
	docker build -t php7-nginx docker/
	./docker-criar-container.sh
