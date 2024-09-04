FROM php:8.3-cli
RUN docker-php-ext-install pdo pdo_mysql
COPY . /app
WORKDIR /app
CMD ["php", "main.php"]