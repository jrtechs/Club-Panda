FROM php:7.4.3-fpm-alpine3.11

RUN apk update \
    && apk add sqlite \
    && apk add socat \
    && apk add php-sqlite3

# Copy the php config file
COPY ./php-fpm.conf /usr/local/etc/php-fpm.d/www.conf

# Copy the application code
COPY . /app

VOLUME ["/app"]

RUN ls -la