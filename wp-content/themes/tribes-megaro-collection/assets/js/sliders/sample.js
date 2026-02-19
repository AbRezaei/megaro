import {Navigation, Pagination} from 'swiper/modules';

export default function config(slider) {
    return {
        modules: [Navigation, Pagination],
        slidesPerView: 1.75,
        spaceBetween: 5,
        breakpoints: {
            768: {
                slidesPerView: 3,
                spaceBetween: 25,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 25,
            }
        },
        pagination: {
            el: slider.querySelector('.slider-pagination'),
            clickable: true
        },
        navigation: {
            nextEl: slider.querySelector('.slide-next'),
            prevEl: slider.querySelector('.slide-prev'),
        }
    };
}