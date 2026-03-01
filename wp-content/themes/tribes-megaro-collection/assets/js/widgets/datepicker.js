import flatpickr from "flatpickr";

export default () => ({
    value: null,
    display: null,
    instance: null,
    open: false,

    init() {
        if (!this.$refs.dateInput || !this.$refs.triggerDiv) return;

        this.value = this.$refs.dateInput.value;
        this.display = this.$refs.dateInput.getAttribute('placeholder');

        this.instance = flatpickr(this.$refs.dateInput, {
            dateFormat: "d-m-Y",
            defaultDate: this.value,
            disableMobile: "true",
            onChange: (selectedDates, dateStr, instance) => {
                this.value = dateStr;
                this.display = instance.formatDate(selectedDates[0], "j M Y");
            },
            onOpen: () => {
                this.open = true;
            },
            onClose: () => {
                this.open = false;
            },
            positionElement: this.$refs.triggerDiv,
            clickOpens: false
        });

        if (this.value) {
            const dateObj = this.instance.parseDate(this.value, "d-m-Y");
            this.display = this.instance.formatDate(dateObj, "j M Y");
        }
    },

    trigger: {
        ['@click']() {
            if (this.instance) {
                this.instance.open();
            }
        }
    },
});