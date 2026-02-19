import {Autoplay, Navigation} from 'swiper/modules';

export default function config(slider) {
    return {
        modules: [Navigation, Autoplay],
        slidesPerView: 1,
        spaceBetween: 8,
        loop: true,
        speed: 500,
        autoplay: {
            delay: 5000,
            pauseOnMouseEnter: true,
        },
        navigation: {
            prevEl: slider.querySelector('[data-swiper-button-previous]'),
            nextEl: slider.querySelector('[data-swiper-button-next]'),
            disabledClass: 'opacity-0 pointer-events-none'
        },
        on: {
            init: () => updateOffset(slider),
            resize: () => updateOffset(slider),
        },
        breakpoints: {
            640: {
                slidesPerView: 1.5
            },
            768: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 2.5
            },
            1280: {
                slidesPerView: 3
            },
        },
    };
}

function updateOffset(slider) {
    slider.swiper.wrapperEl.style.paddingLeft = `${slider.dataset.sliderOffset}px`;
    slider.swiper.update();
}