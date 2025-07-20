<?php
/**
 * Template Name: Contact
 */

get_header(); ?>

<section class="page-hero bg-primary text-white py-5" style="margin-top: 100px;">
    <div class="container">
        <div class="text-center">
            <h1 class="display-4 fw-bold">Contact</h1>
            <p class="lead">Get in touch with our team for any questions or inquiries</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Main Contact Section -->
<section class="contact-main py-5">
    <div class="container">
        <!-- Contact Info Cards -->
        <div class="row g-4 mb-5">
            <div class="col-lg-4 text-center">
                <div class="contact-card p-4 h-100 border rounded-3 shadow-sm">
                    <div class="contact-card-icon mb-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/TECW0130.png" 
                             alt="Phone Icon" class="img-fluid" style="max-width: 60px;" />
                    </div>
                    <h4 class="fw-bold mb-3">Give us a call</h4>
                    <div class="contact-details">
                        <p class="mb-1"><a href="tel:+1400630123" class="text-decoration-none">(+1) 400-630 123</a></p>
                        <p class="mb-0"><a href="tel:+2500950456" class="text-decoration-none">(+2) 500-950 456</a></p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 text-center">
                <div class="contact-card p-4 h-100 border rounded-3 shadow-sm">
                    <div class="contact-card-icon mb-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/TECW0131.png" 
                             alt="Email Icon" class="img-fluid" style="max-width: 60px;" />
                    </div>
                    <h4 class="fw-bold mb-3">Drop us a line</h4>
                    <div class="contact-details">
                        <p class="mb-1"><a href="mailto:info@techwix-theme.com" class="text-decoration-none">info@techwix-theme.com</a></p>
                        <p class="mb-0"><a href="mailto:mail@techwix-tech.com" class="text-decoration-none">mail@techwix-tech.com</a></p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 text-center">
                <div class="contact-card p-4 h-100 border rounded-3 shadow-sm">
                    <div class="contact-card-icon mb-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/TECW0132.png" 
                             alt="Location Icon" class="img-fluid" style="max-width: 60px;" />
                    </div>
                    <h4 class="fw-bold mb-3">Visit our office</h4>
                    <div class="contact-details">
                        <p class="mb-1">New York. 112 W 34th St</p>
                        <p class="mb-0">Caroline, USA</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Request Quote Section -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="quote-section bg-light p-5 rounded">
                    <div class="text-center mb-4">
                        <span class="badge bg-primary fs-6 mb-3">REQUESTS A QUOTE</span>
                        <h2 class="fw-bold">How May We Help You!</h2>
                    </div>
                    
                    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" class="contact-form-main">
                        <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                        
                        <?php if (isset($_GET['contact']) && $_GET['contact'] == 'success'): ?>
                            <div class="alert alert-success">
                                Thank you for your message! We'll get back to you soon.
                            </div>
                        <?php elseif (isset($_GET['contact']) && $_GET['contact'] == 'error'): ?>
                            <div class="alert alert-danger">
                                There was an error sending your message. Please try again.
                            </div>
                        <?php endif; ?>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name *" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Your Email *" required>
                            </div>
                            <div class="col-md-6">
                                <input type="tel" name="phone" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="subject" class="form-control" placeholder="Subject">
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control" rows="6" placeholder="Your Message *" required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" name="submit_contact" class="btn btn-primary btn-lg px-5">
                                    <i class="fas fa-paper-plane me-2"></i>Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <input type="tel" name="phone" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" placeholder="Subject *" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <textarea name="message" placeholder="Your Message *" required rows="6"></textarea>
                    </div>
                    
                    <button type="submit" name="contact_form_submit" class="submit-btn-main">Submit</button>
                </form>
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
/* Contact Page Specific Styles */
.contact-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 80px;
    align-items: start;
}

.contact-cards {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.contact-card {
    background: #fff;
    padding: 40px 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
    border: 1px solid #f1f5f9;
}

.contact-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.contact-card-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #3b82f6, #1e40af);
    border-radius: 50%;
    padding: 20px;
}

.contact-card-icon img {
    width: 40px;
    height: 40px;
    filter: brightness(0) invert(1);
}

.contact-card h3 {
    color: #1e3a8a;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 20px;
}

.contact-details p {
    color: #666;
    font-size: 16px;
    margin-bottom: 8px;
    font-weight: 500;
}

.quote-section {
    background: #f8fafc;
    padding: 50px 40px;
    border-radius: 20px;
    border: 1px solid #e2e8f0;
}

.quote-badge {
    background: linear-gradient(135deg, #3b82f6, #1e40af);
    color: #fff;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    display: inline-block;
    margin-bottom: 20px;
}

.quote-section h2 {
    color: #1e3a8a;
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 40px;
    line-height: 1.2;
}

.contact-form-main {
    width: 100%;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.form-group {
    width: 100%;
}

.contact-form-main input,
.contact-form-main textarea {
    width: 100%;
    padding: 18px 20px;
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    font-size: 16px;
    font-family: inherit;
    transition: all 0.3s;
    background: #fff;
}

.contact-form-main input:focus,
.contact-form-main textarea:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.contact-form-main textarea {
    resize: vertical;
    min-height: 120px;
}

.submit-btn-main {
    background: linear-gradient(135deg, #3b82f6, #1e40af);
    color: #fff;
    padding: 18px 40px;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-top: 10px;
}

.submit-btn-main:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
}

.form-message {
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 25px;
    font-weight: 500;
}

.form-message.success {
    background: #d1fae5;
    color: #065f46;
    border: 1px solid #a7f3d0;
}

.form-message.error {
    background: #fee2e2;
    color: #991b1b;
    border: 1px solid #fca5a5;
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
    .contact-layout {
        grid-template-columns: 1fr;
        gap: 50px;
    }
    
    .contact-cards {
        gap: 30px;
    }
    
    .contact-card {
        padding: 30px 20px;
    }
    
    .quote-section {
        padding: 30px 20px;
    }
    
    .quote-section h2 {
        font-size: 24px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .contact-form-main input,
    .contact-form-main textarea {
        padding: 15px 18px;
    }
}

@media (max-width: 480px) {
    .contact-card h3 {
        font-size: 20px;
    }
    
    .contact-details p {
        font-size: 14px;
    }
    
    .quote-badge {
        font-size: 10px;
        padding: 6px 15px;
    }
}
</style>

<?php get_footer(); ?>
