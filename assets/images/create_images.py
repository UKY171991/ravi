import os
from PIL import Image, ImageDraw, ImageFont
import random

# Create directory if it doesn't exist
os.makedirs('.', exist_ok=True)

def create_placeholder_image(width, height, text, filename, bg_color=None, text_color='white'):
    """Create a professional placeholder image"""
    
    # Define color schemes
    colors = [
        '#3b82f6',  # Blue
        '#10b981',  # Green  
        '#f59e0b',  # Amber
        '#ef4444',  # Red
        '#8b5cf6',  # Purple
        '#06b6d4',  # Cyan
    ]
    
    if bg_color is None:
        bg_color = random.choice(colors)
    
    # Create image
    img = Image.new('RGB', (width, height), bg_color)
    draw = ImageDraw.Draw(img)
    
    # Try to use a nice font, fallback to default
    try:
        font_size = min(width, height) // 12
        font = ImageFont.load_default()
    except:
        font = ImageFont.load_default()
    
    # Add gradient effect
    for i in range(height):
        alpha = 0.3 * (i / height)
        overlay_color = tuple(int(c * (1 - alpha)) for c in img.getpixel((0, i)))
        for j in range(width):
            img.putpixel((j, i), overlay_color)
    
    # Add decorative elements
    # Add some circles for decoration
    circle_colors = ['rgba(255,255,255,0.1)', 'rgba(255,255,255,0.05)', 'rgba(0,0,0,0.1)']
    
    # Draw decorative circles
    draw.ellipse([width//6, height//6, width//4, height//4], fill='rgba(255,255,255,30)')
    draw.ellipse([3*width//4, height//8, 7*width//8, 3*height//8], fill='rgba(255,255,255,20)')
    draw.ellipse([width//8, 3*height//4, 3*width//8, 7*height//8], fill='rgba(255,255,255,25)')
    
    # Calculate text position
    bbox = draw.textbbox((0, 0), text, font=font)
    text_width = bbox[2] - bbox[0]
    text_height = bbox[3] - bbox[1]
    
    text_x = (width - text_width) // 2
    text_y = (height - text_height) // 2
    
    # Add text shadow
    draw.text((text_x + 2, text_y + 2), text, fill='rgba(0,0,0,0.3)', font=font)
    # Add main text
    draw.text((text_x, text_y), text, fill=text_color, font=font)
    
    # Save image
    img.save(filename, 'PNG' if filename.endswith('.png') else 'JPEG', quality=95)
    print(f"Created: {filename}")

# Generate all missing images
images_to_create = [
    # About section images
    (500, 400, 'About Our Company', 'about-image.jpg', '#1e40af'),
    
    # Team member images (professional headshots)
    (300, 300, 'James Smith\nCFO Apple Corp', 'team-1.jpg', '#374151'),
    (300, 300, 'Monica Blews\nManager', 'team-2.jpg', '#1f2937'),
    (300, 300, 'Mike Wilson\nManager BusinessPro', 'team-3.jpg', '#111827'),
    (300, 300, 'Emma Davis\nDirector GlobalTech', 'team-4.jpg', '#0f172a'),
    
    # Additional images for completeness
    (600, 400, 'Professional IT Solutions', 'about-detailed.jpg', '#0ea5e9'),
    (400, 300, 'Our Mission & Vision', 'mission-vision.jpg', '#7c3aed'),
    (350, 400, 'Professional Team', 'about-hero-1.jpg', '#059669'),
    (250, 320, 'Modern Office', 'about-hero-2.jpg', '#dc2626'),
]

print("Generating professional placeholder images...")
print("-" * 50)

for width, height, text, filename, bg_color in images_to_create:
    create_placeholder_image(width, height, text, filename, bg_color)

print("-" * 50)
print("✅ All placeholder images created successfully!")
print("\nImages created:")
for _, _, _, filename, _ in images_to_create:
    print(f"  • {filename}")
