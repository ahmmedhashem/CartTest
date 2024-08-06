FROM php:8.0-cli
WORKDIR /app
COPY . /app
RUN apt-get update && apt-get install -y git unzip \
    && docker-php-ext-install pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
CMD ["php", "-S", "0.0.0.0:8000"]
