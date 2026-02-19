import Swiper from 'swiper';
import sample from './sample.js';


const types = {
    sample
};

// Loading sliders
document.addEventListener("DOMContentLoaded", function () {
    const sliders = document.querySelectorAll('[data-slider]');
    if (!sliders.length) return;

    sliders.forEach((slider) => {
        const type = slider.dataset.slider;
        const swiperEl = slider.querySelector('.swiper')

        if (!swiperEl) return;

        const getConfig = types[type];

        if (!getConfig) {
            console.warn(`Swiper config "${type}" not found`);
            return;
        }

        new Swiper(swiperEl, getConfig(slider));

    });
})
