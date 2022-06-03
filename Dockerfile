FROM php:7.4-cli

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

RUN apt-get update && apt-get install -y curl git subversion mercurial

RUN install-php-extensions redis
RUN install-php-extensions memcached

WORKDIR /var/www
