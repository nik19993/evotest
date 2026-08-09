#!/bin/sh
set -e

cd /var/www/html

# One-time local setup, safe to re-run — never overwrites files that already exist.
[ -f .htaccess ] || cp ht.access .htaccess
[ -f config.php ] || cp config.php.example config.php

if [ ! -f core/custom/.env ]; then
    cp core/custom/.env.example core/custom/.env
    sed -i \
        -e "s/^DB_HOST=.*/DB_HOST=${DB_HOST:-db}/" \
        -e "s/^DB_USERNAME=.*/DB_USERNAME=${DB_USERNAME:-homestead}/" \
        -e "s/^DB_PASSWORD=.*/DB_PASSWORD=${DB_PASSWORD:-secret}/" \
        -e "s/^DB_DATABASE=.*/DB_DATABASE=${DB_DATABASE:-evo}/" \
        -e "s#^EVO_BASE_PATH=.*#EVO_BASE_PATH=/var/www/html/#" \
        -e "s#^EVO_SITE_URL=.*#EVO_SITE_URL=${EVO_SITE_URL:-http://localhost:8080/}#" \
        -e "s#^EVO_MANAGER_PATH=.*#EVO_MANAGER_PATH=/var/www/html/manager/#" \
        -e "s#^EVO_MANAGER_URL=.*#EVO_MANAGER_URL=${EVO_SITE_URL:-http://localhost:8080/}manager/#" \
        -e "s/^EVO_SITE_HOSTNAMES=.*/EVO_SITE_HOSTNAMES=localhost/" \
        core/custom/.env
fi

[ -f vendor/autoload.php ] || composer install --no-interaction --no-progress
[ -f core/vendor/autoload.php ] || (cd core && composer install --no-interaction --no-progress)

mkdir -p core/storage/framework/cache core/storage/framework/sessions core/storage/framework/views core/storage/logs \
         assets/cache assets/files assets/images
chmod -R ugo+rwX core/storage assets/cache assets/files assets/images 2>/dev/null || true

exec "$@"
