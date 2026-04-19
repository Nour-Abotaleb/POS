# Quick Git Fix Script
# يحل مشاكل Git بسرعة

Write-Host "🔧 Quick Git Fix" -ForegroundColor Green

# Check current status
Write-Host "📊 Current Git Status:" -ForegroundColor Cyan
git status --short

# Pull latest changes with rebase
Write-Host "📥 Pulling latest changes..." -ForegroundColor Yellow
git stash push -m "Auto-stash before pull"
git pull origin main --rebase

if ($LASTEXITCODE -ne 0) {
    Write-Host "⚠️  Rebase failed, trying regular merge..." -ForegroundColor Yellow
    git pull origin main --no-rebase
}

# Apply stashed changes if any
$stashList = git stash list
if ($stashList) {
    Write-Host "📦 Applying stashed changes..." -ForegroundColor Yellow
    git stash pop
}

# Add all changes
Write-Host "📝 Adding all changes..." -ForegroundColor Yellow
git add .

# Commit changes
$commitMessage = Read-Host "Enter commit message (or press Enter for default)"
if (-not $commitMessage) {
    $commitMessage = "Auto-deploy updates - $(Get-Date -Format 'yyyy-MM-dd HH:mm')"
}

git commit -m $commitMessage

# Push changes
Write-Host "📤 Pushing changes..." -ForegroundColor Yellow
git push origin main

if ($LASTEXITCODE -eq 0) {
    Write-Host "✅ Git issues fixed successfully!" -ForegroundColor Green
} else {
    Write-Host "❌ Push failed. Trying alternative solutions..." -ForegroundColor Red
    
    $choice = Read-Host "Choose option: (1) Force push (2) Create new branch (3) Manual fix"
    
    switch ($choice) {
        "1" {
            Write-Host "⚠️  Force pushing..." -ForegroundColor Yellow
            git push origin main --force
        }
        "2" {
            $branchName = "fix-$(Get-Date -Format 'yyyyMMdd-HHmm')"
            Write-Host "🌿 Creating new branch: $branchName" -ForegroundColor Yellow
            git checkout -b $branchName
            git push origin $branchName
            Write-Host "✅ Pushed to new branch. Create a PR to merge." -ForegroundColor Green
        }
        "3" {
            Write-Host "📋 Manual fix required:" -ForegroundColor Yellow
            Write-Host "1. Check conflicts: git status" -ForegroundColor Gray
            Write-Host "2. Resolve conflicts manually" -ForegroundColor Gray
            Write-Host "3. Add resolved files: git add ." -ForegroundColor Gray
            Write-Host "4. Commit: git commit -m 'Fix conflicts'" -ForegroundColor Gray
            Write-Host "5. Push: git push origin main" -ForegroundColor Gray
        }
    }
}