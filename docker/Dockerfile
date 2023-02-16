FROM php:8.1.14-apache

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

#mettre a jour la liste des paquet
RUN apt-get update \ 
  && apt-get install -y libzip-dev git wget --no-install-recommends \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-install  pdo mysqli pdo_mysql zip;
#pdo_sqlite
RUN wget https://getcomposer.org/download/2.0.9/composer.phar \
    && mv composer.phar /usr/bin/composer && chmod +x /usr/bin/composer
# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && php -r "unlink('composer-setup.php');" && mv composer.phar /usr/local/bin/composer 

RUN apt-get update && apt install -yqq nodejs npm

RUN wget https://get.symfony.com/cli/installer -O - | bash && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

COPY . /var/www

COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www

RUN composer install



