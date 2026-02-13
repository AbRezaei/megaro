import {Navigation,Pagination} from 'swiper/modules';

export default function config(slider) {
    return {
        modules: [Navigation, Pagination],
        slidesPerView: 1,
        autoHeight: true,
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