<?php

class MenuDietaryTags extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'menu-dietary-tags';
    }

    public function get_title(): string
    {
        return 'Menu Dietary Tags';
    }

    public function get_icon(): string
    {
        return 'eicon-tags';
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
                'label' => esc_html__('Legend Items', 'megaro'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $dietary_tags = self::get_dietary_tags();
        $tag_options = [];

        foreach ($dietary_tags as $key => $value) {
            $tag_options[$key] = $value['label'];
        }

        $this->add_control(
            'tags',
            [
                'label' => esc_html__('Select Tags to Show', 'megaro'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $tag_options,
                'default' => array_keys($tag_options),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $dietary_tags = self::get_dietary_tags();
        $tags = $settings['tags'];

        if (empty($tags)) {
            return;
        }
        ?>
        <section class="lg:py-12 py-8">
            <div class="container">
                <div class="w-full lg:w-1/2 mx-auto">
                    <ul class="flex flex-row flex-wrap justify-center items-center gap-3">
                        <?php foreach ($tags as $tag):
                            if (isset($dietary_tags[$tag])):
                                $item = $dietary_tags[$tag];
                                ?>
                                <li class="flex flex-row items-center gap-1">

                                    <p class="w-5 h-5 flex flex-row justify-center items-center text-body-sm text-white rounded-full"
                                       style="background-color: <?= $item['color'] ?>">
                                        <?= $item['symbol'] ?>
                                    </p>
                                    <p class="text-body-sm"><?= $item['label'] ?></p>

                                </li>
                            <?php
                            endif;
                        endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>
        <?php
    }
}