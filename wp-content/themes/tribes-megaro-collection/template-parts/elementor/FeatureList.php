<?php

class FeatureList extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'feature-list';
    }

    public function get_title(): string
    {
        return 'Feature List';
    }

    public function get_icon(): string
    {
        return 'eicon-bullet-list';
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
            'features',
            [
                'label' => esc_html__('Features', 'megaro'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'default' => [],
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__('Title', 'megaro'),
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
        $text_color = $settings['text_color'];
        $features = $settings['features'];
        ?>
        <section class="<?= $bg_color ?> <?= $text_color ?> py-6">
            <div class="container">
                <ul class="flex flex-row flex-wrap justify-center items-center lg:gap-x-10 gap-x-8 gap-y-4">
                    <?php foreach ($features as $index => $feature): ?>

                        <li class="text-body-lg"><?= $feature['title'] ?></li>
                        <?php if ($index !== array_key_last($features)): ?>
                            <li class="w-2 h-2 bg-secondary rotate-45"></li>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
        <?php
    }
}