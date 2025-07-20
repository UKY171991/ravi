import base64
from io import BytesIO

# Create simple SVG-based dummy images
def create_svg_image(width, height, text, bg_color="#3b82f6", text_color="#ffffff"):
    svg_content = f'''<svg xmlns="http://www.w3.org/2000/svg" width="{width}" height="{height}" viewBox="0 0 {width} {height}">
        <rect width="100%" height="100%" fill="{bg_color}"/>
        <text x="50%" y="50%" font-family="Arial, sans-serif" font-size="{min(width, height)//15}" fill="{text_color}" text-anchor="middle" dy="0.35em">{text}</text>
        <circle cx="{width//4}" cy="{height//4}" r="20" fill="rgba(255,255,255,0.1)"/>
        <circle cx="{3*width//4}" cy="{height//4}" r="15" fill="rgba(255,255,255,0.1)"/>
        <circle cx="{width//2}" cy="{3*height//4}" r="25" fill="rgba(255,255,255,0.1)"/>
    </svg>'''
    return f"data:image/svg+xml;base64,{base64.b64encode(svg_content.encode()).decode()}"

# Generate all needed images
images = {
    'about-image.png': (500, 400, 'About Our Company'),
    'TECW0130.png': (100, 100, 'Phone', '#1e3a8a'),
    'TECW0131.png': (100, 100, 'Email', '#1e3a8a'), 
    'TECW0132.png': (100, 100, 'Location', '#1e3a8a'),
    'about-hero-1.jpg': (300, 400, 'Professional Team'),
    'about-hero-2.jpg': (200, 260, 'Our Office'),
    'team-1.jpg': (250, 300, 'Andrew Max'),
    'team-2.jpg': (250, 300, 'Arnold Human'),
    'team-3.jpg': (250, 300, 'Joakim Ken'),
    'team-4.jpg': (250, 300, 'Mike Holder'),
    'mission-vision.jpg': (500, 400, 'Mission & Vision'),
    'about-detailed.jpg': (600, 400, 'About Our Company')
}

print("Generated SVG data URLs for dummy images:")
for filename, (width, height, text, *colors) in images.items():
    bg_color = colors[0] if colors else "#3b82f6"
    data_url = create_svg_image(width, height, text, bg_color)
    print(f"{filename}: {data_url[:100]}...")
