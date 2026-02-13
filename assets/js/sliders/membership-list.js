import {Pagination, Navigation} from 'swiper/modules';

export default function config(slider) {
    return {
        modules: [Pagination],
        slidesPerView: 'auto',
        spaceBetween: 20,
        pagination: {
            el: slider.querySelector('.slider-pagination'),
            clickable: true
        },

        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            1280: {
                slidesPerView: 4,
                spaceBetween: 20
            }
        }
    };
}
