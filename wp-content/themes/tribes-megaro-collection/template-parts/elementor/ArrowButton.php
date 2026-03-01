<?php

class ArrowButton extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'arrow-button';
    }

    public function get_title(): string
    {
        return 'Arrow Button';
    }

    public function get_icon(): string
    {
        return 'eicon-button';
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

        $this->add_text_color_control();

        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('Button Text', 'megaro'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ],
        );
        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__('Button Link', 'megaro'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'justify',
            [
                'label' => esc_html__('Justify', 'megaro'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'justify-start',
                'options' => [
                    'justify-start' => esc_html__('Start', 'megaro'),
                    'justify-center' => esc_html__('Center', 'megaro'),
                    'justify-end' => esc_html__('End', 'megaro'),
                ]
            ],
        );
        $this->add_control(
            'arrow_position',
            [
                'label' => esc_html__('Arrow Postion', 'megaro'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'right',
                'options' => [
                    'right' => esc_html__('Right', 'megaro'),
                    'left' => esc_html__('Left', 'megaro'),
                ]
            ],
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $text_color = $settings['text_color'];
        $btn_text = $settings['btn_text'];
        $btn_link = $settings['btn_link'];
        $justify = $settings['justify'];
        $arrow_position = $settings['arrow_position'];

        ?>
        <div>
            <div class="container">
                <div class="flex flex-row <?= $justify ?>">
                    <a href="<?= $btn_link['url'] ?>"
                       target="<?= $btn_link['is_external'] ? '_blank' : '_self' ?>"
                       class="group w-fit flex flex-row items-center gap-2 <?= $text_color ?> border-b border-black hover:opacity-70">

                        <?php if ($arrow_position === 'left'): ?>
                            <svg class="w-4! h-4! group-hover:-translate-x-1 duration-300" viewBox="0 0 16 16"
                                 fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.1657 2.333C11.2529 2.4223 11.3018 2.54217 11.3018 2.667C11.3018 2.79183 11.2529 2.91171 11.1657 3.001L6.29269 8L11.1657 12.998C11.2529 13.0873 11.3018 13.2072 11.3018 13.332C11.3018 13.4568 11.2529 13.5767 11.1657 13.666C11.1233 13.7095 11.0726 13.7442 11.0166 13.7678C10.9606 13.7914 10.9005 13.8036 10.8397 13.8036C10.7789 13.8036 10.7188 13.7914 10.6628 13.7678C10.6068 13.7442 10.5561 13.7095 10.5137 13.666L5.33169 8.349C5.24068 8.25563 5.18974 8.13039 5.18974 8C5.18974 7.86961 5.24068 7.74437 5.33169 7.651L10.5137 2.334C10.5561 2.29046 10.6068 2.25585 10.6628 2.23222C10.7188 2.20859 10.7789 2.19641 10.8397 2.19641C10.9005 2.19641 10.9606 2.20859 11.0166 2.23222C11.0726 2.25585 11.1233 2.29046 11.1657 2.334V2.333Z"
                                      fill="currentColor"/>
                            </svg>
                        <?php endif; ?>
                        <span class="text-body-lg"><?= $btn_text ?></span>
                        <?php if ($arrow_position === 'right'): ?>
                            <svg class="w-4! h-4! group-hover:translate-x-1 duration-300" viewBox="0 0 16 16"
                                 fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.32601 2.33288C5.23878 2.42217 5.18994 2.54205 5.18994 2.66688C5.18994 2.79171 5.23878 2.91159 5.32601 3.00088L10.199 7.99988L5.32601 12.9979C5.23878 13.0872 5.18994 13.207 5.18994 13.3319C5.18994 13.4567 5.23878 13.5766 5.32601 13.6659C5.3684 13.7094 5.41909 13.744 5.47508 13.7677C5.53108 13.7913 5.59123 13.8035 5.65201 13.8035C5.71278 13.8035 5.77294 13.7913 5.82893 13.7677C5.88492 13.744 5.93561 13.7094 5.97801 13.6659L11.16 8.34888C11.251 8.25551 11.302 8.13027 11.302 7.99988C11.302 7.86949 11.251 7.74425 11.16 7.65088L5.97801 2.33388C5.93561 2.29034 5.88492 2.25573 5.82893 2.2321C5.77294 2.20846 5.71278 2.19629 5.65201 2.19629C5.59123 2.19629 5.53108 2.20846 5.47508 2.2321C5.41909 2.25573 5.3684 2.29034 5.32601 2.33388V2.33288Z"
                                      fill="currentColor"/>
                            </svg>
                        <?php endif; ?>

                    </a>
                </div>
            </div>
        </div>
        <?php
    }
}