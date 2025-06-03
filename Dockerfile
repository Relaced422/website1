FROM php:8.2-apache

# Installeer PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Activeer mod_rewrite (voor .htaccess)
RUN a2enmod rewrite

# Zet werkmap en kopieer je websitebestanden
WORKDIR /var/www/html
COPY . .

# Optioneel: AllowOverride All voor .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf
