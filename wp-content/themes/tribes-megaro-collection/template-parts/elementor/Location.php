<?php

class Location extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'location';
    }

    public function get_title(): string
    {
        return 'Location';
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
        $this->add_section_heading_control();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_color = $settings['bg_color'];

        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">
                <div>

                    <?php $this->render_section_heading_template($settings);?>
                    <div>
                        <iframe src="https://www.google.com/maps?q=Turin,Italy&output=embed" loading="lazy"
                                class="w-full lg:h-150! h-75!">
                        </iframe>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}