import {Navigation} from 'swiper/modules';

export default function config(slider) {
    return {
        modules: [Navigation],
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
        navigation: {
            nextEl: slider.querySelector('.slide-next'),
            prevEl: slider.querySelector('.slide-prev'),
        }
    };
}