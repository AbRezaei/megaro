<?php

class Newsletter extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'newsletter';
    }

    public function get_title(): string
    {
        return 'Newsletter';
    }

    public function get_icon(): string
    {
        return 'eicon-email-field';
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
            'description',
            [
                'label' => esc_html__('Description', 'megaro'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_color = $settings['bg_color'];
        $description = $settings['description'];

        ?>
        <section class="<?= $bg_color ?> py-16">
            <div class="container">

                <?php $this->render_section_heading_template($settings); ?>
                <div class="lg:w-2/3 xl:w-1/2 mx-auto">

                    <div class="flex flex-row justify-center items-center mb-6">

                        <input type="text" class="lg:w-80! w-56! text-body-lg" placeholder="Email address">
                        <button class="btn btn-primary-fill btn-lg">Subscribe</button>

                    </div>
                    <p class="text-body-md text-center text-[#737373]"><?= $description ?></p>

                </div>

            </div>
        </section>
        <?php
    }
}