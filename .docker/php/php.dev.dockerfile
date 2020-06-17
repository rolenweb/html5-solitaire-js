FROM php:7.4.3-fpm-alpine

COPY etc/php-dev.ini /usr/local/etc/php/php.ini

ENV DEPS \
    autoconf \
    g++ \
    libtool \
    pcre-dev

RUN set -xe \
    && mkdir storage \
    && chmod 644 /usr/local/etc/php/php.ini \
    && chown -R 82:82 /var/www/html \
    && apk update \
    && apk add --no-cache ca-certificates bash make git\
    && apk add --update --no-cache $DEPS \
    # pgsql
    && apk --no-cache add postgresql-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    # zip
    && apk add --no-cache libzip-dev \
    && docker-php-ext-configure zip --with-zip=/usr/include \
    && docker-php-ext-install zip \
    # gd
    && apk add --update --no-cache freetype-dev libjpeg-turbo-dev libpng-dev \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install gd \
    # redis
    && pecl install igbinary \
    && pecl install redis \
    && docker-php-ext-enable redis \
    # imagick
    && apk add --update --no-cache imagemagick-dev \
    && pecl install imagick-3.4.3 \
    && docker-php-ext-enable imagick \
    # exif
    && docker-php-ext-install exif \
    # pcntl
    && docker-php-ext-install pcntl \
    # intl, soap
    && apk add --update --no-cache libintl icu icu-dev libxml2-dev \
    && docker-php-ext-install intl soap \
    # xdebug
    && pecl install xdebug-2.9.0 \
    && docker-php-ext-enable xdebug \
    # mcrypt
    && apk add --update --no-cache libmcrypt-dev \
    && pecl install mcrypt-1.0.3 \
    && docker-php-ext-enable mcrypt \
    # clearing
    && apk del $DEPS \
    && rm -rf /var/cache/apk/* \
    && rm -rf /tmp/* \
    # composer
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
