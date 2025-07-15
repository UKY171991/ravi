<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Techwix</h3>
                <p>Accelerate innovation with world-class tech teams. We'll match you to an entire remote team of incredible freelance talent.</p>
                <div class="social-links" style="margin-top: 20px;">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Useful Links</h3>
                <ul>
                    <li><a href="<?php echo home_url(); ?>">Home</a></li>
                    <li><a href="<?php echo home_url('/about-us'); ?>">About Company</a></li>
                    <li><a href="<?php echo home_url('/services'); ?>">Our Services</a></li>
                    <li><a href="<?php echo home_url('/why-choose-us'); ?>">Why Choose Us</a></li>
                    <li><a href="<?php echo home_url('/contact'); ?>">Contact Us</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Our Services</h3>
                <ul>
                    <li><a href="<?php echo home_url('/service/infrastructure-technology'); ?>">Infrastructure Technology</a></li>
                    <li><a href="<?php echo home_url('/service/blockchain-technology'); ?>">Blockchain Technology</a></li>
                    <li><a href="<?php echo home_url('/service/advanced-technology'); ?>">Advanced Technology</a></li>
                    <li><a href="<?php echo home_url('/service/data-management'); ?>">Data Management</a></li>
                    <li><a href="<?php echo home_url('/service/security-management'); ?>">Security Management</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Contact Information</h3>
                <ul>
                    <li><a href="tel:+91458654528"><i class="fas fa-phone"></i> +91 458 654 528</a></li>
                    <li><a href="mailto:info@example.com"><i class="fas fa-envelope"></i> info@example.com</a></li>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> 60 East 65th Street, NY</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Techwix. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<script>
// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    
    // Header scroll effect
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.header');
        if (window.scrollY > 100) {
            header.style.background = 'rgba(255, 255, 255, 0.95)';
            header.style.backdropFilter = 'blur(10px)';
        } else {
            header.style.background = '#fff';
            header.style.backdropFilter = 'none';
        }
    });
});
</script>

</body>
</html>
