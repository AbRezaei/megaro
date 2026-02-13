import {Pagination} from 'swiper/modules';

export default function config(slider) {
    return {
        modules: [Pagination],
        slidesPerView: 1,
        spaceBetween: 10,

       /* pagination: {
            el: slider.querySelector('.slider-pagination'),
            clickable: true
        }*/
    };
}

document.addEventListener("click", (e) => {
    const btn = e.target.closest("[data-slide]");
    if (!btn) return;

    const index = btn.dataset.slide;

    const swiperEl = btn
        .closest("[data-slider]")
        .querySelector(".swiper");

    if (!swiperEl?.swiper) return;

    swiperEl.swiper.slideTo(index, 1000);
});
