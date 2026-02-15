import Swiper from 'swiper';
import rooms from './rooms.js';
import triple from './triple.js';

const types = {
    rooms,
    triple
};

// Loading sliders
document.addEventListener("DOMContentLoaded", function () {
    const sliders = document.querySelectorAll('[data-slider]');

    if (!sliders.length) return;

    sliders.forEach((slider) => {
        const type     = slider.dataset.slider;

        const getConfig = types[type];

        if (!getConfig) {
            console.warn(`Swiper config "${type}" not found`);
            return;
        }

        new Swiper(slider, getConfig(slider));
    });
})
