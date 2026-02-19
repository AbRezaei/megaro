<?php

class Intro extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'intro';
    }

    public function get_title(): string
    {
        return 'Intro';
    }

    public function get_icon(): string
    {
        return 'eicon-info-circle-o';
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
        $this->add_control(
            'features',
            [
                'label' => esc_html__('Features', 'megaro'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__('Title', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'label_block' => true,
                    ],
                ],
                'default' => [],
            ]
        );

        $this->add_button_group_control();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $bg_color = $settings['bg_color'];
        $logo = $settings['logo'];
        $overline = $settings['overline'];
        $title = $settings['title'];
        $subtitle = $settings['subtitle'];
        $description = $settings['description'];
        $features = $settings['features'];
        $buttons = $settings['buttons'];
        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">

                <div class="lg:w-2/3 mx-auto mb-16">

                    <?php if ($logo['url']): ?>
                        <div class="mb-4">
                            <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>"
                                 class="w-auto h-8! object-contain object-center mx-auto">
                        </div>
                    <?php endif; ?>
                    <?php if ($overline): ?>
                        <p class="text-body-lg text-primary text-center mb-6"><?= $overline ?></p>
                    <?php endif; ?>
                    <?php if ($title): ?>
                        <h2 class="text-heading-2 text-center mb-2"><?= $title ?></h2>
                        <hr class="w-24 border-primary lg:my-10! my-8! mx-auto!">
                    <?php endif; ?>
                    <?php if ($subtitle): ?>
                        <p class="text-body-sm text-center lg:mb-10 mb-8"><?= $subtitle ?></p>
                    <?php endif; ?>
                    <?php if ($description): ?>
                        <p class="text-body-xl text-[#404040]"><?= $description ?></p>
                    <?php endif; ?>

                </div>
                <?php if ($features): ?>
                    <ul class="flex flex-wrap justify-around gap-6 lg:mb-10 mb-8">
                        <?php foreach ($features as $feature): ?>
                            <li class="flex flex-col justify-center items-center gap-4">

                                <span class="w-2 h-2 bg-primary rotate-45"></span>
                                <span class="text-body-lg"><?= $feature['title'] ?></span>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if ($buttons): ?>
                    <div class="flex flex-row flex-wrap justify-center items-center gap-6">
                        <?php foreach ($buttons as $button): ?>
                            <a href="<?= $button['btn_link']['url'] ?>"
                               target="<?= $button['btn_link']['is_external'] ? '_blank' : '_self' ?>"
                               class="btn <?= $button['btn_type'] . ' ' . $button['btn_size'] ?>"><?= $button['btn_text'] ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </section>
        <?php
    }
}