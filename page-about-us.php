<?php
/**
 * Template Name: About Us
 */

get_header(); ?>

<section class="page-hero bg-primary text-white py-5" style="margin-top: 100px;">
    <div class="container">
        <div class="text-center">
            <h1 class="display-4 fw-bold">About Our Company</h1>
            <p class="lead">Learn more about our mission, vision, and the team behind our success</p>
        </div>
    </div>
</section>

<section class="about-detailed py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-text">
                    <h2 class="fw-bold mb-4">Who We Are</h2>
                    <p class="mb-4">We are a leading IT solutions provider with years of experience in delivering innovative technology solutions to businesses worldwide. Our team of expert professionals is dedicated to helping your business achieve its digital transformation goals.</p>
                    
                    <p class="mb-4">Founded with the vision of making technology accessible and efficient for all businesses, we have grown to become a trusted partner for companies ranging from startups to large enterprises.</p>
                    
                    <h3 class="fw-bold mb-3">Our Mission</h3>
                    <p class="mb-4">To accelerate innovation with world-class tech teams and provide comprehensive IT solutions that drive business growth and success.</p>
                    
                    <h3 class="fw-bold mb-3">Our Vision</h3>
                    <p class="mb-4">To be the global leader in IT solutions, helping businesses transform and thrive in the digital age.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image text-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-detailed.jpg" 
                         alt="About Us" class="img-fluid rounded">
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12">
                <div class="stats-section bg-primary text-white p-5 rounded">
                    <div class="row text-center">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <div class="display-4 fw-bold mb-2">500+</div>
                                <div class="h5">Projects Completed</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <div class="display-4 fw-bold mb-2">200+</div>
                                <div class="h5">Happy Clients</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <div class="display-4 fw-bold mb-2">50+</div>
                                <div class="h5">Expert Team</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <div class="display-4 fw-bold mb-2">10+</div>
                                <div class="h5">Years Experience</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-detailed.jpg" alt="About Our Company" style="width: 100%; border-radius: 10px;">
            </div>
        </div>
    </div>
</section>

<section class="why-choose-us" style="padding: 100px 0; background: #f8fafc;">
    <div class="container">
        <div class="section-header">
            <h2>Why Choose Us</h2>
            <p>We provide exceptional IT solutions with unmatched expertise and dedication</p>
        </div>
        
        <div class="features-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 60px;">
            <div class="feature-item" style="background: white; padding: 30px; border-radius: 10px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                <div class="icon" style="width: 60px; height: 60px; background: linear-gradient(45deg, #3b82f6, #1e40af); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 24px;">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Expert Team</h3>
                <p>Our team consists of highly skilled professionals with years of experience in the IT industry.</p>
            </div>
            
            <div class="feature-item" style="background: white; padding: 30px; border-radius: 10px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                <div class="icon" style="width: 60px; height: 60px; background: linear-gradient(45deg, #3b82f6, #1e40af); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 24px;">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>24/7 Support</h3>
                <p>We provide round-the-clock support to ensure your business operations run smoothly.</p>
            </div>
            
            <div class="feature-item" style="background: white; padding: 30px; border-radius: 10px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                <div class="icon" style="width: 60px; height: 60px; background: linear-gradient(45deg, #3b82f6, #1e40af); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 24px;">
                    <i class="fas fa-award"></i>
                </div>
                <h3>Quality Assurance</h3>
                <p>We maintain the highest standards of quality in all our projects and deliverables.</p>
            </div>
            
            <div class="feature-item" style="background: white; padding: 30px; border-radius: 10px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                <div class="icon" style="width: 60px; height: 60px; background: linear-gradient(45deg, #3b82f6, #1e40af); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 24px;">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <h3>Cost Effective</h3>
                <p>Our solutions are designed to provide maximum value while keeping costs under control.</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
