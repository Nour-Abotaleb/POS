# Fix Git Issues and Deploy to New Server
# هذا السكريبت يحل مشاكل Git ويعمل deployment للسيرفر الجديد

param(
    [string]$Message = "Auto-deploy updates",
    [switch]$ForceSetup = $false
)

$SERVER_IP = "109.199.110.224"
$SERVER_USER = "nomufood"
$PROJECT_PATH = "/home/nomufood/htdocs/nomufood.com"
$REPO_URL = "https://github.com/Nour-Abotaleb/POS.git"

Write-Host "🔧 Fixing Git and Deploying to New Server" -ForegroundColor Green

# Step 1: Fix local Git issues
Write-Host "📝 Fixing local Git issues..." -ForegroundColor Cyan

try {
    # Pull latest changes first
    Write-Host "Pulling latest changes from remote..." -ForegroundColor Yellow
    git pull origin main --rebase
    
    if ($LASTEXITCODE -ne 0) {
        Write-Host "⚠️  Pull failed, trying to merge..." -ForegroundColor Yellow
        git pull origin main --no-rebase
    }
    
    # Add and commit changes
    Write-Host "Adding and committing changes..." -ForegroundColor Yellow
    git add .
    git commit -m $Message
    
    # Push changes
    Write-Host "Pushing changes..." -ForegroundColor Yellow
    git push origin main
    
    if ($LASTEXITCODE -ne 0) {
        Write-Host "❌ Git push still failing. Trying force push..." -ForegroundColor Red
        $response = Read-Host "Do you want to force push? This might overwrite remote changes (y/N)"
        if ($response -eq "y" -or $response -eq "Y") {
            git push origin main --force
        } else {
            Write-Host "❌ Deployment cancelled due to Git issues" -ForegroundColor Red
            exit 1
        }
    }
    
    Write-Host "✅ Git issues resolved!" -ForegroundColor Green
    
} catch {
    Write-Host "⚠️  Git operations had issues, but continuing with deployment..." -ForegroundColor Yellow
}

# Step 2: Setup server if needed
Write-Host "🚀 Setting up server..." -ForegroundColor Cyan

$setupScript = @"
#!/bin/bash
set -e

echo "=== Setting up NomuFood on New Server ==="

# Check if project directory exists
if [ ! -d "$PROJECT_PATH" ]; then
    echo "Creating project directory..."
    sudo mkdir -p $PROJECT_PATH
    sudo chown nomufood:nomufood $PROJECT_PATH
fi

cd $PROJECT_PATH

# Check if it's a git repository
if [ ! -d ".git" ]; then
    echo "Initializing Git repository..."
    
    # Remove any existing files
    rm -rf *
    rm -rf .[^.]*
    
    # Clone the repository
    echo "Cloning repository from $REPO_URL..."
    git clone $REPO_URL .
    
    echo "✅ Repository cloned successfully!"
else
    echo "Git repository already exists, pulling latest changes..."
    git fetch origin
    git reset --hard origin/main
    git pull origin main
fi

# Install system dependencies if needed
echo "Checking system dependencies..."

# Install Composer if not exists
if ! command -v composer &> /dev/null; then
    echo "Installing Composer..."
    curl -sS https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer
    sudo chmod +x /usr/local/bin/composer
fi

# Install Node.js if not exists
if ! command -v npm &> /dev/null; then
    echo "Installing Node.js..."
    curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
    sudo apt install -y nodejs
fi

# Create .env file if not exists
if [ ! -f ".env" ]; then
    echo "Creating .env file..."
    if [ -f ".env.production" ]; then
        cp .env.production .env
    elif [ -f ".env.example" ]; then
        cp .env.example .env
    fi
    
    # Update basic settings
    if [ -f ".env" ]; then
        sed -i "s|APP_URL=.*|APP_URL=https://nomufood.com|" .env
        sed -i "s/DB_DATABASE=.*/DB_DATABASE=nomufood_db/" .env
        sed -i "s/DB_USERNAME=.*/DB_USERNAME=nomufood_user/" .env
    fi
fi

# Install PHP dependencies
echo "Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Install and build assets
echo "Installing NPM dependencies and building assets..."
npm ci --silent
npm run build

# Set proper permissions
echo "Setting file permissions..."
sudo chown -R nomufood:nomufood .
chmod -R 755 .
chmod -R 775 storage bootstrap/cache
chmod 600 .env 2>/dev/null || true

# Generate app key if needed
if ! grep -q "APP_KEY=base64:" .env 2>/dev/null; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# Create storage link
echo "Creating storage link..."
php artisan storage:link

# Clear and optimize
echo "Optimizing application..."
php artisan optimize:clear
php artisan optimize

echo "✅ Server setup completed!"
echo "🌐 Site should be available at: https://nomufood.com"
echo ""
echo "📋 Next steps:"
echo "1. Create database in CloudPanel (nomufood_db)"
echo "2. Update .env with database credentials"
echo "3. Run: php artisan migrate --force"
"@

# Execute setup on server
Write-Host "Executing setup script on server..." -ForegroundColor Yellow
$setupScript | ssh $SERVER_USER@$SERVER_IP "bash"

if ($LASTEXITCODE -eq 0) {
    Write-Host "✅ Deployment completed successfully!" -ForegroundColor Green
    Write-Host ""
    Write-Host "📋 Important Next Steps:" -ForegroundColor Yellow
    Write-Host "1. Go to CloudPanel and create database:" -ForegroundColor White
    Write-Host "   - Database name: nomufood_db" -ForegroundColor Gray
    Write-Host "   - Database user: nomufood_user" -ForegroundColor Gray
    Write-Host "   - Database password: [choose a secure password]" -ForegroundColor Gray
    Write-Host ""
    Write-Host "2. Update database credentials on server:" -ForegroundColor White
    Write-Host "   ssh nomufood@$SERVER_IP" -ForegroundColor Gray
    Write-Host "   cd $PROJECT_PATH" -ForegroundColor Gray
    Write-Host "   nano .env" -ForegroundColor Gray
    Write-Host ""
    Write-Host "3. Run migrations:" -ForegroundColor White
    Write-Host "   php artisan migrate --force" -ForegroundColor Gray
    Write-Host ""
    Write-Host "🌐 Visit: https://nomufood.com" -ForegroundColor Blue
} else {
    Write-Host "❌ Deployment failed!" -ForegroundColor Red
    Write-Host "Check the error messages above and try again." -ForegroundColor Yellow
    exit 1
}