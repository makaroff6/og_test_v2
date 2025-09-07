FROM php:8.4-fpm

# Install system tools and dependencies
RUN apt-get update && apt-get install -y \
    wget \
    mc \
    git \
    unzip

# composer
RUN wget https://getcomposer.org/composer.phar && \
    mv composer.phar /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer

WORKDIR /data
EXPOSE 9000
