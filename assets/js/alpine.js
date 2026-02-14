import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import pageStore from "./widgets/pageStore.js";
import dropdown from "./widgets/dropdown.js";
import tabs from "./widgets/tabs.js";
import select from "./widgets/select.js";
import datepicker from "./widgets/datepicker.js";

// Alpine init
document.addEventListener('alpine:init', () => {
    // Alpine store
    Alpine.store('page', pageStore);

    // Alpine data
    Alpine.data('dropdown', dropdown);
    Alpine.data('tabs', tabs);
    Alpine.data('select', select);
    Alpine.data('datepicker', datepicker);
});

Alpine.plugin(collapse);

window.Alpine = Alpine;
Alpine.start();
