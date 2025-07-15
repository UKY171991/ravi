<?php
/**
 * The main template file
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>WE PROVIDE 100% & TRUSTABLE</h1>
                <h2 class="subtitle">IT Solution</h2>
                <p>We provide the most responsive and functional IT design for companies and businesses worldwide.</p>
                <div class="hero-buttons">
                    <a href="<?php echo home_url('/about-us'); ?>" class="btn-primary">Read More</a>
                    <a href="<?php echo home_url('/services'); ?>" class="btn-secondary">Our Services</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-image.png" alt="IT Solutions" />
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services">
    <div class="container">
        <div class="section-header">
            <h2>Our Services</h2>
            <p>We provide comprehensive IT solutions to help your business grow and succeed in the digital world.</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-server"></i>
                </div>
                <h3>Infrastructure Technology</h3>
                <p>Highly professional IT experts providing robust infrastructure solutions for your business needs.</p>
            </div>
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Security Management</h3>
                <p>Advanced security solutions to protect your data and systems from cyber threats and vulnerabilities.</p>
            </div>
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-database"></i>
                </div>
                <h3>Data Management</h3>
                <p>Comprehensive data management solutions to organize, store, and analyze your business data effectively.</p>
            </div>
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3>Quality Control System</h3>
                <p>Advanced quality control systems to ensure your IT infrastructure meets the highest standards.</p>
            </div>
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-cube"></i>
                </div>
                <h3>Blockchain Technology</h3>
                <p>Cutting-edge blockchain solutions for secure and transparent business operations.</p>
            </div>
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3>Advanced Technology</h3>
                <p>Implementation of the latest technologies to keep your business ahead of the competition.</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>About Our Company</h2>
                <p>We are a leading IT solutions provider with years of experience in delivering innovative technology solutions to businesses worldwide. Our team of expert professionals is dedicated to helping your business achieve its digital transformation goals.</p>
                <p>We specialize in providing comprehensive IT services including infrastructure management, security solutions, data management, and cutting-edge technology implementation.</p>
                <div class="stats">
                    <div class="stat-item">
                        <div class="number">80%</div>
                        <div class="label">IT Management</div>
                    </div>
                    <div class="stat-item">
                        <div class="number">95%</div>
                        <div class="label">Data Security</div>
                    </div>
                </div>
            </div>
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-image.png" alt="About Us" />
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact">
    <div class="container">
        <div class="contact-content">
            <div class="contact-info">
                <h2>How May We Help You!</h2>
                <div class="contact-item">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h4>Contact Number</h4>
                        <p>+00(1) 123 456 7890</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h4>Our Mail</h4>
                        <p>infotechmax@ourmail.com</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h4>Our Location</h4>
                        <p>New ipsum dolor amet, eiusmod adipisicing 147 NewYors, NY Adipisicing 123</p>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <h3>Leave Us Messages</h3>
                <form action="#" method="post">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
