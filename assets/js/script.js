jQuery(document).ready(function($) {
    'use strict';
    
    // Mobile Menu Toggle
    $('.mobile-menu-toggle').on('click', function() {
        $('.main-nav').toggleClass('active');
        $(this).toggleClass('active');
    });
    
    // Smooth Scrolling
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        var target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });
    
    // Header Scroll Effect
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 100) {
            $('.header').addClass('scrolled');
        } else {
            $('.header').removeClass('scrolled');
        }
    });
    
    // Counter Animation
    function animateCounters() {
        $('.stat-item .number').each(function() {
            var $this = $(this);
            var countTo = $this.text().replace(/[^0-9]/g, '');
            var suffix = $this.text().replace(/[0-9]/g, '');
            
            $({ countNum: 0 }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum) + suffix);
                },
                complete: function() {
                    $this.text(this.countNum + suffix);
                }
            });
        });
    }
    
    // Trigger counter animation when in view
    $(window).on('scroll', function() {
        $('.stats').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            
            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                if (!$(this).hasClass('animated')) {
                    $(this).addClass('animated');
                    animateCounters();
                }
            }
        });
    });
    
    // Service Cards Hover Effect
    $('.service-card').hover(
        function() {
            $(this).find('.icon').addClass('pulse');
        },
        function() {
            $(this).find('.icon').removeClass('pulse');
        }
    );
    
    // Form Validation
    $('form').on('submit', function(e) {
        var isValid = true;
        
        $(this).find('input[required], textarea[required]').each(function() {
            if ($(this).val().trim() === '') {
                isValid = false;
                $(this).addClass('error');
            } else {
                $(this).removeClass('error');
            }
        });
        
        // Email validation
        var emailField = $(this).find('input[type="email"]');
        if (emailField.length) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailField.val())) {
                isValid = false;
                emailField.addClass('error');
            }
        }
        
        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields correctly.');
        }
    });
    
    // Loading Animation
    $(window).on('load', function() {
        $('.loader').fadeOut();
        $('body').removeClass('loading');
    });
    
    // Back to Top Button
    var backToTop = $('<button class="back-to-top"><i class="fas fa-chevron-up"></i></button>');
    $('body').append(backToTop);
    
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 300) {
            backToTop.addClass('show');
        } else {
            backToTop.removeClass('show');
        }
    });
    
    backToTop.on('click', function() {
        $('html, body').animate({ scrollTop: 0 }, 800);
    });
    
    // Parallax Effect for Hero Section
    $(window).on('scroll', function() {
        var scrolled = $(this).scrollTop();
        var parallax = $('.hero');
        var speed = 0.5;
        
        if (parallax.length) {
            var yPos = -(scrolled * speed);
            parallax.css('transform', 'translateY(' + yPos + 'px)');
        }
    });
    
    // Animate elements on scroll
    function animateOnScroll() {
        $('.service-card, .feature-item, .blog-card').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            
            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                if (!$(this).hasClass('animated')) {
                    $(this).addClass('animated fadeInUp');
                }
            }
        });
    }
    
    $(window).on('scroll', animateOnScroll);
    animateOnScroll(); // Run on page load
    
    // Search functionality
    $('.search-toggle').on('click', function() {
        $('.search-form').toggleClass('active');
        $('.search-form input').focus();
    });
    
    // Close search on escape key
    $(document).on('keyup', function(e) {
        if (e.keyCode === 27) {
            $('.search-form').removeClass('active');
        }
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
