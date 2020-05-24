#!/bin/bash

withXdebug="PHP_EXTENSIONS=bcmath bz2 calendar exif gd gettext intl mysqli pcntl pdo_mysql soap sockets sysvmsg sysvsem sysvshm opcache zip redis xsl sodium xdebug"
withoutXdebug="PHP_EXTENSIONS=bcmath bz2 calendar exif gd gettext intl mysqli pcntl pdo_mysql soap sockets sysvmsg sysvsem sysvshm opcache zip redis xsl sodium"

function reloadServices {
    docker-compose rm -f -s -v fpm
    docker-compose up -d fpm
    bash mutagen.sh
}

if [[ "$1" == "on" ]]; then
    if ! grep -q xdebug docker-compose.yml ; then
        echo "Enabling xDebug"
        sed -ie "s/${withoutXdebug}/${withXdebug}/g" docker-compose.yml
        reloadServices
    else
        echo "xDebug was already enabled..."
    fi
else
    if grep -q xdebug docker-compose.yml ; then
       echo "Disabling xDebug"
        sed -ie "s/${withXdebug}/${withoutXdebug}/g" ./docker-compose.yml
        reloadServices
    else
        echo "xDebug was already disabled..."
    fi
fi


