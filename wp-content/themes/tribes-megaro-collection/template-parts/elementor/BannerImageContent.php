<?php

class BannerImageContent extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'banner-image-content';
    }

    public function get_title(): string
    {
        return 'Banner Image Content';
    }

    public function get_icon(): string
    {
        return 'eicon-banner';
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
            'bg_image',
            [
                'label' => esc_html__('Background Image', 'megaro'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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

        $this->add_logo_content_column_control();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_image = $settings['bg_image'];
        $image = $settings['image'];
        ?>
        <section class="bg-cover bg-center bg-no-repeat lg:py-24 py-16"
                 style="background-image: url('<?= $bg_image['url'] ?>')">
            <div class="container">
                <div class="flex sm:flex-row flex-col justify-between items-center gap-x-4 gap-y-12">

                    <div class="lg:w-1/3 sm:w-1/2 w-full">
                        <?php $this->render_logo_content_column_control($settings); ?>
                    </div>
                    <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>"
                         class="lg:w-90! sm:w-1/2! w-full! aspect-square object-cover object-center border-8! border-neutral-linen!">

                </div>
            </div>
        </section>
        <?php
    }
}