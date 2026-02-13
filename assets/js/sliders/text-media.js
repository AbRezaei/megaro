import {Navigation, Pagination} from 'swiper/modules';

export default function config(slider) {
    return {
        modules: [Pagination],
        slidesPerView: 1,
        spaceBetween: 30,
        autoHeight: true,
        pagination: {
            el: slider.querySelector('.slider-pagination'),
            clickable: true
        },
    };
}