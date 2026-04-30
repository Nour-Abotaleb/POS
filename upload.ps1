git add .
git commit -m "Auto-deploy updates"
git push origin main

echo "🚀 Connecting to server for deployment..."
ssh nomufood-demo@8.213.81.38 "cd /home/nomufood-demo/htdocs/demo.nomufood.com && git checkout deploy.sh && git pull origin main && chmod +x deploy.sh && ./deploy.sh"
