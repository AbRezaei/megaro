export default () => ({
    open: false,
    display: null,
    options: [],

    init() {
        const selectEl = this.$refs.selectInput;

        this.options = Array.from(selectEl.options).map(opt => ({
            value: opt.value,
            label: opt.text,
            disabled: opt.disabled
        }));

        if (selectEl.value) {
            const selectedOption = this.options.find(o => o.value == selectEl.value);
            if (selectedOption) {
                this.display = selectedOption.label;
            }
        } else {
            this.display = this.options[0]?.label;
        }
    },

    trigger: {
        ['x-on:click']() {
            this.open = !this.open;
        },
        ['x-on:click.outside']() {
            this.open = false;
        }
    },

    dialogue: {
        ['x-show']() {
            return this.open;
        },
        ['x-transition']() {
        },
    },

    option(item) {
        return {
            ['x-on:click']() {
                this.display = item.label;

                this.$refs.selectInput.value = item.value;

                this.$refs.selectInput.dispatchEvent(new Event('change'));

                this.open = false;
            },
        };
    }
});