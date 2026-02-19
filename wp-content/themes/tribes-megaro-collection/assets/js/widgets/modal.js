import {bodyOverflowHidden, bodyOverflowVisible} from "../dom-utils.js";

export default () => ({
    open: false,

    trigger: {
        ['x-on:click']() {
            this.open = !this.open;

            if (this.open)
                bodyOverflowHidden();
            else
                bodyOverflowVisible();
        },
    },

    dialogue: {
        ['x-show']() {
            return this.open;
        },
        ['x-on:click.outside']() {
            this.open = false;
        },
        ['x-transition']() {
        },
    },
});