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
                <p class="text-body-xl text-center"><?= $subtitle ?></p>
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
            'description',
            [
                'label' => esc_html__('Description', 'megaro'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $this->add_control(
            'table',
            [
                'label' => esc_html__('Table', 'megaro'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'default' => [],
                'fields' => [
                    [
                        'name' => 'column_1',
                        'label' => esc_html__('Column 1', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'label_block' => true,
                    ],
                    [
                        'name' => 'column_2',
                        'label' => esc_html__('Column 2', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'label_block' => true,
                    ],
                    [
                        'name' => 'column_3',
                        'label' => esc_html__('Column 3', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'label_block' => true,
                    ],
                    [
                        'name' => 'column_4',
                        'label' => esc_html__('Column 4', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'label_block' => true,
                    ],
                ],
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
        $title_hierarchy = $settings['title_hierarchy'];
        $description = $settings['description'];
        $table = $settings['table'];

        if (empty($logo['url']) && empty($overline) && empty($title) && empty($description) && empty($table)) {
            return;
        }

        $show_col_1 = false;
        $show_col_2 = false;
        $show_col_3 = false;
        $show_col_4 = false;

        foreach ($settings['table'] as $item) {
            if (!empty($item['column_1'])) $show_col_1 = true;
            if (!empty($item['column_2'])) $show_col_2 = true;
            if (!empty($item['column_3'])) $show_col_3 = true;
            if (!empty($item['column_4'])) $show_col_4 = true;
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

                <?php if ($title_hierarchy === 'h1'): ?>
                    <h1 class="main-title text-heading-1 lg:mb-10 mb-8"><?= $title ?></h1>
                <?php elseif ($title_hierarchy === 'h2'): ?>
                    <h2 class="main-title text-heading-2 lg:mb-10 mb-8"><?= $title ?></h2>
                <?php elseif ($title_hierarchy === 'h3'): ?>
                    <h3 class="main-title text-heading-3 mb-6"><?= $title ?></h3>
                <?php elseif ($title_hierarchy === 'h4'): ?>
                    <h4 class="main-title text-heading-4 mb-6"><?= $title ?></h4>
                <?php elseif ($title_hierarchy === 'h5'): ?>
                    <h5 class="main-title text-heading-5 mb-4"><?= $title ?></h5>
                <?php endif; ?>

            <?php endif; ?>
            <?php if (!empty($description)): ?>
                <div class="text-body-lg lg:mb-10 mb-8">
                    <?= $description ?>
                </div>
            <?php endif; ?>
            <?php if ($show_col_1 || $show_col_2 || $show_col_3 || $show_col_4): ?>
                <div class="overflow-x-auto! lg:mb-10 mb-8">
                    <table class="min-w-full! text-left text-body-md">
                        <tbody>
                        <?php foreach ($settings['table'] as $item): ?>
                            <tr class="border-b border-gray-300">

                                <?php if ($show_col_1) : ?>
                                    <td class="min-w-48 py-3">
                                        <?= $item['column_1'] ?>
                                    </td>
                                <?php endif; ?>
                                <?php if ($show_col_2) : ?>
                                    <td class="min-w-16 py-3">
                                        <?= $item['column_2'] ?>
                                    </td>
                                <?php endif; ?>
                                <?php if ($show_col_3) : ?>
                                    <td class="min-w-16 py-3">
                                        <?= $item['column_3'] ?>
                                    </td>
                                <?php endif; ?>
                                <?php if ($show_col_4) : ?>
                                    <td class="min-w-16 py-3">
                                        <?= $item['column_4'] ?>
                                    </td>
                                <?php endif; ?>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
            <?php $this->render_button_group_control($settings, 'justify-start'); ?>

        </div>
        <?php
    }

}