<?php

class AutoHeightGallerySlider extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'auto-height-gallery-slider';
    }

    public function get_title(): string
    {
        return 'Auto Height Gallery Slider';
    }

    public function get_icon(): string
    {
        return 'eicon-posts-carousel';
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
        $this->add_section_heading_control();

        $this->add_control(
            'gallery',
            [
                'label' => esc_html__('Gallery', 'megaro'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default' => [],
            ],
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $bg_color = $settings['bg_color'];
        $text_color = $settings['text_color'];
        $gallery = $settings['gallery'];
        ?>
        <section class="<?= $bg_color ?> <?= $text_color ?> lg:py-24 py-16">

            <div class="container">
                <?php $this->render_section_heading_template($settings); ?>
            </div>
            <div class="text-white">
                <div class="swiper relative" data-slider="autoHeight">

                    <div class="swiper-wrapper">
                        <?php foreach ($gallery as $image): ?>
                            <div class="swiper-slide">
                                <div class="w-full lg:h-118 h-75 flex flex-col justify-end">
                                    <img src="<?= $image['url'] ?>" alt="<?= $image['id'] ?>"
                                         class="w-full h-auto max-h-full object-cover object-center">
                                </div>
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
                    <div data-swiper-pagination class="w-fit! flex items-center gap-2 mx-auto mt-6 pb-2"></div>

                </div>
            </div>

        </section>
        <?php
    }
}