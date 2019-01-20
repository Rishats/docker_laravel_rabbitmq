FROM php:7.3-fpm

RUN apt-get update

# curl уже входит в образ 5.6-fpm но на всякие пожарные попробуем установить
RUN apt-get install -y \
	curl \
	libcurl4-openssl-dev \
	git \
	zip \
	unzip \
	libmcrypt-dev

# Устанавливаем все расширения

RUN docker-php-ext-install pdo_mysql

# Устанавливаем composer

WORKDIR /app

# Копируем конфиги и устанавливает зависимости - используем вендор так как были проблемы с пакетами используя composer install

CMD bash -c "cp .env.example .env && php artisan key:generate && php artisan migrate && php-fpm"
