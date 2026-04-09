# Setup Script for New NomuFood Server
# Run this ONCE to setup the new server completely

param(
    [string]$GitRepoUrl = "",
    [string]$DbPassword = ""
)

$SERVER_IP = "109.199.110.224"
$SERVER_USER = "nomufood"
$PROJECT_PATH = "/home/nomufood/htdocs/nomufood.com"

Write-Host "🔧 Setting up NomuFood on New Server" -ForegroundColor Green
Write-Host "Server: $SERVER_IP" -ForegroundColor Yellow

if (-not $GitRepoUrl) {
    $GitRepoUrl = Read-Host "Enter your Git repository URL (e.g., https://github.com/username/nomufood.git)"
}

if (-not $DbPassword) {
    $DbPassword = Read-Host "Enter a secure database password" -AsSecureString
    $DbPassword = [Runtime.InteropServices.Marshal]::PtrToStringAuto([Runtime.InteropServices.Marshal]::SecureStringToBSTR($DbPassword))
}

Write-Host "🚀 Starting server setup..." -ForegroundColor Cyan

$setupScript = @"
#!/bin/bash
set -e

echo "=== NomuFood Server Setup ==="

# Update system
echo "Updating system packages..."
sudo apt update && sudo apt upgrade -y

# Install required packages
echo "Installing required packages..."
sudo apt install -y git curl wget unzip supervisor redis-server

# Install PHP 8.2 and extensions
echo "Installing PHP 8.2..."
sudo apt install -y php8.2 php8.2-fpm php8.2-mysql php8.2-xml php8.2-curl php8.2-zip php8.2-mbstring php8.2-gd php8.2-bcmath php8.2-redis php8.2-intl

# Install Composer
echo "Installing Composer..."
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer

# Install Node.js and NPM
echo "Installing Node.js..."
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt install -y nodejs

# Create project directory
echo "Creating project directory..."
sudo mkdir -p $PROJECT_PATH
sudo chown nomufood:nomufood $PROJECT_PATH

# Clone repository
echo "Cloning repository..."
cd $PROJECT_PATH
git clone $GitRepoUrl .

# Create .env file
echo "Setting up environment file..."
if [ -f ".env.production" ]; then
    cp .env.production .env
elif [ -f ".env.example" ]; then
    cp .env.example .env
else
    echo "Warning: No .env template found"
fi

# Update .env with database info
if [ -f ".env" ]; then
    sed -i "s/DB_DATABASE=.*/DB_DATABASE=nomufood_db/" .env
    sed -i "s/DB_USERNAME=.*/DB_USERNAME=nomufood_user/" .env
    sed -i "s/DB_PASSWORD=.*/DB_PASSWORD=$DbPassword/" .env
    sed -i "s|APP_URL=.*|APP_URL=https://nomufood.com|" .env
fi

# Install dependencies
echo "Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader

echo "Installing NPM dependencies..."
npm ci

echo "Building assets..."
npm run build

# Set permissions
echo "Setting file permissions..."
sudo chown -R nomufood:nomufood .
chmod -R 755 .
chmod -R 775 storage bootstrap/cache
chmod 600 .env

# Generate application key
echo "Generating application key..."
php artisan key:generate --force

# Setup supervisor for queue workers
echo "Setting up queue workers..."
sudo tee /etc/supervisor/conf.d/nomufood-worker.conf > /dev/null << EOF
[program:nomufood-worker]
process_name=%(program_name)s_%(process_num)02d
command=php $PROJECT_PATH/artisan queue:work redis --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=nomufood
numprocs=2
redirect_stderr=true
stdout_logfile=$PROJECT_PATH/storage/logs/worker.log
stopwaitsecs=3600
EOF

sudo supervisorctl reread
sudo supervisorctl update

# Setup cron job for Laravel scheduler
echo "Setting up cron job..."
(crontab -l 2>/dev/null; echo "* * * * * cd $PROJECT_PATH && php artisan schedule:run >> /dev/null 2>&1") | crontab -

echo "✅ Server setup completed!"
echo ""
echo "📋 Next Steps:"
echo "1. Create database in CloudPanel:"
echo "   - Database name: nomufood_db"
echo "   - Database user: nomufood_user"
echo "   - Database password: $DbPassword"
echo ""
echo "2. Run migrations:"
echo "   cd $PROJECT_PATH"
echo "   php artisan migrate --force"
echo ""
echo "3. Create storage link:"
echo "   php artisan storage:link"
echo ""
echo "4. Optimize application:"
echo "   php artisan optimize"
echo ""
echo "🌐 Your site should be available at: https://nomufood.com"
"@

# Execute setup script on server
$setupScript | ssh $SERVER_USER@$SERVER_IP "bash"

if ($LASTEXITCODE -eq 0) {
    Write-Host "✅ Server setup completed!" -ForegroundColor Green
    Write-Host ""
    Write-Host "📋 Important Next Steps:" -ForegroundColor Yellow
    Write-Host "1. Go to CloudPanel and create the database:" -ForegroundColor White
    Write-Host "   - Database name: nomufood_db" -ForegroundColor Gray
    Write-Host "   - Database user: nomufood_user" -ForegroundColor Gray
    Write-Host "   - Database password: [the password you entered]" -ForegroundColor Gray
    Write-Host ""
    Write-Host "2. After creating the database, run:" -ForegroundColor White
    Write-Host "   .\upload.ps1 -Message 'Initial setup' -SkipGit" -ForegroundColor Gray
    Write-Host ""
    Write-Host "3. Then you can use the regular upload.ps1 for future deployments" -ForegroundColor White
} else {
    Write-Host "❌ Server setup failed!" -ForegroundColor Red
    exit 1
}