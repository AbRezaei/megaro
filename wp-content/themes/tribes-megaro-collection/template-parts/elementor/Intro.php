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
                'media_types' => ['image'],
            ]
        );

        $this->add_control(
            'overline',
            [
                'label' => esc_html__('Overline', 'megaro'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'separator' => 'before',
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
            'title_hierarchy',
            [
                'label' => esc_html__('Title Hierarchy', 'megaro'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h2',
                'options' => [
                    'h1' => esc_html__('Heading 1', 'megaro'),
                    'h2' => esc_html__('Heading 2', 'megaro'),
                    'h3' => esc_html__('Heading 3', 'megaro'),
                    'h4' => esc_html__('Heading 4', 'megaro'),
                    'h5' => esc_html__('Heading 5', 'megaro'),
                ]
            ]
        );
        $this->add_control(
            'show_title_divider',
            [
                'label' => esc_html__('Show Title divider', 'megaro'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'megaro'),
                'label_off' => esc_html__('Hide', 'megaro'),
                'return_value' => 'yes',
                'default' => '',
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
        $title_hierarchy = $settings['title_hierarchy'];
        $show_title_divider = $settings['show_title_divider'];
        $subtitle = $settings['subtitle'];
        $description = $settings['description'];
        $features = $settings['features'];
        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">

                <div class="lg:w-2/3 mx-auto mb-16">

                    <?php if (!empty($logo['url'])): ?>
                        <div class="mb-4">
                            <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>"
                                 class="w-auto h-8! object-contain object-center mx-auto">
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($overline)): ?>
                        <p class="text-body-lg text-primary text-center mb-6 uppercase"><?= $overline ?></p>
                    <?php endif; ?>
                    <?php if (!empty($title)): ?>

                        <?php if ($title_hierarchy === 'h1'): ?>
                            <h1 class="text-heading-1 text-center"><?= $title ?></h1>
                        <?php elseif ($title_hierarchy === 'h2'): ?>
                            <h2 class="text-heading-2 text-center"><?= $title ?></h2>
                        <?php elseif ($title_hierarchy === 'h3'): ?>
                            <h3 class="text-heading-3 text-center"><?= $title ?></h3>
                        <?php elseif ($title_hierarchy === 'h4'): ?>
                            <h4 class="text-heading-4 text-center"><?= $title ?></h4>
                        <?php elseif ($title_hierarchy === 'h5'): ?>
                            <h5 class="text-heading-5 text-center"><?= $title ?></h5>
                        <?php endif; ?>
                        <hr class="w-24 mx-auto! <?= $show_title_divider === 'yes' ? 'border-primary lg:my-10! my-8!' : 'border-transparent my-3!' ?>">

                    <?php endif; ?>
                    <?php if (!empty($subtitle)): ?>
                        <p class="text-body-sm text-center lg:mb-10 mb-8"><?= $subtitle ?></p>
                    <?php endif; ?>
                    <?php if (!empty($description)): ?>
                        <div class="text-body-xl text-[#404040] text-center">
                            <?= $description ?>
                        </div>
                    <?php endif; ?>

                </div>
                <?php if (!empty($features)): ?>
                    <ul class="flex flex-wrap justify-around gap-6 lg:mb-10 mb-8">
                        <?php foreach ($features as $feature): ?>
                            <li class="flex flex-col justify-center items-center gap-4">

                                <span class="w-2 h-2 bg-primary rotate-45"></span>
                                <span class="text-body-lg"><?= $feature['title'] ?></span>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php $this->render_button_group_control($settings); ?>

            </div>
        </section>
        <?php
    }
}