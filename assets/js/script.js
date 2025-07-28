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
    
    // Portfolio Filter
    $('.portfolio-filter button').on('click', function() {
        var filterValue = $(this).data('filter');
        
        // Update active button
        $('.portfolio-filter button').removeClass('active');
        $(this).addClass('active');
        
        // Filter portfolio items
        if (filterValue === 'all') {
            $('.portfolio-item').fadeIn(300);
        } else {
            $('.portfolio-item').hide();
            $('.portfolio-item[data-category="' + filterValue + '"]').fadeIn(300);
        }
    });
    
    // Image Loading Error Handling
    $('img').on('error', function() {
        var $this = $(this);
        var altText = $this.attr('alt') || 'Image not found';
        
        // Create placeholder
        var placeholder = '<div class="image-placeholder d-flex align-items-center justify-content-center text-center p-4 bg-light rounded" style="width:' + ($this.attr('width') || '100%') + '; height:' + ($this.attr('height') || '200px') + ';">' +
            '<div>' +
                '<i class="fas fa-image fa-2x text-muted mb-2"></i><br>' +
                '<small class="text-muted">' + altText + '</small>' +
            '</div>' +
        '</div>';
        
        $this.replaceWith(placeholder);
    });
    
    // Image Loading State
    $('img').on('load', function() {
        $(this).removeClass('image-loading');
    }).each(function() {
        if (this.complete) {
            $(this).removeClass('image-loading');
        } else {
            $(this).addClass('image-loading');
        }
    });
    
    // Lazy Loading for Better Performance
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    const src = img.dataset.src || img.src;
                    
                    if (src && img.src !== src) {
                        img.src = src;
                        img.classList.remove('lazy');
                        observer.unobserve(img);
                    }
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
    
    // FontAwesome fallback check
    function checkFontAwesome() {
        const testIcon = $('<i class="fas fa-check" style="position:absolute;top:-9999px;"></i>');
        $('body').append(testIcon);
        
        if (testIcon.width() === 0) {
            console.warn('FontAwesome not loaded properly. Loading fallback...');
            // Add fallback FontAwesome CDN
            $('<link>').attr({
                rel: 'stylesheet',
                type: 'text/css',
                href: 'https://use.fontawesome.com/releases/v6.0.0/css/all.css'
            }).appendTo('head');
        }
        
        testIcon.remove();
    }
    
    // Check FontAwesome after a delay
    setTimeout(checkFontAwesome, 1000);
    
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

// Contact Page Enhancements
$(document).ready(function() {
    // Multi-step form functionality
    let currentStep = 1;
    const totalSteps = $('.form-step').length;
    
    // Next step button
    $('.next-step').on('click', function() {
        if (validateStep(currentStep)) {
            goToStep(currentStep + 1);
        }
    });
    
    // Previous step button
    $('.prev-step').on('click', function() {
        goToStep(currentStep - 1);
    });
    
    function goToStep(step) {
        if (step < 1 || step > totalSteps) return;
        
        // Hide current step
        $('.form-step').removeClass('active').hide();
        $('.step').removeClass('active');
        
        // Show new step
        currentStep = step;
        $(`.form-step[data-step="${currentStep}"]`).addClass('active').fadeIn(300);
        $(`.step[data-step="${currentStep}"]`).addClass('active');
        
        updateStepIndicators();
    }
    
    function updateStepIndicators() {
        $('.step').each(function(index) {
            const stepNumber = index + 1;
            const circle = $(this).find('.step-circle');
            
            if (stepNumber < currentStep) {
                // Completed step
                circle.removeClass('bg-light text-muted bg-primary')
                      .addClass('bg-success text-white')
                      .html('<i class="fas fa-check"></i>');
            } else if (stepNumber === currentStep) {
                // Current step
                circle.removeClass('bg-light text-muted bg-success')
                      .addClass('bg-primary text-white')
                      .text(stepNumber);
            } else {
                // Future step
                circle.removeClass('bg-primary bg-success text-white')
                      .addClass('bg-light text-muted')
                      .text(stepNumber);
            }
        });
    }
    
    function validateStep(step) {
        const currentFormStep = $(`.form-step[data-step="${step}"]`);
        const requiredFields = currentFormStep.find('[required]');
        let isValid = true;
        
        requiredFields.each(function() {
            const field = $(this);
            if (!field.val().trim()) {
                field.addClass('is-invalid');
                isValid = false;
                
                // Show validation message
                if (!field.next('.invalid-feedback').length) {
                    field.after('<div class="invalid-feedback">This field is required.</div>');
                }
            } else {
                field.removeClass('is-invalid');
                field.next('.invalid-feedback').remove();
            }
        });
        
        return isValid;
    }
    
    // Form field animations
    $('.form-control, .form-select').on('focus', function() {
        $(this).closest('.form-floating').addClass('focused');
        $(this).parent().addClass('focused');
    }).on('blur', function() {
        $(this).closest('.form-floating').removeClass('focused');
        $(this).parent().removeClass('focused');
    });
    
    // Contact info card hover effects
    $('.contact-info-card').hover(
        function() {
            $(this).find('.icon-wrapper').addClass('animate-pulse');
        },
        function() {
            $(this).find('.icon-wrapper').removeClass('animate-pulse');
        }
    );
    
    // Phone number formatting
    $('#contactPhone, #quotePhone').on('input', function() {
        let value = this.value.replace(/\D/g, '');
        let formattedValue = '';
        
        if (value.length > 0) {
            if (value.length <= 3) {
                formattedValue = `(${value}`;
            } else if (value.length <= 6) {
                formattedValue = `(${value.slice(0, 3)}) ${value.slice(3)}`;
            } else {
                formattedValue = `(${value.slice(0, 3)}) ${value.slice(3, 6)}-${value.slice(6, 10)}`;
            }
        }
        
        this.value = formattedValue;
    });
    
    // Email validation enhancement
    $('input[type="email"]').on('blur', function() {
        const email = $(this).val();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (email && !emailRegex.test(email)) {
            $(this).addClass('is-invalid');
            if (!$(this).next('.invalid-feedback').length) {
                $(this).after('<div class="invalid-feedback">Please enter a valid email address.</div>');
            }
        } else {
            $(this).removeClass('is-invalid');
            $(this).next('.invalid-feedback').remove();
        }
    });
    
    // Form submission with loading state
    $('form').on('submit', function() {
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        
        submitBtn.prop('disabled', true)
                 .html('<i class="fas fa-spinner fa-spin me-2"></i>Sending...');
        
        // Re-enable after 3 seconds (in case of error)
        setTimeout(() => {
            submitBtn.prop('disabled', false).html(originalText);
        }, 3000);
    });
    
    // Smooth scroll for anchor links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        const target = $($(this).attr('href'));
        
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 600);
        }
    });
    
    // Contact method preference handling
    $('#preferredContact').on('change', function() {
        const preference = $(this).val();
        const phoneField = $('#contactPhone');
        
        if (preference === 'Phone' || preference === 'WhatsApp') {
            phoneField.attr('required', true);
            phoneField.closest('.form-floating').find('label').html('<i class="fas fa-phone me-2 text-primary"></i>Phone Number *');
        } else {
            phoneField.removeAttr('required');
            phoneField.closest('.form-floating').find('label').html('<i class="fas fa-phone me-2 text-primary"></i>Phone Number');
        }
    });
    
    // Auto-resize textarea
    $('textarea').on('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
    
    // FAQ accordion enhancements
    $('.accordion-button').on('click', function() {
        const icon = $(this).find('i');
        if ($(this).hasClass('collapsed')) {
            icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
        } else {
            icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
        }
    });
    
    // Contact card click to action
    $('.contact-info-card').on('click', function() {
        const link = $(this).find('a').first();
        if (link.length) {
            window.open(link.attr('href'), '_blank');
        }
    });
    
    // Social media hover effects
    $('.social-connect a').hover(
        function() {
            $(this).addClass('animate-pulse');
        },
        function() {
            $(this).removeClass('animate-pulse');
        }
    );
});

// Live chat function (placeholder)
function openLiveChat() {
    // Add your live chat integration here
    // For example: Intercom, Zendesk, Tawk.to, etc.
    
    // Placeholder notification
    showNotification('Live Chat', 'Live chat feature will be available soon!', 'info');
    
    // Example integration:
    // if (window.Intercom) {
    //     window.Intercom('show');
    // }
}

// Schedule call function (placeholder)
function scheduleCall() {
    // Add your scheduling integration here
    // For example: Calendly, Acuity Scheduling, etc.
    
    // Placeholder - open scheduling link
    window.open('https://calendly.com/your-link', '_blank');
    
    // Or show a modal with scheduling options
    showNotification('Schedule Call', 'Opening scheduling calendar...', 'success');
}

// Notification system
function showNotification(title, message, type = 'info') {
    const notification = $(`
        <div class="notification alert alert-${type === 'info' ? 'primary' : type} alert-dismissible fade show position-fixed" 
             style="top: 20px; right: 20px; z-index: 9999; min-width: 300px;">
            <strong>${title}</strong><br>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `);
    
    $('body').append(notification);
    
    // Auto-dismiss after 5 seconds
    setTimeout(() => {
        notification.alert('close');
    }, 5000);
}

// Performance optimization: Lazy load images
$(document).ready(function() {
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
});

// Form analytics (placeholder)
function trackFormSubmission(formType, step = null) {
    // Add your analytics tracking here
    // For example: Google Analytics, Mixpanel, etc.
    
    if (typeof gtag !== 'undefined') {
        gtag('event', 'form_submission', {
            'form_type': formType,
            'step': step
        });
    }
    
    console.log(`Form submission tracked: ${formType}`, step ? `Step: ${step}` : '');
}

// Enhanced form validation
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validatePhone(phone) {
    const re = /^\(\d{3}\) \d{3}-\d{4}$/;
    return re.test(phone);
}

// Initialize page-specific features
$(document).ready(function() {
    // Add page-specific initialization
    if ($('.contact-hero').length) {
        // Initialize contact page features
        initContactPageFeatures();
    }
});

function initContactPageFeatures() {
    // Add floating action button for quick contact
    const fabButton = $(`
        <div class="fab-container position-fixed" style="bottom: 30px; right: 30px; z-index: 1000;">
            <button class="btn btn-primary rounded-circle fab-main" style="width: 60px; height: 60px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
                <i class="fas fa-phone"></i>
            </button>
            <div class="fab-options" style="display: none;">
                <a href="tel:+1400630123" class="btn btn-success rounded-circle fab-option mb-2" style="width: 50px; height: 50px;">
                    <i class="fas fa-phone"></i>
                </a>
                <a href="mailto:info@techwix-theme.com" class="btn btn-primary rounded-circle fab-option mb-2" style="width: 50px; height: 50px;">
                    <i class="fas fa-envelope"></i>
                </a>
                <a href="https://wa.me/1400630123" class="btn btn-success rounded-circle fab-option mb-2" style="width: 50px; height: 50px;" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
    `);
    
    $('body').append(fabButton);
    
    // FAB toggle functionality
    $('.fab-main').on('click', function() {
        $('.fab-options').toggle();
    });
    
    // Hide FAB on scroll down, show on scroll up
    let lastScrollTop = 0;
    $(window).scroll(function() {
        const scrollTop = $(this).scrollTop();
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            $('.fab-container').fadeOut();
        } else {
            $('.fab-container').fadeIn();
        }
        lastScrollTop = scrollTop;
    });
}

// Blog Page Enhancements
$(document).ready(function() {
    // Blog page specific functionality
    if ($('.blog-section').length) {
        initBlogPageFeatures();
    }
});

function initBlogPageFeatures() {
    // Blog card hover effects with staggered animation
    $('.blog-card').each(function(index) {
        $(this).css('animation-delay', (index * 0.1) + 's');
        
        $(this).hover(
            function() {
                $(this).find('.blog-image img').css('transform', 'scale(1.05)');
                $(this).find('.blog-overlay').css('opacity', '1');
            },
            function() {
                $(this).find('.blog-image img').css('transform', 'scale(1)');
                $(this).find('.blog-overlay').css('opacity', '0');
            }
        );
    });
    
    // Lazy loading for blog images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        observer.unobserve(img);
                    }
                    img.style.animation = 'fadeIn 0.5s ease forwards';
                }
            });
        });
        
        document.querySelectorAll('.blog-image img').forEach(img => {
            imageObserver.observe(img);
        });
    }
    
    // Blog card click tracking
    $('.blog-card').on('click', function(e) {
        if (!$(e.target).closest('a').length) {
            window.location.href = $(this).find('.blog-title a').attr('href');
        }
    });
    
    // Smooth pagination scroll
    $('.pagination .page-link').on('click', function(e) {
        if (this.href) {
            setTimeout(() => {
                $('html, body').animate({
                    scrollTop: $('.blog-section').offset().top - 120
                }, 800);
            }, 100);
        }
    });
    
    // Read time estimation
    $('.blog-card').each(function() {
        const excerpt = $(this).find('.blog-excerpt').text();
        const wordCount = excerpt.split(' ').length;
        const readTime = Math.ceil(wordCount / 200); // 200 words per minute
        
        if (wordCount > 10) { // Only add if there's substantial content
            $(this).find('.blog-meta .d-flex').append(
                `<span class="read-time ms-3">
                    <i class="fas fa-clock me-1 text-primary"></i>
                    ${readTime} min read
                </span>`
            );
        }
    });
    
    // Blog filter functionality (if categories exist)
    if ($('.blog-filter').length) {
        $('.blog-filter .filter-btn').on('click', function() {
            const filterValue = $(this).data('filter');
            
            $('.blog-filter .filter-btn').removeClass('active');
            $(this).addClass('active');
            
            if (filterValue === 'all') {
                $('.blog-card').parent().fadeIn(300);
            } else {
                $('.blog-card').parent().hide();
                $(`.blog-card[data-category="${filterValue}"]`).parent().fadeIn(300);
            }
        });
    }
    
    // Blog search functionality
    $('#blog-search').on('input', function() {
        const searchTerm = $(this).val().toLowerCase();
        
        $('.blog-card').each(function() {
            const title = $(this).find('.blog-title').text().toLowerCase();
            const excerpt = $(this).find('.blog-excerpt').text().toLowerCase();
            
            if (title.includes(searchTerm) || excerpt.includes(searchTerm)) {
                $(this).parent().fadeIn(300);
            } else {
                $(this).parent().fadeOut(300);
            }
        });
    });
    
    // Enhanced blog card animations
    const cards = document.querySelectorAll('.blog-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    cards.forEach(card => {
        if (!card.style.opacity) {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'all 0.6s ease';
        }
        observer.observe(card);
    });
}
