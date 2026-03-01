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
                'separator' => 'before',
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'image_height',
            [
                'label' => esc_html__('Image Height', 'megaro'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'md:h-180! h-82!',
                'options' => [
                    'md:h-180! h-82!' => esc_html__('Large', 'megaro'),
                    'md:h-146! h-65!' => esc_html__('Medium', 'megaro'),
                    'md:h-116! h-55!' => esc_html__('Small', 'megaro'),
                ]
            ],
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
        $this->add_control(
            'show_borders',
            [
                'label' => esc_html__('Show Top & Bottom Borders', 'megaro'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'megaro'),
                'label_off' => esc_html__('Hide', 'megaro'),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'show_divider',
            [
                'label' => esc_html__('Show Divider Line (Under Title)', 'megaro'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'megaro'),
                'label_off' => esc_html__('Hide', 'megaro'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'vertical_align_content',
            [
                'label' => esc_html__('Vertical Align Content', 'megaro'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'justify-start',
                'options' => [
                    'justify-start' => esc_html__('Top', 'megaro'),
                    'justify-center' => esc_html__('Center', 'megaro'),
                    'justify-end' => esc_html__('Bottom', 'megaro'),
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
        $image_height = $settings['image_height'];
        $placement = $settings['image_placement'];
        $vertical_align_content = $settings['vertical_align_content'];

        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">
                <div class="grid grid-cols-1 md:grid-cols-5 md:gap-x-8 lg:gap-x-16 xl:gap-x-24 gap-y-16">

                    <div class="md:col-span-2 order-2 <?= $placement === 'right' ? 'md:order-1' : 'md:order-2' ?>">
                        <div class="h-full flex flex-col <?= $vertical_align_content ?> items-start">
                            <div class="<?= $settings['show_borders'] === 'yes' ? 'border-y border-primary lg:py-10 py-8 w-full' : '' ?>
                            <?= $settings['show_divider'] === 'yes' ? '[&_.main-title]:after:content-[\'\'] [&_.main-title]:after:block [&_.main-title]:after:w-24 [&_.main-title]:after:border-t [&_.main-title]:after:border-primary [&_.main-title]:after:mt-6' : '' ?>">
                                <?php $this->render_logo_content_column_control($settings); ?>
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-3 order-1 <?= $placement === 'right' ? 'md:order-2' : 'md:order-1' ?>">
                        <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>"
                             class="w-full! <?= $image_height ?> object-cover object-center">
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}