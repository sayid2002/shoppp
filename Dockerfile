FROM php:8.2-fpm-alpine as php

# Set the working directory
WORKDIR /var/www/html

# Install system dependencies, including PHP extensions
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    libzip-dev \
    freetype-dev \
    icu-dev \
    libxml2-dev \
    libxslt-dev \
    postgresql-dev \
    postgresql-client \
    bash \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql zip exif pcntl intl bcmath xml xsl opcache \
    && docker-php-ext-enable gd intl opcache

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the application files to the container
COPY . /var/www/html

# Install PHP dependencies with Composer, without dev dependencies and optimizing autoloader
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-plugins \
    && composer clear-cache

# Set appropriate permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Expose the port that PHP-FPM will run on
EXPOSE 9000

# Start the PHP-FPM server
CMD ["php-fpm"]
