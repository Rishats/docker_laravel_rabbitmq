FROM php:7.3-fpm

RUN apt-get update

RUN apt-get install -y \
	curl \
	libcurl4-openssl-dev \
	git \
	zip \
	unzip \
	libmcrypt-dev

RUN docker-php-ext-install pdo_mysql

WORKDIR /app

CMD bash -c "cp .env.example .env && php artisan key:generate && php artisan migrate && php-fpm"
