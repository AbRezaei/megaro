<?php

class Menu extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'menu';
    }

    public function get_title(): string
    {
        return 'Menu';
    }

    public function get_icon(): string
    {
        return 'eicon-menu-card';
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
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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
        $this->add_control(
            'prescriptions',
            [
                'label' => esc_html__('Prescriptions', 'megaro'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'default' => [],
                'separator' => 'before',
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__('Title', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'label_block' => true,
                    ],
                    [
                        'name' => 'description',
                        'label' => esc_html__('Description', 'megaro'),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'default' => '',
                        'label_block' => true,
                    ],
                    [
                        'name' => 'price',
                        'label' => esc_html__('Price', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'label_block' => true,
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_color = $settings['bg_color'];
        $logo = $settings['logo'];
        $title = $settings['title'];
        $description = $settings['description'];
        $prescriptions = $settings['prescriptions'];
        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">
                <div class="xl:w-1/2 lg:w-2/3 text-center mx-auto">

                    <div class="mb-24">

                        <div class="mb-4">
                            <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>"
                                 class="w-20! h-20! object-contain object-center mx-auto">
                        </div>
                        <h2 class="text-heading-2 mb-2"><?= $title ?></h2>
                        <h5 class="text-heading-5 mb-10">MENU</h5>
                        <div class="text-body-lg">
                            <?= $description ?>
                        </div>

                    </div>
                    <div>

                        <div class="mb-10">
                            <h5 class="relative text-heading-5 text-center after:content-[''] after:absolute after:top-1/2 after:left-0 after:-translate-y-1/2 after:w-full after:h-px after:bg-tertiary after:z-1 lg:mb-10 mb-8">
                                <span class="relative z-2 <?= $bg_color ?> px-4">PRESCRIPTIONS</span>
                            </h5>
                        </div>
                        <ul class="space-y-10">
                            <?php foreach ($prescriptions as $prescription): ?>
                                <li class="border-b border-dashed border-black/30 py-4">

                                    <p class="text-body-lg mb-4"><?= $prescription['title'] ?></p>
                                    <div class="text-body-md font-light mb-4">
                                        <?= $prescription['description'] ?>
                                    </div>
                                    <p class="text-body-lg"><?= $prescription['price'] ?></p>

                                </li>
                            <?php endforeach; ?>
                        </ul>

                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}