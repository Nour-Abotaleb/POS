#!/bin/bash

# Quick Fix Script for Laravel Deployment Issues
# Fixes: MultiPOS module, cache issues, permissions

echo "🔧 Quick Fix Script Starting..."
echo "================================"

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Get current directory
CURRENT_DIR=$(pwd)

echo -e "${YELLOW}📂 Working directory: $CURRENT_DIR${NC}"
echo ""

# Step 1: Clear all caches
echo -e "${YELLOW}🧹 Step 1: Clearing all caches...${NC}"
php artisan cache:clear 2>/dev/null
php artisan config:clear 2>/dev/null
php artisan route:clear 2>/dev/null
php artisan view:clear 2>/dev/null
php artisan optimize:clear 2>/dev/null
echo -e "${GREEN}✓ Caches cleared${NC}"
echo ""

# Step 2: Remove bootstrap cache files
echo -e "${YELLOW}🗑️  Step 2: Removing bootstrap cache files...${NC}"
rm -f bootstrap/cache/modules.php
rm -f bootstrap/cache/packages.php
rm -f bootstrap/cache/services.php
rm -f bootstrap/cache/config.php
rm -f bootstrap/cache/multi_p_o_s_module.php
rm -f bootstrap/cache/subdomain_module.php
rm -f bootstrap/cache/whatsapp_module.php
echo -e "${GREEN}✓ Bootstrap cache files removed${NC}"
echo ""

# Step 3: Clear compiled views
echo -e "${YELLOW}🗑️  Step 3: Clearing compiled views...${NC}"
rm -rf storage/framework/views/*.php
echo -e "${GREEN}✓ Compiled views cleared${NC}"
echo ""

# Step 4: Regenerate autoload files
echo -e "${YELLOW}📚 Step 4: Regenerating autoload files...${NC}"
composer dump-autoload -o 2>/dev/null
if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Autoload files regenerated${NC}"
else
    echo -e "${RED}⚠ Warning: Composer dump-autoload failed${NC}"
fi
echo ""

# Step 5: Discover modules
echo -e "${YELLOW}🔍 Step 5: Discovering modules...${NC}"
php artisan module:discover 2>/dev/null
if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Modules discovered${NC}"
else
    echo -e "${RED}⚠ Warning: Module discovery failed${NC}"
fi
echo ""

# Step 6: Fix permissions
echo -e "${YELLOW}🔐 Step 6: Fixing permissions...${NC}"
chmod -R 755 storage bootstrap/cache 2>/dev/null
if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Permissions fixed${NC}"
else
    echo -e "${YELLOW}⚠ Warning: Could not fix permissions (may need sudo)${NC}"
fi
echo ""

# Step 7: Optimize application
echo -e "${YELLOW}⚡ Step 7: Optimizing application...${NC}"
php artisan optimize 2>/dev/null
if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Application optimized${NC}"
else
    echo -e "${YELLOW}⚠ Warning: Optimization failed${NC}"
fi
echo ""

# Step 8: Check for common issues
echo -e "${YELLOW}🔍 Step 8: Checking for common issues...${NC}"

# Check if Modules directory exists
if [ -d "Modules" ]; then
    echo -e "${GREEN}✓ Modules directory exists${NC}"
    
    # Check for case sensitivity issues
    if [ -d "Modules/Multipos" ] && [ ! -d "Modules/MultiPOS" ]; then
        echo -e "${YELLOW}⚠ Found: Modules/Multipos (lowercase 'pos')${NC}"
        echo -e "${YELLOW}  This may cause issues on Linux servers${NC}"
        echo -e "${YELLOW}  Consider renaming to: Modules/MultiPOS${NC}"
    fi
else
    echo -e "${RED}✗ Modules directory not found${NC}"
fi
echo ""

# Final summary
echo "================================"
echo -e "${GREEN}✅ Quick Fix Completed!${NC}"
echo ""
echo "Next steps:"
echo "1. Restart your web server (Apache/Nginx)"
echo "2. Restart PHP-FPM if applicable"
echo "3. Test your application"
echo ""
echo "If issues persist, check:"
echo "- storage/logs/laravel.log"
echo "- Web server error logs"
echo ""
echo "For detailed troubleshooting, see: حل-مشكلة-MultiPOS.md"
