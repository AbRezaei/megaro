<?php

class Location2 extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'location2';
    }

    public function get_title(): string
    {
        return 'Location2';
    }

    public function get_icon(): string
    {
        return 'eicon-google-maps';
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
        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__('Google Maps Directions', 'megaro'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'megaro'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'getting_here_items',
            [
                'label' => esc_html__('Getting Here', 'megaro'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'default' => [],
                'fields' => [
                    [
                        'name' => 'icon',
                        'label' => esc_html__('Icon', 'megaro'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'airplane',
                        'options' => [
                            'airplane' => esc_html__('Airplane', 'megaro'),
                            'train' => esc_html__('Train', 'megaro'),
                            'location' => esc_html__('Location', 'megaro'),
                        ]
                    ],
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
        $this->add_control(
            'attractions_items',
            [
                'label' => esc_html__('Attractions', 'megaro'),
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
        $this->add_control(
            'neighbourhoods_items',
            [
                'label' => esc_html__('Neighbourhoods', 'megaro'),
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

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_color = $settings['bg_color'];
        $title = $settings['title'];
        $description = $settings['description'];
        $btn_link = $settings['btn_link'];
        $image = $settings['image'];
        $getting_here_items = $settings['getting_here_items'];
        $attractions_items = $settings['attractions_items'];
        $neighbourhoods_items = $settings['neighbourhoods_items'];

        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">
                <div>

                    <div class="flex flex-row lg:flex-nowrap flex-wrap justify-between gap-x-4 gap-y-12 lg:mb-16 mb-12">

                        <div class="lg:w-2/7 w-full">

                            <div class="mb-10">

                                <h3 class="text-heading-3"><?= $title ?></h3>
                                <hr class="w-24 border-primary my-6!">
                                <div class="text-body-lg mb-4">
                                    <?= $description ?>
                                </div>
                                <a href="<?= $btn_link['url'] ?>"
                                   target="<?= $btn_link['is_external'] ? '_blank' : '_self' ?>"
                                   class="w-fit flex flex-row items-center gap-2 border-b border-black hover:opacity-70">

                                    <span class="text-body-lg">Google Maps directions</span>
                                    <img src="<?= get_template_directory_uri() ?>/assets/img/svg/new-tab-black.svg"
                                         alt="New tab icon" class="w-5! h-5!">

                                </a>

                            </div>
                            <div class="relative">

                                <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>"
                                     class="relative z-2 w-full! h-82! object-cover object-center">
                                <span class="absolute -bottom-3 -left-3 z-1 w-47 h-47 bg-primary"></span>

                            </div>

                        </div>
                        <div class="lg:w-4/7 w-full">
                            <iframe src="https://www.google.com/maps?q=Turin,Italy&output=embed" loading="lazy"
                                    class="w-full h-full min-h-65">
                            </iframe>
                        </div>

                    </div>
                    <div class="grid lg:grid-cols-3 bg-tertiary lg:divide-x lg:divide-y-0 divide-y divide-white/20 lg:py-10 lg:px-0 px-8">

                        <div class="lg:px-10 lg:py-0 py-8">

                            <h5 class="text-heading-5 text-white mb-6">Getting here</h5>
                            <ul class="space-y-2">
                                <?php foreach ($getting_here_items as $item): ?>
                                    <li class="flex flex-row items-center gap-1">

                                        <?php if ($item['icon'] === 'airplane'): ?>
                                            <img src="<?= get_template_directory_uri() ?>/assets/img/svg/airplane-light.svg"
                                                 alt="Airplane icon"
                                                 class="w-6! h-6!">
                                        <?php elseif ($item['icon'] === 'train'): ?>
                                            <img src="<?= get_template_directory_uri() ?>/assets/img/svg/train-light.svg"
                                                 alt="Airplane icon"
                                                 class="w-6! h-6!">
                                        <?php else: ?>
                                            <img src="<?= get_template_directory_uri() ?>/assets/img/svg/address-light.svg"
                                                 alt="Airplane icon"
                                                 class="w-6! h-6!">
                                        <?php endif; ?>
                                        <span class="text-body-md text-[#E5E5E5]"><?= $item['title'] ?></span>

                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        </div>
                        <div class="lg:px-10 lg:py-0 py-8">

                            <h5 class="text-heading-5 text-white mb-6">Attractions</h5>
                            <ul class="space-y-2">
                                <?php foreach ($attractions_items as $item): ?>
                                    <li class="flex flex-row items-center gap-1">
                                        <span class="text-body-md text-[#E5E5E5]"><?= $item['title'] ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        </div>
                        <div class="lg:px-10 lg:py-0 py-8">

                            <h5 class="text-heading-5 text-white mb-6">Neighbourhoods</h5>
                            <ul class="space-y-2">
                                <?php foreach ($neighbourhoods_items as $item): ?>
                                    <li class="flex flex-row items-center gap-1">
                                        <span class="text-body-md text-[#E5E5E5]"><?= $item['title'] ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        </div>

                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}