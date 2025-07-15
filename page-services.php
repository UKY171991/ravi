<?php
/**
 * Template Name: Services
 */

get_header(); ?>

<section class="page-hero" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; padding: 150px 0 100px; margin-top: 100px;">
    <div class="container">
        <div class="text-center">
            <h1>Our Services</h1>
            <p>Comprehensive IT solutions to help your business grow and succeed</p>
        </div>
    </div>
</section>

<section class="services-detailed" style="padding: 100px 0;">
    <div class="container">
        <div class="services-grid">
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-server"></i>
                </div>
                <h3>Infrastructure Technology</h3>
                <p>Highly professional IT experts providing robust infrastructure solutions for your business needs. We design, implement, and maintain IT infrastructure that scales with your business.</p>
                <ul style="text-align: left; margin: 20px 0; color: #666;">
                    <li>Network Design & Implementation</li>
                    <li>Server Management</li>
                    <li>Cloud Infrastructure</li>
                    <li>System Integration</li>
                </ul>
                <a href="<?php echo home_url('/service/infrastructure-technology'); ?>" class="btn-primary" style="display: inline-block; margin-top: 20px;">Learn More</a>
            </div>
            
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Security Management</h3>
                <p>Advanced security solutions to protect your data and systems from cyber threats and vulnerabilities. Our comprehensive security approach ensures your business is always protected.</p>
                <ul style="text-align: left; margin: 20px 0; color: #666;">
                    <li>Cybersecurity Assessment</li>
                    <li>Threat Detection & Response</li>
                    <li>Data Encryption</li>
                    <li>Security Monitoring</li>
                </ul>
                <a href="<?php echo home_url('/service/security-management'); ?>" class="btn-primary" style="display: inline-block; margin-top: 20px;">Learn More</a>
            </div>
            
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-database"></i>
                </div>
                <h3>Data Management</h3>
                <p>Comprehensive data management solutions to organize, store, and analyze your business data effectively. Turn your data into actionable insights.</p>
                <ul style="text-align: left; margin: 20px 0; color: #666;">
                    <li>Database Design & Optimization</li>
                    <li>Data Analytics</li>
                    <li>Backup & Recovery</li>
                    <li>Business Intelligence</li>
                </ul>
                <a href="<?php echo home_url('/service/data-management'); ?>" class="btn-primary" style="display: inline-block; margin-top: 20px;">Learn More</a>
            </div>
            
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3>Quality Control System</h3>
                <p>Advanced quality control systems to ensure your IT infrastructure meets the highest standards. We implement rigorous testing and monitoring processes.</p>
                <ul style="text-align: left; margin: 20px 0; color: #666;">
                    <li>System Testing</li>
                    <li>Performance Monitoring</li>
                    <li>Quality Assurance</li>
                    <li>Compliance Management</li>
                </ul>
                <a href="<?php echo home_url('/service/quality-control'); ?>" class="btn-primary" style="display: inline-block; margin-top: 20px;">Learn More</a>
            </div>
            
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-cube"></i>
                </div>
                <h3>Blockchain Technology</h3>
                <p>Cutting-edge blockchain solutions for secure and transparent business operations. Leverage the power of distributed ledger technology.</p>
                <ul style="text-align: left; margin: 20px 0; color: #666;">
                    <li>Smart Contracts</li>
                    <li>Cryptocurrency Solutions</li>
                    <li>Decentralized Applications</li>
                    <li>Blockchain Consulting</li>
                </ul>
                <a href="<?php echo home_url('/service/blockchain-technology'); ?>" class="btn-primary" style="display: inline-block; margin-top: 20px;">Learn More</a>
            </div>
            
            <div class="service-card">
                <div class="icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3>Advanced Technology</h3>
                <p>Implementation of the latest technologies to keep your business ahead of the competition. Stay current with emerging tech trends.</p>
                <ul style="text-align: left; margin: 20px 0; color: #666;">
                    <li>AI & Machine Learning</li>
                    <li>IoT Solutions</li>
                    <li>Cloud Computing</li>
                    <li>Mobile Applications</li>
                </ul>
                <a href="<?php echo home_url('/service/advanced-technology'); ?>" class="btn-primary" style="display: inline-block; margin-top: 20px;">Learn More</a>
            </div>
        </div>
    </div>
</section>

<section class="service-process" style="padding: 100px 0; background: #f8fafc;">
    <div class="container">
        <div class="section-header">
            <h2>Our Process</h2>
            <p>How we deliver exceptional IT solutions for your business</p>
        </div>
        
        <div class="process-steps" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-top: 60px;">
            <div class="step" style="text-align: center; position: relative;">
                <div class="step-number" style="width: 60px; height: 60px; background: #3b82f6; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 24px; font-weight: bold;">1</div>
                <h3>Analysis</h3>
                <p>We analyze your business requirements and identify the best solutions for your needs.</p>
            </div>
            
            <div class="step" style="text-align: center; position: relative;">
                <div class="step-number" style="width: 60px; height: 60px; background: #3b82f6; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 24px; font-weight: bold;">2</div>
                <h3>Planning</h3>
                <p>We create a detailed project plan with timelines, milestones, and deliverables.</p>
            </div>
            
            <div class="step" style="text-align: center; position: relative;">
                <div class="step-number" style="width: 60px; height: 60px; background: #3b82f6; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 24px; font-weight: bold;">3</div>
                <h3>Implementation</h3>
                <p>Our expert team implements the solution with precision and attention to detail.</p>
            </div>
            
            <div class="step" style="text-align: center; position: relative;">
                <div class="step-number" style="width: 60px; height: 60px; background: #3b82f6; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 24px; font-weight: bold;">4</div>
                <h3>Support</h3>
                <p>We provide ongoing support and maintenance to ensure optimal performance.</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
