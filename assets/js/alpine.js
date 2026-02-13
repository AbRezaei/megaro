import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import pageStore from "./widgets/pageStore.js";
import dropdown from "./widgets/dropdown.js";

// Alpine init
document.addEventListener('alpine:init', () => {
    // Alpine store
    Alpine.store('page', pageStore);

    // Alpine data
    Alpine.data('dropdown', dropdown);
});

Alpine.plugin(collapse);

window.Alpine = Alpine;
Alpine.start();
