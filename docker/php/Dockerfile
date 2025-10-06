# PHP 8.3 FPM image for Symfony
FROM php:8.3-fpm-bullseye

# Persistent dependencies and tools
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git unzip libicu-dev libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) \
        intl \
        pdo_mysql \
        opcache \
        zip \
    && rm -rf /var/lib/apt/lists/*

# Copy Composer from the official image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Recommended PHP settings for Symfony
RUN { \
  echo "memory_limit=512M"; \
  echo "opcache.enable=1"; \
  echo "opcache.preload_user=www-data"; \
  echo "opcache.interned_strings_buffer=16"; \
  echo "opcache.max_accelerated_files=20000"; \
  echo "opcache.validate_timestamps=1"; \
  echo "opcache.revalidate_freq=0"; \
} > /usr/local/etc/php/conf.d/symfony.ini

# Default user
USER www-data
