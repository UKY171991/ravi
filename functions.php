<?php
/**
 * Theme functions and definitions
 */

// Theme setup
function techwix_setup() {
    // Add theme support for various features
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'techwix'),
        'footer' => __('Footer Menu', 'techwix'),
    ));
    
    // Add custom image sizes
    add_image_size('techwix-hero', 800, 600, true);
    add_image_size('techwix-service', 400, 300, true);
    add_image_size('techwix-blog', 350, 250, true);
}
add_action('after_setup_theme', 'techwix_setup');

// Enqueue scripts and styles
function techwix_scripts() {
    wp_enqueue_style('techwix-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('techwix-animations', get_template_directory_uri() . '/assets/css/animations.css', array('techwix-style'), '1.0.0');
    wp_enqueue_script('techwix-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('techwix-script', 'techwix_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('techwix_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'techwix_scripts');

// Register widget areas
function techwix_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'techwix'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'techwix'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'techwix'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here.', 'techwix'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'techwix'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here.', 'techwix'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'techwix'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here.', 'techwix'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'techwix_widgets_init');

// Fallback menu function
function techwix_fallback_menu() {
    echo '<ul>';
    echo '<li><a href="' . home_url() . '">Home</a></li>';
    echo '<li><a href="' . home_url('/about-us') . '">About</a></li>';
    echo '<li><a href="' . home_url('/services') . '">Services</a></li>';
    echo '<li><a href="' . home_url('/blog') . '">Blog</a></li>';
    echo '<li><a href="' . home_url('/contact') . '">Contact</a></li>';
    echo '</ul>';
}

// Custom post type for Services
function techwix_register_services_post_type() {
    $labels = array(
        'name'               => 'Services',
        'singular_name'      => 'Service',
        'menu_name'          => 'Services',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Service',
        'edit_item'          => 'Edit Service',
        'new_item'           => 'New Service',
        'view_item'          => 'View Service',
        'search_items'       => 'Search Services',
        'not_found'          => 'No services found',
        'not_found_in_trash' => 'No services found in trash'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'service'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'          => 'dashicons-admin-tools'
    );

    register_post_type('service', $args);
}
add_action('init', 'techwix_register_services_post_type');

// Custom post type for Team Members
function techwix_register_team_post_type() {
    $labels = array(
        'name'               => 'Team Members',
        'singular_name'      => 'Team Member',
        'menu_name'          => 'Team',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Team Member',
        'edit_item'          => 'Edit Team Member',
        'new_item'           => 'New Team Member',
        'view_item'          => 'View Team Member',
        'search_items'       => 'Search Team Members',
        'not_found'          => 'No team members found',
        'not_found_in_trash' => 'No team members found in trash'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'team'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail'),
        'menu_icon'          => 'dashicons-groups'
    );

    register_post_type('team', $args);
}
add_action('init', 'techwix_register_team_post_type');

// Add custom meta boxes
function techwix_add_meta_boxes() {
    add_meta_box(
        'service_details',
        'Service Details',
        'techwix_service_details_callback',
        'service'
    );
    
    add_meta_box(
        'team_details',
        'Team Member Details',
        'techwix_team_details_callback',
        'team'
    );
}
add_action('add_meta_boxes', 'techwix_add_meta_boxes');

// Service details meta box callback
function techwix_service_details_callback($post) {
    wp_nonce_field('techwix_save_service_details', 'techwix_service_details_nonce');
    
    $icon = get_post_meta($post->ID, '_service_icon', true);
    $features = get_post_meta($post->ID, '_service_features', true);
    
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="service_icon">Service Icon (Font Awesome class)</label></th>';
    echo '<td><input type="text" id="service_icon" name="service_icon" value="' . esc_attr($icon) . '" placeholder="fas fa-server" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="service_features">Service Features (one per line)</label></th>';
    echo '<td><textarea id="service_features" name="service_features" rows="5" cols="50">' . esc_textarea($features) . '</textarea></td>';
    echo '</tr>';
    echo '</table>';
}

// Team details meta box callback
function techwix_team_details_callback($post) {
    wp_nonce_field('techwix_save_team_details', 'techwix_team_details_nonce');
    
    $position = get_post_meta($post->ID, '_team_position', true);
    $facebook = get_post_meta($post->ID, '_team_facebook', true);
    $twitter = get_post_meta($post->ID, '_team_twitter', true);
    $linkedin = get_post_meta($post->ID, '_team_linkedin', true);
    
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="team_position">Position</label></th>';
    echo '<td><input type="text" id="team_position" name="team_position" value="' . esc_attr($position) . '" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="team_facebook">Facebook URL</label></th>';
    echo '<td><input type="url" id="team_facebook" name="team_facebook" value="' . esc_attr($facebook) . '" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="team_twitter">Twitter URL</label></th>';
    echo '<td><input type="url" id="team_twitter" name="team_twitter" value="' . esc_attr($twitter) . '" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="team_linkedin">LinkedIn URL</label></th>';
    echo '<td><input type="url" id="team_linkedin" name="team_linkedin" value="' . esc_attr($linkedin) . '" /></td>';
    echo '</tr>';
    echo '</table>';
}

// Save meta box data
function techwix_save_meta_boxes($post_id) {
    // Save service details
    if (isset($_POST['techwix_service_details_nonce']) && wp_verify_nonce($_POST['techwix_service_details_nonce'], 'techwix_save_service_details')) {
        if (isset($_POST['service_icon'])) {
            update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
        }
        if (isset($_POST['service_features'])) {
            update_post_meta($post_id, '_service_features', sanitize_textarea_field($_POST['service_features']));
        }
    }
    
    // Save team details
    if (isset($_POST['techwix_team_details_nonce']) && wp_verify_nonce($_POST['techwix_team_details_nonce'], 'techwix_save_team_details')) {
        if (isset($_POST['team_position'])) {
            update_post_meta($post_id, '_team_position', sanitize_text_field($_POST['team_position']));
        }
        if (isset($_POST['team_facebook'])) {
            update_post_meta($post_id, '_team_facebook', esc_url_raw($_POST['team_facebook']));
        }
        if (isset($_POST['team_twitter'])) {
            update_post_meta($post_id, '_team_twitter', esc_url_raw($_POST['team_twitter']));
        }
        if (isset($_POST['team_linkedin'])) {
            update_post_meta($post_id, '_team_linkedin', esc_url_raw($_POST['team_linkedin']));
        }
    }
}
add_action('save_post', 'techwix_save_meta_boxes');

// Customizer options
function techwix_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('techwix_hero', array(
        'title' => __('Hero Section', 'techwix'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'WE PROVIDE 100% & TRUSTABLE',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'techwix'),
        'section' => 'techwix_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'IT Solution',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'techwix'),
        'section' => 'techwix_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_description', array(
        'default' => 'We provide the most responsive and functional IT design for companies and businesses worldwide.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_description', array(
        'label' => __('Hero Description', 'techwix'),
        'section' => 'techwix_hero',
        'type' => 'textarea',
    ));
    
    // Contact Information
    $wp_customize->add_section('techwix_contact', array(
        'title' => __('Contact Information', 'techwix'),
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('contact_phone', array(
        'default' => '+00(1) 123 456 7890',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label' => __('Phone Number', 'techwix'),
        'section' => 'techwix_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'default' => 'infotechmax@ourmail.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => __('Email Address', 'techwix'),
        'section' => 'techwix_contact',
        'type' => 'email',
    ));
    
    $wp_customize->add_setting('contact_address', array(
        'default' => 'New ipsum dolor amet, eiusmod adipisicing 147 NewYors, NY Adipisicing 123',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label' => __('Address', 'techwix'),
        'section' => 'techwix_contact',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'techwix_customize_register');

// Excerpt length
function techwix_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'techwix_excerpt_length');

// Excerpt more
function techwix_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'techwix_excerpt_more');

// Contact form handling
function techwix_handle_contact_form() {
    if (isset($_POST['contact_form_submit'])) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);
        
        $to = get_option('admin_email');
        $email_subject = 'Contact Form: ' . $subject;
        $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = array('Content-Type: text/html; charset=UTF-8', "From: $name <$email>");
        
        if (wp_mail($to, $email_subject, $email_body, $headers)) {
            wp_redirect(add_query_arg('contact', 'success', wp_get_referer()));
        } else {
            wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
        }
        exit;
    }
}
add_action('template_redirect', 'techwix_handle_contact_form');
?>
