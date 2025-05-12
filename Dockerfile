FROM php:8.2-fpm-alpine

ARG USER_ID=1000
ARG GROUP_ID=1000

RUN addgroup -g ${GROUP_ID} pushidrosal && \
    adduser -u ${USER_ID} -G pushidrosal -s /bin/sh -D pushidrosal

RUN apk add --no-cache \
    autoconf \
    bash \
    curl \
    gcc \
    g++ \
    git \
    libpng-dev \
    libxml2-dev \
    linux-headers \
    make \
    oniguruma-dev \
    unzip \
    zip && \
    docker-php-ext-install \
    bcmath \
    exif \
    gd \
    mbstring \
    pcntl \
    pdo_mysql && \
    rm -rf /var/cache/apk/*

RUN pecl install redis && \
    docker-php-ext-enable redis && \
    rm -rf /tmp/pear

COPY ./docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

RUN mkdir -p /var/log/php && \
    chown -R pushidrosal:pushidrosal /var/log/php

COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

RUN chown -R pushidrosal:pushidrosal . && chmod -R 775 .

USER pushidrosal

CMD ["php-fpm"]
