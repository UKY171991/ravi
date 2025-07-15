<?php
/**
 * Template for displaying single service posts
 */

get_header(); ?>

<section class="page-hero" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; padding: 150px 0 100px; margin-top: 100px;">
    <div class="container">
        <div class="text-center">
            <h1><?php the_title(); ?></h1>
            <p>Detailed information about our service</p>
        </div>
    </div>
</section>

<section class="service-single" style="padding: 100px 0;">
    <div class="container">
        <div class="service-content" style="display: grid; grid-template-columns: 2fr 1fr; gap: 50px;">
            <div class="main-content">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="service-image" style="margin-bottom: 30px;">
                            <?php the_post_thumbnail('techwix-hero', array('style' => 'width: 100%; border-radius: 10px;')); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="service-description">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php 
                    $features = get_post_meta(get_the_ID(), '_service_features', true);
                    if ($features) : 
                        $feature_list = explode("\n", $features);
                    ?>
                        <div class="service-features" style="margin-top: 40px;">
                            <h3>Key Features</h3>
                            <ul style="list-style: none; padding: 0;">
                                <?php foreach ($feature_list as $feature) : ?>
                                    <?php if (trim($feature)) : ?>
                                        <li style="padding: 10px 0; border-bottom: 1px solid #eee; position: relative; padding-left: 30px;">
                                            <i class="fas fa-check" style="color: #3b82f6; position: absolute; left: 0; top: 12px;"></i>
                                            <?php echo esc_html(trim($feature)); ?>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                <?php endwhile; endif; ?>
            </div>
            
            <div class="sidebar">
                <div class="service-info" style="background: #f8fafc; padding: 30px; border-radius: 10px; margin-bottom: 30px;">
                    <h3>Service Information</h3>
                    <div class="info-item" style="margin: 20px 0; padding: 15px 0; border-bottom: 1px solid #ddd;">
                        <strong>Category:</strong> IT Services
                    </div>
                    <div class="info-item" style="margin: 20px 0; padding: 15px 0; border-bottom: 1px solid #ddd;">
                        <strong>Duration:</strong> Project Based
                    </div>
                    <div class="info-item" style="margin: 20px 0; padding: 15px 0; border-bottom: 1px solid #ddd;">
                        <strong>Support:</strong> 24/7 Available
                    </div>
                    <div class="info-item" style="margin: 20px 0; padding: 15px 0;">
                        <strong>Consultation:</strong> Free
                    </div>
                </div>
                
                <div class="cta-box" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; padding: 30px; border-radius: 10px; text-align: center;">
                    <h3>Need This Service?</h3>
                    <p>Get in touch with our experts for a free consultation</p>
                    <a href="<?php echo home_url('/contact'); ?>" class="btn-primary" style="background: white; color: #1e3a8a; margin-top: 20px;">Contact Us</a>
                </div>
                
                <div class="related-services" style="margin-top: 30px;">
                    <h3>Other Services</h3>
                    <?php
                    $related_services = get_posts(array(
                        'post_type' => 'service',
                        'posts_per_page' => 3,
                        'post__not_in' => array(get_the_ID())
                    ));
                    
                    if ($related_services) :
                        foreach ($related_services as $service) :
                            setup_postdata($service);
                    ?>
                        <div class="related-service" style="margin: 15px 0; padding: 15px; background: #f8fafc; border-radius: 5px;">
                            <h4 style="margin: 0 0 10px 0; font-size: 16px;">
                                <a href="<?php echo get_permalink($service->ID); ?>" style="color: #1e3a8a; text-decoration: none;">
                                    <?php echo get_the_title($service->ID); ?>
                                </a>
                            </h4>
                            <p style="margin: 0; font-size: 14px; color: #666;">
                                <?php echo wp_trim_words(get_the_excerpt($service->ID), 10); ?>
                            </p>
                        </div>
                    <?php
                        endforeach;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@media (max-width: 768px) {
    .service-content {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php get_footer(); ?>
