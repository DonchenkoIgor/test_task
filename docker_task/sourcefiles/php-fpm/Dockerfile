FROM php:8.2-fpm

WORKDIR "/application"

RUN apt-get update


# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install zip+icu dev libs
RUN apt-get install libzip-dev zip libicu-dev -y

RUN apt-get update && apt-get install -y nano

# Install PHP extensions zip and intl (intl requires to be configured)
RUN docker-php-ext-install zip && docker-php-ext-configure intl && docker-php-ext-install intl

RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update && \
apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
docker-php-ext-install gd
