import {Pagination, Autoplay} from 'swiper/modules';

export default function config(slider) {
    return {
        modules: [Pagination, Autoplay],
        pagination: {
            el: slider.querySelector('.slider-pagination'),
            clickable: true
        },
        breakpoints: {
            768: {
                slidesPerView: 2
            },
            1280: {
                slidesPerView: 3
            }
        },
        autoplay: {
            delay: 4000,
            pauseOnMouseEnter: true,
        },
    };
}