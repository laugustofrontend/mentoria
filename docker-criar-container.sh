#!/bin/bash

# Container da aplicação
docker run --name mentoria -p 8083:80 --env-file $(pwd)/$(dirname $0)/env -itd -v $(pwd)/$(dirname $0):/var/www/app php7-nginx
