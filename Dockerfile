# the different stages of this Dockerfile are meant to be built into separate images
# https://docs.docker.com/compose/compose-file/#target

ARG PHP_VERSION=8.2
ARG NODE_VERSION=14.17.3
ARG NGINX_VERSION=1.21
ARG ALPINE_VERSION=3.19
ARG NODE_ALPINE_VERSION=3.14
ARG COMPOSER_VERSION=2.4
ARG PHP_EXTENSION_INSTALLER_VERSION=latest

FROM composer:${COMPOSER_VERSION} AS composer

FROM mlocati/php-extension-installer:${PHP_EXTENSION_INSTALLER_VERSION} AS php_extension_installer

FROM php:${PHP_VERSION}-fpm-alpine${ALPINE_VERSION} AS base

# persistent / runtime deps
RUN apk add --no-cache \
        acl \
        file \
        gettext \
        unzip \
    ;

COPY --from=php_extension_installer /usr/bin/install-php-extensions /usr/local/bin/

# default PHP image extensions
# ctype curl date dom fileinfo filter ftp hash iconv json libxml mbstring mysqlnd openssl pcre PDO pdo_sqlite Phar
# posix readline Reflection session SimpleXML sodium SPL sqlite3 standard tokenizer xml xmlreader xmlwriter zlib
RUN install-php-extensions apcu exif gd intl pdo_mysql opcache zip

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY docker/php/prod/php.ini        $PHP_INI_DIR/php.ini
COPY docker/php/prod/opcache.ini    $PHP_INI_DIR/conf.d/opcache.ini

# copy file required by opcache preloading
COPY config/preload.php /srv/open_marketplace/config/preload.php

# https://getcomposer.org/doc/03-cli.md#composer-allow-superuser
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN set -eux; \
    composer clear-cache
ENV PATH="${PATH}:/root/.composer/vendor/bin"

WORKDIR /srv/open_marketplace

# build for production
ENV APP_ENV=prod

# prevent the reinstallation of vendors at every changes in the source code
COPY composer.* ./
RUN set -eux; \
    composer install --prefer-dist --no-autoloader --no-interaction --no-scripts --no-progress --no-dev; \
    composer clear-cache

# copy only specifically what we need
COPY .env .env.prod ./
COPY assets assets/
COPY bin bin/
COPY config config/
COPY public public/
COPY src src/
COPY templates templates/
COPY translations translations/

RUN set -eux; \
    mkdir -p var/cache var/log; \
    composer dump-autoload --classmap-authoritative; \
    APP_SECRET='' composer run-script post-install-cmd; \
    chmod +x bin/console; sync; \
    bin/console sylius:install:assets --no-interaction; \
    bin/console sylius:theme:assets:install public --no-interaction

VOLUME /srv/open_marketplace/var

VOLUME /srv/open_marketplace/public/media

COPY docker/php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]

FROM node:${NODE_VERSION}-alpine${NODE_ALPINE_VERSION} AS open_marketplace_node

WORKDIR /srv/open_marketplace

RUN set -eux; \
	apk add --no-cache --virtual .build-deps \
		g++ \
		gcc \
		make \
	;

# prevent the reinstallation of vendors at every changes in the source code
COPY package.json yarn.* ./
RUN set -eux; \
    yarn install; \
    yarn cache clean

COPY --from=base /srv/open_marketplace/vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/private       vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/private/
COPY --from=base /srv/open_marketplace/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/private    vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/private/
COPY --from=base /srv/open_marketplace/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/private     vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/private/
COPY --from=base /srv/open_marketplace/assets ./assets
COPY --from=base /srv/open_marketplace/vendor/bitbag/wishlist-plugin/webpack.config.js  vendor/bitbag/wishlist-plugin/webpack.config.js
COPY --from=base /srv/open_marketplace/vendor/bitbag/cms-plugin/webpack.config.js   vendor/bitbag/cms-plugin/webpack.config.js
COPY --from=base /srv/open_marketplace/vendor/bitbag/wishlist-plugin/src/Resources/assets   vendor/bitbag/wishlist-plugin/src/Resources/assets
COPY --from=base /srv/open_marketplace/vendor/bitbag/cms-plugin/src/Resources/assets    vendor/bitbag/cms-plugin/src/Resources/assets

COPY webpack.config.js ./
RUN yarn prod

COPY docker/node/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]
CMD ["yarn", "prod"]

FROM base AS open_marketplace_php_prod

COPY --from=open_marketplace_node /srv/open_marketplace/public/build public/build

FROM nginx:${NGINX_VERSION}-alpine AS open_marketplace_nginx

COPY docker/nginx/conf.d/default.conf /etc/nginx/conf.d/

WORKDIR /srv/open_marketplace

COPY --from=base        /srv/open_marketplace/public public/
COPY --from=open_marketplace_node /srv/open_marketplace/public public/

FROM open_marketplace_php_prod AS open_marketplace_php_dev

COPY docker/php/dev/php.ini        $PHP_INI_DIR/php.ini
COPY docker/php/dev/opcache.ini    $PHP_INI_DIR/conf.d/opcache.ini

WORKDIR /srv/open_marketplace

ENV APP_ENV=dev

COPY .env.test ./

RUN set -eux; \
    composer install --prefer-dist --no-autoloader --no-interaction --no-scripts --no-progress; \
    composer clear-cache

FROM open_marketplace_php_prod AS open_marketplace_cron

RUN set -eux; \
	apk add --no-cache --virtual .build-deps \
		apk-cron \
	;

COPY docker/cron/crontab /etc/crontabs/root
COPY docker/cron/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]
CMD ["crond", "-f"]

FROM open_marketplace_php_prod AS open_marketplace_migrations_prod

RUN apk add --no-cache wget
COPY docker/migrations/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]

FROM open_marketplace_php_dev AS open_marketplace_migrations_dev

RUN apk add --no-cache wget
COPY docker/migrations/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

RUN composer dump-autoload --classmap-authoritative

ENTRYPOINT ["docker-entrypoint"]
