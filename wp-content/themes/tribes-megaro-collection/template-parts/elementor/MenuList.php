<?php

class MenuList extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'menu-list';
    }

    public function get_title(): string
    {
        return 'Menu List';
    }

    public function get_icon(): string
    {
        return 'eicon-price-list';
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
                'label' => esc_html__('Item Details', 'megaro'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('List Title', 'megaro'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
            ]
        );

        $dietary_tags = self::get_dietary_tags();
        $tag_options = [];

        $tag_options['none'] = esc_html__('None', 'megaro');
        foreach ($dietary_tags as $key => $value) {
            $tag_options[$key] = $value['label'] . ' (' . $value['symbol'] . ')';
        }

        $this->add_control(
            'items',
            [
                'label' => esc_html__('Items', 'megaro'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'default' => [],
                'separator' => 'before',
                'fields' => [
                    [
                        'name' => 'style',
                        'label' => esc_html__('Layout Style', 'megaro'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'row-dotted',
                        'options' => [
                            'row-dotted' => esc_html__('Row with Dotted Line', 'megaro'),
                            'centered' => esc_html__('Centered', 'megaro'),
                            'multi-price' => esc_html__('Multi-Price', 'megaro'),
                        ]
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
                        'default' => '',
                        'label_block' => true,
                        'condition' => [
                            'style' => 'centered',
                        ],
                    ],
                    [
                        'name' => 'price',
                        'label' => esc_html__('Price', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '£0.00',
                        'label_block' => true,
                        'condition' => [
                            'style' => ['row-dotted', 'centered'],
                        ],
                    ],
                    // فیلدهای قیمت برای حالت چند قیمتی
                    [
                        'name' => 'price_1',
                        'label' => esc_html__('Price 1 (e.g. 125ml)', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'condition' => [
                            'style' => 'multi-price',
                        ],
                    ],
                    [
                        'name' => 'price_2',
                        'label' => esc_html__('Price 2 (e.g. 250ml)', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'condition' => [
                            'style' => 'multi-price',
                        ],
                    ],
                    [
                        'name' => 'price_3',
                        'label' => esc_html__('Price 3 (e.g. Bottle)', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'condition' => [
                            'style' => 'multi-price',
                        ],
                    ],
                    [
                        'name' => 'tag',
                        'label' => esc_html__('Dietary Tag', 'megaro'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'options' => $tag_options,
                        'default' => 'none',
                        'condition' => [
                            'style' => 'row-dotted',
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
        $title = $settings['title'];
        $items = $settings['items'];

        $dietary_tags = self::get_dietary_tags();
        ?>
        <section class="lg:py-12 py-8">
            <div class="container">
                <div class="w-full lg:w-1/2 mx-auto">

                    <?php if (!empty($title)): ?>
                        <h5 class="relative text-heading-5 text-center after:content-[''] after:absolute after:top-1/2 after:left-0 after:-translate-y-1/2 after:w-full after:h-px after:bg-primary after:z-1 lg:mb-10 mb-8">
                            <span class="relative z-2 bg-secondary px-4"><?= $title ?></span>
                        </h5>
                    <?php endif; ?>

                    <ul>
                        <?php foreach ($items as $item): ?>

                            <?php if ($item['style'] === 'row-dotted'): ?>
                                <li class="flex flex-row justify-between items-center border-b border-dashed border-black/30 py-3">

                                    <div class="flex flex-row items-center gap-2">
                                        <p class="text-body-lg"><?= $item['title'] ?></p>

                                        <?php if (isset($item['tag']) && $item['tag'] !== 'none' && isset($dietary_tags[$item['tag']])): ?>
                                            <p class="w-5 h-5 flex flex-row justify-center items-center text-body-sm text-white rounded-full"
                                               style="background-color: <?= $dietary_tags[$item['tag']]['color'] ?>"><?= $dietary_tags[$item['tag']]['symbol'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <p class="text-body-lg"><?= $item['price'] ?></p>

                                </li>

                            <?php elseif ($item['style'] === 'centered'): ?>
                                <li class="border-b border-dashed border-black/30 py-4">

                                    <p class="text-body-lg text-center mb-4"><?= $item['title'] ?></p>
                                    <div class="text-body-md text-center font-light mb-4">
                                        <?= $item['description'] ?>
                                    </div>
                                    <p class="text-body-lg text-center"><?= $item['price'] ?></p>

                                </li>

                            <?php elseif ($item['style'] === 'multi-price'): ?>
                                <li class="flex flex-row justify-between items-center border-b border-dashed border-black/30 py-3">

                                    <div class="w-1/2 text-left pr-4">
                                        <p class="text-body-lg"><?= $item['title'] ?></p>
                                    </div>

                                    <div class="w-1/2 flex flex-row justify-end items-center">
                                        <p class="w-1/3 text-right text-body-lg"><?= $item['price_1'] ?></p>
                                        <p class="w-1/3 text-right text-body-lg"><?= $item['price_2'] ?></p>
                                        <p class="w-1/3 text-right text-body-lg"><?= $item['price_3'] ?></p>
                                    </div>

                                </li>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </ul>

                </div>
            </div>
        </section>
        <?php
    }
}