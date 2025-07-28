# PowerShell script to generate placeholder images
# This uses .NET System.Drawing classes to create images

Add-Type -AssemblyName System.Drawing

function Create-PlaceholderImage {
    param(
        [int]$Width = 400,
        [int]$Height = 300,
        [string]$Text = "Image",
        [string]$FileName = "placeholder.jpg",
        [string]$BackgroundColor = "#667eea",
        [string]$TextColor = "#ffffff"
    )
    
    # Create bitmap
    $bitmap = New-Object System.Drawing.Bitmap($Width, $Height)
    $graphics = [System.Drawing.Graphics]::FromImage($bitmap)
    
    # Parse colors
    $bgColor = [System.Drawing.ColorTranslator]::FromHtml($BackgroundColor)
    $txtColor = [System.Drawing.ColorTranslator]::FromHtml($TextColor)
    
    # Fill background
    $brush = New-Object System.Drawing.SolidBrush($bgColor)
    $graphics.FillRectangle($brush, 0, 0, $Width, $Height)
    
    # Create font and text brush
    $font = New-Object System.Drawing.Font("Arial", 24, [System.Drawing.FontStyle]::Bold)
    $textBrush = New-Object System.Drawing.SolidBrush($txtColor)
    
    # Measure text
    $textSize = $graphics.MeasureString($Text, $font)
    $x = ($Width - $textSize.Width) / 2
    $y = ($Height - $textSize.Height) / 2 - 20
    
    # Draw main text
    $graphics.DrawString($Text, $font, $textBrush, $x, $y)
    
    # Draw dimensions
    $dimFont = New-Object System.Drawing.Font("Arial", 14)
    $dimensions = "$Width×$Height"
    $dimSize = $graphics.MeasureString($dimensions, $dimFont)
    $dimX = ($Width - $dimSize.Width) / 2
    $dimY = $y + 40
    $graphics.DrawString($dimensions, $dimFont, $textBrush, $dimX, $dimY)
    
    # Save image
    $bitmap.Save($FileName, [System.Drawing.Imaging.ImageFormat]::Jpeg)
    
    # Cleanup
    $graphics.Dispose()
    $bitmap.Dispose()
    $brush.Dispose()
    $textBrush.Dispose()
    $font.Dispose()
    $dimFont.Dispose()
    
    Write-Host "Created: $FileName" -ForegroundColor Green
}

# Set the directory
$imageDir = "C:\xampp\htdocs\ravi\wp-content\themes\ravi\assets\images"
Set-Location $imageDir

Write-Host "Generating placeholder images..." -ForegroundColor Yellow

# About section image
Create-PlaceholderImage -Width 500 -Height 400 -Text "About Us" -FileName "about-hero.jpg" -BackgroundColor "#f8f9fa" -TextColor "#333333"

# Portfolio images
Create-PlaceholderImage -Width 400 -Height 300 -Text "E-commerce Platform" -FileName "portfolio-1.jpg" -BackgroundColor "#667eea"
Create-PlaceholderImage -Width 400 -Height 300 -Text "Healthcare App" -FileName "portfolio-2.jpg" -BackgroundColor "#10b981"
Create-PlaceholderImage -Width 400 -Height 300 -Text "Cloud Infrastructure" -FileName "portfolio-3.jpg" -BackgroundColor "#f59e0b"
Create-PlaceholderImage -Width 400 -Height 300 -Text "Corporate Website" -FileName "portfolio-4.jpg" -BackgroundColor "#8b5cf6"
Create-PlaceholderImage -Width 400 -Height 300 -Text "Security System" -FileName "portfolio-5.jpg" -BackgroundColor "#ef4444"
Create-PlaceholderImage -Width 400 -Height 300 -Text "Finance App" -FileName "portfolio-6.jpg" -BackgroundColor "#06b6d4"

# Blog images
Create-PlaceholderImage -Width 400 -Height 250 -Text "AI in Business" -FileName "blog-1.jpg" -BackgroundColor "#4f46e5"
Create-PlaceholderImage -Width 400 -Height 250 -Text "Cybersecurity" -FileName "blog-2.jpg" -BackgroundColor "#059669"
Create-PlaceholderImage -Width 400 -Height 250 -Text "Cloud Computing" -FileName "blog-3.jpg" -BackgroundColor "#dc2626"

# Avatar images
Create-PlaceholderImage -Width 150 -Height 150 -Text "JS" -FileName "avatar-1.jpg" -BackgroundColor "#3b82f6"
Create-PlaceholderImage -Width 150 -Height 150 -Text "MB" -FileName "avatar-2.jpg" -BackgroundColor "#ef4444"
Create-PlaceholderImage -Width 150 -Height 150 -Text "MW" -FileName "avatar-3.jpg" -BackgroundColor "#10b981"
Create-PlaceholderImage -Width 150 -Height 150 -Text "ED" -FileName "avatar-4.jpg" -BackgroundColor "#f59e0b"

Write-Host "All placeholder images generated successfully!" -ForegroundColor Green
Write-Host "Images saved to: $imageDir" -ForegroundColor Cyan

# List generated files
Write-Host "`nGenerated files:" -ForegroundColor Yellow
Get-ChildItem -Filter "*.jpg" | Where-Object { $_.Name -match "^(about-hero|portfolio-|blog-|avatar-)" } | ForEach-Object {
    Write-Host "  - $($_.Name)" -ForegroundColor White
}
