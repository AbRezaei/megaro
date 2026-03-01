<?php

class Gallery extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'gallery';
    }

    public function get_title(): string
    {
        return 'Gallery';
    }

    public function get_icon(): string
    {
        return 'eicon-gallery-grid';
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
        $gallery = $settings['gallery'];
        ?>
        <section class="<?= $bg_color ?> py-2">
            <ul class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-2">
                <?php foreach ($gallery as $image): ?>
                    <li>
                        <img src="<?= $image['url'] ?>" alt="<?= $image['id'] ?>"
                             class="w-full h-78! object-cover object-center">
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <?php
    }
}