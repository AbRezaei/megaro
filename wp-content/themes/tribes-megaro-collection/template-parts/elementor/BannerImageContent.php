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
        $this->add_control(
            'logo',
            [
                'label' => esc_html__('Logo', 'megaro'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
            ]
        );
        $this->add_control(
            'overline',
            [
                'label' => esc_html__('Overline', 'megaro'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
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
        $this->add_text_color_control();

        $this->add_button_group_control();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_image = $settings['bg_image'];
        $image = $settings['image'];
        $logo = $settings['logo'];
        $overline = $settings['overline'];
        $title = $settings['title'];
        $description = $settings['description'];
        $text_color = $settings['text_color'];
        ?>
        <section class="bg-cover bg-center bg-no-repeat lg:py-24 py-16"
                 style="background-image: url('<?= $bg_image['url'] ?>')">
            <div class="container">
                <div class="flex sm:flex-row flex-col justify-between items-center gap-x-4 gap-y-12">

                    <div class="lg:w-1/3 sm:w-1/2 w-full">

                        <div class="<?= $text_color ?>">
                            <?php if (!empty($logo['url'])): ?>
                                <div class="lg:mb-10 mb-8">
                                    <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>"
                                         class="w-auto h-11! object-contain object-center">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($overline)): ?>
                                <p class="text-body-lg text-primary mb-6"><?= $overline ?></p>
                            <?php endif; ?>
                            <?php if (!empty($title)): ?>
                                <h2 class="text-heading-2 lg:mb-10 mb-8"><?= $title ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($description)): ?>
                                <div class="lg:mb-10 mb-8">
                                    <p class="text-body-lg text-[#404040]"><?= $description ?></p>
                                </div>
                            <?php endif; ?>

                            <?php $this->render_button_group_control($settings, 'justify-start'); ?>
                        </div>

                    </div>
                    <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>"
                         class="lg:w-90! sm:w-1/2! w-full! aspect-square object-cover object-center border-8! border-neutral-linen!">

                </div>
            </div>
        </section>
        <?php
    }
}