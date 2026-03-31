git add .
git commit -m "Auto-deploy updates"
git push origin main

echo "🚀 Connecting to server for deployment..."
ssh nomufood@8.213.81.38 "cd /home/nomufood/htdocs/nomufood.com && git checkout deploy.sh && git pull origin main && ./deploy.sh"
