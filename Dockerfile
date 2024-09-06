FROM php:8.3-cli
RUN docker-php-ext-install pdo
COPY . /app
WORKDIR /app
CMD ["php", "main.php"]