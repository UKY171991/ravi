jQuery(document).ready(function($) {
    'use strict';
    
    // Smooth Scrolling for anchor links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        var target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });
    
    // Header Scroll Effect (if using custom header styles)
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 100) {
            $('.main-header').addClass('scrolled');
        } else {
            $('.main-header').removeClass('scrolled');
        }
    });
    
    // Progress Bar Animation
    function animateProgressBars() {
        $('.progress-bar').each(function() {
            var $this = $(this);
            var width = $this.css('width');
            $this.css('width', '0%').animate({
                width: width
            }, 2000);
        });
    }
    
    // Counter Animation
    function animateCounters() {
        $('.stat-item .display-4').each(function() {
            var $this = $(this);
            var countTo = parseInt($this.text().replace(/[^0-9]/g, ''));
            
            $({ countNum: 0 }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'swing',
                step: function() {
                    var suffix = $this.text().replace(/[0-9]/g, '');
                    $this.text(Math.floor(this.countNum) + suffix);
                },
                complete: function() {
                    var suffix = $this.text().replace(/[0-9]/g, '');
                    $this.text(countTo + suffix);
                }
            });
        });
    }
    
    // Counter Animation for new counter section
    function animateNewCounters() {
        $('.counter-number').each(function() {
            var $this = $(this);
            var countTo = $this.attr('data-count');
            
            $({ countNum: $this.text() }).animate({
                countNum: countTo
            }, {
                duration: 3000,
                easing: 'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    }

    // Intersection Observer for animations
    if ('IntersectionObserver' in window) {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    
                    // Trigger specific animations
                    if (entry.target.classList.contains('stats-section')) {
                        animateCounters();
                    }
                    if (entry.target.classList.contains('about-section')) {
                        setTimeout(animateProgressBars, 500);
                    }
                }
            });
        }, observerOptions);
        
        // Observe elements for animation
        $('.fade-in, .stats-section, .about-section').each(function() {
            observer.observe(this);
        });
    }
    
    // Form Submission (Newsletter and Contact)
    $('.newsletter-form, .contact-form').on('submit', function(e) {
        e.preventDefault();
        
        var $form = $(this);
        var $submitBtn = $form.find('button[type="submit"]');
        var originalText = $submitBtn.html();
        
        // Show loading state
        $submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Sending...');
        $submitBtn.prop('disabled', true);
        
        // Simulate form submission (replace with actual AJAX call)
        setTimeout(function() {
            $submitBtn.html('<i class="fas fa-check me-2"></i>Sent!');
            $submitBtn.removeClass('btn-primary').addClass('btn-success');
            
            // Reset form after delay
            setTimeout(function() {
                $form[0].reset();
                $submitBtn.html(originalText);
                $submitBtn.removeClass('btn-success').addClass('btn-primary');
                $submitBtn.prop('disabled', false);
            }, 2000);
        }, 1500);
    });
    
    // Service Card Hover Effects
    $('.service-card').hover(
        function() {
            $(this).find('.service-icon i').addClass('bounce');
        },
        function() {
            $(this).find('.service-icon i').removeClass('bounce');
        }
    );
    
    // Testimonial Carousel Auto-play
    if ($('#testimonialCarousel').length) {
        $('#testimonialCarousel').carousel({
            interval: 5000,
            pause: 'hover'
        });
    }
    
    // Parallax Effect for Hero Section
    $(window).on('scroll', function() {
        var scrollTop = $(this).scrollTop();
        var rate = scrollTop * -0.5;
        $('.hero-section').css('background-position', 'center ' + rate + 'px');
    });
    
    // Back to Top Button
    var backToTop = $('<button class="back-to-top btn btn-primary position-fixed" style="bottom: 20px; right: 20px; z-index: 1000; display: none;"><i class="fas fa-arrow-up"></i></button>');
    $('body').append(backToTop);
    
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 300) {
            backToTop.fadeIn();
        } else {
            backToTop.fadeOut();
        }
    });
    
    backToTop.on('click', function() {
        $('html, body').animate({
            scrollTop: 0
        }, 600);
    });
    
    // Initialize tooltips and popovers if Bootstrap is loaded
    if (typeof bootstrap !== 'undefined') {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
    
    // Loading Animation
    $(window).on('load', function() {
        $('.loading-overlay').fadeOut();
        $('body').addClass('loaded');
    });
});

// Additional CSS animations via JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Add loading class to body
    document.body.classList.add('loading');
    
    // Remove loading class after page load
    window.addEventListener('load', function() {
        document.body.classList.remove('loading');
    });
    
    // Typing effect for hero title
    function typeWriter(element, text, speed = 100) {
        let i = 0;
        element.innerHTML = '';
        
        function type() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        
        type();
    }
    
    // Initialize typing effect
    const heroTitle = document.querySelector('.hero h1');
    if (heroTitle) {
        const originalText = heroTitle.textContent;
        setTimeout(() => typeWriter(heroTitle, originalText, 80), 1000);
    }
});

// Scroll animations for sections
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
            }
        });
    }, observerOptions);

    // Observe all sections for animation
    $('.services-section, .about-section, .why-choose-section, .testimonials-section').each(function() {
        $(this).addClass('animate-on-scroll');
        observer.observe(this);
    });

    // Animate cards on scroll
    $('.service-card, .feature-item, .testimonial-card').each(function(index) {
        $(this).addClass('animate-on-scroll');
        $(this).css('animation-delay', (index * 0.1) + 's');
        observer.observe(this);
    });
}

// Enhanced service card interactions
$('.service-card, .feature-item').each(function() {
    $(this).hover(
        function() {
            $(this).find('i').addClass('fa-bounce');
        },
        function() {
            $(this).find('i').removeClass('fa-bounce');
        }
    );
});

// Newsletter form enhancement
$('#newsletter-form').on('submit', function(e) {
    e.preventDefault();
    
    var formData = $(this).serialize();
    var submitBtn = $(this).find('button[type="submit"]');
    var originalText = submitBtn.html();
    
    submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Subscribing...').prop('disabled', true);
    
    $.ajax({
        url: techwix_ajax.ajax_url,
        type: 'POST',
        data: formData + '&action=handle_newsletter_form&nonce=' + techwix_ajax.nonce,
        success: function(response) {
            if (response.success) {
                $('#newsletter-form')[0].reset();
                showAlert('success', 'Thank you for subscribing to our newsletter!');
            } else {
                showAlert('danger', response.data || 'Something went wrong. Please try again.');
            }
        },
        error: function() {
            showAlert('danger', 'Network error. Please try again.');
        },
        complete: function() {
            submitBtn.html(originalText).prop('disabled', false);
        }
    });
});

// Smooth scroll enhancement
$('a[href^="#"]').on('click', function(e) {
    e.preventDefault();
    var target = $(this.getAttribute('href'));
    if (target.length) {
        $('html, body').stop().animate({
            scrollTop: target.offset().top - 100
        }, 1000, 'easeInOutQuart');
    }
});

// Initialize all animations
initScrollAnimations();

// Testimonial carousel auto-height
$('#testimonialCarousel').on('slid.bs.carousel', function() {
    var activeItem = $(this).find('.carousel-item.active');
    var height = activeItem.height();
    $(this).find('.carousel-inner').css('height', height + 'px');
});

// Video play button enhancement
$('.video-play-btn').on('click', function(e) {
    e.preventDefault();
    var videoUrl = $(this).attr('href');
    
    // Create modal for video
    var videoModal = `
        <div class="modal fade" id="videoModal" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="ratio ratio-16x9">
                            <iframe src="${videoUrl}?autoplay=1" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    $('body').append(videoModal);
    $('#videoModal').modal('show');
    
    $('#videoModal').on('hidden.bs.modal', function() {
        $(this).remove();
    });
});

// Enhanced Counter Animation with Intersection Observer
function initCounterAnimation() {
    const counters = document.querySelectorAll('.counter-number[data-count]');
    
    const animateCounter = (counter) => {
        const target = parseInt(counter.getAttribute('data-count'));
        const increment = target / 100;
        let current = 0;
        
        const updateCounter = () => {
            if (current < target) {
                current += increment;
                counter.textContent = Math.ceil(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target;
            }
        };
        
        updateCounter();
    };
    
    // Intersection Observer for counter animation
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                entry.target.classList.add('counted');
                animateCounter(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    counters.forEach(counter => {
        counterObserver.observe(counter);
    });
}

// Enhanced Progress Bar Animation with Intersection Observer
function initProgressAnimation() {
    const progressBars = document.querySelectorAll('.progress-bar');
    
    const progressObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                entry.target.classList.add('animated');
                const width = entry.target.style.width;
                entry.target.style.width = '0%';
                
                setTimeout(() => {
                    entry.target.style.transition = 'width 2s ease-in-out';
                    entry.target.style.width = width;
                }, 200);
            }
        });
    }, { threshold: 0.5 });
    
    progressBars.forEach(bar => {
        progressObserver.observe(bar);
    });
}

// Enhanced Smooth Scrolling with offset calculation
function initSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerHeight = document.querySelector('.navbar')?.offsetHeight || 80;
                const targetPosition = target.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Lazy Loading for Images
function initLazyLoading() {
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => {
        imageObserver.observe(img);
    });
}

// Form Validation Enhancement
function initFormValidation() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const inputs = form.querySelectorAll('input[required], textarea[required]');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('is-invalid');
                    
                    // Remove invalid class on input
                    input.addEventListener('input', function() {
                        this.classList.remove('is-invalid');
                    });
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                // Show error message
                const errorDiv = form.querySelector('.error-message') || document.createElement('div');
                errorDiv.className = 'alert alert-danger error-message mt-3';
                errorDiv.textContent = 'Please fill in all required fields.';
                
                if (!form.querySelector('.error-message')) {
                    form.appendChild(errorDiv);
                }
                
                setTimeout(() => {
                    errorDiv.remove();
                }, 5000);
            }
        });
    });
}

// Service Card Hover Effects
function initServiceCardEffects() {
    const serviceCards = document.querySelectorAll('.service-card, .feature-item');
    
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
            this.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
}

// Testimonial Carousel Enhancement
function initTestimonialEnhancements() {
    const carousel = document.querySelector('#testimonialCarousel');
    if (carousel) {
        // Add touch/swipe support
        let startX = 0;
        let currentX = 0;
        
        carousel.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });
        
        carousel.addEventListener('touchmove', (e) => {
            currentX = e.touches[0].clientX;
        });
        
        carousel.addEventListener('touchend', () => {
            const diff = startX - currentX;
            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    // Swipe left - next
                    const nextBtn = carousel.querySelector('[data-bs-slide="next"]');
                    nextBtn?.click();
                } else {
                    // Swipe right - prev
                    const prevBtn = carousel.querySelector('[data-bs-slide="prev"]');
                    prevBtn?.click();
                }
            }
        });
    }
}

// Header functionality
document.addEventListener('DOMContentLoaded', function() {
    // Header scroll effect
    const header = document.querySelector('.main-header');
    
    function handleScroll() {
        if (window.scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }
    
    window.addEventListener('scroll', handleScroll);
    
    // Smooth dropdown animation
    const dropdownMenus = document.querySelectorAll('.dropdown-menu');
    dropdownMenus.forEach(menu => {
        menu.style.opacity = '0';
        menu.style.transform = 'translateY(-10px)';
        menu.style.transition = 'all 0.3s ease';
    });
    
    // Show dropdown with animation
    document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
        toggle.addEventListener('shown.bs.dropdown', function() {
            const menu = this.nextElementSibling;
            menu.style.opacity = '1';
            menu.style.transform = 'translateY(0)';
        });
        
        toggle.addEventListener('hide.bs.dropdown', function() {
            const menu = this.nextElementSibling;
            menu.style.opacity = '0';
            menu.style.transform = 'translateY(-10px)';
        });
    });
    
    // Active navigation highlighting
    const currentLocation = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentLocation) {
            link.classList.add('active');
        }
    });
    
    // Mobile menu improvements
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    if (navbarToggler && navbarCollapse) {
        navbarToggler.addEventListener('click', function() {
            setTimeout(() => {
                if (navbarCollapse.classList.contains('show')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            }, 300);
        });
    }
    
    // Close mobile menu when clicking on links
    const mobileNavLinks = document.querySelectorAll('.navbar-nav .nav-link');
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 992) {
                const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                    hide: true
                });
                document.body.style.overflow = '';
            }
        });
    });
});

// Alert auto-dismiss
setTimeout(() => {
    const alerts = document.querySelectorAll('.alert-dismissible');
    alerts.forEach(alert => {
        const closeBtn = alert.querySelector('.btn-close');
        if (closeBtn) {
            closeBtn.click();
        }
    });
}, 8000);
