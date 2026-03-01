<?php

class SocialMediaShare extends \Elementor\Widget_Base
{
    public function get_name(): string
    {
        return 'social-media-share';
    }

    public function get_title(): string
    {
        return 'Social Media Share';
    }

    public function get_icon(): string
    {
        return 'eicon-social-icons';
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
                'label' => esc_html__('Share Settings', 'megaro'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'share_text',
            [
                'label' => esc_html__('Text', 'megaro'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'show_facebook',
            [
                'label' => esc_html__('Facebook', 'megaro'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_x',
            [
                'label' => esc_html__('X (Twitter)', 'megaro'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_linkedin',
            [
                'label' => esc_html__('LinkedIn', 'megaro'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $post_url = urlencode(get_permalink());
        $post_title = urlencode(get_the_title());

        $share_text = $settings['share_text'];
        $show_facebook = $settings['show_facebook'];
        $show_x = $settings['show_x'];
        $show_linkedin = $settings['show_linkedin'];

        $fb_link = "https://www.facebook.com/sharer/sharer.php?u={$post_url}";
        $x_link = "https://twitter.com/intent/tweet?url={$post_url}&text={$post_title}";
        $in_link = "https://www.linkedin.com/shareArticle?mini=true&url={$post_url}&title={$post_title}";

        ?>
        <div>
            <div class="container">

                <?php if (!empty($share_text)): ?>
                    <p class="text-body-lg text-[#404040] mb-4"><?= $share_text ?></p>
                <?php endif; ?>
                <ul class="flex flex-row items-center gap-4">

                    <?php if ($show_facebook === 'yes'): ?>
                        <li>
                            <a href="<?= $fb_link ?>" class="hover:opacity-70">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/svg/facebook-black.svg"
                                     alt="Social icon"
                                     class="w-6! h-6! object-contain object-center">
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($show_x === 'yes'): ?>
                        <li>
                            <a href="<?= $x_link ?>" class="hover:opacity-70">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/svg/x-black.svg"
                                     alt="Social icon"
                                     class="w-6! h-6! object-contain object-center">
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($show_linkedin === 'yes'): ?>
                        <li>
                            <a href="<?= $in_link ?>" class="hover:opacity-70">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/svg/linkedin-black.svg"
                                     alt="Social icon"
                                     class="w-6! h-6! object-contain object-center">
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>

            </div>
        </div>
        <?php
    }
}