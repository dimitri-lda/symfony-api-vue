FROM php:8.2-fpm

# Установка системных зависимостей и расширений
RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql

# Установка Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Копируем конфигурацию Xdebug
COPY ./docker/php/conf.d/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
