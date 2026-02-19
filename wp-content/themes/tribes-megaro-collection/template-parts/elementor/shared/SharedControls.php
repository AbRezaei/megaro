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

    protected function add_button_group_control(): void
    {
        $this->add_control(
            'buttons',
            [
                'label' => esc_html__('Buttons', 'megaro'),
                'type' => \Elementor\Controls_Manager::REPEATER,
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
                        'default' => 'btn-primary-fill',
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
                'default' => [],
            ]
        );
    }

}