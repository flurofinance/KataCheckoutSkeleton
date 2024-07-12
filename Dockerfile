FROM php:8.3-fpm-alpine

COPY . /app
WORKDIR /app

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

CMD [ "php", "./app/Checkout.php" ]