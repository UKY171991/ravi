<?php
/**
 * The main template file
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 */

get_header(); ?>

<!-- Blog Header -->
<section class="blog-header bg-primary text-white py-5" style="margin-top: 100px;">
    <div class="container">
        <div class="text-center">
            <h1 class="display-4 fw-bold">Blog</h1>
            <p class="lead">Latest insights and updates from our team</p>
        </div>
    </div>
</section>

<!-- Blog Content -->
<section class="blog-content py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if (have_posts()) : ?>
                    <div class="row g-4">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="col-md-6">
                                <article id="post-<?php the_ID(); ?>" <?php post_class('blog-card h-100'); ?>>
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="blog-image">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('techwix-blog', array('class' => 'img-fluid w-100')); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="blog-content p-4">
                                        <div class="blog-meta mb-3">
                                            <span class="text-muted me-3">
                                                <i class="fas fa-calendar me-1"></i>
                                                <?php echo get_the_date(); ?>
                                            </span>
                                            <span class="text-muted">
                                                <i class="fas fa-user me-1"></i>
                                                <?php the_author(); ?>
                                            </span>
                                        </div>
                                        
                                        <h3 class="mb-3">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        
                                        <div class="blog-excerpt mb-3">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        
                                        <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary">
                                            Read More <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="pagination-wrapper mt-5">
                        <?php
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                            'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                            'class' => 'pagination justify-content-center'
                        ));
                        ?>
                    </div>
                    
                <?php else : ?>
                    <div class="no-posts text-center py-5">
                        <h3>No Posts Found</h3>
                        <p class="text-muted">There are no blog posts to display at the moment.</p>
                        <a href="<?php echo home_url(); ?>" class="btn btn-primary">Back to Home</a>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <aside class="blog-sidebar">
                    <!-- Search Widget -->
                    <div class="sidebar-widget mb-4">
                        <h5 class="widget-title fw-bold mb-3">Search</h5>
                        <form class="search-form" method="get" action="<?php echo home_url('/'); ?>">
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search..." 
                                       name="s" value="<?php echo get_search_query(); ?>">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Recent Posts Widget -->
                    <div class="sidebar-widget mb-4">
                        <h5 class="widget-title fw-bold mb-3">Recent Posts</h5>
                        <?php
                        $recent_posts = new WP_Query(array(
                            'posts_per_page' => 5,
                            'post_status' => 'publish'
                        ));
                        
                        if ($recent_posts->have_posts()) :
                        ?>
                            <ul class="list-unstyled">
                                <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                                    <li class="mb-3">
                                        <a href="<?php the_permalink(); ?>" class="d-flex text-decoration-none">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="recent-post-thumb me-3">
                                                    <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid rounded', 'style' => 'width: 60px; height: 60px; object-fit: cover;')); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="recent-post-content">
                                                <h6 class="mb-1"><?php the_title(); ?></h6>
                                                <small class="text-muted"><?php echo get_the_date(); ?></small>
                                            </div>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php
                        wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                    
                    <!-- Categories Widget -->
                    <div class="sidebar-widget mb-4">
                        <h5 class="widget-title fw-bold mb-3">Categories</h5>
                        <ul class="list-unstyled">
                            <?php
                            $categories = get_categories();
                            foreach ($categories as $category) :
                            ?>
                                <li class="mb-2">
                                    <a href="<?php echo get_category_link($category->term_id); ?>" class="text-decoration-none d-flex justify-content-between">
                                        <span><?php echo $category->name; ?></span>
                                        <span class="badge bg-secondary"><?php echo $category->count; ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <!-- Tags Widget -->
                    <div class="sidebar-widget mb-4">
                        <h5 class="widget-title fw-bold mb-3">Tags</h5>
                        <div class="tag-cloud">
                            <?php
                            $tags = get_tags();
                            foreach ($tags as $tag) :
                            ?>
                                <a href="<?php echo get_tag_link($tag->term_id); ?>" class="badge bg-light text-dark text-decoration-none me-2 mb-2">
                                    <?php echo $tag->name; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/TECW0138.png" alt="IT Infrastructure" class="hero-img-2" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services">
    <div class="container">
        <div class="section-header">
            <h2>Our Services</h2>
            <p>We provide comprehensive IT solutions to help your business grow and succeed in the digital world.</p>
        </div>
        
        <!-- Services Quick Links -->
        <div class="services-quick-links">
            <a href="<?php echo home_url('/service/infrastructure-technology'); ?>" class="service-link">
                <i class="fas fa-users"></i>
                Highly professional IT experts
            </a>
            <a href="<?php echo home_url('/service/infrastructure-technology'); ?>" class="service-link">
                <i class="fas fa-server"></i>
                Infrastructure Technology
            </a>
            <a href="<?php echo home_url('/service/quality-control'); ?>" class="service-link">
                <i class="fas fa-shield-alt"></i>
                Quality Control System
            </a>
        </div>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-server"></i>
                </div>
                <h3>Infrastructure Technology</h3>
                <p>Highly professional IT experts providing robust infrastructure solutions for your business needs.</p>
            </div>
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Security Management</h3>
                <p>Advanced security solutions to protect your data and systems from cyber threats and vulnerabilities.</p>
            </div>
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-database"></i>
                </div>
                <h3>Data Management</h3>
                <p>Comprehensive data management solutions to organize, store, and analyze your business data effectively.</p>
            </div>
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3>Quality Control System</h3>
                <p>Advanced quality control systems to ensure your IT infrastructure meets the highest standards.</p>
            </div>
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-cube"></i>
                </div>
                <h3>Blockchain Technology</h3>
                <p>Cutting-edge blockchain solutions for secure and transparent business operations.</p>
            </div>
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3>Advanced Technology</h3>
                <p>Implementation of the latest technologies to keep your business ahead of the competition.</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>About Our Company</h2>
                <p>We are a leading IT solutions provider with years of experience in delivering innovative technology solutions to businesses worldwide. Our team of expert professionals is dedicated to helping your business achieve its digital transformation goals.</p>
                <p>We specialize in providing comprehensive IT services including infrastructure management, security solutions, data management, and cutting-edge technology implementation.</p>
                <div class="stats">
                    <div class="stat-item">
                        <div class="number">80%</div>
                        <div class="label">IT Management</div>
                    </div>
                    <div class="stat-item">
                        <div class="number">95%</div>
                        <div class="label">Data Security</div>
                    </div>
                </div>
            </div>
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-image.png" alt="About Us" />
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact">
    <div class="container">
        <div class="contact-content">
            <div class="contact-info">
                <h2>How May We Help You!</h2>
                <div class="contact-item">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h4>Contact Number</h4>
                        <p>+00(1) 123 456 7890</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h4>Our Mail</h4>
                        <p>infotechmax@ourmail.com</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h4>Our Location</h4>
                        <p>New ipsum dolor amet, eiusmod adipisicing 147 NewYors, NY Adipisicing 123</p>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <h3>LEAVE US MESSAGES</h3>
                <form action="#" method="post">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
