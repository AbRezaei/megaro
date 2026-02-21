<?php

class StackedImageContent extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'stacked-image-content';
    }

    public function get_title(): string
    {
        return 'Stacked Image Content';
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
            'images',
            [
                'label' => esc_html__('Images', 'megaro'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default' => [],
                'description' => esc_html__('Maximum 3 images allowed. Additional images will be ignored.', 'megaro'),
                'separator' => 'before',
            ],
        );
        $this->add_control(
            'images_placement',
            [
                'label' => esc_html__('Images Placement', 'megaro'),
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
        $images = $settings['images'];
        $images_placement = $settings['images_placement'];
        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">
                <div class="flex flex-row lg:flex-nowrap flex-wrap xl:gap-x-24 gap-x-12 gap-y-16 <?= $images_placement === 'right' ? 'justify-end' : 'justify-start' ?>">

                    <div class="lg:w-2/5 w-full order-2 <?= $images_placement === 'right' ? 'lg:order-1' : 'lg:order-2' ?>">
                        <?php $this->render_logo_content_column_control($settings); ?>
                    </div>
                    <div class="lg:w-3/5 md:w-4/5 w-full order-1 <?= $images_placement === 'right' ? 'lg:order-2' : 'lg:order-1' ?>">

                        <?php if (isset($images[0])): ?>
                            <div class="relative z-1 flex flex-row <?= $images_placement === 'right' ? 'justify-end' : 'justify-start' ?>">
                                <img src="<?= $images[0]['url'] ?>" alt="<?= $images[0]['id'] ?>"
                                     class="w-4/5 aspect-square object-cover object-center"/>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($images[1])): ?>
                            <div class="relative z-1 flex flex-row md:-mt-32 -mt-20 <?= $images_placement === 'right' ? 'justify-start' : 'justify-end' ?>">
                                <div class="<?= $bg_color ?> lg:w-2/5 w-1/2 aspect-square md:translate-x-0 p-2 <?= $images_placement === 'right' ? 'translate-x-1/4' : '-translate-x-1/4' ?>">
                                    <img src="<?= $images[1]['url'] ?>" alt="<?= $images[1]['id'] ?>"
                                         class="w-full h-full! object-cover object-center"/>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($images[2])): ?>
                            <div class="relative z-1 flex flex-row md:-mt-32 -mt-20 <?= $images_placement === 'right' ? 'justify-start' : 'justify-end' ?>">
                                <div class="<?= $bg_color ?> lg:w-2/5 w-1/2 aspect-square p-2 <?= $images_placement === 'right' ? 'md:-translate-x-1/2' : 'md:translate-x-1/2' ?>">
                                    <img src="<?= $images[2]['url'] ?>" alt="<?= $images[2]['id'] ?>"
                                         class="w-full h-full! object-cover object-center"/>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}