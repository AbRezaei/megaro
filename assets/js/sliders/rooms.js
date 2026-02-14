import {Navigation, Pagination} from 'swiper/modules';

export default function config(slider) {
    return {
        modules: [Navigation, Pagination],
        slidesPerView: 1,
        spaceBetween: 0,
        pagination: {
            el: slider.querySelector('[data-swiper-pagination]'),
            type: "custom",
            renderCustom: function (swiper, current, total) {
                return `<div class="flex items-center gap-2">
                            <p class="text-body-md">${current}</p>
                            <p class="w-4 h-[1px] bg-[#737373]"></p>
                            <p class="text-body-md text-[#737373]">${total}</p>
                        </div>`;
            },
        },
        navigation: {
            prevEl: slider.querySelector('[data-swiper-button-previous]'),
            nextEl: slider.querySelector('[data-swiper-button-next]'),
            disabledClass: 'opacity-0 pointer-events-none'
        },
    };
}