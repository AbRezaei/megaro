<?php

class BlogList extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'blog-list';
    }

    public function get_title(): string
    {
        return 'Blog List';
    }

    public function get_icon(): string
    {
        return 'eicon-posts-grid';
    }

    public function get_categories(): array
    {
        return ['megaro'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'megaro'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'posts_count',
            [
                'label' => __('Posts Per Page', 'megaro'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1,
            ]
        );

        $this->add_bg_color_control();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $posts_per_page = $settings['posts_count'] ?? 10;
        $bg_color = $settings['bg_color'];

        $categories = get_categories(['hide_empty' => true]);
        ?>

        <section class="blog-list <?= esc_attr($bg_color); ?> lg:py-24 py-16"
                 data-posts-per-page="<?= esc_attr($posts_per_page); ?>">

            <div class="container">

                <!-- Category Filter -->
                <ul class="blog-filter flex flex-wrap justify-center gap-2 lg:mb-16 mb-12">

                    <li>
                        <button
                                data-cat="all"
                                class="filter-btn border px-4 py-2 rounded-full bg-black text-white">
                            All
                        </button>
                    </li>

                    <?php foreach ($categories as $category): ?>
                        <li>
                            <button
                                    data-cat="<?= esc_attr($category->slug); ?>"
                                    class="filter-btn border px-4 py-2 rounded-full">
                                <?= esc_html($category->name); ?>
                            </button>
                        </li>
                    <?php endforeach; ?>

                </ul>

                <!-- Posts -->
                <ul class="blog-posts grid grid-cols-1 md:grid-cols-2 gap-6 lg:mb-16 mb-12"></ul>
                <p class="blog-counter text-body-lg text-[#404040] text-center mb-6"></p>

                <!-- Load More -->
                <div class="text-center mt-10">
                    <button class="load-more btn btn-black-outline btn-lg">
                        Load More
                    </button>
                </div>

            </div>
        </section>

        <script>
            jQuery(document).ready(function ($) {

                function initBlogList(wrapper) {

                    const postsContainer = wrapper.find('.blog-posts');
                    const loadMoreBtn    = wrapper.find('.load-more');
                    const counter        = wrapper.find('.blog-counter');

                    const postsPerPage = parseInt(wrapper.data('posts-per-page'));

                    function getQueryParam(param) {
                        const urlParams = new URLSearchParams(window.location.search);
                        return urlParams.get(param);
                    }

                    let page     = parseInt(getQueryParam('page')) || 1;
                    let category = getQueryParam('blog_cat') || 'all';

                    let totalPosts = 0;
                    let maxPages   = 0;

                    // -----------------------------
                    // Validate category against existing buttons
                    // -----------------------------
                    if (!wrapper.find(`.filter-btn[data-cat="${category}"]`).length) {
                        category = 'all';
                        page     = 1;
                    }

                    // -----------------------------
                    // Update URL (فقط برای اولین ویجت)
                    // -----------------------------
                    function updateURL() {

                        if (!wrapper.is(':first-of-type')) return;

                        const params = new URLSearchParams();

                        if (category !== 'all') {
                            params.set('blog_cat', category);
                        }

                        if (page > 1) {
                            params.set('page', page);
                        }

                        const newUrl = window.location.pathname +
                            (params.toString() ? '?' + params.toString() : '');

                        window.history.pushState(
                            {blog_cat: category, page: page},
                            '',
                            newUrl
                        );
                    }

                    function setActiveButton() {

                        wrapper.find('.filter-btn')
                            .removeClass('bg-black text-white');

                        wrapper.find(`.filter-btn[data-cat="${category}"]`)
                            .addClass('bg-black text-white');
                    }

                    function loadPosts(reset = false) {

                        $.ajax({
                            url: '<?= admin_url('admin-ajax.php') ?>',
                            type: 'POST',
                            data: {
                                action: 'load_blog_posts',
                                page: page,
                                category: category,
                                posts_per_page: postsPerPage,
                                nonce: '<?= wp_create_nonce('blog_nonce') ?>',
                            },
                            beforeSend: function () {
                                loadMoreBtn.text('Loading...');
                            },
                            success: function (response) {

                                if (!response.success) return;

                                if (reset) {
                                    postsContainer.html(response.data.html);
                                } else {
                                    postsContainer.append(response.data.html);
                                }

                                totalPosts = response.data.found_posts;
                                maxPages   = response.data.max_pages;

                                const viewed = Math.min(page * postsPerPage, totalPosts);

                                counter.text(`Viewed ${viewed} of ${totalPosts} articles`);

                                if (page >= maxPages) {
                                    loadMoreBtn.hide();
                                } else {
                                    loadMoreBtn.show().text('Load More');
                                }

                                updateURL();
                                setActiveButton();
                            }
                        });
                    }

                    // Initial Load
                    setActiveButton();
                    loadPosts(true);

                    // Filter Click
                    wrapper.on('click', '.filter-btn', function () {

                        category = $(this).data('cat');
                        page     = 1;

                        loadMoreBtn.show();
                        loadPosts(true);

                        $('html, body').animate({
                            scrollTop: wrapper.offset().top - 100
                        }, 400);
                    });

                    // Load More
                    loadMoreBtn.on('click', function () {
                        page++;
                        loadPosts();
                    });

                    // Back / Forward (فقط ویجت اول واکنش بده)
                    if (wrapper.is(':first-of-type')) {

                        window.addEventListener('popstate', function (event) {

                            if (event.state) {
                                category = event.state.blog_cat || 'all';
                                page     = event.state.page || 1;
                            } else {
                                category = 'all';
                                page     = 1;
                            }

                            if (!wrapper.find(`.filter-btn[data-cat="${category}"]`).length) {
                                category = 'all';
                                page     = 1;
                            }

                            setActiveButton();
                            loadPosts(true);
                        });
                    }
                }

                // Init each widget separately
                $('.blog-list').each(function () {
                    initBlogList($(this));
                });

            });
        </script>

        <?php
    }
}