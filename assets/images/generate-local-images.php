<?php
/**
 * Simple image generator for missing images
 * Run this file in browser to generate placeholder images
 */

// Set content type to PNG
header('Content-Type: image/png');

// Get parameters
$width = isset($_GET['width']) ? (int)$_GET['width'] : 400;
$height = isset($_GET['height']) ? (int)$_GET['height'] : 300;
$text = isset($_GET['text']) ? $_GET['text'] : 'Image';
$bg_color = isset($_GET['bg']) ? $_GET['bg'] : '#667eea';
$text_color = isset($_GET['color']) ? $_GET['color'] : '#ffffff';

// Create image
$image = imagecreate($width, $height);

// Convert hex colors to RGB
function hexToRgb($hex) {
    $hex = str_replace('#', '', $hex);
    return [
        hexdec(substr($hex, 0, 2)),
        hexdec(substr($hex, 2, 2)),
        hexdec(substr($hex, 4, 2))
    ];
}

$bg_rgb = hexToRgb($bg_color);
$text_rgb = hexToRgb($text_color);

// Allocate colors
$background = imagecolorallocate($image, $bg_rgb[0], $bg_rgb[1], $bg_rgb[2]);
$text_color_res = imagecolorallocate($image, $text_rgb[0], $text_rgb[1], $text_rgb[2]);

// Fill background
imagefill($image, 0, 0, $background);

// Add text
$font_size = 5;
$text_width = imagefontwidth($font_size) * strlen($text);
$text_height = imagefontheight($font_size);
$x = ($width - $text_width) / 2;
$y = ($height - $text_height) / 2;

imagestring($image, $font_size, $x, $y, $text, $text_color_res);

// Add dimensions text
$dimensions = $width . 'x' . $height;
$dim_width = imagefontwidth(3) * strlen($dimensions);
$dim_x = ($width - $dim_width) / 2;
$dim_y = $y + 30;

imagestring($image, 3, $dim_x, $dim_y, $dimensions, $text_color_res);

// Save or output image
if (isset($_GET['save'])) {
    $filename = $_GET['save'] . '.png';
    imagepng($image, $filename);
    echo "Image saved as: " . $filename;
} else {
    imagepng($image);
}

// Clean up
imagedestroy($image);
?>
