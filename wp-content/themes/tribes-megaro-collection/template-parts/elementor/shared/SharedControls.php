<?php

trait SharedControls
{

    protected function add_bg_color_control($id = 'bg_color', $label = 'Background Color'): void
    {
        $this->add_control(
            $id,
            [
                'label' => esc_html__($label, 'megaro'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'bg-transparent',
                'options' => [
                    'bg-transparent' => esc_html__('Transparent', 'megaro'),
                    'bg-black' => esc_html__('Black', 'megaro'),
                    'bg-white' => esc_html__('White', 'megaro'),
                    'bg-primary' => esc_html__('Primary', 'megaro'),
                    'bg-secondary' => esc_html__('Secondary', 'megaro'),
                    'bg-mid' => esc_html__('Mid', 'megaro'),
                    'bg-tertiary' => esc_html__('Tertiary', 'megaro'),
                    'bg-neutral-graphite' => esc_html__('Neutral Graphite', 'megaro'),
                    'bg-neutral-stone' => esc_html__('Neutral Stone', 'megaro'),
                    'bg-neutral-linen' => esc_html__('Neutral Linen', 'megaro'),
                ]
            ]
        );
    }

    protected function add_text_color_control($id = 'text_color', $label = 'Text Color'): void
    {
        $this->add_control(
            $id,
            [
                'label' => esc_html__($label, 'megaro'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'text-black',
                'options' => [
                    'text-black' => esc_html__('Black', 'megaro'),
                    'text-white' => esc_html__('White', 'megaro'),
                    'text-primary' => esc_html__('Primary', 'megaro'),
                    'text-secondary' => esc_html__('Secondary', 'megaro'),
                    'text-mid' => esc_html__('Mid', 'megaro'),
                    'text-tertiary' => esc_html__('Tertiary', 'megaro'),
                    'text-neutral-graphite' => esc_html__('Neutral Graphite', 'megaro'),
                    'text-neutral-stone' => esc_html__('Neutral Stone', 'megaro'),
                    'text-neutral-linen' => esc_html__('Neutral Linen', 'megaro'),
                ]
            ]
        );
    }

    /* Button groups */
    protected function add_button_group_control(): void
    {
        $this->add_control(
            'buttons',
            [
                'label' => esc_html__('Buttons', 'megaro'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'default' => [],
                'fields' => [
                    [
                        'name' => 'btn_type',
                        'label' => esc_html__('Button Type', 'megaro'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'btn-primary-fill',
                        'options' => [
                            'btn-primary-fill' => esc_html__('Primary Fill', 'megaro'),
                            'btn-black-outline' => esc_html__('Black Outline', 'megaro'),
                            'btn-white-outline' => esc_html__('White Outline', 'megaro'),
                        ]
                    ],
                    [
                        'name' => 'btn_size',
                        'label' => esc_html__('Button Size', 'megaro'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'btn-lg',
                        'options' => [
                            'btn-lg' => esc_html__('Large', 'megaro'),
                            'btn-md' => esc_html__('Medium', 'megaro'),
                            'btn-sm' => esc_html__('Small', 'megaro'),
                        ]
                    ],
                    [
                        'name' => 'btn_text',
                        'label' => esc_html__('Button Text', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'btn_link',
                        'label' => esc_html__('Button Link', 'megaro'),
                        'type' => \Elementor\Controls_Manager::URL,
                        'options' => ['url', 'is_external', 'nofollow'],
                        'label_block' => true,
                    ]
                ],
            ]
        );
    }

    protected function render_button_group_control(array $settings, string $justify = 'justify-center'): void
    {
        $buttons = $settings['buttons'];

        if (empty($buttons)) {
            return;
        }

        ?>
        <div class="flex flex-row flex-wrap <?= $justify ?> items-center gap-6">
            <?php foreach ($buttons as $button): ?>
                <a href="<?= $button['btn_link']['url'] ?>"
                   target="<?= $button['btn_link']['is_external'] ? '_blank' : '_self' ?>"
                   class="btn <?= $button['btn_type'] . ' ' . $button['btn_size'] ?>"><?= $button['btn_text'] ?></a>
            <?php endforeach; ?>
        </div>
        <?php
    }

    /* Section heading */
    protected function add_section_heading_control(): void
    {
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
    }

    protected function render_section_heading_template(array $settings): void
    {
        $overline = $settings['overline'];
        $title = $settings['title'];
        $subtitle = $settings['subtitle'];

        if (empty($overline) && empty($title) && empty($subtitle)) {
            return;
        }

        ?>
        <div class="lg:w-1/2 w-full mx-auto lg:mb-16 mb-12 space-y-6">

            <?php if (!empty($overline)): ?>
                <p class="text-body-lg text-primary text-center"><?= $overline ?></p>
            <?php endif; ?>
            <?php if (!empty($title)): ?>
                <h2 class="text-heading-2 text-center"><?= $title ?></h2>
            <?php endif; ?>
            <?php if (!empty($subtitle)): ?>
                <p class="text-body-xl text-center text-[#404040]"><?= $subtitle ?></p>
            <?php endif; ?>

        </div>
        <?php
    }

    /* Logo heading */
    protected function add_logo_content_column_control(): void
    {
        $this->add_text_color_control();

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
    }

    protected function render_logo_content_column_control(array $settings): void
    {
        $text_color = $settings['text_color'];
        $logo = $settings['logo'];
        $overline = $settings['overline'];
        $title = $settings['title'];
        $description = $settings['description'];

        if (empty($logo['url']) && empty($overline) && empty($title) && empty($description)) {
            return;
        }

        ?>
        <div class="<?= $text_color ?>">

            <?php if (!empty($logo['url'])): ?>
                <div class="mb-4">
                    <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>"
                         class="w-20! h-auto! object-contain object-center">
                </div>
            <?php endif; ?>
            <?php if (!empty($overline)): ?>
                <p class="text-body-lg text-primary mb-6"><?= $overline ?></p>
            <?php endif; ?>
            <?php if (!empty($title)): ?>
                <h2 class="text-heading-2 lg:mb-10 mb-8"><?= $title ?></h2>
            <?php endif; ?>
            <?php if (!empty($description)): ?>
                <div class="text-body-lg lg:mb-10 mb-8">
                    <?= $description ?>
                </div>
            <?php endif; ?>
            <?php $this->render_button_group_control($settings, 'justify-start'); ?>

        </div>
        <?php
    }

}