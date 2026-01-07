const testimonialsWrapper = document.querySelector('.testimonials-wrapper');

let currentIndex = 0;
const totalTestimonials = document.querySelectorAll('.testimonial').length;
const intervalTime = 15000; // Set interval time to 15 seconds
let autoScroll;




document.querySelector('user-btn').onclick = () =>{
    profile.classList.toggle('active');
    navbar.classList.remove('active');
 }
function startAutoScroll() {
    autoScroll = setInterval(() => {
        currentIndex++;
        if (currentIndex >= totalTestimonials - getTestimonialsToShow() + 1) {
            currentIndex = 0;
        }
        updateTestimonials();
    }, intervalTime);
}

function updateTestimonials() {
    const transformValue = -currentIndex * (100 / getTestimonialsToShow());
    testimonialsWrapper.style.transform = `translateX(${transformValue}%)`;
}

function getTestimonialsToShow() {
    if (window.innerWidth >= 1200) {
        return 4;
    } else if (window.innerWidth >= 900) {
        return 3;
    } else if (window.innerWidth >= 600) {
        return 2;
    } else {
        return 1;
    }
}

window.addEventListener('resize', updateTestimonials);

document.addEventListener('DOMContentLoaded', () => {
    startAutoScroll();
});


document.querySelectorAll('input[type="number"]').forEach(numberInput => {
    numberInput.oninput = () =>{
       if(numberInput.value.length > numberInput.maxLength) numberInput.value = numberInput.value.slice(0, numberInput.maxLength);
    };
 });
