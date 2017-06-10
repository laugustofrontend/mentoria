#!/bin/bash

# Container da aplicação
docker run --name mentoria -p 8083:80 --env-file /home/laugusto/Mentoria/mentoria-vanildo/env -itd -v /home/laugusto/Mentoria/mentoria-vanildo:/var/www/app php7-nginx
