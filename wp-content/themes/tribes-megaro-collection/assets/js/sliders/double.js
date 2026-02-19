import {Autoplay, Navigation, Pagination} from 'swiper/modules';

export default function config(slider) {
    return {
        modules: [Navigation, Autoplay, Pagination],
        slidesPerView: 1,
        spaceBetween: 8,
        loop: true,
        speed: 500,
        autoplay: {
            delay: 5000,
            pauseOnMouseEnter: true,
        },
        pagination: {
            el: slider.querySelector('[data-swiper-pagination]'),
            clickable: true,
            clickableClass: 'cursor-pointer',
            bulletClass: 'swiper-pagination-bullet-class',
            bulletActiveClass: 'swiper-pagination-bullet-active-class'
        },
        navigation: {
            prevEl: slider.querySelector('[data-swiper-button-previous]'),
            nextEl: slider.querySelector('[data-swiper-button-next]'),
            disabledClass: 'opacity-0 pointer-events-none'
        },
        breakpoints: {
            640: {
                slidesPerView: 1.5
            },
            768: {
                slidesPerView: 1.75
            },
            1024: {
                slidesPerView: 2
            },
            2000: {
                slidesPerView: 3
            }
        },
    };
}