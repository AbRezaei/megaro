<?php

class IconCards extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'icon-cards';
    }

    public function get_title(): string
    {
        return 'Icon Cards';
    }

    public function get_icon(): string
    {
        return 'eicon-site-logo';
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
                <ul class="flex flex-row flex-wrap justify-center gap-6">
                    <?php foreach ($cards as $card): ?>
                        <li class="w-full sm:w-1/2 lg:w-1/3 flex flex-col justify-center items-center bg-secondary px-4 lg:py-10 py-8">

                            <?php if (!empty($card['logo']['url'])): ?>
                                <div class="mb-4">
                                    <img src="<?= $card['logo']['url'] ?>"
                                         alt="<?= $card['logo']['alt'] ?>"
                                         class="w-24! h-25! object-contain object-center">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($card['title'])): ?>
                                <p class="text-body-xl mb-2"><?= $card['title'] ?></p>
                            <?php endif; ?>
                            <?php if (!empty($card['description'])): ?>
                                <p class="text-body-md text-[#737373]"><?= $card['description'] ?></p>
                            <?php endif; ?>

                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </section>
        <?php
    }
}