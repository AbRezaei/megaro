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
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}