git add .
git commit -m "Auto-deploy updates"
git push origin main

echo "🚀 Connecting to server for deployment..."
ssh nomufood@109.199.110.224 "cd /home/nomufood/htdocs/nomufood.com && git pull origin main && ./deploy.sh"
