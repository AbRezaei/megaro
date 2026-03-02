<?php

class SectionHeading extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'section-heading';
    }

    public function get_title(): string
    {
        return 'Section Heading';
    }

    public function get_icon(): string
    {
        return 'eicon-header';
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

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_color = $settings['bg_color'];
        ?>
        <section class="<?= $bg_color ?> lg:py-12 py-8">
            <div class="container">
                <?php $this->render_section_heading_template($settings, ''); ?>
            </div>
        </section>
        <?php
    }
}