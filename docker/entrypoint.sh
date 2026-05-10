#!/bin/sh

# Make sure permissions are correct
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Cache Laravel configuration for performance
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Run database migrations (optional: remove if you prefer running this manually)
php artisan migrate --force

# Execute the main container command (PHP-FPM)
exec "$@"
