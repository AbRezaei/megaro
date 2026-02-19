<?php

trait SharedControls
{

    protected function add_shared_color_control($id = 'bg_color', $label = 'Background Color')
    {
        $this->add_control(
            $id,
            [
                'label' => esc_html__($label, 'megaro'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'bg-transparent',
                'options' => [
                    'bg-transparent' => esc_html__('Transparent', 'megaro'),
                    'bg-white' => esc_html__('White', 'megaro'),
                    'bg-black' => esc_html__('Black', 'megaro'),
                    'bg-gray-100' => esc_html__('Light Gray', 'megaro'),
                    'bg-primary' => esc_html__('Brand Primary', 'megaro'),
                    'bg-secondary' => esc_html__('Brand Secondary', 'megaro'),
                ]
            ]
        );
    }

}