<?php
/**
 * Archive template for displaying blog posts and other archives
 */

get_header(); ?>

<section class="page-hero" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; padding: 150px 0 100px; margin-top: 100px;">
    <div class="container">
        <div class="text-center">
            <h1>
                <?php
                if (is_category()) {
                    echo 'Category: ' . single_cat_title('', false);
                } elseif (is_tag()) {
                    echo 'Tag: ' . single_tag_title('', false);
                } elseif (is_author()) {
                    echo 'Author: ' . get_the_author();
                } elseif (is_date()) {
                    echo 'Archive: ' . get_the_date('F Y');
                } else {
                    echo 'Archives';
                }
                ?>
            </h1>
            <p>
                <?php
                if (is_category()) {
                    echo category_description();
                } elseif (is_tag()) {
                    echo tag_description();
                } else {
                    echo 'Browse our content archives';
                }
                ?>
            </p>
        </div>
    </div>
</section>

<section class="archive-content" style="padding: 100px 0;">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="blog-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="blog-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="blog-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('techwix-blog'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="blog-card-content">
                            <div class="blog-meta">
                                <span><i class="fas fa-calendar"></i> <?php echo get_the_date(); ?></span>
                                <span><i class="fas fa-user"></i> <?php echo get_the_author(); ?></span>
                                <?php if (!is_category()) : ?>
                                    <span><i class="fas fa-folder"></i> <?php the_category(', '); ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            
                            <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
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
                <h2>No posts found</h2>
                <p>Sorry, no posts were found in this archive.</p>
                <a href="<?php echo home_url(); ?>" class="btn-primary" style="margin-top: 20px;">Back to Home</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
