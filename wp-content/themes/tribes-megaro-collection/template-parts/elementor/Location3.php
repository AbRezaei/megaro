<?php

class Location3 extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'location3';
    }

    public function get_title(): string
    {
        return 'Location3';
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
        $this->add_text_color_control();

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'megaro'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
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
            'address',
            [
                'label' => esc_html__('Address', 'megaro'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );
        $this->add_control(
            'opening_hours',
            [
                'label' => esc_html__('Opening Hours', 'megaro'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );
        $this->add_control(
            'contact',
            [
                'label' => esc_html__('Contact', 'megaro'),
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

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_color = $settings['bg_color'];
        $text_color = $settings['text_color'];
        $description = $settings['description'];
        $image = $settings['image'];
        $address = $settings['address'];
        $opening_hours = $settings['opening_hours'];
        $contact = $settings['contact'];
        $btn_link = $settings['btn_link'];

        ?>
        <section class="<?= $bg_color ?> <?= $text_color ?> lg:py-24 py-16">
            <div class="container">
                <div>

                    <div class="flex flex-row lg:flex-nowrap flex-wrap justify-between gap-x-4 gap-y-12 lg:mb-16 mb-12">

                        <div class="lg:w-2/7 w-full">

                            <div class="mb-10">

                                <hr class="w-24 border-primary mb-10!">
                                <div class="text-body-lg">
                                    <?= $description ?>
                                </div>

                            </div>
                            <div class="relative">

                                <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>"
                                     class="relative z-2 w-full h-82! object-cover object-center">
                                <span class="absolute -bottom-3 -right-3 z-1 w-47 h-47 bg-primary"></span>

                            </div>

                        </div>
                        <div class="lg:w-4/7 w-full">
                            <iframe src="https://www.google.com/maps?q=Turin,Italy&output=embed" loading="lazy"
                                    class="w-full! h-full! min-h-65!">
                            </iframe>
                        </div>

                    </div>
                    <div class="grid md:grid-cols-3 grid-cols-1 gap-x-4 gap-y-12">

                        <div>

                            <h5 class="text-heading-5 mb-4">Location</h5>
                            <div class="text-body-lg mb-6">
                                <?= $address ?>
                            </div>
                            <a href="<?= $btn_link['url'] ?>"
                               target="<?= $btn_link['is_external'] ? '_blank' : '_self' ?>"
                               class="w-fit flex flex-row items-center gap-2 border-b border-black hover:opacity-70">

                                <span class="text-body-lg">Google Maps directions</span>
                                <img src="<?= get_template_directory_uri() ?>/assets/img/svg/new-tab-black.svg"
                                     alt="New tab icon" class="w-5! h-5!">

                            </a>

                        </div>
                        <div>

                            <h5 class="text-heading-5 mb-4">Opening Hours</h5>
                            <div class="text-body-lg">
                                <?= $opening_hours ?>
                            </div>

                        </div>
                        <div>

                            <h5 class="text-heading-5 mb-4">Contact</h5>
                            <div class="text-body-lg">
                                <?= $contact ?>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}