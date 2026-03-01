<?php

class RoomSliderContent extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'room-slider-content';
    }

    public function get_title(): string
    {
        return 'Room Slider Content';
    }

    public function get_icon(): string
    {
        return 'eicon-posts-group';
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
        $this->add_text_color_control();

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'megaro'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'megaro'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );
        $this->add_control(
            'features',
            [
                'label' => esc_html__('Features', 'megaro'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'default' => [],
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__('Title', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'label_block' => true,
                    ],
                ],
            ]
        );

        $this->add_button_group_control();

        $this->add_control(
            'gallery',
            [
                'label' => esc_html__('Gallery', 'megaro'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default' => [],
            ],
        );
        $this->add_control(
            'gallery_placement',
            [
                'label' => esc_html__('Gallery Placement', 'megaro'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'right',
                'options' => [
                    'right' => esc_html__('Right', 'megaro'),
                    'left' => esc_html__('Left', 'megaro'),
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_color = $settings['bg_color'];
        $text_color = $settings['text_color'];
        $title = $settings['title'];
        $description = $settings['description'];
        $features = $settings['features'];
        $gallery = $settings['gallery'];
        $gallery_placement = $settings['gallery_placement'];
        ?>
        <section class="<?= $bg_color ?> <?= $text_color ?> lg:py-24 py-16">
            <div class="container">
                <div class="grid grid-cols-1 md:grid-cols-5 md:gap-x-8 lg:gap-x-16 xl:gap-x-24 gap-y-6">

                    <div class="md:col-span-2 order-2 <?= $gallery_placement === 'right' ? 'md:order-1' : 'md:order-2' ?>">

                        <h4 class="text-heading-4 mb-6"><?= $title ?></h4>
                        <ul class="flex flex-row flex-wrap items-center gap-3">
                            <?php foreach ($features as $index => $feature): ?>

                                <li class="text-body-md"><?= $feature['title'] ?></li>
                                <?php if ($index !== array_key_last($features)): ?>
                                    <li class="w-2 h-2 bg-primary rotate-45"></li>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </ul>
                        <hr class="border-primary my-6!">
                        <div class="text-body-lg lg:mb-10 mb-8">
                            <?= $description ?>
                        </div>
                        <?php $this->render_button_group_control($settings, 'justify-start'); ?>

                    </div>
                    <div class="md:col-span-3 order-1 <?= $gallery_placement === 'right' ? 'md:order-2' : 'md:order-1' ?>">
                        <div class="swiper relative" data-slider="rooms">

                            <div class="swiper-wrapper">
                                <?php foreach ($gallery as $item): ?>
                                    <div class="swiper-slide">
                                        <img src="<?= $item['url'] ?>" alt="<?= $item['id'] ?>"
                                             class="w-full! md:h-120! h-55! object-cover object-center">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button data-swiper-button-previous
                                    class="absolute top-1/2 -translate-y-1/2 left-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-left-black.svg"
                                     alt="Arrow icon"
                                     class="w-4! h-4!">
                            </button>
                            <button data-swiper-button-next
                                    class="absolute top-1/2 -translate-y-1/2 right-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-right-black.svg"
                                     alt="Arrow icon"
                                     class="w-4! h-4!">
                            </button>
                            <div data-swiper-pagination></div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}