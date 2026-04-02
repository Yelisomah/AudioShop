FROM php:8.2-fpm


Run apt-get update && apt-get install -y \
    igt curl zip unzip libpng-dev libonig-dev libxml2-dev
    

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/wwww

COPY . .

RUN composer install --no-dev --optimize-autoloader

EXPOSE 9000

CMD ["php-fpm"] 