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
    // Enqueue Bootstrap 5
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');
    
    // Enqueue FontAwesome
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css', array(), '6.5.0');
    
    // Enqueue Google Fonts (Poppins)
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Theme styles
    wp_enqueue_style('techwix-style', get_stylesheet_uri(), array('bootstrap', 'fontawesome', 'google-fonts'), '1.0.0');
    wp_enqueue_style('techwix-animations', get_template_directory_uri() . '/assets/css/animations.css', array('techwix-style'), '1.0.0');
    
    // Scripts
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
    wp_enqueue_script('techwix-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery', 'bootstrap-js'), '1.0.0', true);
    
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

// Add theme customizer support
function techwix_customize_register($wp_customize) {
    // Site Identity Section
    $wp_customize->add_section('techwix_header_section', array(
        'title' => __('Header Settings', 'techwix'),
        'priority' => 30,
    ));
    
    // Top Bar Phone
    $wp_customize->add_setting('techwix_topbar_phone', array(
        'default' => '+00(1) 123 456 7890',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('techwix_topbar_phone', array(
        'label' => __('Top Bar Phone', 'techwix'),
        'section' => 'techwix_header_section',
        'type' => 'text',
    ));
    
    // Top Bar Email
    $wp_customize->add_setting('techwix_topbar_email', array(
        'default' => 'infotechmax@ourmail.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('techwix_topbar_email', array(
        'label' => __('Top Bar Email', 'techwix'),
        'section' => 'techwix_header_section',
        'type' => 'email',
    ));
    
    // Social Media Section
    $wp_customize->add_section('techwix_social_section', array(
        'title' => __('Social Media Links', 'techwix'),
        'priority' => 35,
    ));
    
    $social_networks = array(
        'facebook' => 'Facebook',
        'twitter' => 'Twitter',
        'linkedin' => 'LinkedIn',
        'instagram' => 'Instagram',
    );
    
    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting('techwix_' . $network, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control('techwix_' . $network, array(
            'label' => __($label . ' URL', 'techwix'),
            'section' => 'techwix_social_section',
            'type' => 'url',
        ));
    }
}
add_action('customize_register', 'techwix_customize_register');

// Customizer CSS output
function techwix_customizer_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo get_theme_mod('techwix_primary_color', '#1e3a8a'); ?>;
            --secondary-color: <?php echo get_theme_mod('techwix_secondary_color', '#3b82f6'); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'techwix_customizer_css');

// Add excerpt support for pages
function techwix_add_excerpts_to_pages() {
    add_post_type_support('page', 'excerpt');
}
add_action('init', 'techwix_add_excerpts_to_pages');

// Custom excerpt length
function techwix_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'techwix_excerpt_length', 999);

// Custom excerpt more
function techwix_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'techwix_excerpt_more');

// Contact form handling
function techwix_handle_contact_form() {
    if (isset($_POST['submit_contact']) || isset($_POST['contact_form_submit'])) {
        // Verify nonce for security
        if (!wp_verify_nonce($_POST['contact_nonce'] ?? '', 'contact_form_nonce')) {
            wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
            exit;
        }
        
        $name = sanitize_text_field($_POST['name'] ?? '');
        $email = sanitize_email($_POST['email'] ?? '');
        $phone = sanitize_text_field($_POST['phone'] ?? '');
        $subject = sanitize_text_field($_POST['subject'] ?? 'Contact Form Submission');
        $message = sanitize_textarea_field($_POST['message'] ?? '');
        
        // Validate required fields
        if (empty($name) || empty($email) || empty($message)) {
            wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
            exit;
        }
        
        $to = get_option('admin_email');
        $email_subject = 'Contact Form: ' . $subject;
        $email_body = "<h3>New Contact Form Submission</h3>";
        $email_body .= "<p><strong>Name:</strong> $name</p>";
        $email_body .= "<p><strong>Email:</strong> $email</p>";
        if (!empty($phone)) {
            $email_body .= "<p><strong>Phone:</strong> $phone</p>";
        }
        $email_body .= "<p><strong>Subject:</strong> $subject</p>";
        $email_body .= "<p><strong>Message:</strong></p>";
        $email_body .= "<p>" . nl2br($message) . "</p>";
        
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
            'Reply-To: ' . $name . ' <' . $email . '>'
        );
        
        if (wp_mail($to, $email_subject, $email_body, $headers)) {
            wp_redirect(add_query_arg('contact', 'success', wp_get_referer()));
        } else {
            wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
        }
        exit;
    }
}
add_action('template_redirect', 'techwix_handle_contact_form');

// Newsletter form handling
function techwix_handle_newsletter() {
    if (isset($_POST['newsletter_submit'])) {
        // Verify nonce for security
        if (!wp_verify_nonce($_POST['newsletter_nonce'] ?? '', 'newsletter_nonce')) {
            wp_redirect(add_query_arg('newsletter', 'error', wp_get_referer()));
            exit;
        }
        
        $email = sanitize_email($_POST['newsletter_email'] ?? '');
        
        // Validate email
        if (empty($email) || !is_email($email)) {
            wp_redirect(add_query_arg('newsletter', 'error', wp_get_referer()));
            exit;
        }
        
        // Here you can add the email to your newsletter service
        // For now, we'll just send a notification to admin
        $to = get_option('admin_email');
        $subject = 'New Newsletter Subscription';
        $message = "New newsletter subscription from: " . $email;
        $headers = array('Content-Type: text/html; charset=UTF-8');
        
        if (wp_mail($to, $subject, $message, $headers)) {
            wp_redirect(add_query_arg('newsletter', 'success', wp_get_referer()));
        } else {
            wp_redirect(add_query_arg('newsletter', 'error', wp_get_referer()));
        }
        exit;
    }
}
add_action('template_redirect', 'techwix_handle_newsletter');

// AJAX Contact Form Handler
function handle_contact_form_ajax() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'techwix_nonce')) {
        wp_die('Security check failed');
    }
    
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $subject = sanitize_text_field($_POST['subject'] ?? 'Contact Form Submission');
    $message = sanitize_textarea_field($_POST['message'] ?? '');
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error('Please fill in all required fields.');
    }
    
    $to = get_option('admin_email');
    $email_subject = 'Contact Form: ' . $subject;
    $email_body = "<h3>New Contact Form Submission</h3>";
    $email_body .= "<p><strong>Name:</strong> $name</p>";
    $email_body .= "<p><strong>Email:</strong> $email</p>";
    if (!empty($phone)) {
        $email_body .= "<p><strong>Phone:</strong> $phone</p>";
    }
    $email_body .= "<p><strong>Subject:</strong> $subject</p>";
    $email_body .= "<p><strong>Message:</strong></p>";
    $email_body .= "<p>" . nl2br($message) . "</p>";
    
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );
    
    if (wp_mail($to, $email_subject, $email_body, $headers)) {
        wp_send_json_success('Message sent successfully!');
    } else {
        wp_send_json_error('Failed to send message. Please try again.');
    }
}
add_action('wp_ajax_handle_contact_form', 'handle_contact_form_ajax');
add_action('wp_ajax_nopriv_handle_contact_form', 'handle_contact_form_ajax');

// AJAX Newsletter Form Handler
function handle_newsletter_form_ajax() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'techwix_nonce')) {
        wp_die('Security check failed');
    }
    
    $email = sanitize_email($_POST['newsletter_email'] ?? '');
    
    // Validate email
    if (empty($email) || !is_email($email)) {
        wp_send_json_error('Please enter a valid email address.');
    }
    
    // Here you can add the email to your newsletter service
    // For now, we'll just send a notification to admin
    $to = get_option('admin_email');
    $subject = 'New Newsletter Subscription';
    $message = "New newsletter subscription from: " . $email;
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    if (wp_mail($to, $subject, $message, $headers)) {
        wp_send_json_success('Successfully subscribed to newsletter!');
    } else {
        wp_send_json_error('Failed to subscribe. Please try again.');
    }
}
add_action('wp_ajax_handle_newsletter_form', 'handle_newsletter_form_ajax');
add_action('wp_ajax_nopriv_handle_newsletter_form', 'handle_newsletter_form_ajax');

// Bootstrap 5 Menu Walker
class Techwix_Bootstrap_Walker extends Walker_Nav_Menu {
    
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }
    
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        
        $has_children = in_array('menu-item-has-children', $classes);
        
        if ($depth === 0) {
            $class_names = $has_children ? 'nav-item dropdown' : 'nav-item';
        } else {
            $class_names = '';
        }
        
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $class_names .'>';
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        if ($depth === 0) {
            $link_class = $has_children ? 'nav-link dropdown-toggle' : 'nav-link';
            if ($has_children) {
                $attributes .= ' data-bs-toggle="dropdown" role="button" aria-expanded="false"';
            }
        } else {
            $link_class = 'dropdown-item';
        }
        
        $attributes .= ' class="' . $link_class . '"';
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes .'>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

// Helper function to get customizer values
function techwix_get_option($option_name, $default = '') {
    return get_theme_mod($option_name, $default);
}
?>
