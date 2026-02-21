<?php

class Cards extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'cards';
    }

    public function get_title(): string
    {
        return 'Cards';
    }

    public function get_icon(): string
    {
        return 'eicon-posts-grid';
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
        $this->add_section_heading_control();

        $this->add_control(
            'cards',
            [
                'label' => esc_html__('Cards', 'megaro'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'default' => [],
                'fields' => [
                    [
                        'name' => 'image',
                        'label' => esc_html__('Image', 'megaro'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'media_types' => ['image'],
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
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
                    ],
                    [
                        'name' => 'bullet_title',
                        'label' => esc_html__('Bullet Title', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'label_block' => true,
                    ],
                    [
                        'name' => 'bullet_value',
                        'label' => esc_html__('Bullet Value', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'label_block' => true,
                    ],
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

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_color = $settings['bg_color'];
        $cards = $settings['cards'];

        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">

                <?php $this->render_section_heading_template($settings); ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($cards as $card): ?>
                        <div class="flex flex-col">

                            <div class="mb-6">
                                <img src="<?= $card['image']['url'] ?>" alt="<?= $card['image']['alt'] ?>"
                                     class="w-full sm:h-65! h-55! object-cover object-center">
                            </div>
                            <div class="grow flex flex-col">

                                <div class="grow mb-6">

                                    <h5 class="text-heading-5 mb-6"><?= $card['title'] ?></h5>
                                    <div class="text-body-lg">
                                        <?= $card['description'] ?>
                                    </div>

                                </div>
                                <div>

                                    <?php if (!empty($card['bullet_title']) || !empty($card['bullet_value'])): ?>
                                        <div class="flex flex-row items-center gap-2 mb-6">

                                            <span class="w-2 h-2 bg-primary rotate-45"></span>
                                            <p class="text-body-lg text-[#404040]">
                                                <span class="font-semibold"><?= $card['bullet_title'] ?>: </span>
                                                <span><?= $card['bullet_value'] ?></span>
                                            </p>

                                        </div>
                                    <?php endif; ?>
                                    <a href="<?= $card['btn_link']['url'] ?>"
                                       target="<?= $card['btn_link']['is_external'] ? '_blank' : '_self' ?>"
                                       class="btn <?= $card['btn_type'] ?> <?= $card['btn_size'] ?>"><?= $card['btn_text'] ?></a>

                                </div>

                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}