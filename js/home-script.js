/* ======================================================
   CEYLONBITES HOME - MODERN 2026 JS
   ====================================================== */
(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', init);

    function init() {
        typingEffect();
        counterAnimation();
        scrollReveal();
        scrollToTop();
        cartAnimation();
        duplicateReviews();
        pauseOnHover();
        parallaxBanner();
        touchScrollHint();
    }

    /* ===== TYPING EFFECT ===== */
    function typingEffect() {
        var el = document.getElementById('heroTyped');
        if (!el) return;
        var words = ['Authentic', 'Delicious', 'Spicy', 'Traditional', 'Homemade'];
        var wordIndex = 0;
        var charIndex = 0;
        var isDeleting = false;
        var typeSpeed = 100;

        function type() {
            var current = words[wordIndex];
            if (isDeleting) {
                el.textContent = current.substring(0, charIndex - 1);
                charIndex--;
                typeSpeed = 50;
            } else {
                el.textContent = current.substring(0, charIndex + 1);
                charIndex++;
                typeSpeed = 120;
            }

            if (!isDeleting && charIndex === current.length) {
                typeSpeed = 2000;
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                wordIndex = (wordIndex + 1) % words.length;
                typeSpeed = 400;
            }
            setTimeout(type, typeSpeed);
        }
        setTimeout(type, 800);
    }

    /* ===== COUNTER ANIMATION (IntersectionObserver) ===== */
    function counterAnimation() {
        var statNums = document.querySelectorAll('.zz-hero__stat-num[data-target]');
        if (!statNums.length) return;

        if (!('IntersectionObserver' in window)) {
            statNums.forEach(function(el) {
                el.textContent = el.getAttribute('data-target');
            });
            return;
        }

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    animateNum(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        statNums.forEach(function(el) { observer.observe(el); });

        function animateNum(el) {
            var target = parseFloat(el.getAttribute('data-target'));
            var isDecimal = el.hasAttribute('data-decimal');
            var duration = 1800;
            var start = performance.now();

            function tick(now) {
                var elapsed = now - start;
                var progress = Math.min(elapsed / duration, 1);
                var eased = 1 - Math.pow(1 - progress, 3);
                var val = target * eased;

                if (isDecimal) {
                    el.textContent = val.toFixed(1);
                } else {
                    el.textContent = Math.floor(val);
                }

                if (progress < 1) {
                    requestAnimationFrame(tick);
                } else {
                    el.textContent = isDecimal ? target.toFixed(1) : Math.floor(target);
                }
            }
            requestAnimationFrame(tick);
        }
    }

    /* ===== SCROLL REVEAL ===== */
    function scrollReveal() {
        var selectors = [
            '.zz-section-top',
            '.zz-cats__card',
            '.zz-pcard',
            '.zz-why__card',
            '.zz-banner__content',
            '.zz-reviews__card',
            '.zz-cta__inner'
        ];

        var elements = document.querySelectorAll(selectors.join(','));
        elements.forEach(function(el, i) {
            el.classList.add('zz-reveal');
        });

        if (!('IntersectionObserver' in window)) {
            elements.forEach(function(el) { el.classList.add('zz-reveal--visible'); });
            return;
        }

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('zz-reveal--visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

        elements.forEach(function(el) { observer.observe(el); });

        /* Stagger grid items */
        stagger('.zz-cats__card');
        stagger('.zz-pcard');
        stagger('.zz-why__card');

        function stagger(selector) {
            document.querySelectorAll(selector).forEach(function(el, i) {
                el.style.transitionDelay = (i * 0.1) + 's';
            });
        }
    }

    /* ===== SCROLL TO TOP ===== */
    function scrollToTop() {
        var btn = document.createElement('button');
        btn.className = 'zz-scroll-top';
        btn.innerHTML = '<i class="fa fa-chevron-up"></i>';
        btn.setAttribute('aria-label', 'Scroll to top');
        document.body.appendChild(btn);

        var ticking = false;
        window.addEventListener('scroll', function() {
            if (!ticking) {
                requestAnimationFrame(function() {
                    if (window.scrollY > 500) {
                        btn.classList.add('visible');
                    } else {
                        btn.classList.remove('visible');
                    }
                    ticking = false;
                });
                ticking = true;
            }
        });

        btn.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    /* ===== CART BUTTON ANIMATION ===== */
    function cartAnimation() {
        document.querySelectorAll('.zz-pcard__cart').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var icon = btn.querySelector('i');
                if (!icon) return;
                icon.className = 'fa fa-check';
                btn.style.background = '#22c55e';
                btn.style.color = '#fff';
                setTimeout(function() {
                    icon.className = 'fa fa-cart-plus';
                    btn.style.background = '';
                    btn.style.color = '';
                }, 1200);
            });
        });
    }

    /* ===== DUPLICATE REVIEWS FOR INFINITE MARQUEE ===== */
    function duplicateReviews() {
        var scroll = document.getElementById('reviewScroll');
        if (!scroll) return;
        var html = scroll.innerHTML;
        scroll.innerHTML = html + html;
    }

    /* ===== PAUSE MARQUEE ON HOVER/TOUCH ===== */
    function pauseOnHover() {
        var scroll = document.getElementById('reviewScroll');
        if (!scroll) return;

        scroll.addEventListener('mouseenter', function() {
            scroll.style.animationPlayState = 'paused';
        });
        scroll.addEventListener('mouseleave', function() {
            scroll.style.animationPlayState = 'running';
        });
        scroll.addEventListener('touchstart', function() {
            scroll.style.animationPlayState = 'paused';
        }, { passive: true });
        scroll.addEventListener('touchend', function() {
            setTimeout(function() {
                scroll.style.animationPlayState = 'running';
            }, 3000);
        });
    }

    /* ===== PARALLAX BANNER ===== */
    function parallaxBanner() {
        var bannerBg = document.querySelector('.zz-banner__bg img');
        if (!bannerBg) return;
        var banner = document.querySelector('.zz-banner');
        var ticking = false;

        window.addEventListener('scroll', function() {
            if (!ticking) {
                requestAnimationFrame(function() {
                    var rect = banner.getBoundingClientRect();
                    var winH = window.innerHeight;
                    if (rect.top < winH && rect.bottom > 0) {
                        var progress = (winH - rect.top) / (winH + rect.height);
                        var offset = (progress - 0.5) * 60;
                        bannerBg.style.transform = 'translateY(' + offset + 'px) scale(1.05)';
                    }
                    ticking = false;
                });
                ticking = true;
            }
        });
    }

    /* ===== TOUCH SCROLL HINT FOR CATEGORIES ===== */
    function touchScrollHint() {
        var track = document.getElementById('catTrack');
        if (!track) return;

        if ('ontouchstart' in window || navigator.maxTouchPoints > 0) {
            track.scrollLeft = 0;
            setTimeout(function() {
                track.scrollTo({ left: 60, behavior: 'smooth' });
                setTimeout(function() {
                    track.scrollTo({ left: 0, behavior: 'smooth' });
                }, 600);
            }, 1500);
        }
    }

})();
