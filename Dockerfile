# Use PHP 7.4 image instead of PHP 8.2
FROM php:7.4-fpm-alpine as builder

# Set the working directory
WORKDIR /var/www/html

# Install necessary build dependencies and PHP extensions
RUN apk add --no-cache \
    git \
    libpng-dev \
    libjpeg-turbo-dev \
    libzip-dev \
    freetype-dev \
    icu-dev \
    libxml2-dev \
    libxslt-dev \
    postgresql-dev \
    bash \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install gd pdo pdo_pgsql zip exif pcntl intl bcmath xml xsl opcache

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts --prefer-dist

# Final Stage
FROM php:7.4-fpm-alpine

# Set the working directory
WORKDIR /var/www/html

# Install runtime dependencies
RUN apk add --no-cache \
    libpng \
    libjpeg-turbo \
    libzip \
    freetype \
    icu \
    libxml2 \
    libxslt \
    postgresql-client \
    bash

# Copy necessary files from the builder stage
COPY --from=builder /usr/local/lib/php/extensions /usr/local/lib/php/extensions
COPY --from=builder /usr/local/bin/composer /usr/local/bin/composer
COPY --from=builder /var/www/html/vendor /var/www/html/vendor

# Copy the rest of the application files to the container
COPY . .

# Set appropriate permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Expose the port for PHP-FPM
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
