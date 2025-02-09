import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Image slider functionality
document.addEventListener('alpine:init', () => {
    Alpine.data('imageSlider', () => ({
        activeSlide: 0,
        totalSlides: 3,
        autoSlideInterval: null,

        init() {
            this.startAutoSlide();
        },

        nextSlide() {
            this.activeSlide = (this.activeSlide + 1) % this.totalSlides;
            this.restartAutoSlide();
        },

        previousSlide() {
            this.activeSlide = (this.activeSlide - 1 + this.totalSlides) % this.totalSlides;
            this.restartAutoSlide();
        },

        startAutoSlide() {
            this.autoSlideInterval = setInterval(() => {
                this.nextSlide();
            }, 5000); // Change slide every 5 seconds
        },

        restartAutoSlide() {
            clearInterval(this.autoSlideInterval);
            this.startAutoSlide();
        }
    }));
});

// Obituary slider functionality
document.addEventListener('alpine:init', () => {
    Alpine.data('obituarySlider', () => ({
        currentPage: 0,
        itemsPerPage: 6,
        obituaries: [
            // First page
            { name: 'John Doe', years: '1945 - 2023', image: '/images/person1.jpg' },
            { name: 'Jane Smith', years: '1938 - 2023', image: '/images/person2.jpg' },
            { name: 'Robert Johnson', years: '1950 - 2023', image: '/images/person3.jpg' },
            { name: 'Mary Williams', years: '1942 - 2023', image: '/images/person4.jpg' },
            { name: 'James Brown', years: '1955 - 2023', image: '/images/person1.jpg' },
            { name: 'Sarah Davis', years: '1960 - 2023', image: '/images/person2.jpg' },
            // Second page
            { name: 'Michael Wilson', years: '1940 - 2023', image: '/images/person3.jpg' },
            { name: 'Elizabeth Taylor', years: '1948 - 2023', image: '/images/person4.jpg' },
            { name: 'William Miller', years: '1953 - 2023', image: '/images/person1.jpg' },
            { name: 'Patricia Moore', years: '1957 - 2023', image: '/images/person2.jpg' },
            { name: 'Richard Anderson', years: '1944 - 2023', image: '/images/person3.jpg' },
            { name: 'Linda Martin', years: '1951 - 2023', image: '/images/person4.jpg' },
        ],

        get currentPageObituaries() {
            const start = this.currentPage * this.itemsPerPage;
            return this.obituaries.slice(start, start + this.itemsPerPage);
        },

        nextPage() {
            if ((this.currentPage + 1) * this.itemsPerPage < this.obituaries.length) {
                this.currentPage++;
            }
        },

        previousPage() {
            if (this.currentPage > 0) {
                this.currentPage--;
            }
        }
    }));
});

Alpine.start();
