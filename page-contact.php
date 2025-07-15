<?php
/**
 * Template Name: Contact
 */

get_header(); ?>

<section class="page-hero" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; padding: 150px 0 100px; margin-top: 100px;">
    <div class="container">
        <div class="text-center">
            <h1>Contact Us</h1>
            <p>Get in touch with our team for any questions or inquiries</p>
        </div>
    </div>
</section>

<section class="contact-page" style="padding: 100px 0;">
    <div class="container">
        <div class="contact-content">
            <div class="contact-info">
                <h2>Get In Touch</h2>
                <p style="margin-bottom: 40px; color: #666;">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                
                <div class="contact-item">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h4>Phone Number</h4>
                        <p><?php echo get_theme_mod('contact_phone', '+00(1) 123 456 7890'); ?></p>
                        <p>+91 458 654 528</p>
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h4>Email Address</h4>
                        <p><?php echo get_theme_mod('contact_email', 'infotechmax@ourmail.com'); ?></p>
                        <p>info@example.com</p>
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h4>Office Location</h4>
                        <p><?php echo get_theme_mod('contact_address', 'New ipsum dolor amet, eiusmod adipisicing 147 NewYors, NY Adipisicing 123'); ?></p>
                        <p>60 East 65th Street, NY</p>
                    </div>
                </div>
                
                <div class="social-links" style="margin-top: 40px;">
                    <h4>Follow Us</h4>
                    <div style="display: flex; gap: 15px; margin-top: 15px;">
                        <a href="#" style="width: 40px; height: 40px; background: #3b82f6; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" style="width: 40px; height: 40px; background: #3b82f6; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="fab fa-twitter"></i></a>
                        <a href="#" style="width: 40px; height: 40px; background: #3b82f6; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" style="width: 40px; height: 40px; background: #3b82f6; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="contact-form">
                <h3>Send Us a Message</h3>
                
                <?php if (isset($_GET['contact']) && $_GET['contact'] == 'success'): ?>
                    <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                        Thank you for your message! We'll get back to you soon.
                    </div>
                <?php elseif (isset($_GET['contact']) && $_GET['contact'] == 'error'): ?>
                    <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                        There was an error sending your message. Please try again.
                    </div>
                <?php endif; ?>
                
                <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post">
                    <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name *" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email *" required>
                        </div>
                    </div>
                    
                    <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
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
                    
                    <button type="submit" name="contact_form_submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="map-section" style="padding: 0; margin-top: 50px;">
    <div style="width: 100%; height: 400px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #666;">
        <div style="text-align: center;">
            <i class="fas fa-map-marker-alt" style="font-size: 48px; margin-bottom: 20px; color: #3b82f6;"></i>
            <h3>Our Location</h3>
            <p>Interactive map will be displayed here</p>
            <p style="font-size: 14px; margin-top: 10px;">You can integrate Google Maps or any other mapping service</p>
        </div>
    </div>
</section>

<style>
.contact-page .contact-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    color: #333;
}

.contact-page .contact-info {
    background: #f8fafc;
    padding: 40px;
    border-radius: 10px;
}

.contact-page .contact-form {
    background: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.contact-page .form-row {
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .contact-page .contact-content {
        grid-template-columns: 1fr;
    }
    
    .contact-page .form-row {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php get_footer(); ?>
