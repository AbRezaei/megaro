import {Pagination, Navigation, Autoplay} from 'swiper/modules';

export default function config(slider) {
    return {
        modules: [Pagination, Navigation, Autoplay],
        slidesPerView: 'auto',
        centeredSlidesBounds: true,
        centeredSlides: true,
        initialSlide: 0,
        centerInsufficientSlides: true,
        watchOverflow: true,
        loop: true,
        autoplay: {
            delay: 3000,
            pauseOnMouseEnter: true,
        },
        pagination: {
            el: slider.querySelector('.slider-pagination'),
            clickable: true
        },
        navigation: {
            nextEl: slider.querySelector('.slide-next'),
            prevEl: slider.querySelector('.slide-prev'),
        },
        breakpoints: {
            768: {
                initialSlide: 2
            }
        },
    };
}