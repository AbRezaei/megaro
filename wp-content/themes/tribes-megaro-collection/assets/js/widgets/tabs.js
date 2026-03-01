export default () => ({
    activeTab: null,

    init() {
        let tabs = this.$el.querySelectorAll('& > [data-tabs] [data-tab]');

        this.activeTab = tabs[0].dataset.tab;
    },

    tab: {
        ['x-on:click']() {
            this.activeTab = this.$el.dataset.tab;
        },
    },

    panel: {
        ['x-show']() {
            return this.activeTab === this.$el.dataset.panel;
        },
        ['x-transition:enter']: 'transition ease-out duration-300 delay-200',
        ['x-transition:enter-start']: 'opacity-0 translate-y-2',
        ['x-transition:enter-end']: 'opacity-100 translate-y-0',

        ['x-transition:leave']: 'transition ease-in duration-200 absolute top-0 left-0 w-full z-10',
        ['x-transition:leave-start']: 'opacity-100',
        ['x-transition:leave-end']: 'opacity-0',
    }
});