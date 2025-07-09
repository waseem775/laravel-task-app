FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


WORKDIR /var/www/html


RUN composer create-project laravel/laravel my-laravel-notes


ENV APACHE_DOCUMENT_ROOT=/var/www/html/my-laravel-notes/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf \
 && echo "ServerName localhost" >> /etc/apache2/apache2.conf


RUN a2enmod rewrite


RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
