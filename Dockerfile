
FROM php:8.3-apache

# Instalar dependencias de PHP y MySQL
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libonig-dev \
    && docker-php-ext-install pdo_mysql mbstring zip \
    && rm -rf /var/lib/apt/lists/*

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar el proyecto Laravel
COPY . .

# Instalar dependencias
RUN COMPOSER_PROCESS_TIMEOUT=600 composer install --no-dev --prefer-source --optimize-autoloader --no-interaction
# Configurar Apache para Laravel
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri 's#DocumentRoot /var/www/html#DocumentRoot /var/www/html/public#g' \
    /etc/apache2/sites-available/000-default.conf

# Permisos de Laravel
RUN mkdir -p storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Puerto de Apache
EXPOSE 80

CMD ["apache2-foreground"]
