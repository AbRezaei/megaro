<?php

class SecondNavbar extends \Elementor\Widget_Base
{
    public function get_name(): string
    {
        return 'second-navbar';
    }

    public function get_title(): string
    {
        return 'Second Navbar';
    }

    public function get_icon(): string
    {
        return 'eicon-nav-menu';
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
        $this->add_control(
            'navbar_items',
            [
                'label' => esc_html__('Navbar Items', 'megaro'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'default' => [],
                'fields' => [
                    [
                        'name' => 'text',
                        'label' => esc_html__('Item Text', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'link',
                        'label' => esc_html__('Item Link', 'megaro'),
                        'type' => \Elementor\Controls_Manager::URL,
                        'options' => ['url', 'is_external', 'nofollow'],
                        'label_block' => true,
                    ],
                    [
                        'name' => 'show_as_active',
                        'label' => esc_html__('Show As Active', 'megaro'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('Active', 'megaro'),
                        'label_off' => esc_html__('Inactive', 'megaro'),
                        'return_value' => 'yes',
                        'default' => '',
                    ]
                ],
            ],
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $navbar_items = $settings['navbar_items'];
        ?>
        <?php if (!empty($navbar_items)): ?>
        <nav class="fixed lg:top-28 top-20 left-0 z-10 w-full bg-neutral-linen border border-[#E5E5E5]">
            <div class="overflow-x-auto w-full">
                <ul class="flex justify-center min-w-full w-max lg:gap-10 gap-8 px-8">
                    <?php foreach ($navbar_items as $item): ?>
                        <?php if (!empty($item['text'])) ?>
                            <li class="group <?= $item['show_as_active'] == 'yes' ? 'active' : '' ?>">
                        <a href="<?= $item['link']['url'] ?>"
                           target="<?= $item['link']['is_external'] ? '_blank' : '_self' ?>"
                           class="block text-body-md hover:opacity-70 py-4 border-b-2 border-transparent group-[.active]:border-primary">
                            <?= $item['text'] ?>
                        </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>
    <?php endif; ?>
        <?php
    }
}