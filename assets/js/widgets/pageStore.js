export default function () {
    return {
        mobileMode: false,

        init() {
            this.updatePage();

            window.addEventListener('resize', () => {
                this.updatePage();
            })
        },

        updatePage() {
            this.mobileMode = window.innerWidth < 768;
            const els = document.querySelectorAll('[x-collapse-on-mobile]')
            if (this.mobileMode) {
                els.forEach(el => {
                    el.setAttribute('hidden', true)
                })
            } else {
                els.forEach(el => {
                    el.removeAttribute('hidden')
                })
            }

        }
    }
}