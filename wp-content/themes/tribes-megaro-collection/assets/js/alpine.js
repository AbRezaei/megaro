import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import page from "./widgets/pageStore.js"
// import sample from "./widgets/sample.js"

Alpine.plugin(collapse)
window.Alpine = Alpine


Alpine.store('page', page());
//Alpine.data('sample', sample);


Alpine.start()
