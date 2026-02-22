export default () => ({
    page: 1,
    category: 'all',
    postsPerPage: 1,

    totalPosts: 0,
    maxPages: 1,

    loading: false,

    get counterText() {
        const viewed = Math.min(this.page * this.postsPerPage, this.totalPosts);

        return this.totalPosts ? `Viewed ${viewed} of ${this.totalPosts} articles` : '';
    },

    init() {
        this.postsPerPage = parseInt(this.$el.dataset.postsPerPage);

        const params = new URLSearchParams(window.location.search);

        this.page     = parseInt(params.get('page')) || 1;
        this.category = params.get('blog_cat') || 'all';

        if (!this.categoryExists(this.category)) {
            this.category = 'all';
            this.page     = 1;
        }

        this.loadPosts(true);

        if (this.isFirstInstance()) {
            window.addEventListener('popstate', (event) => {
                if (event.state) {
                    this.category = event.state.blog_cat || 'all';
                    this.page     = event.state.page || 1;
                } else {
                    this.category = 'all';
                    this.page     = 1;
                }

                if (!this.categoryExists(this.category)) {
                    this.category = 'all';
                    this.page     = 1;
                }

                this.loadPosts(true);
            });
        }
    },

    isFirstInstance() {
        return this.$el === document.querySelector('[data-blog-list]');
    },

    categoryExists(cat) {
        return !!this.$el.querySelector(`[data-cat="${cat}"]`);
    },

    updateURL() {
        if (!this.isFirstInstance()) return;

        const params = new URLSearchParams();

        if (this.category !== 'all') {
            params.set('blog_cat', this.category);
        }

        if (this.page > 1) {
            params.set('page', this.page);
        }

        const newUrl = window.location.pathname +
            (params.toString() ? '?' + params.toString() : '');

        window.history.pushState(
            {blog_cat: this.category, page: this.page},
            '',
            newUrl
        );
    },

    async loadPosts(reset = false) {
        this.loading = true;

        const formData = new FormData();
        formData.append('action', 'fetch_blog_posts');
        formData.append('page', this.page);
        formData.append('category', this.category);
        formData.append('posts_per_page', this.postsPerPage);
        formData.append('nonce', this.$root.dataset.nonce);

        const response = await fetch(this.$root.dataset.ajaxUrl, {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (!result.success) return;

        if (reset) {
            this.$refs.postsContainer.innerHTML = result.data.html;
        } else {
            this.$refs.postsContainer.insertAdjacentHTML(
                'beforeend',
                result.data.html
            );
        }

        this.totalPosts = result.data.found_posts;
        this.maxPages   = result.data.max_pages;

        this.updateURL();

        this.loading = false;
    },

    loadMore() {
        this.page++;
        this.loadPosts();
    },

    filterButton(cat) {
        return {
            ['x-on:click']: () => {
                this.category = cat;
                this.page     = 1;
                this.loadPosts(true);

                window.scrollTo({
                    top: this.$el.offsetTop - 100,
                    behavior: 'smooth'
                });
            },
            [':class']() {
                return this.category === cat ? 'bg-black text-white' : '';
            }
        };
    }
});