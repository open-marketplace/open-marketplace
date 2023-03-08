#!/bin/sh
set -e

attempt_left=20

until php bin/console doctrine:query:sql "select 1" >/dev/null 2>&1;
do
    attempt_left=$((attempt_left-1))

    if [ "${attempt_left}" -eq "0" ]; then

        (>&2 echo "MySQL did not answer. Aborting migrations.")
        exit 1
    else
        (>&2 echo "Waiting for MySQL to be ready...")
    fi

    sleep 1
done

php bin/console doctrine:database:create --if-not-exists --no-interaction

php bin/console doctrine:schema:create

if [ "$LOAD_FIXTURES" = "1" ]; then
    sh bin/fixtures
fi


