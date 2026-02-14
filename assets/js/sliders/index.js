import Swiper from 'swiper';
import rooms from './rooms.js';

const types = {
    rooms
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
