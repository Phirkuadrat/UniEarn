import './bootstrap';
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

document.addEventListener("DOMContentLoaded", () => {
    new Swiper('.category-carousel', {
        // Optional parameters
        slidesPerView: 1, // Default: 1 slide per view for small screens
        spaceBetween: 20, // Jarak antar slide

        // If you need it to be responsive:
        breakpoints: {
            640: { // sm breakpoint
                slidesPerView: 2,
                spaceBetween: 30,
            },
            768: { // md breakpoint
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: { // lg breakpoint
                slidesPerView: 4, // Misalnya, 4 slide di layar besar
                spaceBetween: 30,
            },
        },

        // If you need fixed height, ensure autoHeight is false or remove it
        autoHeight: false, // <-- PENTING: Set ini ke false atau hapus. Swiper tidak akan menyesuaikan tinggi container dengan konten
        // Melainkan, kita yang akan mengatur tinggi slide.

        // Pagination (dots)
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        slidesPerGroup: 1, 
    });
});
