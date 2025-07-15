<?php
/**
 * 404 Error Page Template
 */

get_header(); ?>

<section class="page-hero" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; padding: 150px 0 100px; margin-top: 100px;">
    <div class="container">
        <div class="text-center">
            <h1>404 - Page Not Found</h1>
            <p>The page you are looking for doesn't exist</p>
        </div>
    </div>
</section>

<section class="error-content" style="padding: 100px 0; text-align: center;">
    <div class="container">
        <div class="error-404" style="max-width: 600px; margin: 0 auto;">
            <div class="error-icon" style="font-size: 120px; color: #3b82f6; margin-bottom: 30px;">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            
            <h2 style="font-size: 48px; color: #1e3a8a; margin-bottom: 20px;">Oops!</h2>
            
            <p style="font-size: 18px; color: #666; margin-bottom: 30px;">
                The page you're looking for doesn't exist. It might have been moved, deleted, or you entered the wrong URL.
            </p>
            
            <div class="error-actions" style="margin: 40px 0;">
                <a href="<?php echo home_url(); ?>" class="btn-primary" style="margin-right: 20px;">Go Home</a>
                <a href="<?php echo home_url('/contact'); ?>" class="btn-secondary" style="border: 2px solid #3b82f6; color: #3b82f6; padding: 14px 28px;">Contact Us</a>
            </div>
            
            <div class="search-section" style="margin-top: 50px; padding-top: 30px; border-top: 1px solid #eee;">
                <h3 style="color: #1e3a8a; margin-bottom: 20px;">Try searching for what you need:</h3>
                <form role="search" method="get" action="<?php echo home_url('/'); ?>" style="display: flex; max-width: 400px; margin: 0 auto;">
                    <input type="search" name="s" placeholder="Search..." style="flex: 1; padding: 15px; border: 1px solid #ddd; border-radius: 5px 0 0 5px; font-size: 16px;">
                    <button type="submit" style="background: #3b82f6; color: white; border: none; padding: 15px 20px; border-radius: 0 5px 5px 0; cursor: pointer;">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            
            <div class="helpful-links" style="margin-top: 50px;">
                <h3 style="color: #1e3a8a; margin-bottom: 20px;">You might be interested in:</h3>
                <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
                    <a href="<?php echo home_url('/services'); ?>" style="color: #3b82f6; text-decoration: none; font-weight: 500;">Our Services</a>
                    <a href="<?php echo home_url('/about-us'); ?>" style="color: #3b82f6; text-decoration: none; font-weight: 500;">About Us</a>
                    <a href="<?php echo home_url('/blog'); ?>" style="color: #3b82f6; text-decoration: none; font-weight: 500;">Blog</a>
                    <a href="<?php echo home_url('/contact'); ?>" style="color: #3b82f6; text-decoration: none; font-weight: 500;">Contact</a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.error-actions .btn-secondary:hover {
    background: #3b82f6;
    color: white;
}

@media (max-width: 768px) {
    .error-404 h2 {
        font-size: 36px !important;
    }
    
    .error-icon {
        font-size: 80px !important;
    }
    
    .helpful-links > div {
        flex-direction: column !important;
        gap: 15px !important;
    }
}
</style>

<?php get_footer(); ?>
