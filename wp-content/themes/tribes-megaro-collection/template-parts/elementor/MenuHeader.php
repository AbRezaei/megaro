<?php

class MenuHeader extends \Elementor\Widget_Base
{
    public function get_name(): string
    {
        return 'menu-header';
    }

    public function get_title(): string
    {
        return 'Menu Header';
    }

    public function get_icon(): string
    {
        return 'eicon-header';
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
                'label' => esc_html__('Header Content', 'megaro'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

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
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'megaro'),
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

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $logo = $settings['logo'];
        $title = $settings['title'];
        $subtitle = $settings['subtitle'];
        $description = $settings['description'];
        ?>
        <section class="lg:py-12 py-8">
            <div class="container">
                <div class="w-full lg:w-1/2 mx-auto">

                    <div class="mb-4">
                        <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>"
                             class="w-20! h-20! object-contain object-center mx-auto">
                    </div>
                    <h1 class="text-heading-1 text-center mb-2"><?= $title ?></h1>
                    <h4 class="text-heading-4 text-center lg:mb-10 mb-8"><?= $subtitle ?></h4>
                    <div class="text-body-lg text-center">
                        <?= $description ?>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}