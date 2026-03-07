FROM php:8.1-fpm-alpine

RUN apk update \
    && apk add sqlite \
    && apk add socat

# Copy the php config file
COPY ./php-fpm.conf /usr/local/etc/php-fpm.d/www.conf

# Copy the application code
COPY . /app

VOLUME ["/app"]

RUN ls -la