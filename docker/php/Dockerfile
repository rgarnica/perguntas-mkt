FROM php:7.2-fpm

RUN apt-get update && apt-get install -y zip unzip git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql

RUN chown -R www-data:www-data /var/www
RUN chmod 755 /var/www

WORKDIR /var/www

