FROM php:8.2-apache

# Kopieer alle bestanden naar de standaard Apache map
COPY . /var/www/html/

# Activeer mod_rewrite als je het nodig hebt (voor bijv. routing in frameworks)
RUN a2enmod rewrite