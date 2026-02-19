<?php

class StackedImageContent extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'stacked_image_content';
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

        $this->add_control(
            'logo',
            [
                'label' => esc_html__('Logo', 'megaro'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
            ]
        );
        $this->add_control(
            'overline',
            [
                'label' => esc_html__('Overline', 'megaro'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
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

        $this->add_button_group_control();

        $this->add_control(
            'images',
            [
                'label' => esc_html__('Images', 'megaro'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default' => [],
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
        $logo = $settings['logo'];
        $overline = $settings['overline'];
        $title = $settings['title'];
        $description = $settings['description'];
        $images = $settings['images'];
        $images_placement = $settings['images_placement'];
        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">
                <div class="flex flex-row lg:flex-nowrap flex-wrap xl:gap-x-24 gap-x-12 gap-y-16 <?= $images_placement === 'right' ? 'justify-end' : 'justify-start' ?>">

                    <div class="lg:w-2/5 order-2 <?= $images_placement === 'right' ? 'lg:order-1' : 'lg:order-2' ?>">

                        <?php if (!empty($logo['url'])): ?>
                            <div class="lg:mb-10 mb-8">
                                <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>"
                                     class="w-auto h-11! object-contain object-center">
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($overline)): ?>
                            <p class="text-body-lg text-primary mb-6"><?= $overline ?></p>
                        <?php endif; ?>
                        <?php if (!empty($title)): ?>
                            <h2 class="text-heading-2 lg:mb-10 mb-8"><?= $title ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($description)): ?>
                            <div class="lg:mb-10 mb-8">
                                <p class="text-body-lg text-[#404040]"><?= $description ?></p>
                            </div>
                        <?php endif; ?>

                        <?php $this->render_button_group_control($settings, 'justify-start'); ?>

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