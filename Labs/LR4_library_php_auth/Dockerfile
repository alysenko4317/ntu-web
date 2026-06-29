FROM php:8.2-apache

COPY src/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html/data \
 && chmod -R 775 /var/www/html/data

EXPOSE 80
