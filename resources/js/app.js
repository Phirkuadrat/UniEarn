import './bootstrap';
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

document.addEventListener("DOMContentLoaded", () => {
    new Swiper('.category-carousel', {
        slidesPerView: 1, 
        spaceBetween: 20,

        breakpoints: {
            640: { 
                slidesPerView: 2,
                spaceBetween: 30,
            },
            768: { 
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: { 
                slidesPerView: 4,
                spaceBetween: 30,
            },
        },

        autoHeight: false,

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        slidesPerGroup: 1, 
    });
});
