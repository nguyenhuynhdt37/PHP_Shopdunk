FROM php:7.4-apache

# Enable mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable mod_rewrite
RUN a2enmod rewrite

# PHP config: enable output_buffering to fix session_start() after HTML output
COPY php.ini /usr/local/etc/php/conf.d/custom.ini

# Set working directory
WORKDIR /var/www/html

# Copy all project files into the container
COPY . /var/www/html/

# Fix permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
