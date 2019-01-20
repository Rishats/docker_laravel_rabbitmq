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
RUN docker-php-ext-install bcmath

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
    supervisor \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN mkdir -p /var/log/supervisor /app/storage/logs

COPY laravel-queue-supervisor.conf /etc/supervisor/conf.d/laravel-queue.conf

VOLUME ["/var/log/supervisor", "/app/storage/logs"]

WORKDIR /app

CMD bash -c "cp .env.example .env && php artisan key:generate && php artisan migrate && composer install && php-fpm && /usr/bin/supervisord "