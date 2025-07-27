<?php
/**
 * Front Page Template
 * 
 * Template for the homepage with IT solution layout matching reference site
 */

get_header(); ?>

<!-- Hero Section -->
<section id="hero" class="hero-section bg-primary text-white py-5">
    <!-- Background geometric shapes -->
    <div class="hero-bg-bottom-left"></div>
    <div class="hero-bg-bottom-right"></div>
    
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6 order-lg-1 order-2">
                <div class="hero-content">
                    <span class="hero-badge bg-light text-primary mb-3 d-inline-block px-3 py-2 rounded-pill fw-semibold">WE PROVIDE 100% & TRUSTEBALE</span>
                    <h1 class="display-1 fw-bold mb-4 lh-1">IT<br><span class="text-white">Solution</span></h1>
                    <p class="lead mb-4 text-white opacity-90">We provide the most responsive and functional IT design for companies and businesses worldwide.</p>
                    
                    <div class="hero-buttons mb-5">
                        <a href="<?php echo home_url('/about-us'); ?>" class="btn btn-light btn-lg me-3 px-4 py-3 fw-semibold rounded-pill">Read More</a>
                        <a href="https://www.youtube.com/watch?v=MLpWrANjFbI&ab_channel=eidelchteinadvogados" class="btn btn-outline-light btn-lg video-play-btn px-4 py-3 rounded-pill" target="_blank">
                            <i class="fas fa-play me-2"></i>Watch Video
                        </a>
                    </div>
                    
                    <!-- Service Tags -->
                    <div class="hero-services mb-4">
                        <span class="badge bg-light text-primary me-2 mb-2 px-3 py-2">Highly professional IT experts</span>
                        <span class="badge bg-light text-primary me-2 mb-2 px-3 py-2">Infrastructure Technology</span>
                        <span class="badge bg-light text-primary me-2 mb-2 px-3 py-2">Quality Control System</span>
                    </div>
                    
                    <!-- Progress Bars -->
                    <div class="progress-bars">
                        <div class="progress-item mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-semibold">IT Management</span>
                                <span class="fw-bold">80%</span>
                            </div>
                            <div class="progress bg-light bg-opacity-20" style="height: 6px;">
                                <div class="progress-bar bg-light" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-item mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-semibold">Data Security</span>
                                <span class="fw-bold">95%</span>
                            </div>
                            <div class="progress bg-light bg-opacity-20" style="height: 6px;">
                                <div class="progress-bar bg-light" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0">
                <div class="hero-image text-center position-relative">
                    <div class="hero-img-wrapper position-relative d-inline-block">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/TECW0137.png" 
                             alt="IT Solution Team" class="img-fluid hero-img-main" style="max-width: 450px;">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/TECW0138.png" 
                             alt="IT Solutions" class="img-fluid hero-img-secondary position-absolute top-0 start-0 opacity-75" style="max-width: 400px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="text-primary fw-bold text-uppercase tracking-wide">OUR SERVICES</span>
                <h2 class="section-title fw-bold mb-3 display-5">We Provide Truly Prominent IT Solutions.</h2>
                <p class="section-subtitle text-muted">Professional IT solutions designed to help your business grow and succeed in the digital age</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 text-center bg-white rounded-4 shadow-sm border-0 hover-shadow-lg transition-all">
                    <div class="service-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-server fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="mb-3 fw-bold">Infrastructure Technology</h4>
                    <p class="mb-4 text-muted">Complete infrastructure solutions for modern businesses with scalable and reliable technology systems.</p>
                    <a href="#" class="btn btn-outline-primary rounded-pill px-4">Learn More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 text-center bg-white rounded-4 shadow-sm border-0 hover-shadow-lg transition-all">
                    <div class="service-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-cube fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="mb-3 fw-bold">Blockchain Technology</h4>
                    <p class="mb-4 text-muted">Secure and innovative blockchain solutions for next-generation applications and digital transformation.</p>
                    <a href="#" class="btn btn-outline-primary rounded-pill px-4">Learn More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 text-center bg-white rounded-4 shadow-sm border-0 hover-shadow-lg transition-all">
                    <div class="service-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-microchip fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="mb-3 fw-bold">Advanced Technology</h4>
                    <p class="mb-4 text-muted">Cutting-edge technology solutions for business growth and comprehensive digital transformation.</p>
                    <a href="#" class="btn btn-outline-primary rounded-pill px-4">Learn More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 text-center bg-white rounded-4 shadow-sm border-0 hover-shadow-lg transition-all">
                    <div class="service-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-database fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="mb-3 fw-bold">Data Management</h4>
                    <p class="mb-4 text-muted">Comprehensive data management and analytics solutions for better business insights and decisions.</p>
                    <a href="#" class="btn btn-outline-primary rounded-pill px-4">Learn More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 text-center bg-white rounded-4 shadow-sm border-0 hover-shadow-lg transition-all">
                    <div class="service-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-shield-alt fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="mb-3 fw-bold">Security Management</h4>
                    <p class="mb-4 text-muted">Enterprise-level security solutions and protection against modern cyber threats and vulnerabilities.</p>
                    <a href="#" class="btn btn-outline-primary rounded-pill px-4">Learn More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4 text-center bg-white rounded-4 shadow-sm border-0 hover-shadow-lg transition-all">
                    <div class="service-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-users-cog fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="mb-3 fw-bold">IT Experts</h4>
                    <p class="mb-4 text-muted">Highly professional IT experts and dedicated technology team members for your business success.</p>
                    <a href="#" class="btn btn-outline-primary rounded-pill px-4">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="about-content pe-lg-4">
                    <span class="text-primary fw-bold text-uppercase tracking-wide">ABOUT TECHWIX</span>
                    <h2 class="fw-bold mb-4 display-5">We Provide Truly Prominent IT Solutions.</h2>
                    <p class="mb-4 text-muted">Techwix offers comprehensive IT solutions designed to help your business grow and succeed in the digital age. Our expert team provides innovative technology services tailored to your specific needs.</p>
                    
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="feature-icon me-3">
                                    <i class="fas fa-check-circle text-primary fs-5"></i>
                                </div>
                                <span class="fw-semibold">24/7 Premium Support</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="feature-icon me-3">
                                    <i class="fas fa-check-circle text-primary fs-5"></i>
                                </div>
                                <span class="fw-semibold">Expert Team Members</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="feature-icon me-3">
                                    <i class="fas fa-check-circle text-primary fs-5"></i>
                                </div>
                                <span class="fw-semibold">Flexible Pricing Plans</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="feature-icon me-3">
                                    <i class="fas fa-check-circle text-primary fs-5"></i>
                                </div>
                                <span class="fw-semibold">Custom Software Development</span>
                            </div>
                        </div>
                    </div>
                    
                    <a href="#contact" class="btn btn-primary btn-lg rounded-pill px-5">Learn More</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image position-relative">
                    <div class="image-wrapper">
                        <img src="https://picsum.photos/500/400?random=1" 
                             alt="About Techwix" class="img-fluid rounded-4 shadow-lg w-100" 
                             style="object-fit: cover;">
                        <div class="overlay position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-10 rounded-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Counter Section -->
<section class="counter-section py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center p-4">
                    <div class="counter-icon mb-3">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h3 class="counter-number fw-bold display-4 text-primary" data-count="250">0</h3>
                    <p class="counter-text text-muted fw-semibold">Happy Clients</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center p-4">
                    <div class="counter-icon mb-3">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-project-diagram fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h3 class="counter-number fw-bold display-4 text-primary" data-count="180">0</h3>
                    <p class="counter-text text-muted fw-semibold">Projects Completed</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center p-4">
                    <div class="counter-icon mb-3">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-award fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h3 class="counter-number fw-bold display-4 text-primary" data-count="25">0</h3>
                    <p class="counter-text text-muted fw-semibold">Years Experience</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center p-4">
                    <div class="counter-icon mb-3">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-headset fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h3 class="counter-number fw-bold display-4 text-primary" data-count="24">0</h3>
                    <p class="counter-text text-muted fw-semibold">24/7 Support</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="text-primary fw-bold text-uppercase tracking-wide">WHY CHOOSE US</span>
                <h2 class="section-title fw-bold mb-3 display-5">We Provide Excellent Features</h2>
                <p class="section-subtitle text-muted">We provide exceptional IT solutions with proven expertise and innovative technology</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center p-4 bg-light rounded-4 h-100 border-0">
                    <div class="feature-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-rocket fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="mb-3 fw-bold">Fast Performance</h4>
                    <p class="text-muted">Lightning-fast solutions for optimal business performance and improved productivity.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center p-4 bg-light rounded-4 h-100 border-0">
                    <div class="feature-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-headset fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="mb-3 fw-bold">24/7 Support</h4>
                    <p class="text-muted">Round-the-clock technical support for your peace of mind and business continuity.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center p-4 bg-light rounded-4 h-100 border-0">
                    <div class="feature-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-award fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="mb-3 fw-bold">Quality Assurance</h4>
                    <p class="text-muted">Guaranteed quality with industry-standard practices and comprehensive testing procedures.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center p-4 bg-light rounded-4 h-100 border-0">
                    <div class="feature-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-shield-alt fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="mb-3 fw-bold">Secure Solutions</h4>
                    <p class="text-muted">Enterprise-level security measures to protect your data and business operations.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center p-4 bg-light rounded-4 h-100 border-0">
                    <div class="feature-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-cogs fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="mb-3 fw-bold">Custom Solutions</h4>
                    <p class="text-muted">Tailored IT solutions designed specifically for your business needs and requirements.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center p-4 bg-light rounded-4 h-100 border-0">
                    <div class="feature-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-chart-line fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="mb-3 fw-bold">Growth Focused</h4>
                    <p class="text-muted">Solutions focused on scaling your business and driving sustainable growth.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section py-5 bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="text-primary fw-bold text-uppercase tracking-wide">TESTIMONIAL</span>
                <h2 class="section-title fw-bold mb-3 display-4">20k+ satisfied clients worldwide</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="testimonial-card p-4 bg-dark border border-secondary rounded-4 h-100">
                                        <div class="testimonial-content mb-4">
                                            <div class="quote-icon mb-3">
                                                <i class="fas fa-quote-left fa-2x text-primary"></i>
                                            </div>
                                            <p class="mb-0 text-light h5 fw-normal lh-base">"Accelerate innovation with world-class tech teams Beyond more stoic this along goodness hey this this wow manatee."</p>
                                        </div>
                                        <div class="testimonial-author d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" 
                                                 alt="James Smith" class="rounded-circle me-3 flex-shrink-0" width="60" height="60"
                                                 style="object-fit: cover;">
                                            <div>
                                                <h6 class="mb-1 fw-bold text-white">James Smith</h6>
                                                <p class="text-muted mb-0 small">CFO Apple Corp</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial-card p-4 bg-dark border border-secondary rounded-4 h-100">
                                        <div class="testimonial-content mb-4">
                                            <div class="quote-icon mb-3">
                                                <i class="fas fa-quote-left fa-2x text-primary"></i>
                                            </div>
                                            <p class="mb-0 text-light h5 fw-normal lh-base">"I believe in lifelong learning and they are a great place to learn from experts. I have learned a lot and recommend it."</p>
                                        </div>
                                        <div class="testimonial-author d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1494790108755-2616b612b5bc?w=150&h=150&fit=crop&crop=face" 
                                                 alt="Monica Blews" class="rounded-circle me-3 flex-shrink-0" width="60" height="60"
                                                 style="object-fit: cover;">
                                            <div>
                                                <h6 class="mb-1 fw-bold text-white">Monica Blews</h6>
                                                <p class="text-muted mb-0 small">Manager</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="testimonial-card p-4 bg-dark border border-secondary rounded-4 h-100">
                                        <div class="testimonial-content mb-4">
                                            <div class="quote-icon mb-3">
                                                <i class="fas fa-quote-left fa-2x text-primary"></i>
                                            </div>
                                            <p class="mb-0 text-light h5 fw-normal lh-base">"The team at Techwix is amazing. They delivered our project on time and exceeded our expectations. Great communication throughout."</p>
                                        </div>
                                        <div class="testimonial-author d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" 
                                                 alt="Mike Wilson" class="rounded-circle me-3 flex-shrink-0" width="60" height="60"
                                                 style="object-fit: cover;">
                                            <div>
                                                <h6 class="mb-1 fw-bold text-white">Mike Wilson</h6>
                                                <p class="text-muted mb-0 small">Manager, BusinessPro</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial-card p-4 bg-dark border border-secondary rounded-4 h-100">
                                        <div class="testimonial-content mb-4">
                                            <div class="quote-icon mb-3">
                                                <i class="fas fa-quote-left fa-2x text-primary"></i>
                                            </div>
                                            <p class="mb-0 text-light h5 fw-normal lh-base">"Professional, reliable, and innovative. Techwix has been our trusted IT partner for years. Their expertise is unmatched."</p>
                                        </div>
                                        <div class="testimonial-author d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face" 
                                                 alt="Emma Davis" class="rounded-circle me-3 flex-shrink-0" width="60" height="60"
                                                 style="object-fit: cover;">
                                            <div>
                                                <h6 class="mb-1 fw-bold text-white">Emma Davis</h6>
                                                <p class="text-muted mb-0 small">Director, GlobalTech</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Carousel Indicators -->
                    <div class="carousel-indicators position-relative mt-4" style="position: relative !important; margin-bottom: 0;">
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="text-primary fw-bold text-uppercase tracking-wide">PRICING PLANS</span>
                <h2 class="section-title fw-bold mb-3 display-5">Affordable pricing for all</h2>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <!-- Free Plan -->
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card h-100 bg-white rounded-4 shadow-sm border-0 p-4 text-center">
                    <h3 class="pricing-title fw-bold mb-4">Free</h3>
                    <div class="pricing-price mb-4">
                        <span class="price-currency text-primary fs-3 fw-bold">$</span>
                        <span class="price-amount text-primary display-2 fw-bold">0</span>
                        <span class="price-period text-muted">/ Month</span>
                    </div>
                    <ul class="pricing-features list-unstyled mb-4">
                        <li class="mb-3 text-muted">Community Support</li>
                        <li class="mb-3 text-muted">Dedicated Tech Experts</li>
                        <li class="mb-3 text-muted">Unlimited Storage</li>
                        <li class="mb-3 text-muted">Custom Domains</li>
                    </ul>
                    <a href="#" class="btn btn-primary rounded-pill px-5 py-3 fw-semibold">Read More</a>
                </div>
            </div>
            
            <!-- Starter Plan (Featured) -->
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card h-100 bg-gradient rounded-4 shadow-lg border-0 p-4 text-center text-white position-relative" style="background: linear-gradient(135deg, #4f9cf9 0%, #7c3aed 100%);">
                    <h3 class="pricing-title fw-bold mb-4">Starter</h3>
                    <div class="pricing-price mb-4">
                        <span class="price-currency fs-3 fw-bold">$</span>
                        <span class="price-amount display-2 fw-bold">39</span>
                        <span class="price-period">/ Month</span>
                    </div>
                    <ul class="pricing-features list-unstyled mb-4">
                        <li class="mb-3">Community Support</li>
                        <li class="mb-3">Dedicated Tech Experts</li>
                        <li class="mb-3">Unlimited Storage</li>
                        <li class="mb-3">Custom Domains</li>
                    </ul>
                    <a href="#" class="btn btn-light rounded-pill px-5 py-3 fw-semibold text-primary">Read More</a>
                </div>
            </div>
            
            <!-- Pro Plan -->
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card h-100 bg-white rounded-4 shadow-sm border-0 p-4 text-center">
                    <h3 class="pricing-title fw-bold mb-4">Pro</h3>
                    <div class="pricing-price mb-4">
                        <span class="price-currency text-primary fs-3 fw-bold">$</span>
                        <span class="price-amount text-primary display-2 fw-bold">79</span>
                        <span class="price-period text-muted">/ Month</span>
                    </div>
                    <ul class="pricing-features list-unstyled mb-4">
                        <li class="mb-3 text-muted">Community Support</li>
                        <li class="mb-3 text-muted">Dedicated Tech Experts</li>
                        <li class="mb-3 text-muted">Unlimited Storage</li>
                        <li class="mb-3 text-muted">Custom Domains</li>
                    </ul>
                    <a href="#" class="btn btn-primary rounded-pill px-5 py-3 fw-semibold">Read More</a>
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
                <span class="badge bg-light text-primary mb-3 px-3 py-2">LEAVE US MESSAGES</span>
                <h2 class="section-title fw-bold display-5">How May We Help You!</h2>
                <p class="text-light opacity-90">Get in touch with us for any inquiries</p>
            </div>
        </div>
        <div class="row g-5">
            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="contact-info">
                    <div class="contact-item mb-4 p-4 bg-white bg-opacity-10 rounded-4">
                        <div class="contact-icon mb-3">
                            <i class="fas fa-phone fa-2x text-light"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Contact Number</h5>
                        <a href="tel:<?php echo esc_attr(str_replace(array(' ', '(', ')', '-'), '', techwix_get_option('techwix_topbar_phone', '+00(1) 123 456 7890'))); ?>" 
                           class="text-light text-decoration-none">
                            <?php echo esc_html(techwix_get_option('techwix_topbar_phone', '+00(1) 123 456 7890')); ?>
                        </a>
                    </div>
                    
                    <div class="contact-item mb-4 p-4 bg-white bg-opacity-10 rounded-4">
                        <div class="contact-icon mb-3">
                            <i class="fas fa-envelope fa-2x text-light"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Our Mail</h5>
                        <a href="mailto:<?php echo esc_attr(techwix_get_option('techwix_topbar_email', 'infotechmax@ourmail.com')); ?>" 
                           class="text-light text-decoration-none">
                            <?php echo esc_html(techwix_get_option('techwix_topbar_email', 'infotechmax@ourmail.com')); ?>
                        </a>
                    </div>
                    
                    <div class="contact-item p-4 bg-white bg-opacity-10 rounded-4">
                        <div class="contact-icon mb-3">
                            <i class="fas fa-map-marker-alt fa-2x text-light"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Our Location</h5>
                        <p class="mb-0 text-light opacity-90">
                            New ipsum dolor amet, eiusmod adipisicing<br>
                            147 NewYork, NY<br>
                            Adipisicing 123
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-8">
                <?php if (isset($_GET['contact'])): ?>
                    <div id="alert-container" class="mb-4">
                        <?php if ($_GET['contact'] == 'success'): ?>
                            <div class="alert alert-success alert-dismissible fade show border-0 rounded-4" role="alert">
                                <i class="fas fa-check-circle me-2"></i>Thank you! Your message has been sent successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php elseif ($_GET['contact'] == 'error'): ?>
                            <div class="alert alert-danger alert-dismissible fade show border-0 rounded-4" role="alert">
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
                                <input type="text" class="form-control bg-white border-0 rounded-3" id="name" name="name" placeholder="Your Name" required>
                                <label for="name" class="text-muted">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control bg-white border-0 rounded-3" id="email" name="email" placeholder="Your Email" required>
                                <label for="email" class="text-muted">Your Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control bg-white border-0 rounded-3" id="phone" name="phone" placeholder="Your Phone">
                                <label for="phone" class="text-muted">Your Phone</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-white border-0 rounded-3" id="subject" name="subject" placeholder="Subject">
                                <label for="subject" class="text-muted">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control bg-white border-0 rounded-3" id="message" name="message" style="height: 120px" placeholder="Your Message" required></textarea>
                                <label for="message" class="text-muted">Your Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="contact_form_submit" class="btn btn-light btn-lg rounded-pill px-5 fw-semibold">
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
<section class="newsletter-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h3 class="fw-bold mb-3 display-6">Subscribe to Our Newsletter</h3>
                <p class="mb-0 text-muted">Stay updated with our latest news, tips, and exclusive offers for IT solutions.</p>
            </div>
            <div class="col-lg-6">
                <?php if (isset($_GET['newsletter'])): ?>
                    <div class="mb-3">
                        <?php if ($_GET['newsletter'] == 'success'): ?>
                            <div class="alert alert-success alert-dismissible fade show border-0 rounded-4" role="alert">
                                <i class="fas fa-check-circle me-2"></i>Successfully subscribed to newsletter!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php elseif ($_GET['newsletter'] == 'error'): ?>
                            <div class="alert alert-danger alert-dismissible fade show border-0 rounded-4" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>Failed to subscribe. Please try again.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
                <form class="newsletter-form" method="post">
                    <?php wp_nonce_field('newsletter_nonce', 'newsletter_nonce'); ?>
                    <div class="input-group input-group-lg">
                        <input type="email" name="newsletter_email" class="form-control border-0 rounded-start-4" placeholder="Enter your email address" required>
                        <button class="btn btn-primary px-4 rounded-end-4 fw-semibold" type="submit" name="newsletter_submit">
                            <i class="fas fa-paper-plane me-2"></i>Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
