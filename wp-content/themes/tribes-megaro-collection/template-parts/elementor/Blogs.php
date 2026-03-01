<?php

class Blogs extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'blogs';
    }

    public function get_title(): string
    {
        return 'Blogs';
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
        $this->add_section_heading_control();

        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('Button Text', 'megaro'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]);
        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__('Button Link', 'megaro'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'label_block' => true,
            ]
        );

        $categories = get_categories([
            'hide_empty' => true,
        ]);

        $category_options = [];
        $default_category = [];

        if (!empty($categories) && !is_wp_error($categories)) {
            $default_category = [$categories[0]->term_id];

            foreach ($categories as $category) {
                $category_options[$category->term_id] = $category->name;
            }
        }

        $this->add_control(
            'category_ids',
            [
                'label' => esc_html__('Categories', 'megaro'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $category_options,
                'default' => $default_category,
                'description' => esc_html__('Select categories to show.', 'megaro'),
            ]
        );
        $this->add_control(
            'posts_count',
            [
                'label' => esc_html__('Number of Posts', 'megaro'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 20,
                'step' => 1,
                'default' => 2,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_color = $settings['bg_color'];
        $btn_text = $settings['btn_text'];
        $btn_link = $settings['btn_link'];

        $current_post_id = (int)get_queried_object_id();
        if (!$current_post_id) {
            $current_post_id = (int)get_the_ID();
        }

        $excluded_post_ids = $current_post_id ? [$current_post_id] : [];

        $args = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $settings['posts_count'],
            'ignore_sticky_posts' => true,
            'post__not_in' => $excluded_post_ids,
        ];

        if (!empty($settings['category_ids'])) {
            $args['category__in'] = $settings['category_ids'];
        }

        $query = new \WP_Query($args);
        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">
                <div>

                    <?php $this->render_section_heading_template($settings); ?>
                    <?php if (!empty($btn_text)): ?>
                        <div class="flex flex-row justify-center items-center lg:mb-16 mb-12">
                            <a href="<?= $btn_link['url'] ?>"
                               target="<?= $btn_link['is_external'] ? '_blank' : '_self' ?>"
                               class="group flex flex-row items-center gap-2 hover:opacity-70">

                                <span class="text-body-lg"><?= $btn_text ?></span>
                                <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-right-black.svg"
                                     alt="Arrow icon"
                                     class="w-4! h-4! group-hover:translate-x-1 duration-300">

                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($query->have_posts()): ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-12">
                            <?php while ($query->have_posts()) : $query->the_post();
                                get_template_part('template-parts/blog-list-item');
                            endwhile; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </section>
        <?php
    }
}