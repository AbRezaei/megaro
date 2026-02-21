<?php

class Video extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'video';
    }

    public function get_title(): string
    {
        return 'Video';
    }

    public function get_icon(): string
    {
        return 'eicon-play';
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

        $this->add_control(
            'embedded',
            [
                'label' => esc_html__('Embedded Code', 'megaro'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'poster',
            [
                'label' => esc_html__('Poster', 'megaro'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'default' => [],
            ]
        );
        $this->add_control(
            'video',
            [
                'label' => esc_html__('Video', 'megaro'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default' => [],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_color = $settings['bg_color'];
        $embedded = $settings['embedded'];
        $poster = $settings['poster']['url'];
        $video = $settings['video']['url'];
        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">
                <div>

                    <?php if ($embedded): ?>
                        <?= $embedded ?>
                    <?php elseif ($video): ?>
                        <video poster="<?= $poster ?>"
                               controls
                               class="w-full h-auto aspect-video">
                            <source src="<?= $video ?>" type="video/mp4">
                        </video>
                    <?php endif; ?>

                </div>
            </div>
        </section>
        <?php
    }
}