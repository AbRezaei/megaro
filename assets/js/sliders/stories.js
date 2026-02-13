import {Pagination} from 'swiper/modules';

export default function config(slider) {
    return {
        modules: [Pagination],
        spaceBetween: 25,
        slidesPerView: 1,
        pagination: {
            el: slider.querySelector('.slider-pagination'),
            clickable: true
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 25
            },
            1280: {
                slidesPerView: 3,
                spaceBetween: 35
            }
        }
    };
}