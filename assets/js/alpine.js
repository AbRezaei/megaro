import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import page from "./widgets/pageStore.js"
import checkAvailability from "./widgets/checkAvailability.js"


Alpine.plugin(collapse)
window.Alpine = Alpine


Alpine.store('page', page());
Alpine.data('checkAvailability', checkAvailability);


Alpine.start()
