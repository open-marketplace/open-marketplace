#!/bin/sh
set -e

pluginDirectory='/var/www';
pluginApplicationDirectory='/var/www/tests/Application';

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

if [ "$1" = 'php-fpm' ] || [ "$1" = 'bin/console' ]; then
    mkdir -p var/cache var/log public/media/image
    setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX var public
    setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX var public

    if [ "$APP_ENV" != 'prod' ]; then
        composer install --prefer-dist --no-progress --no-interaction;
        cd $pluginDirectory && composer install --prefer-dist --no-progress --no-interaction;
        cd $pluginApplicationDirectory;
    fi

    echo "Waiting for db to be ready..."
    ATTEMPTS_LEFT_TO_REACH_DATABASE=60

    cd $pluginApplicationDirectory;

    until [ $ATTEMPTS_LEFT_TO_REACH_DATABASE -eq 0 ] || DATABASE_ERROR=$(php bin/console dbal:run-sql "SELECT 1" 2>&1); do
        if [ $? -eq 255 ]; then
            # If the Doctrine command exits with 255, an unrecoverable error occurred
            ATTEMPTS_LEFT_TO_REACH_DATABASE=0
            break
        fi
        sleep 1
        ATTEMPTS_LEFT_TO_REACH_DATABASE=$((ATTEMPTS_LEFT_TO_REACH_DATABASE - 1))
        echo "Still waiting for db to be ready... Or maybe the db is not reachable. $ATTEMPTS_LEFT_TO_REACH_DATABASE attempts left"
    done

    php bin/console doctrine:database:create --if-not-exists;
    php bin/console doctrine:schema:update -f;
fi

exec docker-php-entrypoint "$@"
