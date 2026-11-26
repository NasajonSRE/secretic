FROM php:8.3.36-cli

ENV DEBIAN_FRONTEND=noninteractive \
    TZ=UTC

WORKDIR /app

RUN apt-get update && apt-get install -y --no-install-recommends \
        git \
        zip \
        unzip \
        libonig-dev \
        libxml2-dev \
        libcurl4-openssl-dev \
        libzip-dev \
    && docker-php-ext-install pdo_mysql bcmath mbstring xml curl zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

COPY . /app

RUN test -f composer.lock \
    && COMPOSER_ALLOW_SUPERUSER=1 composer install \
        --no-interaction --no-dev --prefer-dist --optimize-autoloader --no-progress \
    && mkdir -p storage/logs bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R u+rwX,g+rwX storage bootstrap/cache

USER 33:33
EXPOSE 8080

# The runtime key and database settings must come from the pod environment.
CMD ["sh", "-c", "if [ -z \"$APP_KEY\" ] || [ -z \"$DB_HOST\" ]; then echo 'ERRO FATAL: APP_KEY e/ou DB_HOST nao definidos. Verifique o ConfigMap/Secret do Deployment.' >&2; exit 1; fi; exec php artisan serve --host=0.0.0.0 --port=8080"]
