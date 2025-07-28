<?php
/**
 * Template Name: Contact
 */

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // General Contact Form
    if (isset($_POST['submit_general']) && wp_verify_nonce($_POST['general_nonce'], 'general_contact_nonce')) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);
        
        $to = get_option('admin_email');
        $subject_line = 'General Inquiry: ' . $subject;
        $body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
        $headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . $email);
        
        if (wp_mail($to, $subject_line, $body, $headers)) {
            wp_redirect(add_query_arg('general', 'success', $_SERVER['REQUEST_URI']));
        } else {
            wp_redirect(add_query_arg('general', 'error', $_SERVER['REQUEST_URI']));
        }
        exit;
    }
    
    // Quote Request Form
    if (isset($_POST['submit_quote']) && wp_verify_nonce($_POST['quote_nonce'], 'quote_contact_nonce')) {
        $company = sanitize_text_field($_POST['company_name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $service = sanitize_text_field($_POST['service_type']);
        $budget = sanitize_text_field($_POST['budget_range']);
        $timeline = sanitize_text_field($_POST['timeline']);
        $details = sanitize_textarea_field($_POST['project_details']);
        
        $to = get_option('admin_email');
        $subject_line = 'Quote Request from: ' . $company;
        $body = "Company: $company\nEmail: $email\nPhone: $phone\nService: $service\nBudget: $budget\nTimeline: $timeline\n\nProject Details:\n$details";
        $headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . $email);
        
        if (wp_mail($to, $subject_line, $body, $headers)) {
            wp_redirect(add_query_arg('quote', 'success', $_SERVER['REQUEST_URI']));
        } else {
            wp_redirect(add_query_arg('quote', 'error', $_SERVER['REQUEST_URI']));
        }
        exit;
    }
    
    // Support Form
    if (isset($_POST['submit_support']) && wp_verify_nonce($_POST['support_nonce'], 'support_contact_nonce')) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $priority = sanitize_text_field($_POST['priority']);
        $issue_type = sanitize_text_field($_POST['issue_type']);
        $description = sanitize_textarea_field($_POST['issue_description']);
        
        $to = get_option('admin_email');
        $subject_line = 'Support Request: ' . $issue_type . ' (' . $priority . ' priority)';
        $body = "Name: $name\nEmail: $email\nPriority: $priority\nIssue Type: $issue_type\n\nDescription:\n$description";
        $headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . $email);
        
        if (wp_mail($to, $subject_line, $body, $headers)) {
            wp_redirect(add_query_arg('support', 'success', $_SERVER['REQUEST_URI']));
        } else {
            wp_redirect(add_query_arg('support', 'error', $_SERVER['REQUEST_URI']));
        }
        exit;
    }
    
    // Consultation Form
    if (isset($_POST['submit_consultation']) && wp_verify_nonce($_POST['consultation_nonce'], 'consultation_contact_nonce')) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $company = sanitize_text_field($_POST['company']);
        $consultation_type = sanitize_text_field($_POST['consultation_type']);
        $preferred_time = sanitize_text_field($_POST['preferred_time']);
        $details = sanitize_textarea_field($_POST['consultation_details']);
        
        $to = get_option('admin_email');
        $subject_line = 'Consultation Request: ' . $consultation_type;
        $body = "Name: $name\nEmail: $email\nPhone: $phone\nCompany: $company\nConsultation Type: $consultation_type\nPreferred Time: $preferred_time\n\nDetails:\n$details";
        $headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . $email);
        
        if (wp_mail($to, $subject_line, $body, $headers)) {
            wp_redirect(add_query_arg('consultation', 'success', $_SERVER['REQUEST_URI']));
        } else {
            wp_redirect(add_query_arg('consultation', 'error', $_SERVER['REQUEST_URI']));
        }
        exit;
    }
}

get_header(); ?>

<!-- Hero Section -->
<section class="contact-hero bg-primary text-white py-5" style="margin-top: 100px;">
    <div class="container">
        <div class="text-center">
            <span class="badge bg-light text-primary mb-3 px-3 py-2 rounded-pill">GET IN TOUCH</span>
            <h1 class="display-3 fw-bold mb-4">Contact Us</h1>
            <p class="lead mb-4">Ready to transform your business with our IT solutions? Let's start the conversation.</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>" class="text-white text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Contact Information Cards -->
<section class="contact-info py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="contact-info-card h-100 p-4 text-center bg-white rounded-4 shadow-sm hover-shadow-lg transition-all">
                    <div class="contact-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-phone fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">Call Us</h4>
                    <p class="text-muted mb-3">Speak directly with our expert team</p>
                    <div class="contact-details">
                        <p class="mb-2"><a href="tel:+1001234567890" class="text-decoration-none text-primary fw-semibold">+100 123 456 7890</a></p>
                        <p class="mb-0"><a href="tel:+1234567890" class="text-decoration-none text-primary fw-semibold">+123 456 7890</a></p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="contact-info-card h-100 p-4 text-center bg-white rounded-4 shadow-sm hover-shadow-lg transition-all">
                    <div class="contact-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-envelope fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">Email Us</h4>
                    <p class="text-muted mb-3">Send us a message anytime</p>
                    <div class="contact-details">
                        <p class="mb-2"><a href="mailto:infotechmax@ourmail.com" class="text-decoration-none text-primary fw-semibold">infotechmax@ourmail.com</a></p>
                        <p class="mb-0"><a href="mailto:support@techwix.com" class="text-decoration-none text-primary fw-semibold">support@techwix.com</a></p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="contact-info-card h-100 p-4 text-center bg-white rounded-4 shadow-sm hover-shadow-lg transition-all">
                    <div class="contact-icon mb-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">Visit Us</h4>
                    <p class="text-muted mb-3">Come and see our office</p>
                    <div class="contact-details">
                        <p class="mb-2 fw-semibold">New ipsum dolor amet, eiusmod</p>
                        <p class="mb-0">147 NewYork, NY Adipisicing 123</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Multiple Contact Forms Section -->
<section class="contact-forms py-5">
    <div class="container">
        <div class="row">
            <!-- General Contact Form -->
            <div class="col-lg-6 mb-5">
                <div class="contact-form-wrapper bg-white p-5 rounded-4 shadow-sm h-100">
                    <div class="form-header mb-4">
                        <span class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill">GENERAL INQUIRY</span>
                        <h3 class="fw-bold mb-3">Send us a Message</h3>
                        <p class="text-muted">Have a question or need assistance? We're here to help.</p>
                    </div>
                    
                    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" class="contact-form" id="generalContactForm">
                        <?php wp_nonce_field('general_contact_nonce', 'general_nonce'); ?>
                        
                        <?php if (isset($_GET['general']) && $_GET['general'] == 'success'): ?>
                            <div class="alert alert-success rounded-pill">
                                <i class="fas fa-check-circle me-2"></i>Thank you! We'll get back to you soon.
                            </div>
                        <?php elseif (isset($_GET['general']) && $_GET['general'] == 'error'): ?>
                            <div class="alert alert-danger rounded-pill">
                                <i class="fas fa-exclamation-circle me-2"></i>Error sending message. Please try again.
                            </div>
                        <?php endif; ?>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control" id="generalName" placeholder="Your Name" required>
                                    <label for="generalName">Your Name *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="generalEmail" placeholder="Your Email" required>
                                    <label for="generalEmail">Your Email *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" name="phone" class="form-control" id="generalPhone" placeholder="Phone Number">
                                    <label for="generalPhone">Phone Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="inquiry_type" class="form-select" id="generalType" required>
                                        <option value="">Select Type</option>
                                        <option value="general">General Question</option>
                                        <option value="support">Technical Support</option>
                                        <option value="sales">Sales Inquiry</option>
                                        <option value="partnership">Partnership</option>
                                    </select>
                                    <label for="generalType">Inquiry Type *</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="message" class="form-control" id="generalMessage" style="height: 120px" placeholder="Your Message" required></textarea>
                                    <label for="generalMessage">Your Message *</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit_general" class="btn btn-primary btn-lg px-4 py-3 rounded-pill">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Quote Request Form -->
            <div class="col-lg-6 mb-5">
                <div class="contact-form-wrapper bg-gradient text-white p-5 rounded-4 shadow-sm h-100" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);">
                    <div class="form-header mb-4">
                        <span class="badge bg-white text-primary mb-3 px-3 py-2 rounded-pill">GET A QUOTE</span>
                        <h3 class="fw-bold mb-3 text-white">Request a Quote</h3>
                        <p class="text-white opacity-90">Need a custom solution? Get a personalized quote from our experts.</p>
                    </div>
                    
                    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" class="contact-form" id="quoteContactForm">
                        <?php wp_nonce_field('quote_contact_nonce', 'quote_nonce'); ?>
                        
                        <?php if (isset($_GET['quote']) && $_GET['quote'] == 'success'): ?>
                            <div class="alert alert-light rounded-pill">
                                <i class="fas fa-check-circle me-2"></i>Quote request received! We'll send you a proposal soon.
                            </div>
                        <?php elseif (isset($_GET['quote']) && $_GET['quote'] == 'error'): ?>
                            <div class="alert alert-warning rounded-pill">
                                <i class="fas fa-exclamation-circle me-2"></i>Error sending request. Please try again.
                            </div>
                        <?php endif; ?>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="company_name" class="form-control" id="quoteName" placeholder="Company Name" required>
                                    <label for="quoteName">Company Name *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="quoteEmail" placeholder="Business Email" required>
                                    <label for="quoteEmail">Business Email *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" name="phone" class="form-control" id="quotePhone" placeholder="Phone Number" required>
                                    <label for="quotePhone">Phone Number *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="service_type" class="form-select" id="quoteService" required>
                                        <option value="">Select Service</option>
                                        <option value="web_development">Web Development</option>
                                        <option value="mobile_app">Mobile App Development</option>
                                        <option value="cloud_solutions">Cloud Solutions</option>
                                        <option value="cybersecurity">Cybersecurity</option>
                                        <option value="data_analytics">Data Analytics</option>
                                        <option value="it_consulting">IT Consulting</option>
                                    </select>
                                    <label for="quoteService">Service Needed *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="budget_range" class="form-select" id="quoteBudget">
                                        <option value="">Select Budget</option>
                                        <option value="under_5k">Under $5,000</option>
                                        <option value="5k_15k">$5,000 - $15,000</option>
                                        <option value="15k_50k">$15,000 - $50,000</option>
                                        <option value="50k_plus">$50,000+</option>
                                    </select>
                                    <label for="quoteBudget">Budget Range</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="timeline" class="form-select" id="quoteTimeline">
                                        <option value="">Select Timeline</option>
                                        <option value="asap">ASAP</option>
                                        <option value="1_month">Within 1 Month</option>
                                        <option value="3_months">1-3 Months</option>
                                        <option value="6_months">3-6 Months</option>
                                        <option value="flexible">Flexible</option>
                                    </select>
                                    <label for="quoteTimeline">Timeline</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="project_details" class="form-control" id="quoteDetails" style="height: 120px" placeholder="Project Details" required></textarea>
                                    <label for="quoteDetails">Project Details *</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit_quote" class="btn btn-light btn-lg px-4 py-3 rounded-pill text-primary fw-bold">
                                    <i class="fas fa-calculator me-2"></i>Get Quote
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Support & Consultation Forms Row -->
        <div class="row">
            <!-- Technical Support Form -->
            <div class="col-lg-6 mb-5">
                <div class="contact-form-wrapper bg-light p-5 rounded-4 shadow-sm h-100">
                    <div class="form-header mb-4">
                        <span class="badge bg-warning bg-opacity-10 text-warning mb-3 px-3 py-2 rounded-pill">TECHNICAL SUPPORT</span>
                        <h3 class="fw-bold mb-3">Need Help?</h3>
                        <p class="text-muted">Having technical issues? Our support team is ready to assist you.</p>
                    </div>
                    
                    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" class="contact-form" id="supportContactForm">
                        <?php wp_nonce_field('support_contact_nonce', 'support_nonce'); ?>
                        
                        <?php if (isset($_GET['support']) && $_GET['support'] == 'success'): ?>
                            <div class="alert alert-success rounded-pill">
                                <i class="fas fa-check-circle me-2"></i>Support ticket created! We'll help you shortly.
                            </div>
                        <?php elseif (isset($_GET['support']) && $_GET['support'] == 'error'): ?>
                            <div class="alert alert-danger rounded-pill">
                                <i class="fas fa-exclamation-circle me-2"></i>Error creating ticket. Please try again.
                            </div>
                        <?php endif; ?>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control" id="supportName" placeholder="Your Name" required>
                                    <label for="supportName">Your Name *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="supportEmail" placeholder="Your Email" required>
                                    <label for="supportEmail">Your Email *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="priority" class="form-select" id="supportPriority" required>
                                        <option value="">Select Priority</option>
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                        <option value="urgent">Urgent</option>
                                    </select>
                                    <label for="supportPriority">Priority Level *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="issue_type" class="form-select" id="supportType" required>
                                        <option value="">Select Issue Type</option>
                                        <option value="login">Login Issues</option>
                                        <option value="performance">Performance</option>
                                        <option value="bug">Bug Report</option>
                                        <option value="feature">Feature Request</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <label for="supportType">Issue Type *</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="issue_description" class="form-control" id="supportDescription" style="height: 120px" placeholder="Describe your issue" required></textarea>
                                    <label for="supportDescription">Issue Description *</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit_support" class="btn btn-warning btn-lg px-4 py-3 rounded-pill">
                                    <i class="fas fa-tools me-2"></i>Get Support
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Consultation Form -->
            <div class="col-lg-6 mb-5">
                <div class="contact-form-wrapper bg-white p-5 rounded-4 shadow-sm border-2 border-primary h-100">
                    <div class="form-header mb-4">
                        <span class="badge bg-success bg-opacity-10 text-success mb-3 px-3 py-2 rounded-pill">FREE CONSULTATION</span>
                        <h3 class="fw-bold mb-3">Book a Consultation</h3>
                        <p class="text-muted">Schedule a free consultation with our IT experts to discuss your needs.</p>
                    </div>
                    
                    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" class="contact-form" id="consultationContactForm">
                        <?php wp_nonce_field('consultation_contact_nonce', 'consultation_nonce'); ?>
                        
                        <?php if (isset($_GET['consultation']) && $_GET['consultation'] == 'success'): ?>
                            <div class="alert alert-success rounded-pill">
                                <i class="fas fa-check-circle me-2"></i>Consultation booked! We'll contact you soon.
                            </div>
                        <?php elseif (isset($_GET['consultation']) && $_GET['consultation'] == 'error'): ?>
                            <div class="alert alert-danger rounded-pill">
                                <i class="fas fa-exclamation-circle me-2"></i>Error booking consultation. Please try again.
                            </div>
                        <?php endif; ?>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control" id="consultationName" placeholder="Your Name" required>
                                    <label for="consultationName">Your Name *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="consultationEmail" placeholder="Your Email" required>
                                    <label for="consultationEmail">Your Email *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" name="phone" class="form-control" id="consultationPhone" placeholder="Phone Number" required>
                                    <label for="consultationPhone">Phone Number *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="company" class="form-control" id="consultationCompany" placeholder="Company Name">
                                    <label for="consultationCompany">Company Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="consultation_type" class="form-select" id="consultationType" required>
                                        <option value="">Select Consultation</option>
                                        <option value="strategy">IT Strategy</option>
                                        <option value="security">Security Assessment</option>
                                        <option value="infrastructure">Infrastructure Review</option>
                                        <option value="digital_transformation">Digital Transformation</option>
                                        <option value="cloud_migration">Cloud Migration</option>
                                    </select>
                                    <label for="consultationType">Consultation Type *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="preferred_time" class="form-select" id="consultationTime">
                                        <option value="">Preferred Time</option>
                                        <option value="morning">Morning (9AM-12PM)</option>
                                        <option value="afternoon">Afternoon (12PM-5PM)</option>
                                        <option value="evening">Evening (5PM-8PM)</option>
                                    </select>
                                    <label for="consultationTime">Preferred Time</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="consultation_details" class="form-control" id="consultationDetails" style="height: 120px" placeholder="Tell us about your needs"></textarea>
                                    <label for="consultationDetails">Tell us about your needs</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit_consultation" class="btn btn-success btn-lg px-4 py-3 rounded-pill">
                                    <i class="fas fa-calendar-alt me-2"></i>Book Consultation
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information & Map Section -->
<section class="contact-info-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Contact Information Cards -->
            <div class="col-lg-4 mb-4">
                <div class="contact-info-card text-center p-4 bg-white rounded-4 shadow-sm h-100">
                    <div class="contact-icon mb-3">
                        <i class="fas fa-map-marker-alt text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Visit Our Office</h4>
                    <p class="text-muted mb-0">123 Business Avenue<br>Suite 456<br>New York, NY 10001</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="contact-info-card text-center p-4 bg-white rounded-4 shadow-sm h-100">
                    <div class="contact-icon mb-3">
                        <i class="fas fa-phone text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Call Us</h4>
                    <p class="text-muted mb-2">Phone: <a href="tel:+1234567890" class="text-decoration-none">(123) 456-7890</a></p>
                    <p class="text-muted mb-0">Toll Free: <a href="tel:+1800123456" class="text-decoration-none">(800) 123-456</a></p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="contact-info-card text-center p-4 bg-white rounded-4 shadow-sm h-100">
                    <div class="contact-icon mb-3">
                        <i class="fas fa-envelope text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Email Us</h4>
                    <p class="text-muted mb-2">General: <a href="mailto:info@techwix.com" class="text-decoration-none">info@techwix.com</a></p>
                    <p class="text-muted mb-0">Support: <a href="mailto:support@techwix.com" class="text-decoration-none">support@techwix.com</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1841080861054!2d-73.98599168459394!3d40.748441779328736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1620000000000!5m2!1sen!2sus" 
            width="100%" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>
</section>

<style>
/* Contact Page Additional Styles */
.contact-info-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.contact-info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
}

.contact-info-card .contact-icon {
    transition: transform 0.3s ease;
}

.contact-info-card:hover .contact-icon {
    transform: scale(1.1);
}

.map-container {
    position: relative;
    width: 100%;
    height: 450px;
    overflow: hidden;
}

.map-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
}

/* Responsive Design */
@media (max-width: 768px) {
    .contact-forms-section .row {
        margin-bottom: 2rem;
    }
    
    .contact-form-wrapper {
        margin-bottom: 2rem;
    }
    
    .map-container {
        height: 300px;
    }
}
</style>

<?php get_footer(); ?>
