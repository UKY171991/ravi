$urls = @{
    "about-image.jpg" = "https://picsum.photos/500/400?random=1"
    "team-1-new.jpg" = "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop&crop=face"
    "team-2-new.jpg" = "https://images.unsplash.com/photo-1494790108755-2616b612b5bc?w=300&h=300&fit=crop&crop=face"
    "team-3-new.jpg" = "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=300&h=300&fit=crop&crop=face"
    "team-4-new.jpg" = "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300&h=300&fit=crop&crop=face"
}

foreach ($file in $urls.Keys) {
    try {
        Write-Host "Downloading $file..." -ForegroundColor Yellow
        Invoke-WebRequest -Uri $urls[$file] -OutFile $file -ErrorAction Stop
        Write-Host "✓ $file downloaded successfully" -ForegroundColor Green
    } catch {
        Write-Host "✗ Failed to download $file" -ForegroundColor Red
    }
}

Write-Host "All downloads completed!" -ForegroundColor Cyan
