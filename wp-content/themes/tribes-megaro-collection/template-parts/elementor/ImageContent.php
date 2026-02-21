<?php

class ImageContent extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'image-content';
    }

    public function get_title(): string
    {
        return 'Image Content';
    }

    public function get_icon(): string
    {
        return 'eicon-image-before-after';
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
            'image',
            [
                'label' => esc_html__('Image', 'megaro'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'image_placement',
            [
                'label' => esc_html__('Image Placement', 'megaro'),
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
        $image = $settings['image'];
        $image_placement = $settings['image_placement'];
        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">
                <div class="grid grid-cols-1 md:grid-cols-5 md:gap-x-8 lg:gap-x-16 xl:gap-x-24 gap-y-16">

                    <div class="md:col-span-2 order-2 <?= $image_placement === 'right' ? 'lg:order-1' : 'lg:order-2' ?>">
                        <div class="h-full flex flex-col justify-center items-start">
                            <?php $this->render_logo_content_column_control($settings); ?>
                        </div>
                    </div>
                    <div class="md:col-span-3 order-1 <?= $image_placement === 'right' ? 'lg:order-2' : 'lg:order-1' ?>">
                        <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>"
                             class="w-full md:h-116! h-55! object-cover object-center">
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}