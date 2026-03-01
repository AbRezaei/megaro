<?php

class RestaurantVerticalCards extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'restaurant-vertical-cards';
    }

    public function get_title(): string
    {
        return 'Restaurant Vertical Cards';
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
                        'name' => 'logo',
                        'label' => esc_html__('Logo', 'megaro'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'media_types' => ['image'],
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
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
                <div>

                    <?php $this->render_section_heading_template($settings); ?>
                    <?php if ($cards): ?>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-16 xl:gap-x-24 gap-y-16">
                            <?php foreach ($cards as $index => $card): ?>
                                <li class="flex flex-col lg:gap-10 gap-8">

                                    <div class="<?= $index % 2 === 0 ? 'md:order-2 order-1' : 'md:order-1 order-1' ?>">
                                        <img src="<?= $card['image']['url'] ?>" alt="<?= $card['image']['alt'] ?>"
                                             class="w-full lg:h-175! h-102! object-cover object-center">
                                    </div>
                                    <div class="<?= $index % 2 === 0 ? 'md:order-1 order-2 xl:px-16 lg:px-10 px-6' : 'md:order-2 order-2 xl:px-16 lg:px-10 px-6' ?>">

                                        <div class="lg:mb-6 mb-4">
                                            <img src="<?= $card['logo']['url'] ?>" alt="<?= $card['logo']['alt'] ?>"
                                                 class="w-20! h-20! object-contain object-center">
                                        </div>
                                        <h4 class="text-heading-4"><?= $card['title'] ?></h4>
                                        <hr class="w-24 border-primary lg:my-6! my-4!">
                                        <div class="lg:mb-10 mb-6">
                                            <p class="text-body-lg text-[#404040]"><?= $card['description'] ?></p>
                                        </div>
                                        <a href="<?= $card['btn_link']['url'] ?>"
                                           target="<?= $card['btn_link']['is_external'] ? '_blank' : '_self' ?>"
                                           class="btn <?= $card['btn_type'] ?> <?= $card['btn_size'] ?>"><?= $card['btn_text'] ?></a>

                                    </div>

                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                </div>
            </div>
        </section>
        <?php
    }
}