/**
 * Sri Lankan Home Page JavaScript
 * Handles animations, interactions, and dynamic content loading
 */

document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for anchor links
    initSmoothScroll();
    
    // Animate elements on scroll
    initScrollAnimations();
    
    // Initialize category cards hover effects
    initCategoryCards();
    
    // Add to cart functionality
    initAddToCart();
});

/**
 * Smooth scrolling for navigation links
 */
function initSmoothScroll() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && document.querySelector(href)) {
                e.preventDefault();
                const target = document.querySelector(href);
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

/**
 * Animate elements when they come into view
 */
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe category cards
    const categoryCards = document.querySelectorAll('.category-card');
    categoryCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `all 0.6s ease ${index * 0.1}s`;
        observer.observe(card);
    });

    // Observe product cards
    const productCards = document.querySelectorAll('.product-card');
    productCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `all 0.6s ease ${index * 0.1}s`;
        observer.observe(card);
    });

    // Observe feature cards
    const featureCards = document.querySelectorAll('.feature-card');
    featureCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `all 0.6s ease ${index * 0.1}s`;
        observer.observe(card);
    });
}

/**
 * Category cards interactive effects
 */
function initCategoryCards() {
    const categoryCards = document.querySelectorAll('.category-card');
    
    categoryCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.zIndex = '10';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.zIndex = '1';
        });
    });
}

/**
 * Add to cart functionality with visual feedback
 */
function initAddToCart() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            // Visual feedback
            const originalText = this.textContent;
            this.textContent = 'Added! ✓';
            this.style.background = '#006B3F';
            this.style.color = 'white';
            
            // Reset after 2 seconds
            setTimeout(() => {
                this.textContent = originalText;
                this.style.background = '';
                this.style.color = '';
            }, 2000);
            
            // Animate cart icon in header (if exists)
            animateCartIcon();
        });
    });
}

/**
 * Animate cart icon when item is added
 */
function animateCartIcon() {
    const cartIcon = document.querySelector('.fa-shopping-cart');
    if (cartIcon) {
        cartIcon.style.animation = 'none';
        setTimeout(() => {
            cartIcon.style.animation = 'cartBounce 0.5s ease';
        }, 10);
    }
}

/**
 * Hero section parallax effect
 */
window.addEventListener('scroll', function() {
    const hero = document.querySelector('.hero-section');
    if (hero) {
        const scrolled = window.pageYOffset;
        hero.style.transform = `translateY(${scrolled * 0.5}px)`;
        hero.style.opacity = 1 - (scrolled / 500);
    }
});

/**
 * Add bounce animation to elements
 */
const style = document.createElement('style');
style.textContent = `
    @keyframes cartBounce {
        0%, 100% { transform: scale(1); }
        25% { transform: scale(1.3) rotate(10deg); }
        50% { transform: scale(1.1) rotate(-10deg); }
        75% { transform: scale(1.2) rotate(5deg); }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style);

/**
 * Show/Hide scroll to top button
 */
window.addEventListener('scroll', function() {
    const scrollTop = document.querySelector('.scroll-to-top');
    if (scrollTop) {
        if (window.pageYOffset > 300) {
            scrollTop.style.display = 'flex';
        } else {
            scrollTop.style.display = 'none';
        }
    }
});

/**
 * Create and add scroll to top button
 */
function createScrollToTopButton() {
    const button = document.createElement('button');
    button.className = 'scroll-to-top';
    button.innerHTML = '<i class="fa fa-arrow-up"></i>';
    button.style.cssText = `
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #FF6B35, #C41E3A);
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        display: none;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        transition: all 0.3s ease;
        z-index: 1000;
    `;
    
    button.addEventListener('mouseenter', function() {
        this.style.transform = 'scale(1.1) translateY(-5px)';
    });
    
    button.addEventListener('mouseleave', function() {
        this.style.transform = 'scale(1) translateY(0)';
    });
    
    button.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    document.body.appendChild(button);
}

// Create scroll to top button
createScrollToTopButton();

/**
 * Format price with Sri Lankan Rupee symbol
 */
function formatPrice(price) {
    return `Rs. ${parseFloat(price).toLocaleString('en-LK', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    })}`;
}

/**
 * Image lazy loading fallback
 */
document.querySelectorAll('img').forEach(img => {
    img.addEventListener('error', function() {
        // Fallback to placeholder if image fails to load
        this.src = 'images/placeholder.jpg';
    });
});

/**
 * Add loading skeleton for better UX
 */
function showLoadingSkeleton(container) {
    container.innerHTML = `
        <div class="loading">Loading delicious items</div>
    `;
}

/**
 * Console greeting
 */
console.log('%c🍛 Welcome to ZestyZoomer! 🍛', 'color: #FF6B35; font-size: 20px; font-weight: bold;');
console.log('%cEnjoy authentic Sri Lankan flavors delivered to your door!', 'color: #006B3F; font-size: 14px;');
