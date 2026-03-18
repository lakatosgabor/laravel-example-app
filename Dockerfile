FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql ftp zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN mkdir -p storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

RUN chmod -R 775 storage bootstrap/cache || true

RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

RUN npm install
RUN npm run build

EXPOSE 8080

CMD ["sh", "-c", "php artisan config:clear || true && php artisan route:clear || true && php artisan view:clear || true && php artisan migrate --force || true && php artisan serve --host=0.0.0.0 --port=8080"]