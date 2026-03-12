#!/bin/bash

# ============================================
# POS Backup Script
# ============================================

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
BLUE='\033[0;34m'
NC='\033[0m'

# Configuration - EDIT THESE VALUES
DB_NAME="testfood"
DB_USER="root"
DB_PASS="samerhassan11"
DB_HOST="127.0.0.1"
DB_PORT="3307"

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

# Start backup
echo -e "${BLUE}"
echo "╔════════════════════════════════════════╗"
echo "║       POS Backup Script v1.0           ║"
echo "╚════════════════════════════════════════╝"
echo -e "${NC}"

# Create backup directory
print_info "Creating backup directory..."
mkdir -p $BACKUP_DIR

# Backup database
print_info "Backing up database..."
mysqldump -h $DB_HOST -P $DB_PORT -u $DB_USER -p$DB_PASS $DB_NAME > $BACKUP_DIR/db_backup_$DATE.sql

if [ $? -eq 0 ]; then
    print_success "Database backed up: db_backup_$DATE.sql"
    
    # Compress database backup
    gzip $BACKUP_DIR/db_backup_$DATE.sql
    print_success "Database backup compressed"
else
    print_error "Database backup failed!"
    exit 1
fi

# Backup storage folder (user uploads, QR codes, etc.)
print_info "Backing up storage folder..."
tar -czf $BACKUP_DIR/storage_backup_$DATE.tar.gz storage/app/public

if [ $? -eq 0 ]; then
    print_success "Storage backed up: storage_backup_$DATE.tar.gz"
else
    print_error "Storage backup failed!"
fi

# Backup .env file
print_info "Backing up .env file..."
cp .env $BACKUP_DIR/env_backup_$DATE.txt
print_success ".env file backed up"

# Calculate backup size
BACKUP_SIZE=$(du -sh $BACKUP_DIR | cut -f1)
print_info "Total backup size: $BACKUP_SIZE"

# Clean old backups (keep last 7 days)
print_info "Cleaning old backups (keeping last 7)..."
cd $BACKUP_DIR
ls -t db_backup_*.sql.gz 2>/dev/null | tail -n +8 | xargs rm -f 2>/dev/null
ls -t storage_backup_*.tar.gz 2>/dev/null | tail -n +8 | xargs rm -f 2>/dev/null
ls -t env_backup_*.txt 2>/dev/null | tail -n +8 | xargs rm -f 2>/dev/null
cd $PROJECT_PATH

print_success "Old backups cleaned"

# Final message
echo ""
echo -e "${GREEN}"
echo "╔════════════════════════════════════════╗"
echo "║    ✅ Backup Completed Successfully     ║"
echo "╚════════════════════════════════════════╝"
echo -e "${NC}"
echo ""
print_info "Backup location: $BACKUP_DIR"
print_info "Backup finished at: $(date)"
echo ""
