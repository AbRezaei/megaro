<?php

class Hero extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'hero';
    }

    public function get_title(): string
    {
        return 'Hero';
    }

    public function get_icon(): string
    {
        return 'eicon-ehp-hero';
    }

    public function get_categories(): array
    {
        return ['megaro'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_layout',
            [
                'label' => esc_html__('Layout Style', 'megaro'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'hero_style',
            [
                'label' => esc_html__('Select Hero Style', 'megaro'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'style_1',
                'options' => [
                    'style_1' => esc_html__('Style 1 (Collection & Bottom Logos)', 'megaro'),
                    'style_2' => esc_html__('Style 2 (Hotel)', 'megaro'),
                    'style_3' => esc_html__('Style 3 (Restaurant)', 'megaro'),
                    'style_4' => esc_html__('Style 4 (Split Layout)', 'megaro'),
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'megaro'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_text_color_control();
        $this->add_control(
            'bg_image',
            [
                'label' => esc_html__('Background Image', 'megaro'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'hero_style' => ['style_1', 'style_2', 'style_3'],
                ],
            ]
        );
        $this->add_control(
            'side_image',
            [
                'label' => esc_html__('Side Image', 'megaro'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'hero_style' => 'style_4',
                ],
            ]
        );
        $this->add_control(
            'main_logo',
            [
                'label' => esc_html__('Main Logo', 'megaro'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'condition' => [
                    'hero_style' => ['style_2', 'style_3'],
                ],
            ]
        );
        $this->add_control(
            'overline',
            [
                'label' => esc_html__('Overline', 'megaro'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('e.g. INDULGE', 'megaro'),
                'condition' => [
                    'hero_style' => 'style_4',
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'megaro'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__('e.g. THE MEGARO COLLECTION', 'megaro'),
            ]
        );
        $this->add_control(
            'stars',
            [
                'label' => esc_html__('Starts', 'megaro'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 0,
                'options' => [
                    esc_html__('1 Star', 'megaro'),
                    esc_html__('2 Star', 'megaro'),
                    esc_html__('3 Star', 'megaro'),
                    esc_html__('4 Star', 'megaro'),
                    esc_html__('5 Star', 'megaro'),
                ],
                'condition' => [
                    'hero_style' => 'style_2',
                ],
            ]
        );
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'megaro'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Enter subtitle or description here...', 'megaro'),
            ]
        );
        $this->add_button_group_control();
        $this->end_controls_section();

        $this->start_controls_section(
            'section_bottom_bar',
            [
                'label' => esc_html__('Bottom Bar (Logos)', 'megaro'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'hero_style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'logos_description',
            [
                'label' => esc_html__('Logos Description', 'megaro'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );
        $this->add_control(
            'logos',
            [
                'label' => esc_html__('Logos', 'megaro'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'default' => [],
                'fields' => [
                    [
                        'name' => 'logo',
                        'label' => esc_html__('Logo', 'megaro'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'media_types' => ['image'],
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ]
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $hero_style = $settings['hero_style'];
        $text_color = $settings['text_color'];
        $title = $settings['title'];
        $subtitle = $settings['subtitle'];
        $stars = $settings['stars'];

        $gradient = "radial-gradient(25.28% 100% at 50% 51.67%, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%), linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), linear-gradient(360deg, rgba(0, 0, 0, 0.7) 13.43%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.5) 100%)";
        $bg_image_url = !empty($settings['bg_image']['url']) ? $settings['bg_image']['url'] : '';
        $bg_style = $bg_image_url ? "background-image: {$gradient}, url('{$bg_image_url}'); background-size: cover; background-position:center; background-repeat: no-repeat" : "background-image: {$gradient};";

        if ($hero_style === 'style_1') : ?>
            <header class="<?= $text_color ?> w-full h-dvh flex flex-col py-14" style="<?= $bg_style ?>">

                <div class="grow flex flex-col justify-center">
                    <div class="container">
                        <div class="lg:w-1/2 text-center mx-auto">

                            <?php if (!empty($title)): ?>
                                <h1 class="text-display mb-6"><?= $title ?></h1>
                            <?php endif; ?>
                            <?php if (!empty($subtitle)): ?>
                                <p class="text-body-xl mb-10"><?= $subtitle ?></p>
                            <?php endif; ?>
                            <?php $this->render_button_group_control($settings); ?>

                        </div>
                    </div>
                </div>
                <div>
                    <div class="container">

                        <?php if (!empty($settings['logos_description'])): ?>
                            <div class="text-center mb-4">
                                <?= $settings['logos_description'] ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['logos'])): ?>
                            <ul class="flex flex-row justify-center items-center flex-wrap gap-y-4">
                                <?php foreach ($settings['logos'] as $logo): ?>
                                    <?php if (!empty($logo['logo']['url'])): ?>
                                        <li class="flex items-center justify-center w-24 lg:w-32 h-10 lg:h-16 shrink-0">
                                            <img src="<?= $logo['logo']['url'] ?>"
                                                 alt="<?= $logo['logo']['alt'] ?>"
                                                 class="max-w-full max-h-full object-contain object-center">
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                    </div>
                </div>

            </header>
        <?php
        elseif ($hero_style === 'style_2') : ?>
            <header class="<?= $text_color ?> w-full h-dvh flex flex-col justify-center items-center py-6"
                    style="<?= $bg_style ?>">
                <div class="container">
                    <div class="lg:w-1/2 flex flex-col justify-center items-center mx-auto">

                        <?php if (!empty($settings['main_logo']['url'])): ?>
                            <div class="mb-10">
                                <img src="<?= $settings['main_logo']['url'] ?>"
                                     alt="<?= $settings['main_logo']['alt'] ?>"
                                     class="w-auto lg:h-20! h-15! object-contain object-center">
                            </div>
                        <?php endif; ?>
                        <div class="mb-10">

                            <?php if (!empty($title)): ?>
                                <h1 class="text-display text-center mb-6"><?= $title ?></h1>
                            <?php endif; ?>
                            <?php if ($stars): ?>
                                <div class="flex flex-row justify-center items-center mb-6">
                                    <?php for ($i = 0; $i <= $stars; $i++): ?>
                                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill="currentColor"
                                                  d="M5.825 21L7.45 13.975L2 9.25L9.2 8.625L12 2L14.8 8.625L22 9.25L16.55 13.975L18.175 21L12 17.275L5.825 21Z"/>
                                        </svg>
                                    <?php endfor; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($subtitle)): ?>
                                <p class="text-body-lg text-center"><?= $subtitle ?></p>
                            <?php endif; ?>

                        </div>
                        <?php $this->render_button_group_control($settings); ?>

                    </div>
                </div>
            </header>
        <?php
        elseif ($hero_style === 'style_3') : ?>
            <header class="<?= $text_color ?> relative w-full h-dvh flex flex-col justify-center items-center py-6 after:content-[''] after:absolute after:bottom-0 after:left-1/2 after:translate-y-1/5 after:w-px after:h-1/3 after:bg-primary"
                    style="<?= $bg_style ?>">
                <div class="container relative z-2">
                    <div class="lg:w-1/2 flex flex-col justify-center items-center mx-auto">

                        <?php if (!empty($settings['main_logo']['url'])): ?>
                            <div class="mb-6">
                                <img src="<?= $settings['main_logo']['url'] ?>"
                                     alt="<?= $settings['main_logo']['alt'] ?>"
                                     class="w-auto h-28! object-contain object-center">
                            </div>
                        <?php endif; ?>
                        <div class="mb-10">

                            <?php if (!empty($title)): ?>
                                <h1 class="text-display text-center mb-6"><?= $title ?></h1>
                            <?php endif; ?>
                            <?php if (!empty($subtitle)): ?>
                                <p class="text-body-xl text-center"><?= $subtitle ?></p>
                            <?php endif; ?>

                        </div>
                        <?php $this->render_button_group_control($settings); ?>

                    </div>
                </div>
            </header>
        <?php
        elseif ($hero_style === 'style_4') : ?>
            <header class="<?= $text_color ?> w-full md:h-dvh flex flex-row md:flex-nowrap flex-wrap">

                <div class="md:w-1/2 w-full h-full md:order-1 order-2 relative bg-tertiary flex flex-col justify-center items-center md:py-4 py-16 after:content-[''] after:absolute md:after:top-1/2 after:-top-24 after:left-1/2 after:z-1 md:after:-translate-y-1/2 after:w-px md:after:h-4/5 after:h-[calc(100%+6rem)] after:bg-primary">
                    <div class="container relative z-2">
                        <div class="w-full lg:w-4/5 flex flex-col justify-center items-center bg-tertiary py-6 mx-auto">

                            <div class="mb-10">

                                <?php if (!empty($settings['overline'])): ?>
                                    <p class="text-body-lg text-secondary text-center mb-4"><?= $settings['overline'] ?></p>
                                <?php endif; ?>
                                <?php if (!empty($title)): ?>
                                    <h1 class="text-heading-1 text-center mb-4"><?= $title ?></h1>
                                <?php endif; ?>
                                <?php if (!empty($subtitle)): ?>
                                    <p class="text-body-lg text-center"><?= $subtitle ?></p>
                                <?php endif; ?>

                            </div>
                            <?php $this->render_button_group_control($settings); ?>

                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 w-full md:h-full h-100 md:order-2 order-1">
                    <?php if (!empty($settings['side_image']['url'])): ?>
                        <img src="<?= $settings['side_image']['url'] ?>"
                             alt="Side Image"
                             class="w-full h-full! object-cover object-center">
                    <?php endif; ?>
                </div>

            </header>
        <?php endif;
    }
}