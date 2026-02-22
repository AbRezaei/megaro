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

        $this->add_bg_color_control();
        $this->add_control(
            'posts_count',
            [
                'label' => __('Posts Per Page', 'megaro'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_color = $settings['bg_color'];
        $posts_per_page = $settings['posts_count'];

        $categories = get_categories(['hide_empty' => true]);
        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16"
                 x-data="blogList()"
                 data-blog-list
                 data-posts-per-page="<?= $posts_per_page ?>"
                 data-ajax-url="<?= admin_url('admin-ajax.php') ?>"
                 data-nonce="<?= wp_create_nonce('blog_nonce') ?>">
            <div class="container">

                <ul class="flex flex-row flex-wrap justify-center items-center gap-2 lg:mb-16 mb-12" data-blog-filters>

                    <li>
                        <button data-cat="all"
                                x-bind="filterButton('all')"
                                class="text-body-sm font-medium border border-black rounded-full px-4 py-2 duration-300 hover:bg-black hover:text-white">
                            All
                        </button>
                    </li>
                    <?php foreach ($categories as $category): ?>
                        <li>
                            <button data-cat="<?= esc_attr($category->slug); ?>"
                                    x-bind="filterButton('<?= esc_attr($category->slug); ?>')"
                                    class="text-body-sm font-medium border border-black rounded-full px-4 py-2 duration-300 hover:bg-black hover:text-white">
                                <?= esc_html($category->name); ?>
                            </button>
                        </li>
                    <?php endforeach; ?>

                </ul>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-12 lg:mb-16 mb-12"
                    x-ref="postsContainer"
                    data-blog-posts>
                </ul>
                <p class="text-body-lg text-[#404040] text-center mb-6" x-text="counterText">
                </p>
                <div class="flex flex-row justify-center">
                    <button x-show="page < maxPages"
                            x-on:click="loadMore"
                            x-text="loading ? 'Loading...' : 'Load more articles'"
                            class="btn btn-black-outline btn-lg">
                    </button>
                </div>

            </div>
        </section>
        <?php
    }
}