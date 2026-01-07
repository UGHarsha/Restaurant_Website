const testimonialsWrapper = document.querySelector('.testimonials-wrapper');

const intervalTime = 15000; // 15 seconds between scrolls
let currentIndex = 0;
let autoScroll;

if (testimonialsWrapper) {
    const testimonials = testimonialsWrapper.querySelectorAll('.testimonial');
    const totalTestimonials = testimonials.length;

    const getTestimonialsToShow = () => {
        if (window.innerWidth >= 1200) return 4;
        if (window.innerWidth >= 900) return 3;
        if (window.innerWidth >= 600) return 2;
        return 1;
    };

    const updateTestimonials = () => {
        const visible = getTestimonialsToShow();
        const maxIndex = Math.max(totalTestimonials - visible, 0);
        if (currentIndex > maxIndex) currentIndex = 0;
        const transformValue = -currentIndex * (100 / visible);
        testimonialsWrapper.style.transform = `translateX(${transformValue}%)`;
    };

    const startAutoScroll = () => {
        clearInterval(autoScroll);
        if (totalTestimonials <= getTestimonialsToShow()) return;
        autoScroll = setInterval(() => {
            currentIndex = (currentIndex + 1) % (totalTestimonials - getTestimonialsToShow() + 1);
            updateTestimonials();
        }, intervalTime);
    };

    window.addEventListener('resize', () => {
        updateTestimonials();
        startAutoScroll();
    });

    document.addEventListener('DOMContentLoaded', () => {
        updateTestimonials();
        startAutoScroll();
    });
}

document.querySelectorAll('input[type="number"]').forEach(numberInput => {
    numberInput.addEventListener('input', () => {
        if (numberInput.value.length > numberInput.maxLength) {
            numberInput.value = numberInput.value.slice(0, numberInput.maxLength);
        }
    });
});
