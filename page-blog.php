<?php
/**
 * Template Name: Blog
 */

get_header(); ?>

<section class="page-hero" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; padding: 150px 0 100px; margin-top: 100px;">
    <div class="container">
        <div class="text-center">
            <h1>Our Blog</h1>
            <p>Stay updated with the latest news and insights from the tech world</p>
        </div>
    </div>
</section>

<section class="blog-page" style="padding: 100px 0;">
    <div class="container">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $blog_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 6,
            'paged' => $paged
        ));
        
        if ($blog_query->have_posts()) :
        ?>
            <div class="blog-grid">
                <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
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
                                <span><i class="fas fa-folder"></i> <?php the_category(', '); ?></span>
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
                echo paginate_links(array(
                    'total' => $blog_query->max_num_pages,
                    'current' => $paged,
                    'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                    'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                ));
                ?>
            </div>
            
        <?php else : ?>
            <div style="text-align: center; padding: 50px 0;">
                <h2>No posts found</h2>
                <p>There are no blog posts to display at the moment.</p>
            </div>
        <?php endif; wp_reset_postdata(); ?>
    </div>
</section>

<style>
.pagination a,
.pagination span {
    display: inline-block;
    padding: 10px 15px;
    margin: 0 5px;
    background: #f8fafc;
    color: #333;
    text-decoration: none;
    border-radius: 5px;
    transition: all 0.3s;
}

.pagination a:hover,
.pagination .current {
    background: #3b82f6;
    color: white;
}
</style>

<?php get_footer(); ?>
