### PHP ###
ARG PHP_VERSION=8
ARG ALPINE_VERSION=3.14

FROM php:${PHP_VERSION}-fpm-alpine${ALPINE_VERSION} AS base

RUN set -eux \
  && apk update && apk --no-cache add \
    postgresql-dev \
    libzip-dev \
    git \
	icu-libs \
	bash \
	autoconf \
	g++ \
	make \
	icu-dev \
	gcc \
	libtool \
	rabbitmq-c \
	rabbitmq-c-dev

RUN apk add php8-pecl-xdebug php7-pecl-amqp

RUN docker-php-ext-install \
		intl \
		zip \
		bcmath \
		sockets \
		pdo_pgsql

RUN apk del --purge autoconf g++ make gcc

RUN curl -L https://github.com/git-chglog/git-chglog/releases/latest/download/git-chglog_linux_amd64 --output /usr/bin/git-chglog \
	&& chmod +x /usr/bin/git-chglog

# Install security checker
RUN curl -L https://github.com/fabpot/local-php-security-checker/releases/download/v1.0.0/local-php-security-checker_1.0.0_linux_amd64 -o /usr/bin/security-checker \
    && chmod +x /usr/bin/security-checker

# Init user
RUN addgroup -g 2000 -S app && adduser -G app -u 2000 -s /bin/bash -S app && sed -i "s/2000/2000/" /etc/group

# Configure Timezone
RUN ln -fs /usr/share/zoneinfo/Europe/Paris /etc/localtime && \
    echo "Europe/Paris" > /etc/timezone

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer && chmod +x /usr/bin/composer

# Link php-fpm version to php-fpm to be independant
RUN ln -s /usr/sbin/php-fpm${PHP_VERSION} /usr/sbin/php-fpm && \
    mkdir /run/php


WORKDIR /var/app

RUN chown app: -R /var/app

USER app

CMD ["php-fpm", "-F"]

EXPOSE 9000
