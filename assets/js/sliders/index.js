import Swiper from 'swiper';
import imageAccordion from './image-accordion.js';
import card from './card.js';
import text from './text.js';
import reviews from './reviews.js';
import stories from './stories.js';
import gallery from './gallery.js';
import textMedia from './text-media.js';
import membershipList from './membership-list.js';


const types = {
    imageAccordion,
    card,
    text,
    reviews,
    stories,
    gallery,
    textMedia,
    membershipList,
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
