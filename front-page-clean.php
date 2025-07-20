<?php
/**
 * Front Page Template
 * 
 * Template for the homepage with IT solution layout matching reference site
 */

get_header(); ?>

<!-- Hero Section -->
<section id="hero" class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <div class="hero-content">
                    <span class="hero-badge bg-light text-primary mb-3 fs-6 px-3 py-2 rounded-pill">WE PROVIDE 100% & TRUSTABLE</span>
                    <h1 class="display-3 fw-bold mb-4">IT<br>Solution</h1>
                    <p class="lead mb-4">We provide the most responsive and functional IT design for companies and businesses worldwide.</p>
                    
                    <div class="hero-buttons mb-5">
                        <a href="<?php echo home_url('/about-us'); ?>" class="btn btn-light btn-lg me-3 px-4">Read More</a>
                        <a href="https://www.youtube.com/watch?v=MLpWrANjFbI&ab_channel=eidelchteinadvogados" class="btn btn-outline-light btn-lg video-play-btn" target="_blank">
                            <i class="fas fa-play me-2"></i>Watch Video
                        </a>
                    </div>
                    
                    <!-- Service Links -->
                    <div class="hero-services mb-4">
                        <a href="#services" class="btn btn-outline-light btn-sm me-2 mb-2">Highly professional IT experts</a>
                        <a href="#services" class="btn btn-outline-light btn-sm me-2 mb-2">Infrastructure Technology</a>
                        <a href="#services" class="btn btn-outline-light btn-sm me-2 mb-2">Quality Control System</a>
                    </div>
                    
                    <!-- Progress Bars -->
                    <div class="progress-bars">
                        <div class="progress-item mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-semibold">IT Management</span>
                                <span class="fw-bold">80%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-light" style="width: 80%"></div>
                            </div>
                        </div>
                        <div class="progress-item mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-semibold">Data Security</span>
                                <span class="fw-bold">95%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-light" style="width: 95%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image text-center position-relative">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/TECW0137.png" 
                         alt="IT Solution Team" class="img-fluid hero-img-main">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/TECW0138.png" 
                         alt="IT Solutions" class="img-fluid hero-img-secondary position-absolute">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="text-primary fw-bold">OUR SERVICES</span>
                <h2 class="section-title fw-bold">We Provide Truly Prominent IT Solutions.</h2>
                <p class="section-subtitle">Professional IT solutions designed to help your business grow and succeed in the digital age</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 text-center bg-white rounded-3 shadow-sm">
                    <div class="service-icon mb-3">
                        <i class="fas fa-server fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Infrastructure Technology</h4>
                    <p class="mb-4">Complete infrastructure solutions for modern businesses with scalable and reliable technology systems.</p>
                    <a href="#" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 text-center bg-white rounded-3 shadow-sm">
                    <div class="service-icon mb-3">
                        <i class="fas fa-cube fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Blockchain Technology</h4>
                    <p class="mb-4">Secure and innovative blockchain solutions for next-generation applications and digital transformation.</p>
                    <a href="#" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 text-center bg-white rounded-3 shadow-sm">
                    <div class="service-icon mb-3">
                        <i class="fas fa-microchip fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Advanced Technology</h4>
                    <p class="mb-4">Cutting-edge technology solutions for business growth and comprehensive digital transformation.</p>
                    <a href="#" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 text-center bg-white rounded-3 shadow-sm">
                    <div class="service-icon mb-3">
                        <i class="fas fa-database fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Data Management</h4>
                    <p class="mb-4">Comprehensive data management and analytics solutions for better business insights and decisions.</p>
                    <a href="#" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 text-center bg-white rounded-3 shadow-sm">
                    <div class="service-icon mb-3">
                        <i class="fas fa-shield-alt fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Security Management</h4>
                    <p class="mb-4">Enterprise-level security solutions and protection against modern cyber threats and vulnerabilities.</p>
                    <a href="#" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 text-center bg-white rounded-3 shadow-sm">
                    <div class="service-icon mb-3">
                        <i class="fas fa-users-cog fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">IT Experts</h4>
                    <p class="mb-4">Highly professional IT experts and dedicated technology team members for your business success.</p>
                    <a href="#" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="about-content">
                    <span class="text-primary fw-bold">ABOUT TECHWIX</span>
                    <h2 class="fw-bold mb-3">We Provide Truly Prominent IT Solutions.</h2>
                    <p class="mb-4">Techwix offers comprehensive IT solutions designed to help your business grow and succeed in the digital age. Our expert team provides innovative technology services tailored to your specific needs.</p>
                    
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-primary me-3"></i>
                                <span>24/7 Premium Support</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-primary me-3"></i>
                                <span>Expert Team Members</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-primary me-3"></i>
                                <span>Flexible Pricing Plans</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-primary me-3"></i>
                                <span>Custom Software Development</span>
                            </div>
                        </div>
                    </div>
                    
                    <a href="#contact" class="btn btn-primary btn-lg">Learn More</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image position-relative">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-image.jpg" 
                         alt="About Techwix" class="img-fluid rounded-3 shadow">
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-10 rounded-3"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Counter Section -->
<section class="counter-section py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center">
                    <div class="counter-icon mb-3">
                        <i class="fas fa-users fa-3x text-primary"></i>
                    </div>
                    <h3 class="counter-number fw-bold" data-count="250">0</h3>
                    <p class="counter-text">Happy Clients</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center">
                    <div class="counter-icon mb-3">
                        <i class="fas fa-project-diagram fa-3x text-primary"></i>
                    </div>
                    <h3 class="counter-number fw-bold" data-count="180">0</h3>
                    <p class="counter-text">Projects Completed</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center">
                    <div class="counter-icon mb-3">
                        <i class="fas fa-award fa-3x text-primary"></i>
                    </div>
                    <h3 class="counter-number fw-bold" data-count="25">0</h3>
                    <p class="counter-text">Years Experience</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center">
                    <div class="counter-icon mb-3">
                        <i class="fas fa-headset fa-3x text-primary"></i>
                    </div>
                    <h3 class="counter-number fw-bold" data-count="24">0</h3>
                    <p class="counter-text">24/7 Support</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="text-primary fw-bold">WHY CHOOSE US</span>
                <h2 class="section-title fw-bold">We Provide Excellent Features</h2>
                <p class="section-subtitle">We provide exceptional IT solutions with proven expertise and innovative technology</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-rocket fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Fast Performance</h4>
                    <p>Lightning-fast solutions for optimal business performance and improved productivity.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-headset fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">24/7 Support</h4>
                    <p>Round-the-clock technical support for your peace of mind and business continuity.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-award fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Quality Assurance</h4>
                    <p>Guaranteed quality with industry-standard practices and comprehensive testing procedures.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-shield-alt fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Secure Solutions</h4>
                    <p>Enterprise-level security measures to protect your data and business operations.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-cogs fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Custom Solutions</h4>
                    <p>Tailored IT solutions designed specifically for your business needs and requirements.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-chart-line fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Growth Focused</h4>
                    <p>Solutions focused on scaling your business and driving sustainable growth.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="text-primary fw-bold">TESTIMONIALS</span>
                <h2 class="section-title fw-bold">What Our Clients Say</h2>
                <p class="section-subtitle">Read what our satisfied clients have to say about our IT solutions</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="testimonial-card p-4 bg-light rounded-3 h-100">
                                        <div class="testimonial-content mb-3">
                                            <div class="star-rating mb-3">
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                            </div>
                                            <p class="mb-0">"Techwix provided exceptional IT solutions for our business. Their team is professional, knowledgeable, and always available when we need support."</p>
                                        </div>
                                        <div class="testimonial-author d-flex align-items-center">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-1.jpg" 
                                                 alt="John Smith" class="rounded-circle me-3" width="60" height="60">
                                            <div>
                                                <h5 class="mb-0">John Smith</h5>
                                                <p class="text-muted mb-0">CEO, TechCorp</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial-card p-4 bg-light rounded-3 h-100">
                                        <div class="testimonial-content mb-3">
                                            <div class="star-rating mb-3">
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                            </div>
                                            <p class="mb-0">"Outstanding service and support! Techwix helped us modernize our entire IT infrastructure. Highly recommended for any business."</p>
                                        </div>
                                        <div class="testimonial-author d-flex align-items-center">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-2.jpg" 
                                                 alt="Sarah Johnson" class="rounded-circle me-3" width="60" height="60">
                                            <div>
                                                <h5 class="mb-0">Sarah Johnson</h5>
                                                <p class="text-muted mb-0">CTO, InnovateLab</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="testimonial-card p-4 bg-light rounded-3 h-100">
                                        <div class="testimonial-content mb-3">
                                            <div class="star-rating mb-3">
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                            </div>
                                            <p class="mb-0">"The team at Techwix is amazing. They delivered our project on time and exceeded our expectations. Great communication throughout."</p>
                                        </div>
                                        <div class="testimonial-author d-flex align-items-center">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-3.jpg" 
                                                 alt="Mike Wilson" class="rounded-circle me-3" width="60" height="60">
                                            <div>
                                                <h5 class="mb-0">Mike Wilson</h5>
                                                <p class="text-muted mb-0">Manager, BusinessPro</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial-card p-4 bg-light rounded-3 h-100">
                                        <div class="testimonial-content mb-3">
                                            <div class="star-rating mb-3">
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                            </div>
                                            <p class="mb-0">"Professional, reliable, and innovative. Techwix has been our trusted IT partner for years. Their expertise is unmatched."</p>
                                        </div>
                                        <div class="testimonial-author d-flex align-items-center">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-4.jpg" 
                                                 alt="Emma Davis" class="rounded-circle me-3" width="60" height="60">
                                            <div>
                                                <h5 class="mb-0">Emma Davis</h5>
                                                <p class="text-muted mb-0">Director, GlobalTech</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="badge bg-light text-primary mb-3">LEAVE US MESSAGES</span>
                <h2 class="section-title fw-bold">How May We Help You!</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <?php if (isset($_GET['contact'])): ?>
                    <div id="alert-container" class="mb-4">
                        <?php if ($_GET['contact'] == 'success'): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>Thank you! Your message has been sent successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php elseif ($_GET['contact'] == 'error'): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>Something went wrong. Please try again.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
                <form id="contact-form" method="post" class="contact-form">
                    <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-white" id="name" name="name" placeholder="Your Name" required>
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control bg-white" id="email" name="email" placeholder="Your Email" required>
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control bg-white" id="phone" name="phone" placeholder="Your Phone">
                                <label for="phone">Your Phone</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-white" id="subject" name="subject" placeholder="Subject">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control bg-white" id="message" name="message" style="height: 120px" placeholder="Your Message" required></textarea>
                                <label for="message">Your Message</label>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" name="contact_form_submit" class="btn btn-light btn-lg px-5">
                                <i class="fas fa-paper-plane me-2"></i>Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h3 class="fw-bold mb-3">Subscribe to Our Newsletter</h3>
                <p class="mb-0">Stay updated with our latest news, tips, and exclusive offers for IT solutions.</p>
            </div>
            <div class="col-lg-6">
                <form class="newsletter-form" method="post">
                    <?php wp_nonce_field('newsletter_nonce', 'newsletter_nonce'); ?>
                    <div class="input-group">
                        <input type="email" name="newsletter_email" class="form-control form-control-lg" placeholder="Enter your email address" required>
                        <button class="btn btn-primary btn-lg px-4" type="submit" name="newsletter_submit">
                            <i class="fas fa-paper-plane me-2"></i>Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
