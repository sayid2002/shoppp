FROM php:8.2-fpm-alpine AS php

WORKDIR /var/www/html

# Install system dependencies and PHP extensions in one go
RUN apk add --no-cache \
        git \
        curl \
        postgresql-dev \
        libpq \
        icu-dev \
        libpng-dev \
        libjpeg-turbo-dev \
        libfreetype-dev \
        libzip-dev \
        unzip \
        bash \
    && apk add --no-cache --virtual .build-deps \
        libtool \
        autoconf \
        make \
        g++ \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/include/pgsql \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) pdo pdo_pgsql gd intl bcmath xml json zip opcache \
    && apk del .build-deps

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . /var/www/html

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-plugins --no-scripts --prefer-dist \
    && composer clear-cache

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
