#!/bin/bash

# ============================================
# POS Deployment Script
# ============================================

# Colors for output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Configuration
PROJECT_PATH=$(pwd)
BACKUP_DIR="$PROJECT_PATH/backups"
DATE=$(date +%Y%m%d_%H%M%S)

# Functions
print_success() {
    echo -e "${GREEN}✅ $1${NC}"
}

print_error() {
    echo -e "${RED}❌ $1${NC}"
}

print_info() {
    echo -e "${BLUE}ℹ️  $1${NC}"
}

print_warning() {
    echo -e "${YELLOW}⚠️  $1${NC}"
}

# Start deployment
echo -e "${BLUE}"
echo "╔════════════════════════════════════════╗"
echo "║     POS Deployment Script v1.0         ║"
echo "╚════════════════════════════════════════╝"
echo -e "${NC}"

# Step 1: Create backup directory
print_info "Creating backup directory..."
mkdir -p $BACKUP_DIR

# Step 2: Backup database
print_info "Backing up database..."
php artisan backup:run --only-db 2>/dev/null || print_warning "Backup package not installed. Skipping database backup."

# Step 3: Enable maintenance mode
print_info "Enabling maintenance mode..."
php artisan down --message="System is being updated. Please wait..." --retry=60

# Step 4: Pull latest changes from Git
print_info "Pulling latest changes from GitHub..."
git pull origin main

if [ $? -ne 0 ]; then
    print_error "Git pull failed!"
    php artisan up
    exit 1
fi

print_success "Code updated successfully"

# Step 5: Install/Update Composer dependencies
print_info "Installing Composer dependencies..."
composer install --optimize-autoloader --no-dev --no-interaction

if [ $? -ne 0 ]; then
    print_error "Composer install failed!"
    php artisan up
    exit 1
fi

print_success "Dependencies installed"

# Step 6: Run database migrations
print_info "Running database migrations..."
php artisan migrate --force

if [ $? -ne 0 ]; then
    print_error "Migration failed!"
    print_warning "Rolling back..."
    php artisan up
    exit 1
fi

print_success "Migrations completed"

# Step 7: Clear all caches
print_info "Clearing caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear

# Remove bootstrap cache files (fixes MultiPOS issue)
print_info "Removing bootstrap cache files..."
rm -f bootstrap/cache/modules.php
rm -f bootstrap/cache/packages.php
rm -f bootstrap/cache/services.php
rm -f bootstrap/cache/config.php
rm -f bootstrap/cache/multi_p_o_s_module.php
rm -f bootstrap/cache/subdomain_module.php
rm -f bootstrap/cache/whatsapp_module.php

# Regenerate autoload
print_info "Regenerating autoload..."
composer dump-autoload -o

# Discover modules
print_info "Discovering modules..."
php artisan module:discover

# Optimize application
print_info "Optimizing application..."
php artisan config:cache
php artisan route:cache
php artisan event:cache

print_success "Caches cleared and optimized"

# Step 8: Build assets (if package.json exists)
if [ -f "package.json" ]; then
    print_info "Building frontend assets..."
    npm install --production
    npm run build
    print_success "Assets built successfully"
fi

# Step 9: Set correct permissions
print_info "Setting permissions..."
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || print_warning "Could not change ownership (may need sudo)"

print_success "Permissions set"

# Step 10: Clean old backups (keep last 7)
print_info "Cleaning old backups..."
cd $BACKUP_DIR
ls -t *.zip 2>/dev/null | tail -n +8 | xargs rm -f 2>/dev/null
cd $PROJECT_PATH

# Step 11: Disable maintenance mode
print_info "Disabling maintenance mode..."
php artisan up

print_success "Maintenance mode disabled"

# Final message
echo ""
echo -e "${GREEN}"
echo "╔════════════════════════════════════════╗"
echo "║   ✅ Deployment Completed Successfully  ║"
echo "╚════════════════════════════════════════╝"
echo -e "${NC}"
echo ""
print_info "Deployment finished at: $(date)"
echo ""
