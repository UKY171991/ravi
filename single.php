<?php
/**
 * Template for displaying single blog posts
 */

get_header(); ?>

<section class="page-hero" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; padding: 150px 0 100px; margin-top: 100px;">
    <div class="container">
        <div class="text-center">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <div class="post-meta" style="opacity: 0.8; margin-top: 15px;">
                    <span><i class="fas fa-calendar"></i> <?php echo get_the_date(); ?></span>
                    <span style="margin-left: 20px;"><i class="fas fa-user"></i> <?php echo get_the_author(); ?></span>
                    <span style="margin-left: 20px;"><i class="fas fa-folder"></i> <?php the_category(', '); ?></span>
                </div>
            <?php endwhile; endif; rewind_posts(); ?>
        </div>
    </div>
</section>

<section class="single-post" style="padding: 100px 0;">
    <div class="container">
        <div class="post-content" style="display: grid; grid-template-columns: 2fr 1fr; gap: 50px;">
            <div class="main-content">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-image" style="margin-bottom: 30px;">
                            <?php the_post_thumbnail('techwix-hero', array('style' => 'width: 100%; border-radius: 10px;')); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-body">
                        <?php the_content(); ?>
                    </div>
                    
                    <div class="post-tags" style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #eee;">
                        <?php if (has_tag()) : ?>
                            <h4>Tags:</h4>
                            <div class="tags" style="margin-top: 10px;">
                                <?php the_tags('<span class="tag" style="display: inline-block; background: #f0f0f0; padding: 5px 10px; margin: 5px 5px 5px 0; border-radius: 15px; font-size: 12px;">', '</span><span class="tag" style="display: inline-block; background: #f0f0f0; padding: 5px 10px; margin: 5px 5px 5px 0; border-radius: 15px; font-size: 12px;">', '</span>'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="post-navigation" style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #eee; display: flex; justify-content: space-between;">
                        <div class="nav-previous">
                            <?php previous_post_link('%link', '<i class="fas fa-chevron-left"></i> Previous Post'); ?>
                        </div>
                        <div class="nav-next">
                            <?php next_post_link('%link', 'Next Post <i class="fas fa-chevron-right"></i>'); ?>
                        </div>
                    </div>
                    
                <?php endwhile; endif; ?>
                
                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="comments-section" style="margin-top: 50px;">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="sidebar">
                <div class="author-box" style="background: #f8fafc; padding: 30px; border-radius: 10px; margin-bottom: 30px; text-align: center;">
                    <div class="author-avatar" style="margin-bottom: 20px;">
                        <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('style' => 'border-radius: 50%;')); ?>
                    </div>
                    <h4><?php echo get_the_author(); ?></h4>
                    <p style="color: #666; font-size: 14px;"><?php echo get_the_author_meta('description'); ?></p>
                </div>
                
                <div class="recent-posts" style="background: #f8fafc; padding: 30px; border-radius: 10px; margin-bottom: 30px;">
                    <h3>Recent Posts</h3>
                    <?php
                    $recent_posts = get_posts(array(
                        'numberposts' => 5,
                        'post__not_in' => array(get_the_ID())
                    ));
                    
                    foreach ($recent_posts as $post) :
                        setup_postdata($post);
                    ?>
                        <div class="recent-post" style="margin: 15px 0; padding: 15px 0; border-bottom: 1px solid #ddd;">
                            <h4 style="margin: 0 0 5px 0; font-size: 14px;">
                                <a href="<?php the_permalink(); ?>" style="color: #1e3a8a; text-decoration: none;">
                                    <?php the_title(); ?>
                                </a>
                            </h4>
                            <p style="margin: 0; font-size: 12px; color: #666;">
                                <i class="fas fa-calendar"></i> <?php echo get_the_date(); ?>
                            </p>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
                
                <div class="categories" style="background: #f8fafc; padding: 30px; border-radius: 10px; margin-bottom: 30px;">
                    <h3>Categories</h3>
                    <ul style="list-style: none; padding: 0;">
                        <?php
                        $categories = get_categories();
                        foreach ($categories as $category) :
                        ?>
                            <li style="margin: 10px 0; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                <a href="<?php echo get_category_link($category->term_id); ?>" style="color: #333; text-decoration: none; display: flex; justify-content: space-between;">
                                    <span><?php echo $category->name; ?></span>
                                    <span style="color: #666; font-size: 12px;">(<?php echo $category->count; ?>)</span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
                <div class="cta-box" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; padding: 30px; border-radius: 10px; text-align: center;">
                    <h3>Need IT Solutions?</h3>
                    <p>Get expert advice and solutions for your business</p>
                    <a href="<?php echo home_url('/contact'); ?>" class="btn-primary" style="background: white; color: #1e3a8a; margin-top: 20px;">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@media (max-width: 768px) {
    .post-content {
        grid-template-columns: 1fr !important;
    }
    
    .post-navigation {
        flex-direction: column !important;
        gap: 20px;
    }
}

.post-body h1, .post-body h2, .post-body h3 {
    color: #1e3a8a;
    margin-top: 30px;
    margin-bottom: 15px;
}

.post-body p {
    margin-bottom: 20px;
    line-height: 1.7;
    color: #666;
}

.post-body ul, .post-body ol {
    margin-bottom: 20px;
    padding-left: 30px;
    color: #666;
}

.post-body img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    margin: 20px 0;
}
</style>

<?php get_footer(); ?>
