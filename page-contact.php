<?php
/**
 * Template Name: Contact
 */

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // General Contact Form
    if (isset($_POST['submit_contact']) && wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);
        $preferred_contact = sanitize_text_field($_POST['preferred_contact']);
        $best_time = sanitize_text_field($_POST['best_time']);
        
        $to = get_option('admin_email');
        $subject_line = 'Contact Form: ' . $subject;
        $body = "
        <html>
        <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
            <div style='max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; border-radius: 10px;'>
                <h2 style='color: #2c5aa0; border-bottom: 2px solid #2c5aa0; padding-bottom: 10px;'>New Contact Form Submission</h2>
                <div style='background: white; padding: 20px; border-radius: 8px; margin: 20px 0;'>
                    <p><strong style='color: #2c5aa0;'>Name:</strong> $name</p>
                    <p><strong style='color: #2c5aa0;'>Email:</strong> <a href='mailto:$email' style='color: #2c5aa0;'>$email</a></p>
                    <p><strong style='color: #2c5aa0;'>Phone:</strong> <a href='tel:$phone' style='color: #2c5aa0;'>$phone</a></p>
                    <p><strong style='color: #2c5aa0;'>Subject:</strong> $subject</p>
                    <p><strong style='color: #2c5aa0;'>Preferred Contact:</strong> $preferred_contact</p>
                    <p><strong style='color: #2c5aa0;'>Best Time to Contact:</strong> $best_time</p>
                    <div style='background: #f8f9fa; padding: 15px; border-left: 4px solid #2c5aa0; margin: 15px 0;'>
                        <p><strong style='color: #2c5aa0;'>Message:</strong></p>
                        <p style='margin: 10px 0;'>$message</p>
                    </div>
                </div>
                <p style='color: #666; font-size: 12px; text-align: center;'>This message was sent from the contact form on your website.</p>
            </div>
        </body>
        </html>";
        $headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . $name . ' <' . $email . '>');
        
        if (wp_mail($to, $subject_line, $body, $headers)) {
            wp_redirect(add_query_arg('contact', 'success', $_SERVER['REQUEST_URI']));
        } else {
            wp_redirect(add_query_arg('contact', 'error', $_SERVER['REQUEST_URI']));
        }
        exit;
    }
    
    // Quote Request Form
    if (isset($_POST['submit_quote']) && wp_verify_nonce($_POST['quote_nonce'], 'quote_form_nonce')) {
        $name = sanitize_text_field($_POST['quote_name']);
        $email = sanitize_email($_POST['quote_email']);
        $phone = sanitize_text_field($_POST['quote_phone']);
        $company = sanitize_text_field($_POST['company']);
        $service = sanitize_text_field($_POST['service']);
        $budget = sanitize_text_field($_POST['budget']);
        $timeline = sanitize_text_field($_POST['timeline']);
        $message = sanitize_textarea_field($_POST['quote_message']);
        
        $to = get_option('admin_email');
        $subject_line = 'Quote Request from: ' . ($company ? $company : $name);
        $body = "
        <html>
        <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
            <div style='max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; border-radius: 10px;'>
                <h2 style='color: #2c5aa0; border-bottom: 2px solid #2c5aa0; padding-bottom: 10px;'>New Quote Request</h2>
                <div style='background: white; padding: 20px; border-radius: 8px; margin: 20px 0;'>
                    <div style='display: grid; gap: 10px;'>
                        <p><strong style='color: #2c5aa0;'>Name:</strong> $name</p>
                        " . ($company ? "<p><strong style='color: #2c5aa0;'>Company:</strong> $company</p>" : "") . "
                        <p><strong style='color: #2c5aa0;'>Email:</strong> <a href='mailto:$email' style='color: #2c5aa0;'>$email</a></p>
                        <p><strong style='color: #2c5aa0;'>Phone:</strong> <a href='tel:$phone' style='color: #2c5aa0;'>$phone</a></p>
                        <p><strong style='color: #2c5aa0;'>Service:</strong> $service</p>
                        <p><strong style='color: #2c5aa0;'>Budget:</strong> $budget</p>
                        <p><strong style='color: #2c5aa0;'>Timeline:</strong> $timeline</p>
                    </div>
                    <div style='background: #f8f9fa; padding: 15px; border-left: 4px solid #2c5aa0; margin: 15px 0;'>
                        <p><strong style='color: #2c5aa0;'>Project Details:</strong></p>
                        <p style='margin: 10px 0;'>$message</p>
                    </div>
                </div>
                <p style='color: #666; font-size: 12px; text-align: center;'>This quote request was sent from your website.</p>
            </div>
        </body>
        </html>";
        $headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . $name . ' <' . $email . '>');
        
        if (wp_mail($to, $subject_line, $body, $headers)) {
            wp_redirect(add_query_arg('quote', 'success', $_SERVER['REQUEST_URI']));
        } else {
            wp_redirect(add_query_arg('quote', 'error', $_SERVER['REQUEST_URI']));
        }
        exit;
    }
}

get_header(); ?>

<!-- Hero Section -->
<section class="contact-hero" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); padding: 120px 0 80px; position: relative; overflow: hidden;">
    <!-- Animated Background Elements -->
    <div class="hero-bg-elements" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none;">
        <div style="position: absolute; top: 10%; left: 10%; width: 60px; height: 60px; background: rgba(255,255,255,0.1); border-radius: 50%; animation: float 6s ease-in-out infinite;"></div>
        <div style="position: absolute; top: 60%; right: 15%; width: 40px; height: 40px; background: rgba(255,255,255,0.08); border-radius: 50%; animation: float 4s ease-in-out infinite reverse;"></div>
        <div style="position: absolute; bottom: 20%; left: 20%; width: 80px; height: 80px; background: rgba(255,255,255,0.05); border-radius: 50%; animation: float 8s ease-in-out infinite;"></div>
    </div>
    
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="800">
                <div class="hero-content text-white">
                    <div class="badge-container mb-4">
                        <span class="badge bg-white text-primary px-4 py-2 rounded-pill fw-bold shadow-sm">
                            <i class="fas fa-phone-alt me-2"></i>GET IN TOUCH
                        </span>
                    </div>
                    <h1 class="display-3 fw-bold mb-4" style="line-height: 1.2;">
                        Let's Start a 
                        <span style="background: linear-gradient(45deg, #ffff00, #ffa500); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Conversation</span>
                    </h1>
                    <p class="lead mb-5 opacity-90" style="font-size: 1.2rem;">
                        Ready to transform your business with cutting-edge IT solutions? Our team of experts is here to help you navigate your digital journey and achieve remarkable results.
                    </p>
                    
                    <!-- Quick Stats -->
                    <div class="row g-4 mb-5">
                        <div class="col-6 col-md-4">
                            <div class="text-center">
                                <h3 class="fw-bold mb-1" style="color: #ffff00;">24/7</h3>
                                <small class="opacity-75">Support Available</small>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="text-center">
                                <h3 class="fw-bold mb-1" style="color: #ffff00;">&lt;1hr</h3>
                                <small class="opacity-75">Response Time</small>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="text-center">
                                <h3 class="fw-bold mb-1" style="color: #ffff00;">500+</h3>
                                <small class="opacity-75">Happy Clients</small>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Contact Buttons -->
                    <div class="d-flex flex-wrap gap-3">
                        <a href="tel:+1400630123" class="btn btn-light btn-lg px-4 py-3 rounded-pill text-primary fw-bold shadow">
                            <i class="fas fa-phone me-2"></i>Call Now
                        </a>
                        <a href="mailto:info@techwix-theme.com" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill fw-bold">
                            <i class="fas fa-envelope me-2"></i>Email Us
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                <div class="hero-image text-center position-relative">
                    <div class="image-wrapper" style="position: relative; display: inline-block;">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/TECW0130.png" 
                             alt="Contact Hero" class="img-fluid" style="max-width: 500px; filter: drop-shadow(0 20px 40px rgba(0,0,0,0.15));">
                        <!-- Pulse Animation -->
                        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 120px; height: 120px; border: 3px solid rgba(255,255,255,0.3); border-radius: 50%; animation: pulse 2s infinite;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information Cards -->
<section class="contact-info-section py-5" style="margin-top: -40px; position: relative; z-index: 2;">
    <div class="container">
        <div class="row g-4">
            <!-- Phone Contact -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="600">
                <div class="contact-info-card h-100 p-4 text-center bg-white rounded-4 shadow-lg border-0 position-relative overflow-hidden" style="transition: all 0.3s ease;">
                    <!-- Background Pattern -->
                    <div style="position: absolute; top: -50%; right: -50%; width: 100%; height: 100%; background: radial-gradient(circle, rgba(44,90,160,0.05) 0%, transparent 70%); pointer-events: none;"></div>
                    
                    <div class="contact-icon mb-4 position-relative">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 80px; height: 80px; position: relative;">
                            <i class="fas fa-phone fa-2x text-primary"></i>
                            <!-- Animated Ring -->
                            <div style="position: absolute; width: 100%; height: 100%; border: 2px solid var(--primary-color); border-radius: 50%; opacity: 0.3; animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;"></div>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">Call Us Directly</h4>
                    <p class="text-muted mb-4">Speak with our experts right away</p>
                    <div class="contact-details">
                        <p class="mb-3">
                            <a href="tel:+1400630123" class="text-decoration-none d-block p-3 rounded-3 bg-light text-primary fw-semibold hover-shadow" style="transition: all 0.3s ease;">
                                <i class="fas fa-phone-alt me-2"></i>(+1) 400-630-123
                            </a>
                        </p>
                        <p class="mb-0">
                            <a href="tel:+2500950456" class="text-decoration-none d-block p-3 rounded-3 bg-light text-primary fw-semibold hover-shadow" style="transition: all 0.3s ease;">
                                <i class="fas fa-mobile-alt me-2"></i>(+2) 500-950-456
                            </a>
                        </p>
                    </div>
                    <div class="mt-4">
                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                            <i class="fas fa-clock me-1"></i>24/7 Available
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Email Contact -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                <div class="contact-info-card h-100 p-4 text-center bg-white rounded-4 shadow-lg border-0 position-relative overflow-hidden" style="transition: all 0.3s ease;">
                    <!-- Background Pattern -->
                    <div style="position: absolute; top: -50%; right: -50%; width: 100%; height: 100%; background: radial-gradient(circle, rgba(44,90,160,0.05) 0%, transparent 70%); pointer-events: none;"></div>
                    
                    <div class="contact-icon mb-4 position-relative">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 80px; height: 80px; position: relative;">
                            <i class="fas fa-envelope fa-2x text-primary"></i>
                            <!-- Animated Ring -->
                            <div style="position: absolute; width: 100%; height: 100%; border: 2px solid var(--primary-color); border-radius: 50%; opacity: 0.3; animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite 0.5s;"></div>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">Send Us Email</h4>
                    <p class="text-muted mb-4">Get detailed responses via email</p>
                    <div class="contact-details">
                        <p class="mb-3">
                            <a href="mailto:info@techwix-theme.com" class="text-decoration-none d-block p-3 rounded-3 bg-light text-primary fw-semibold hover-shadow" style="transition: all 0.3s ease;">
                                <i class="fas fa-envelope me-2"></i>info@techwix-theme.com
                            </a>
                        </p>
                        <p class="mb-0">
                            <a href="mailto:support@techwix-tech.com" class="text-decoration-none d-block p-3 rounded-3 bg-light text-primary fw-semibold hover-shadow" style="transition: all 0.3s ease;">
                                <i class="fas fa-headset me-2"></i>support@techwix-tech.com
                            </a>
                        </p>
                    </div>
                    <div class="mt-4">
                        <span class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill">
                            <i class="fas fa-reply me-1"></i>&lt;1hr Response
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Office Location -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                <div class="contact-info-card h-100 p-4 text-center bg-white rounded-4 shadow-lg border-0 position-relative overflow-hidden" style="transition: all 0.3s ease;">
                    <!-- Background Pattern -->
                    <div style="position: absolute; top: -50%; right: -50%; width: 100%; height: 100%; background: radial-gradient(circle, rgba(44,90,160,0.05) 0%, transparent 70%); pointer-events: none;"></div>
                    
                    <div class="contact-icon mb-4 position-relative">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 80px; height: 80px; position: relative;">
                            <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                            <!-- Animated Ring -->
                            <div style="position: absolute; width: 100%; height: 100%; border: 2px solid var(--primary-color); border-radius: 50%; opacity: 0.3; animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite 1s;"></div>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">Visit Our Office</h4>
                    <p class="text-muted mb-4">Come for a face-to-face meeting</p>
                    <div class="contact-details">
                        <div class="p-3 rounded-3 bg-light mb-3">
                            <p class="mb-2 fw-semibold text-dark">
                                <i class="fas fa-building me-2 text-primary"></i>New York Office
                            </p>
                            <p class="mb-0 text-muted">112 W 34th St, New York<br>Caroline, USA 10001</p>
                        </div>
                        <a href="https://goo.gl/maps" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill px-4">
                            <i class="fas fa-directions me-2"></i>Get Directions
                        </a>
                    </div>
                    <div class="mt-4">
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">
                            <i class="fas fa-calendar me-1"></i>Mon-Fri 9AM-6PM
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quote Request Section -->
<section class="quote-request-section py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Section Header -->
                <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="600">
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-4 py-2 rounded-pill fw-bold">
                        <i class="fas fa-calculator me-2"></i>REQUEST A QUOTE
                    </span>
                    <h2 class="fw-bold mb-3" style="color: var(--primary-color);">Get a Personalized Quote</h2>
                    <p class="lead text-muted">Tell us about your project and we'll provide you with a detailed, customized quote within 24 hours.</p>
                </div>

                <div class="quote-card bg-white p-5 rounded-4 shadow-lg border-0 position-relative overflow-hidden" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                    <!-- Background Pattern -->
                    <div style="position: absolute; top: 0; right: 0; width: 200px; height: 200px; background: radial-gradient(circle, rgba(44,90,160,0.05) 0%, transparent 70%); pointer-events: none;"></div>
                    
                    <?php if (isset($_GET['quote']) && $_GET['quote'] == 'success'): ?>
                        <div class="alert alert-success rounded-4 mb-4 d-flex align-items-center" style="border: none; background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);">
                            <i class="fas fa-check-circle me-3 fs-4"></i>
                            <div>
                                <strong>Thank you!</strong> We've received your quote request and will respond within 24 hours with a detailed proposal.
                            </div>
                        </div>
                    <?php elseif (isset($_GET['quote']) && $_GET['quote'] == 'error'): ?>
                        <div class="alert alert-danger rounded-4 mb-4 d-flex align-items-center" style="border: none; background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);">
                            <i class="fas fa-exclamation-circle me-3 fs-4"></i>
                            <div>
                                <strong>Error!</strong> There was an issue sending your request. Please try again or contact us directly.
                            </div>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" class="quote-form" id="quoteForm">
                        <?php wp_nonce_field('quote_form_nonce', 'quote_nonce'); ?>
                        
                        <!-- Progress Steps -->
                        <div class="form-steps mb-5">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="step active" data-step="1">
                                    <div class="step-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 40px; height: 40px; border-radius: 50%;">1</div>
                                    <small class="fw-semibold">Basic Info</small>
                                </div>
                                <div class="step-line bg-light flex-grow-1 mx-3" style="height: 2px;"></div>
                                <div class="step" data-step="2">
                                    <div class="step-circle bg-light text-muted d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 40px; height: 40px; border-radius: 50%;">2</div>
                                    <small>Project Details</small>
                                </div>
                                <div class="step-line bg-light flex-grow-1 mx-3" style="height: 2px;"></div>
                                <div class="step" data-step="3">
                                    <div class="step-circle bg-light text-muted d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 40px; height: 40px; border-radius: 50%;">3</div>
                                    <small>Requirements</small>
                                </div>
                            </div>
                        </div>

                        <!-- Step 1: Basic Information -->
                        <div class="form-step active" data-step="1">
                            <h4 class="mb-4 text-primary"><i class="fas fa-user me-2"></i>Basic Information</h4>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="quote_name" class="form-control form-control-lg" id="quoteName" placeholder="Your Name" required>
                                        <label for="quoteName"><i class="fas fa-user me-2"></i>Your Name *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="quote_email" class="form-control form-control-lg" id="quoteEmail" placeholder="Your Email" required>
                                        <label for="quoteEmail"><i class="fas fa-envelope me-2"></i>Your Email *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" name="quote_phone" class="form-control form-control-lg" id="quotePhone" placeholder="Phone Number" required>
                                        <label for="quotePhone"><i class="fas fa-phone me-2"></i>Phone Number *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="company" class="form-control form-control-lg" id="quoteCompany" placeholder="Company Name">
                                        <label for="quoteCompany"><i class="fas fa-building me-2"></i>Company Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-primary btn-lg px-5 rounded-pill next-step">
                                    Next Step <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Project Details -->
                        <div class="form-step" data-step="2" style="display: none;">
                            <h4 class="mb-4 text-primary"><i class="fas fa-project-diagram me-2"></i>Project Details</h4>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="service" class="form-select form-select-lg" id="quoteService" required>
                                            <option value="">Select Service</option>
                                            <option value="Web Development">Web Development</option>
                                            <option value="Mobile App Development">Mobile App Development</option>
                                            <option value="E-commerce Solutions">E-commerce Solutions</option>
                                            <option value="Cloud Solutions">Cloud Solutions</option>
                                            <option value="Cybersecurity">Cybersecurity</option>
                                            <option value="IT Consulting">IT Consulting</option>
                                            <option value="Data Analytics">Data Analytics</option>
                                            <option value="Digital Marketing">Digital Marketing</option>
                                            <option value="Custom Software">Custom Software</option>
                                        </select>
                                        <label for="quoteService"><i class="fas fa-cogs me-2"></i>Service Required *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="budget" class="form-select form-select-lg" id="quoteBudget">
                                            <option value="">Select Budget Range</option>
                                            <option value="Under $5K">Under $5,000</option>
                                            <option value="$5K - $15K">$5,000 - $15,000</option>
                                            <option value="$15K - $35K">$15,000 - $35,000</option>
                                            <option value="$35K - $75K">$35,000 - $75,000</option>
                                            <option value="$75K+">$75,000+</option>
                                        </select>
                                        <label for="quoteBudget"><i class="fas fa-dollar-sign me-2"></i>Budget Range</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="timeline" class="form-select form-select-lg" id="quoteTimeline">
                                            <option value="">Select Timeline</option>
                                            <option value="ASAP">ASAP (Rush Order)</option>
                                            <option value="Within 1 Month">Within 1 Month</option>
                                            <option value="1-3 Months">1-3 Months</option>
                                            <option value="3-6 Months">3-6 Months</option>
                                            <option value="6+ Months">6+ Months</option>
                                            <option value="Flexible">Flexible Timeline</option>
                                        </select>
                                        <label for="quoteTimeline"><i class="fas fa-calendar me-2"></i>Timeline</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="priority" class="form-select form-select-lg" id="quotePriority">
                                            <option value="">Select Priority</option>
                                            <option value="Low">Low Priority</option>
                                            <option value="Medium">Medium Priority</option>
                                            <option value="High">High Priority</option>
                                            <option value="Urgent">Urgent</option>
                                        </select>
                                        <label for="quotePriority"><i class="fas fa-exclamation-triangle me-2"></i>Priority Level</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-primary btn-lg px-5 rounded-pill prev-step">
                                    <i class="fas fa-arrow-left me-2"></i>Previous
                                </button>
                                <button type="button" class="btn btn-primary btn-lg px-5 rounded-pill next-step">
                                    Next Step <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Requirements -->
                        <div class="form-step" data-step="3" style="display: none;">
                            <h4 class="mb-4 text-primary"><i class="fas fa-list-check me-2"></i>Project Requirements</h4>
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="quote_message" class="form-control" id="quoteMessage" style="height: 150px" placeholder="Project Details" required></textarea>
                                        <label for="quoteMessage"><i class="fas fa-edit me-2"></i>Describe Your Project in Detail *</label>
                                    </div>
                                    <small class="text-muted mt-2">Please include any specific requirements, features, or goals you have in mind.</small>
                                </div>
                                
                                <!-- Additional Features Checkboxes -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold mb-3">
                                        <i class="fas fa-plus-circle me-2 text-primary"></i>Additional Services (Optional)
                                    </label>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="features[]" value="SEO Optimization" id="seo">
                                                <label class="form-check-label" for="seo">SEO Optimization</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="features[]" value="Analytics Integration" id="analytics">
                                                <label class="form-check-label" for="analytics">Analytics Integration</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="features[]" value="Social Media Integration" id="social">
                                                <label class="form-check-label" for="social">Social Media Integration</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="features[]" value="Ongoing Support" id="support">
                                                <label class="form-check-label" for="support">Ongoing Support & Maintenance</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="features[]" value="Training" id="training">
                                                <label class="form-check-label" for="training">Staff Training</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="features[]" value="Documentation" id="documentation">
                                                <label class="form-check-label" for="documentation">Complete Documentation</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-primary btn-lg px-5 rounded-pill prev-step">
                                    <i class="fas fa-arrow-left me-2"></i>Previous
                                </button>
                                <button type="submit" name="submit_quote" class="btn btn-primary btn-lg px-5 rounded-pill">
                                    <i class="fas fa-paper-plane me-2"></i>Submit Quote Request
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Form Section -->
<section class="contact-form-section py-5" style="background: var(--primary-color); color: white;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Section Header -->
                <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="600">
                    <span class="badge bg-white bg-opacity-20 text-white mb-3 px-4 py-2 rounded-pill fw-bold">
                        <i class="fas fa-comments me-2"></i>GET IN TOUCH
                    </span>
                    <h2 class="fw-bold mb-3 text-white">Send Us a Message</h2>
                    <p class="lead opacity-90">Have a question or need assistance? We're here to help! Send us a message and we'll respond promptly.</p>
                </div>

                <div class="contact-form-wrapper bg-white p-5 rounded-4 shadow-lg position-relative overflow-hidden" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                    <!-- Background Pattern -->
                    <div style="position: absolute; top: 0; left: 0; width: 150px; height: 150px; background: radial-gradient(circle, rgba(44,90,160,0.05) 0%, transparent 70%); pointer-events: none;"></div>
                    
                    <?php if (isset($_GET['contact']) && $_GET['contact'] == 'success'): ?>
                        <div class="alert alert-success rounded-4 mb-4 d-flex align-items-center" style="border: none; background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);">
                            <i class="fas fa-check-circle me-3 fs-4"></i>
                            <div>
                                <strong>Message Sent!</strong> Thank you for reaching out. We'll get back to you within 24 hours.
                            </div>
                        </div>
                    <?php elseif (isset($_GET['contact']) && $_GET['contact'] == 'error'): ?>
                        <div class="alert alert-danger rounded-4 mb-4 d-flex align-items-center" style="border: none; background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);">
                            <i class="fas fa-exclamation-circle me-3 fs-4"></i>
                            <div>
                                <strong>Error!</strong> There was an issue sending your message. Please try again or contact us directly.
                            </div>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" class="contact-form" id="contactForm">
                        <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control form-control-lg" id="contactName" placeholder="Your Name" required>
                                    <label for="contactName"><i class="fas fa-user me-2 text-primary"></i>Your Name *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control form-control-lg" id="contactEmail" placeholder="Your Email" required>
                                    <label for="contactEmail"><i class="fas fa-envelope me-2 text-primary"></i>Your Email *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" name="phone" class="form-control form-control-lg" id="contactPhone" placeholder="Phone Number">
                                    <label for="contactPhone"><i class="fas fa-phone me-2 text-primary"></i>Phone Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="subject" class="form-control form-control-lg" id="contactSubject" placeholder="Subject" required>
                                    <label for="contactSubject"><i class="fas fa-tag me-2 text-primary"></i>Subject *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="preferred_contact" class="form-select form-select-lg" id="preferredContact">
                                        <option value="">Select Preference</option>
                                        <option value="Email">Email</option>
                                        <option value="Phone">Phone Call</option>
                                        <option value="WhatsApp">WhatsApp</option>
                                        <option value="Any">Any Method</option>
                                    </select>
                                    <label for="preferredContact"><i class="fas fa-handshake me-2 text-primary"></i>Preferred Contact Method</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="best_time" class="form-select form-select-lg" id="bestTime">
                                        <option value="">Select Time</option>
                                        <option value="Morning (9AM-12PM)">Morning (9AM-12PM)</option>
                                        <option value="Afternoon (12PM-5PM)">Afternoon (12PM-5PM)</option>
                                        <option value="Evening (5PM-8PM)">Evening (5PM-8PM)</option>
                                        <option value="Flexible">Flexible</option>
                                    </select>
                                    <label for="bestTime"><i class="fas fa-clock me-2 text-primary"></i>Best Time to Contact</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="message" class="form-control" id="contactMessage" style="height: 150px" placeholder="Your Message" required></textarea>
                                    <label for="contactMessage"><i class="fas fa-comment me-2 text-primary"></i>Your Message *</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" name="submit_contact" class="btn btn-primary btn-lg px-5 py-3 rounded-pill position-relative">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
                                        Free!
                                    </span>
                                </button>
                                <p class="mt-3 mb-0 text-muted small">
                                    <i class="fas fa-shield-alt me-1"></i>Your information is secure and will never be shared.
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="600">
                <div class="faq-content">
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-4 py-2 rounded-pill fw-bold">
                        <i class="fas fa-question-circle me-2"></i>FREQUENTLY ASKED
                    </span>
                    <h2 class="fw-bold mb-4" style="color: var(--primary-color);">Common Questions</h2>
                    <p class="lead text-muted mb-5">Find quick answers to common questions about our services and processes.</p>
                    
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm">
                            <h3 class="accordion-header">
                                <button class="accordion-button fw-semibold rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    How long does a typical project take?
                                </button>
                            </h3>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Project timelines vary based on complexity and scope. Simple websites typically take 2-4 weeks, while complex applications can take 3-6 months. We provide detailed timelines during our initial consultation.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    What is your pricing structure?
                                </button>
                            </h3>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We offer flexible pricing based on project requirements. After understanding your needs, we provide a detailed quote with transparent pricing. We also offer monthly payment plans for larger projects.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Do you provide ongoing support?
                                </button>
                            </h3>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes! We offer comprehensive support packages including regular updates, security monitoring, backup services, and technical assistance. Our support team is available 24/7 for critical issues.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Can you work with our existing systems?
                                </button>
                            </h3>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Absolutely! We specialize in integrating with existing systems and can work with various platforms, databases, and third-party services. We'll ensure seamless integration with your current infrastructure.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="600" data-aos-delay="200">
                <div class="contact-options">
                    <h3 class="fw-bold mb-4" style="color: var(--primary-color);">Still Have Questions?</h3>
                    
                    <!-- Contact Options -->
                    <div class="contact-option-card bg-white p-4 rounded-4 shadow-sm mb-4 border-start border-5 border-primary">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-4" style="width: 60px; height: 60px;">
                                <i class="fas fa-headset fa-lg text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Live Chat Support</h5>
                                <p class="text-muted mb-2">Get instant answers from our support team</p>
                                <button class="btn btn-sm btn-primary rounded-pill px-3" onclick="openLiveChat()">
                                    <i class="fas fa-comment me-1"></i>Start Chat
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-option-card bg-white p-4 rounded-4 shadow-sm mb-4 border-start border-5 border-success">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-4" style="width: 60px; height: 60px;">
                                <i class="fab fa-whatsapp fa-lg text-success"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">WhatsApp Business</h5>
                                <p class="text-muted mb-2">Quick responses via WhatsApp</p>
                                <a href="https://wa.me/1400630123" class="btn btn-sm btn-success rounded-pill px-3" target="_blank">
                                    <i class="fab fa-whatsapp me-1"></i>Message Us
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-option-card bg-white p-4 rounded-4 shadow-sm mb-4 border-start border-5 border-info">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-4" style="width: 60px; height: 60px;">
                                <i class="fas fa-calendar-check fa-lg text-info"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Schedule a Meeting</h5>
                                <p class="text-muted mb-2">Book a free consultation call</p>
                                <button class="btn btn-sm btn-info rounded-pill px-3" onclick="scheduleCall()">
                                    <i class="fas fa-calendar me-1"></i>Book Call
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Media Links -->
                    <div class="social-connect bg-white p-4 rounded-4 shadow-sm">
                        <h5 class="fw-bold mb-3">Connect With Us</h5>
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-outline-info btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-lg-8">
                <div class="map-container" style="height: 400px; background: #e9ecef; position: relative;">
                    <!-- Google Maps Embed -->
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.2412648750455!2d-73.9857827!3d40.7500877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1635959207834!5m2!1sen!2sus" 
                        width="100%" 
                        height="400" 
                        style="border:0; filter: grayscale(30%);" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                    <!-- Map Overlay -->
                    <div class="map-overlay position-absolute" style="top: 20px; left: 20px; background: rgba(255,255,255,0.95); padding: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                        <h5 class="fw-bold mb-2 text-primary">Our Location</h5>
                        <p class="mb-1"><i class="fas fa-map-marker-alt text-primary me-2"></i>112 W 34th St</p>
                        <p class="mb-0 text-muted">New York, Caroline, USA</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="map-info bg-primary text-white h-100 d-flex align-items-center p-5">
                    <div>
                        <h3 class="fw-bold mb-4">Visit Our Office</h3>
                        <div class="office-info mb-4">
                            <div class="d-flex align-items-start mb-3">
                                <i class="fas fa-map-marker-alt me-3 mt-1"></i>
                                <div>
                                    <strong>Address:</strong><br>
                                    112 W 34th St, Suite 1800<br>
                                    New York, Caroline, USA 10001
                                </div>
                            </div>
                            <div class="d-flex align-items-start mb-3">
                                <i class="fas fa-clock me-3 mt-1"></i>
                                <div>
                                    <strong>Office Hours:</strong><br>
                                    Monday - Friday: 9:00 AM - 6:00 PM<br>
                                    Saturday: 10:00 AM - 4:00 PM<br>
                                    Sunday: Closed
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <i class="fas fa-parking me-3 mt-1"></i>
                                <div>
                                    <strong>Parking:</strong><br>
                                    Free visitor parking available<br>
                                    Entrance on 34th Street
                                </div>
                            </div>
                        </div>
                        <a href="https://goo.gl/maps" target="_blank" class="btn btn-light btn-lg rounded-pill px-4">
                            <i class="fas fa-directions me-2"></i>Get Directions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Multi-step form functionality
document.addEventListener('DOMContentLoaded', function() {
    const nextButtons = document.querySelectorAll('.next-step');
    const prevButtons = document.querySelectorAll('.prev-step');
    const formSteps = document.querySelectorAll('.form-step');
    const stepIndicators = document.querySelectorAll('.step');
    
    let currentStep = 1;
    
    nextButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (validateStep(currentStep)) {
                goToStep(currentStep + 1);
            }
        });
    });
    
    prevButtons.forEach(button => {
        button.addEventListener('click', function() {
            goToStep(currentStep - 1);
        });
    });
    
    function goToStep(step) {
        formSteps[currentStep - 1].style.display = 'none';
        stepIndicators[currentStep - 1].classList.remove('active');
        
        currentStep = step;
        
        formSteps[currentStep - 1].style.display = 'block';
        stepIndicators[currentStep - 1].classList.add('active');
        
        updateStepIndicators();
    }
    
    function updateStepIndicators() {
        stepIndicators.forEach((indicator, index) => {
            const circle = indicator.querySelector('.step-circle');
            if (index < currentStep - 1) {
                circle.classList.remove('bg-light', 'text-muted');
                circle.classList.add('bg-success', 'text-white');
                circle.innerHTML = '<i class="fas fa-check"></i>';
            } else if (index === currentStep - 1) {
                circle.classList.remove('bg-light', 'text-muted', 'bg-success');
                circle.classList.add('bg-primary', 'text-white');
                circle.innerHTML = index + 1;
                indicator.classList.add('active');
            } else {
                circle.classList.remove('bg-primary', 'bg-success', 'text-white');
                circle.classList.add('bg-light', 'text-muted');
                circle.innerHTML = index + 1;
                indicator.classList.remove('active');
            }
        });
    }
    
    function validateStep(step) {
        const currentFormStep = formSteps[step - 1];
        const requiredFields = currentFormStep.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
            } else {
                field.classList.remove('is-invalid');
            }
        });
        
        return isValid;
    }
    
    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });
    
    // Enhanced form interactions
    const formInputs = document.querySelectorAll('.form-control, .form-select');
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
});

// Live chat function
function openLiveChat() {
    // Replace with your actual live chat implementation
    alert('Live chat feature would be integrated here with your preferred chat service (e.g., Intercom, Zendesk, etc.)');
}

// Schedule call function
function scheduleCall() {
    // Replace with your actual scheduling implementation
    alert('Scheduling feature would be integrated here with your preferred booking service (e.g., Calendly, Acuity, etc.)');
}

// Card hover effects
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.contact-info-card, .contact-option-card');
    
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.boxShadow = '0 20px 40px rgba(0,0,0,0.1)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '';
        });
    });
});
</script>

<style>
/* Custom animations */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

@keyframes pulse {
    0% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
    100% { transform: translate(-50%, -50%) scale(1.2); opacity: 0; }
}

@keyframes ping {
    75%, 100% { transform: scale(1.2); opacity: 0; }
}

/* Form enhancements */
.form-floating.focused label {
    color: var(--primary-color) !important;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(44, 90, 160, 0.25);
}

.hover-shadow:hover {
    box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
    transform: translateY(-2px);
}

/* Step indicators */
.step.active .step-circle {
    transform: scale(1.1);
}

.step-line {
    transition: all 0.3s ease;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .contact-hero {
        padding: 80px 0 40px !important;
    }
    
    .display-3 {
        font-size: 2.5rem !important;
    }
    
    .form-steps {
        flex-direction: column;
        text-align: center;
    }
    
    .form-steps .step {
        margin-bottom: 1rem;
    }
    
    .step-line {
        display: none;
    }
}
</style>

<?php get_footer(); ?>
