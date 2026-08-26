FROM ubuntu:24.04

ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=UTC

WORKDIR /app

RUN apt-get update && \
    apt-get install -y \
        software-properties-common \
        git \
        zip \
        unzip \
        curl \
        php-cli \
        php-common \
        php-mysql \
        php-xml \
        php-curl \
        php-bcmath \
        php-mbstring \
        php-zip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php

COPY . /app

RUN cp .env.example .env && \
    composer install --no-interaction --prefer-dist --optimize-autoloader && \
    chmod -R 777 storage bootstrap/cache && \
    php artisan key:generate

EXPOSE 80

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
