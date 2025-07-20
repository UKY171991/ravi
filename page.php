<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

<div class="page-content py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="page-header mb-5">
                            <h1 class="page-title display-4 fw-bold text-center"><?php the_title(); ?></h1>
                        </header>

                        <div class="page-content">
                            <?php
                            the_content();

                            wp_link_pages(array(
                                'before' => '<div class="page-links mt-4">',
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
