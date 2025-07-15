<?php
/**
 * Archive template for Services post type
 */

get_header(); ?>

<section class="page-hero" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; padding: 150px 0 100px; margin-top: 100px;">
    <div class="container">
        <div class="text-center">
            <h1>Our Services</h1>
            <p>Comprehensive IT solutions to help your business grow and succeed</p>
        </div>
    </div>
</section>

<section class="services-archive" style="padding: 100px 0;">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="services-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="service-card">
                        <?php 
                        $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                        if (!$icon) $icon = 'fas fa-cogs';
                        ?>
                        <div class="icon">
                            <i class="<?php echo esc_attr($icon); ?>"></i>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn-primary" style="display: inline-block; margin-top: 20px;">Learn More</a>
                    </div>
                <?php endwhile; ?>
            </div>
            
            <div class="pagination" style="margin-top: 50px; text-align: center;">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                    'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                ));
                ?>
            </div>
            
        <?php else : ?>
            <div style="text-align: center; padding: 50px 0;">
                <h2>No services found</h2>
                <p>We haven't added any services yet. Please check back soon!</p>
                <a href="<?php echo home_url(); ?>" class="btn-primary" style="margin-top: 20px;">Back to Home</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="service-process" style="padding: 100px 0; background: #f8fafc;">
    <div class="container">
        <div class="section-header">
            <h2>Our Process</h2>
            <p>How we deliver exceptional IT solutions for your business</p>
        </div>
        
        <div class="process-steps" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-top: 60px;">
            <div class="step" style="text-align: center; position: relative;">
                <div class="step-number" style="width: 60px; height: 60px; background: #3b82f6; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 24px; font-weight: bold;">1</div>
                <h3>Analysis</h3>
                <p>We analyze your business requirements and identify the best solutions for your needs.</p>
            </div>
            
            <div class="step" style="text-align: center; position: relative;">
                <div class="step-number" style="width: 60px; height: 60px; background: #3b82f6; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 24px; font-weight: bold;">2</div>
                <h3>Planning</h3>
                <p>We create a detailed project plan with timelines, milestones, and deliverables.</p>
            </div>
            
            <div class="step" style="text-align: center; position: relative;">
                <div class="step-number" style="width: 60px; height: 60px; background: #3b82f6; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 24px; font-weight: bold;">3</div>
                <h3>Implementation</h3>
                <p>Our expert team implements the solution with precision and attention to detail.</p>
            </div>
            
            <div class="step" style="text-align: center; position: relative;">
                <div class="step-number" style="width: 60px; height: 60px; background: #3b82f6; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 24px; font-weight: bold;">4</div>
                <h3>Support</h3>
                <p>We provide ongoing support and maintenance to ensure optimal performance.</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
