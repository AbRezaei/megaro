<?php

class SliderContent extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'slider-content';
    }

    public function get_title(): string
    {
        return 'Slider Content';
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

        $this->add_logo_content_column_control();

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
        $gallery = $settings['gallery'];
        $gallery_placement = $settings['gallery_placement'];
        $text_color = $settings['text_color'];
        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">
                <div class="grid grid-cols-1 md:grid-cols-5 md:gap-x-8 lg:gap-x-16 xl:gap-x-24 gap-y-6">

                    <div class="md:col-span-2 flex flex-col justify-center order-2 <?= $gallery_placement === 'right' ? 'md:order-1' : 'md:order-2' ?>">
                        <?php $this->render_logo_content_column_control($settings); ?>
                    </div>
                    <div class="md:col-span-3 order-1 <?= $text_color ?> <?= $gallery_placement === 'right' ? 'md:order-2' : 'md:order-1' ?>">
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