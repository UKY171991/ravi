@echo off
echo Downloading placeholder images...

REM Create a PowerShell script to download images
echo $urls = @{ > download_images.ps1
echo     "about-image.jpg" = "https://picsum.photos/500/400?random=1" >> download_images.ps1
echo     "team-1.jpg" = "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop&crop=face" >> download_images.ps1
echo     "team-2.jpg" = "https://images.unsplash.com/photo-1494790108755-2616b612b5bc?w=300&h=300&fit=crop&crop=face" >> download_images.ps1
echo     "team-3.jpg" = "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=300&h=300&fit=crop&crop=face" >> download_images.ps1
echo     "team-4.jpg" = "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300&h=300&fit=crop&crop=face" >> download_images.ps1
echo } >> download_images.ps1
echo. >> download_images.ps1
echo foreach ($file in $urls.Keys) { >> download_images.ps1
echo     try { >> download_images.ps1
echo         Write-Host "Downloading $file..." >> download_images.ps1
echo         Invoke-WebRequest -Uri $urls[$file] -OutFile $file -ErrorAction Stop >> download_images.ps1
echo         Write-Host "✓ $file downloaded successfully" -ForegroundColor Green >> download_images.ps1
echo     } catch { >> download_images.ps1
echo         Write-Host "✗ Failed to download $file" -ForegroundColor Red >> download_images.ps1
echo     } >> download_images.ps1
echo } >> download_images.ps1
echo. >> download_images.ps1
echo Write-Host "All downloads completed!" -ForegroundColor Cyan >> download_images.ps1

REM Run the PowerShell script
powershell -ExecutionPolicy Bypass -File download_images.ps1

REM Clean up
del download_images.ps1

echo.
echo Images have been downloaded to the current directory.
echo You can now use these as your placeholder images.
pause
