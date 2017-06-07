FROM debian:stretch-slim
MAINTAINER Vanildo Souto Mangueira
RUN apt-get update
RUN apt-get install -y nginx
RUN apt-get install -y php-fpm php-xdebug php-gd php-dev php-pear php-mcrypt php-mbstring php-mysql php-json php-xml php-zip php-sqlite3
RUN apt-get install -y vim
COPY default /etc/nginx/sites-available/default
COPY env /root/env
CMD bash /root/env && service nginx start && service php7.0-fpm start && /bin/bash
