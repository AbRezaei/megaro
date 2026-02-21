<?php

class HotelCards extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'hotel-cards';
    }

    public function get_title(): string
    {
        return 'Hotel Cards';
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
                        'name' => 'stars',
                        'label' => esc_html__('Starts', 'megaro'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 0,
                        'options' => [
                            esc_html__('1 Star', 'megaro'),
                            esc_html__('2 Star', 'megaro'),
                            esc_html__('3 Star', 'megaro'),
                            esc_html__('4 Star', 'megaro'),
                            esc_html__('5 Star', 'megaro'),
                        ]
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
                        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-12">
                            <?php foreach ($cards as $card): ?>
                                <li class="flex flex-col text-center">

                                    <div class="mb-6">
                                        <img src="<?= $card['image']['url'] ?>" alt="<?= $card['image']['alt'] ?>"
                                             class="w-full lg:h-121! h-102! object-cover object-center">
                                    </div>
                                    <div class="grow flex flex-col">

                                        <div class="grow mb-6">

                                            <h4 class="text-heading-4 mb-4"><?= $card['title'] ?></h4>
                                            <div class="flex flex-row justify-center items-center mb-4">
                                                <?php for ($i = 0; $i <= $card['stars']; $i++): ?>
                                                    <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/star-black.svg"
                                                         alt="Star icon"
                                                         class="w-6 h-6 object-contain object-center">
                                                <?php endfor; ?>
                                            </div>
                                            <p class="text-body-lg"><?= $card['description'] ?></p>

                                        </div>
                                        <div>
                                            <a href="<?= $card['btn_link']['url'] ?>"
                                               target="<?= $card['btn_link']['is_external'] ? '_blank' : '_self' ?>"
                                               class="btn <?= $card['btn_type'] ?> <?= $card['btn_size'] ?>"><?= $card['btn_text'] ?></a>
                                        </div>

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