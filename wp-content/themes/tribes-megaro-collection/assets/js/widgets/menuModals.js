import {bodyOverflowHidden, bodyOverflowVisible} from "../dom-utils.js";

export default () => ({
    activeModal: null,

    init() {
        document.querySelectorAll('a[href^=\'#modal-\']').forEach(item => {
            item.addEventListener('click', (event) => {
                if (event.target) {
                    event.preventDefault();

                    this.activeModal = event.target.getAttribute('href');
                }
            });
        });
    },

    close: {
        ['x-on:click']() {
            bodyOverflowVisible();

            this.activeModal = null;
        },
    },

    dialogue: {
        ['x-show']() {
            let show = this.activeModal === this.$el.dataset.modalId;

            if (show)
                bodyOverflowHidden();

            return show;
        },
        ['x-on:click.outside']() {
            this.open = false;
        },
        ['x-transition']() {
        },
    },
});