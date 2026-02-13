document.addEventListener('DOMContentLoaded', () => {
    const backToTop = document.querySelector('a[href="#go-to-top"]')

    if (!backToTop) return

    backToTop.addEventListener('click', (e) => {
        e.preventDefault()
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        })
    })
})