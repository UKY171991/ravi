<?php
/*
Template Name: About Page
*/

get_header(); ?>

<!-- Page Header/Breadcrumb -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h1>About Us</h1>
            <nav class="breadcrumb">
                <a href="<?php echo home_url(); ?>">Home</a>
                <span>/</span>
                <span>About Us</span>
            </nav>
        </div>
    </div>
</section>

<!-- About Hero Section -->
<section class="about-hero">
    <div class="container">
        <div class="about-hero-content">
            <div class="about-hero-text">
                <div class="hero-badge">
                    <i class="fas fa-star"></i>
                    Best IT Solutions Company
                </div>
                <h2>We Are Increasing Business Success With Technology</h2>
                <p>Over 25 years working in IT services developing software for clients all over the world. Our team have extensive expertise in latest technologies.</p>
                
                <div class="about-features">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Award Winning Company</h4>
                            <p>We have won multiple awards for our excellence in IT services and customer satisfaction.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Expert Team Members</h4>
                            <p>Our team consists of highly skilled professionals with years of experience in technology.</p>
                        </div>
                    </div>
                </div>
                
                <div class="about-stats">
                    <div class="stat-item">
                        <div class="stat-number">250+</div>
                        <div class="stat-label">Projects Completed</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Customer Satisfaction</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Years Experience</div>
                    </div>
                </div>
            </div>
            
            <div class="about-hero-images">
                <div class="hero-image-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-hero-1.jpg" alt="About Us" class="hero-img-main">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-hero-2.jpg" alt="Our Team" class="hero-img-secondary">
                </div>
                <div class="experience-badge">
                    <div class="badge-content">
                        <span class="badge-number">25+</span>
                        <span class="badge-text">Years of Experience</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-us">
    <div class="container">
        <div class="section-header">
            <h2>Why Choose Techwix</h2>
            <p>We provide the most responsive and functional IT design which suitable in user interface.</p>
        </div>
        
        <div class="choose-us-grid">
            <div class="choose-item">
                <div class="choose-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4>Cyber Security</h4>
                <p>Protect your business with our advanced cybersecurity solutions and expert monitoring.</p>
            </div>
            
            <div class="choose-item">
                <div class="choose-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h4>24/7 Support</h4>
                <p>Round-the-clock technical support to ensure your systems are always running smoothly.</p>
            </div>
            
            <div class="choose-item">
                <div class="choose-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h4>Fast Performance</h4>
                <p>Optimized solutions that deliver exceptional speed and performance for your business.</p>
            </div>
            
            <div class="choose-item">
                <div class="choose-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h4>Customization</h4>
                <p>Tailored IT solutions designed specifically to meet your unique business requirements.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="container">
        <div class="section-header">
            <h2>Meet Our Expert Team</h2>
            <p>Our team consists of experienced professionals dedicated to delivering exceptional IT solutions.</p>
        </div>
        
        <div class="team-grid">
            <div class="team-member">
                <div class="member-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-1.jpg" alt="Andrew Max Fetcher">
                    <div class="member-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="member-info">
                    <h4>Andrew Max Fetcher</h4>
                    <span>CEO, Techwix</span>
                </div>
            </div>
            
            <div class="team-member">
                <div class="member-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-2.jpg" alt="Arnold Human">
                    <div class="member-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="member-info">
                    <h4>Arnold Human</h4>
                    <span>Chairman, CFO</span>
                </div>
            </div>
            
            <div class="team-member">
                <div class="member-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-3.jpg" alt="Joakim Ken">
                    <div class="member-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="member-info">
                    <h4>Joakim Ken</h4>
                    <span>Manager, Space</span>
                </div>
            </div>
            
            <div class="team-member">
                <div class="member-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-4.jpg" alt="Mike Holder">
                    <div class="member-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="member-info">
                    <h4>Mike Holder</h4>
                    <span>Director, Apple</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Company Values Section -->
<section class="company-values">
    <div class="container">
        <div class="values-content">
            <div class="values-text">
                <h2>Our Mission & Vision</h2>
                <div class="value-item">
                    <h4><i class="fas fa-bullseye"></i> Our Mission</h4>
                    <p>To provide innovative IT solutions that empower businesses to achieve their goals through cutting-edge technology and exceptional service.</p>
                </div>
                <div class="value-item">
                    <h4><i class="fas fa-eye"></i> Our Vision</h4>
                    <p>To be the leading technology partner, transforming businesses worldwide through innovative solutions and sustainable growth.</p>
                </div>
                <div class="value-item">
                    <h4><i class="fas fa-heart"></i> Our Values</h4>
                    <p>Innovation, integrity, excellence, and customer-centricity drive everything we do. We believe in building lasting relationships through trust and quality.</p>
                </div>
            </div>
            <div class="values-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mission-vision.jpg" alt="Mission Vision">
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="about-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Start Your Project?</h2>
            <p>Let's work together to bring your ideas to life with our expert IT solutions.</p>
            <div class="cta-buttons">
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary">Get Started</a>
                <a href="<?php echo home_url('/services'); ?>" class="btn btn-outline">Our Services</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
