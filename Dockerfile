FROM php:8.1.6-apache

# Enable Apache modules
RUN a2enmod rewrite

# Copy the Apache virtual host configuration
COPY docker/apache/apache-config.conf /etc/apache2/sites-available/000-default.conf

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Set the appropriate permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
