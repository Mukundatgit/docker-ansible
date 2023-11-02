# Use an official Debian-based Apache image as the base image
FROM php:7.4-apache

# Copy the custom HTML and PHP files to the web server's document root
COPY index.html /var/www/html/
COPY ftp_upload.php /var/www/html/

# Set permissions for the /tmp directory
RUN chmod 1777 /tmp

# Expose port 80 for web traffic
EXPOSE 80

