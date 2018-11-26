FROM php:7.2-apache

ENV APP_HOME /var/www/html

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
RUN sed -i -e "s/html/html\/www/g" /etc/apache2/sites-enabled/000-default.conf

EXPOSE 80

COPY ./src $APP_HOME

RUN chown -R www-data:www-data $APP_HOME
