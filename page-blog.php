<?php
/**
 * Template Name: Blog
 */

get_header(); ?>

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); padding: 180px 0 100px; margin-top: 100px; position: relative; overflow: hidden;">
    <!-- Background Pattern -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.1; background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><circle cx=%2250%22 cy=%2250%22 r=%222%22 fill=%22white%22/></svg>'); background-size: 50px 50px;"></div>
    
    <div class="container position-relative">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content text-center text-white">
                    <span class="badge bg-white bg-opacity-20 text-white mb-3 px-4 py-2 rounded-pill fw-bold">
                        <i class="fas fa-blog me-2"></i>OUR BLOG
                    </span>
                    <h1 class="display-4 fw-bold mb-4">3 Columns</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent mb-0">
                            <li class="breadcrumb-item">
                                <a href="<?php echo home_url(); ?>" class="text-white text-decoration-none opacity-75">
                                    <i class="fas fa-home me-1"></i>Home
                                </a>
                            </li>
                            <li class="breadcrumb-item text-white opacity-75" aria-current="page">3 Columns</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="blog-section py-5" style="background: #f8f9fa;">
    <div class="container">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $blog_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 9,
            'paged' => $paged
        ));
        
        if ($blog_query->have_posts()) :
        ?>
            <div class="row g-4">
                <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                    <div class="col-lg-4 col-md-6">
                        <article class="blog-card h-100 bg-white rounded-4 overflow-hidden shadow-sm border-0 position-relative" style="transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="blog-image position-relative overflow-hidden">
                                    <a href="<?php the_permalink(); ?>" class="d-block">
                                        <?php the_post_thumbnail('medium_large', array(
                                            'class' => 'img-fluid w-100',
                                            'style' => 'height: 220px; object-fit: cover; transition: transform 0.3s ease;'
                                        )); ?>
                                    </a>
                                    <!-- Hover Overlay -->
                                    <div class="blog-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(44, 90, 160, 0.8); opacity: 0; transition: opacity 0.3s ease;">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-light btn-sm rounded-pill px-3">
                                            <i class="fas fa-arrow-right me-1"></i>Read More
                                        </a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="blog-image position-relative" style="height: 220px; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-image fa-3x text-white opacity-50"></i>
                                </div>
                            <?php endif; ?>
                            
                            <div class="blog-content p-4">
                                <!-- Blog Meta -->
                                <div class="blog-meta mb-3">
                                    <div class="d-flex align-items-center justify-content-between text-muted small">
                                        <span class="d-flex align-items-center">
                                            <i class="fas fa-calendar-alt me-2 text-primary"></i>
                                            <?php echo get_the_date('d M'); ?>
                                        </span>
                                        <span class="d-flex align-items-center">
                                            <i class="fas fa-user me-2 text-primary"></i>
                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="text-decoration-none text-muted hover-primary">
                                                <?php echo get_the_author(); ?>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Blog Title -->
                                <h4 class="blog-title mb-3">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark fw-bold hover-primary" style="line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                                
                                <!-- Blog Excerpt -->
                                <p class="blog-excerpt text-muted mb-4" style="line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                    <?php echo wp_trim_words(get_the_excerpt() ? get_the_excerpt() : get_the_content(), 20, '...'); ?>
                                </p>
                                
                                <!-- Blog Footer -->
                                <div class="blog-footer d-flex align-items-center justify-content-between">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm rounded-pill px-4 fw-semibold">
                                        READ MORE
                                    </a>
                                    
                                    <div class="blog-comments text-muted small">
                                        <i class="fas fa-comments me-1"></i>
                                        <a href="<?php the_permalink(); ?>#comments" class="text-decoration-none text-muted hover-primary">
                                            Comment <?php echo get_comments_number(); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <?php if ($blog_query->max_num_pages > 1) : ?>
                <div class="blog-pagination mt-5 pt-4">
                    <nav aria-label="Blog pagination">
                        <div class="d-flex justify-content-center">
                            <?php
                            $pagination_links = paginate_links(array(
                                'total' => $blog_query->max_num_pages,
                                'current' => $paged,
                                'prev_text' => '<i class="fas fa-chevron-left"></i>',
                                'next_text' => '<i class="fas fa-chevron-right"></i>',
                                'type' => 'array',
                                'before_page_number' => '<span class="visually-hidden">Page </span>',
                            ));
                            
                            if ($pagination_links) {
                                echo '<ul class="pagination pagination-lg rounded-pill overflow-hidden shadow-sm">';
                                foreach ($pagination_links as $link) {
                                    $class = 'page-item';
                                    if (strpos($link, 'current') !== false) {
                                        $class .= ' active';
                                    }
                                    echo '<li class="' . $class . '">';
                                    echo str_replace('page-numbers', 'page-link border-0 fw-semibold', $link);
                                    echo '</li>';
                                }
                                echo '</ul>';
                            }
                            ?>
                        </div>
                    </nav>
                </div>
            <?php endif; ?>
            
        <?php else : ?>
            <!-- No Posts Found -->
            <div class="row">
                <div class="col-12">
                    <div class="no-posts-found text-center py-5">
                        <div class="mb-4">
                            <i class="fas fa-blog fa-4x text-muted opacity-50"></i>
                        </div>
                        <h3 class="fw-bold mb-3">No Posts Found</h3>
                        <p class="text-muted mb-4">There are no blog posts to display at the moment. Please check back later for updates.</p>
                        <a href="<?php echo home_url(); ?>" class="btn btn-primary btn-lg rounded-pill px-5">
                            <i class="fas fa-home me-2"></i>Back to Home
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; wp_reset_postdata(); ?>
    </div>
</section>

<style>
/* Blog Card Hover Effects */
.blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
}

.blog-card:hover .blog-image img {
    transform: scale(1.05);
}

.blog-card:hover .blog-overlay {
    opacity: 1 !important;
}

/* Hover Primary Effect */
.hover-primary {
    transition: color 0.3s ease;
}

.hover-primary:hover {
    color: var(--primary-color) !important;
}

/* Blog Meta Styling */
.blog-meta {
    font-size: 0.875rem;
}

.blog-meta i {
    width: 16px;
    text-align: center;
}

/* Pagination Styling */
.pagination .page-link {
    color: var(--primary-color);
    background-color: #fff;
    border: 1px solid #dee2e6;
    padding: 0.75rem 1rem;
    margin: 0 2px;
    border-radius: 0.5rem !important;
    transition: all 0.3s ease;
}

.pagination .page-link:hover {
    color: #fff;
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(44, 90, 160, 0.3);
}

.pagination .page-item.active .page-link {
    color: #fff;
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    box-shadow: 0 5px 15px rgba(44, 90, 160, 0.3);
}

.pagination .page-item.disabled .page-link {
    color: #6c757d;
    background-color: #fff;
    border-color: #dee2e6;
}

/* Breadcrumb Styling */
.breadcrumb-item + .breadcrumb-item::before {
    content: ">";
    color: rgba(255, 255, 255, 0.5);
    font-weight: bold;
}

/* Blog Content Styling */
.blog-title a {
    transition: color 0.3s ease;
}

.blog-title a:hover {
    color: var(--primary-color) !important;
}

.blog-excerpt {
    font-size: 0.9rem;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .page-header {
        padding: 140px 0 80px !important;
    }
    
    .display-4 {
        font-size: 2.5rem !important;
    }
    
    .blog-card {
        margin-bottom: 2rem;
    }
    
    .pagination .page-link {
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
    }
    
    .blog-image {
        height: 200px !important;
    }
}

@media (max-width: 576px) {
    .blog-content {
        padding: 1.5rem !important;
    }
    
    .blog-title {
        font-size: 1.1rem;
    }
    
    .blog-excerpt {
        font-size: 0.85rem;
    }
    
    .btn-sm {
        font-size: 0.8rem;
        padding: 0.4rem 1rem;
    }
}

/* Animation for page load */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.blog-card {
    animation: fadeInUp 0.6s ease forwards;
}

.blog-card:nth-child(1) { animation-delay: 0.1s; }
.blog-card:nth-child(2) { animation-delay: 0.2s; }
.blog-card:nth-child(3) { animation-delay: 0.3s; }
.blog-card:nth-child(4) { animation-delay: 0.4s; }
.blog-card:nth-child(5) { animation-delay: 0.5s; }
.blog-card:nth-child(6) { animation-delay: 0.6s; }
.blog-card:nth-child(7) { animation-delay: 0.7s; }
.blog-card:nth-child(8) { animation-delay: 0.8s; }
.blog-card:nth-child(9) { animation-delay: 0.9s; }

/* Loading animation for images */
.blog-image img {
    opacity: 0;
    animation: fadeIn 0.5s ease forwards;
}

@keyframes fadeIn {
    to {
        opacity: 1;
    }
}
</style>

<script>
// Enhanced interactions
document.addEventListener('DOMContentLoaded', function() {
    // Lazy loading for images
    const images = document.querySelectorAll('.blog-image img');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.style.animationDelay = '0s';
                observer.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
    
    // Blog card interactions
    const blogCards = document.querySelectorAll('.blog-card');
    blogCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Smooth scroll for pagination
    const paginationLinks = document.querySelectorAll('.pagination .page-link');
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (this.href) {
                setTimeout(() => {
                    window.scrollTo({
                        top: document.querySelector('.blog-section').offsetTop - 100,
                        behavior: 'smooth'
                    });
                }, 100);
            }
        });
    });
});
</script>

<?php get_footer(); ?>
