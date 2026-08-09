FROM php:8.4-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
        libzip-dev \
        libreadline-dev \
        libonig-dev \
        default-mysql-client \
        unzip \
        git \
    && docker-php-ext-install -j"$(nproc)" \
        pdo_mysql \
        mbstring \
        zip \
    && docker-php-source extract \
    && cd /usr/src/php/ext/readline \
    && phpize \
    && sed -i '/test "\$PHP_LIBEDIT" = "no" && PHP_LIBEDIT=yes/d' configure \
    && ./configure --with-readline --without-libedit \
    && cd / \
    && docker-php-ext-install readline \
    && docker-php-source delete \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY docker/php/app.conf /etc/apache2/conf-available/app.conf
RUN a2enconf app

COPY docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

WORKDIR /var/www/html

ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]
