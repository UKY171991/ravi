<?php
/**
 * Search results template
 */

get_header(); ?>

<section class="page-hero" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; padding: 150px 0 100px; margin-top: 100px;">
    <div class="container">
        <div class="text-center">
            <h1>Search Results</h1>
            <p>
                <?php if (have_posts()) : ?>
                    Search results for: "<?php echo get_search_query(); ?>"
                <?php else : ?>
                    No results found for: "<?php echo get_search_query(); ?>"
                <?php endif; ?>
            </p>
        </div>
    </div>
</section>

<section class="search-results" style="padding: 100px 0;">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="results-count" style="margin-bottom: 40px; padding: 20px; background: #f8fafc; border-radius: 10px;">
                <p style="margin: 0; color: #666;">
                    Found <?php echo $wp_query->found_posts; ?> result(s) for "<?php echo get_search_query(); ?>"
                </p>
            </div>
            
            <div class="search-results-list">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="search-result-item" style="background: white; padding: 30px; margin-bottom: 30px; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                        <div class="result-content" style="display: flex; gap: 30px; align-items: start;">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="result-image" style="flex-shrink: 0;">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('techwix-blog', array('style' => 'width: 150px; height: 100px; object-fit: cover; border-radius: 5px;')); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="result-text" style="flex: 1;">
                                <div class="result-meta" style="margin-bottom: 10px; color: #666; font-size: 14px;">
                                    <span><i class="fas fa-calendar"></i> <?php echo get_the_date(); ?></span>
                                    <span style="margin-left: 20px;"><i class="fas fa-user"></i> <?php echo get_the_author(); ?></span>
                                    <span style="margin-left: 20px;"><i class="fas fa-folder"></i> 
                                        <?php 
                                        if (get_post_type() == 'service') {
                                            echo 'Service';
                                        } else {
                                            the_category(', ');
                                        }
                                        ?>
                                    </span>
                                </div>
                                
                                <h3 style="margin-bottom: 15px;">
                                    <a href="<?php the_permalink(); ?>" style="color: #1e3a8a; text-decoration: none;">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                
                                <p style="color: #666; line-height: 1.6; margin-bottom: 15px;">
                                    <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                                </p>
                                
                                <a href="<?php the_permalink(); ?>" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
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
                <div class="no-results-icon" style="font-size: 80px; color: #3b82f6; margin-bottom: 30px;">
                    <i class="fas fa-search"></i>
                </div>
                
                <h2 style="color: #1e3a8a; margin-bottom: 20px;">No Results Found</h2>
                <p style="color: #666; margin-bottom: 30px;">
                    Sorry, no results were found for "<?php echo get_search_query(); ?>". Try searching with different keywords.
                </p>
                
                <div class="search-suggestions" style="margin: 40px 0;">
                    <h3 style="color: #1e3a8a; margin-bottom: 20px;">Search Suggestions:</h3>
                    <ul style="list-style: none; padding: 0; color: #666;">
                        <li style="margin: 10px 0;">• Check your spelling</li>
                        <li style="margin: 10px 0;">• Try more general keywords</li>
                        <li style="margin: 10px 0;">• Try different keywords</li>
                        <li style="margin: 10px 0;">• Use fewer keywords</li>
                    </ul>
                </div>
                
                <div class="new-search" style="margin: 40px 0;">
                    <h3 style="color: #1e3a8a; margin-bottom: 20px;">Try a new search:</h3>
                    <form role="search" method="get" action="<?php echo home_url('/'); ?>" style="display: flex; max-width: 400px; margin: 0 auto;">
                        <input type="search" name="s" placeholder="Enter your search..." style="flex: 1; padding: 15px; border: 1px solid #ddd; border-radius: 5px 0 0 5px; font-size: 16px;">
                        <button type="submit" style="background: #3b82f6; color: white; border: none; padding: 15px 20px; border-radius: 0 5px 5px 0; cursor: pointer;">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                
                <div class="helpful-links" style="margin-top: 50px;">
                    <h3 style="color: #1e3a8a; margin-bottom: 20px;">Or browse our content:</h3>
                    <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
                        <a href="<?php echo home_url('/services'); ?>" style="color: #3b82f6; text-decoration: none; font-weight: 500;">Our Services</a>
                        <a href="<?php echo home_url('/about-us'); ?>" style="color: #3b82f6; text-decoration: none; font-weight: 500;">About Us</a>
                        <a href="<?php echo home_url('/blog'); ?>" style="color: #3b82f6; text-decoration: none; font-weight: 500;">Blog</a>
                        <a href="<?php echo home_url('/contact'); ?>" style="color: #3b82f6; text-decoration: none; font-weight: 500;">Contact</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
@media (max-width: 768px) {
    .result-content {
        flex-direction: column !important;
    }
    
    .result-image {
        align-self: center;
    }
    
    .helpful-links > div {
        flex-direction: column !important;
        gap: 15px !important;
    }
}
</style>

<?php get_footer(); ?>
