<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Top Bar -->
<div class="top-bar">
    <div class="container">
        <div class="contact-info">
            <span><i class="fas fa-phone"></i> +00(1) 123 456 7890</span>
            <span><i class="fas fa-envelope"></i> infotechmax@ourmail.com</span>
        </div>
        <div class="social-links">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div>

<!-- Header -->
<header class="header">
    <div class="main-header">
        <div class="container">
            <div class="nav-container">
                <a href="<?php echo home_url(); ?>" class="logo">
                    Techwix
                </a>
                
                <nav class="main-nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'main-menu',
                        'container' => false,
                        'fallback_cb' => 'techwix_fallback_menu'
                    ));
                    ?>
                </nav>
                
                <a href="<?php echo home_url('/services'); ?>" class="cta-button">Get Started</a>
            </div>
        </div>
    </div>
</header>
