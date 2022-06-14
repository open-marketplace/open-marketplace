ARG PHP_VERSION=8.0
ARG NODE_VERSION=12.13
ARG NGINX_VERSION=1.16

########################## PHP ##########################
FROM bitbag/sylius-php:${PHP_VERSION}-alpine AS root_php

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

ARG APP_ENV=prod

# copy only specifically what we need
COPY migrations migrations/
COPY src src/
COPY tests/Application/Kernel.php tests/Application/Kernel.php
COPY composer.json ./

RUN set -eux; \
	composer install; \
	composer dump-autoload;

WORKDIR /var/www/tests/Application

COPY tests/Application/assets assets/
COPY tests/Application/bin bin/
COPY tests/Application/config config/
COPY tests/Application/public public/
COPY tests/Application/src src/
COPY tests/Application/templates templates/
COPY tests/Application/translations translations/
COPY tests/Application/.env ./.env
COPY tests/Application/.env.test ./.env.test
COPY tests/Application/composer.json ./

COPY .docker/php/php.ini /usr/local/etc/php/php.ini
COPY .docker/php/php-cli.ini /usr/local/etc/php/php-cli.ini

RUN set -eux; \
	composer install; \
	composer dump-autoload; \
	mkdir -p var/cache var/log; \
	chmod +x bin/console; sync;

RUN set -eux; \
	php bin/console assets:install; \
	php bin/console sylius:install:assets;

VOLUME /var/www/tests/Application/var
VOLUME /var/www/tests/Application/public/media

COPY .docker/php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]

########################## NODE ##########################
FROM node:${NODE_VERSION}-alpine AS nodejs

RUN set -eux; \
	apk add --no-cache --virtual .build-deps \
		g++ \
		gcc \
		git \
		make \
		python \
	;

WORKDIR /var/www

COPY --from=root_php /var/www/vendor ./vendor
COPY package.json webpack.config.js yarn.lock ./
COPY src/Resources/public ./src/Resources/public
COPY src/Resources/assets ./src/Resources/assets

WORKDIR /var/www/tests/Application

# prevent the reinstallation of vendors at every changes in the source code

COPY tests/Application/package.json tests/Application/webpack.config.js tests/Application/yarn.lock tests/Application/.babelrc ./
COPY tests/Application/assets ./assets
COPY tests/Application/gulpfile.babel.js ./
COPY --from=root_php /var/www/tests/Application/public/bundles ./public/bundles
COPY --from=root_php /var/www/tests/Application/vendor ./vendor

RUN set -eux; \
	yarn install; \
	yarn cache clean

RUN ln -sf /var/www/tests/Application/node_modules /var/www

RUN yarn run gulp
RUN yarn encore production

COPY .docker/nodejs/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]
CMD ["yarn", "watch"]


########################## NGINX ##########################
FROM nginx:${NGINX_VERSION}-alpine AS nginx

COPY .docker/nginx/conf.d/default.conf /etc/nginx/conf.d/

WORKDIR /var/www

COPY --from=root_php /var/www/tests/Application/public public/
COPY --from=nodejs /var/www/tests/Application/public public/

########################## PHP ##########################
FROM bitbag/sylius-php:${PHP_VERSION}-alpine AS result_php

RUN apk add --no-cache fcgi;

COPY .docker/php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
COPY .docker/php/docker-healthcheck.sh /usr/local/bin/docker-healthcheck

RUN chmod +x /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-healthcheck

RUN { \
		echo '[www]'; \
		echo 'ping.path = /ping'; \
	} | tee /usr/local/etc/php-fpm.d/docker-healthcheck.conf

WORKDIR /var/www

COPY --from=root_php /var/www/src src/
COPY --from=root_php /var/www/vendor vendor/
COPY --from=root_php /var/www/tests/Application/bin tests/Application/bin/
COPY --from=root_php /var/www/tests/Application/config tests/Application/config/
COPY --from=root_php /var/www/tests/Application/src tests/Application/src/
COPY --from=root_php /var/www/tests/Application/public tests/Application/public/
COPY --from=root_php /var/www/tests/Application/templates tests/Application/templates/
COPY --from=root_php /var/www/tests/Application/translations tests/Application/translations/
COPY --from=root_php /var/www/tests/Application/Kernel.php tests/Application/Kernel.php
COPY --from=root_php /var/www/tests/Application/composer.json tests/Application/composer.json
COPY --from=root_php /var/www/tests/Application/composer.lock tests/Application/composer.lock
COPY --from=nodejs /var/www/tests/Application/public tests/Application/public/

COPY --from=root_php /usr/local/etc/php/php.ini /usr/local/etc/php/php.ini
COPY --from=root_php /usr/local/etc/php/php-cli.ini /usr/local/etc/php/php-cli.ini

RUN touch tests/Application/.env

WORKDIR /var/www/tests/Application

ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]
