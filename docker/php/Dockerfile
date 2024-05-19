FROM php:8.2-cli

COPY --from=composer:2.2 /usr/bin/composer /usr/local/bin/composer

RUN apt-get update && apt-get -y install\
    bash\
    libicu-dev\
    zip libzip-dev \
    zlib1g-dev libssl-dev

RUN docker-php-ext-install \
    pdo_mysql\
    zip

RUN pecl install xdebug-3.2.2
ENV PHP_IDE_CONFIG 'serverName=start-laravel'
RUN echo "xdebug.mode=debug,develop" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.log=/var/log/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN docker-php-ext-enable xdebug

WORKDIR /var/www/html
