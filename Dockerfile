FROM ubuntu:22.04

WORKDIR /app
COPY . /app
# RUN mv composer.phar /usr/local/bin/composer
ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=UTC
RUN apt update

RUN apt install software-properties-common -y && \
    apt install git -y

RUN apt install zip unzip php8.1-zip -y

RUN apt install php8.1-common php8.1-cli php8.1-mysql \
    php8.1-xml php8.1-curl php8.1-bcmath php8.1-mbstring -y

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');"

RUN mv composer.phar /usr/local/bin/composer && \
    mv .env.example .env

RUN composer install && \
    chmod -R 777 storage bootstrap/cache && \ 
    php artisan key:generate

CMD [ "php", "artisan", "serve", "--host=0.0.0.0", "--port=80" ]


# RUN composer