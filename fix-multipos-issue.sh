#!/bin/bash

# Fix MultiPOS module case sensitivity issue
echo "Fixing MultiPOS module case sensitivity..."

# Clear all Laravel caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Clear bootstrap cache files
rm -f bootstrap/cache/modules.php
rm -f bootstrap/cache/packages.php
rm -f bootstrap/cache/services.php
rm -f bootstrap/cache/config.php

# Regenerate autoload files
composer dump-autoload

# Optimize application
php artisan optimize:clear
php artisan module:discover

echo "Done! Please restart your web server."
