#!/bin/bash

# Container da aplicação
docker run --name mentoria -p 8083:80 --env-file /home/laugusto/Projects/mentoria/env -itd -v /home/laugusto/Projects/mentoria:/var/www/app php7-nginx
