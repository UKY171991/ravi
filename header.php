<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Header -->
<header class="main-header bg-white shadow-sm sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light py-3">
            <!-- Logo -->
            <a class="navbar-brand fw-bold fs-1 text-primary d-flex align-items-center" href="<?php echo home_url(); ?>">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <i class="fas fa-cube me-2 text-primary"></i>Techwix
                <?php endif; ?>
            </a>
            
            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'navbar-nav mx-auto mb-2 mb-lg-0',
                        'container' => false,
                        'walker' => new Techwix_Bootstrap_Walker()
                    ));
                } else {
                    echo '<ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link fw-semibold px-3" href="' . home_url() . '">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fw-semibold px-3" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pages
                                </a>
                                <ul class="dropdown-menu border-0 shadow-sm" aria-labelledby="pagesDropdown">
                                    <li><a class="dropdown-item py-2" href="' . home_url('/about-us') . '">About Us</a></li>
                                    <li><a class="dropdown-item py-2" href="' . home_url('/services') . '">Our Services</a></li>
                                    <li><a class="dropdown-item py-2" href="' . home_url('/why-choose-us') . '">Why Choose Us</a></li>
                                    <li><a class="dropdown-item py-2" href="' . home_url('/team') . '">Our Team</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold px-3" href="' . home_url('/blog') . '">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold px-3" href="' . home_url('/shop') . '">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold px-3" href="' . home_url('/contact') . '">Contact</a>
                            </li>
                          </ul>';
                }
                ?>
                
                <!-- Header Right Section -->
                <div class="header-right d-flex align-items-center">
                    <!-- Cart Icon -->
                    <a href="<?php echo home_url('/cart'); ?>" class="cart-icon me-3 position-relative text-decoration-none">
                        <i class="fas fa-shopping-cart fs-5 text-dark"></i>
                        <span class="cart-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary" style="font-size: 0.7rem;">0</span>
                    </a>
                    
                    <!-- CTA Button -->
                    <a href="<?php echo home_url('/services'); ?>" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold">Get Started</a>
                </div>
            </div>
        </nav>
    </div>
</header>
