FROM php:8.3-cli

# Install GD dengan WebP support
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    apt-get update --fix-missing && \
    apt-get install -y \
        libgd-dev \
        libwebp-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libsqlite3-dev \
    && docker-php-ext-configure gd --with-webp --with-jpeg \
    && docker-php-ext-install gd pdo pdo_sqlite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install

CMD ["sh", "-c" , "php artisan storage:link && php-fpm", "php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
