<?php

class RoomImageContent extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'room-image-content';
    }

    public function get_title(): string
    {
        return 'Room Image Content';
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
        $text_color = $settings['text_color'];
        $title = $settings['title'];
        $description = $settings['description'];
        $image = $settings['image'];
        $image_placement = $settings['image_placement'];
        ?>
        <section class="<?= $bg_color ?> <?= $text_color ?> lg:py-24 py-16">
            <div class="container">
                <div class="grid grid-cols-1 md:grid-cols-5 md:gap-x-8 lg:gap-x-16 xl:gap-x-24 gap-y-16">

                    <div class="md:col-span-2 order-1 <?= $image_placement === 'right' ? 'md:order-1' : 'md:order-2' ?>">
                        <div class="border-y border-primary lg:py-10 py-8">

                            <h4 class="text-heading-4 mb-6"><?= $title ?></h4>
                            <div class="text-body-lg">
                                <?= $description ?>
                            </div>

                        </div>
                    </div>
                    <div class="md:col-span-3 order-2 <?= $image_placement === 'right' ? 'md:order-2' : 'md:order-1' ?>">
                        <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>"
                             class="w-full! md:h-146! h-65! object-cover object-center">
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}