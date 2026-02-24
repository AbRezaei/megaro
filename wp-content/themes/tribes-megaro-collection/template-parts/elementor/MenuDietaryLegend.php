<?php

class MenuDietaryLegend extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'menu-dietary-legend';
    }

    public function get_title(): string
    {
        return 'Menu Dietary Legend';
    }

    public function get_icon(): string
    {
        return 'eicon-bullet-list';
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

        $tags_data = self::get_dietary_tags_list();
        $tag_options = [];
        foreach ($tags_data as $key => $data) {
            $tag_options[$key] = $data['label'];
        }

        $this->add_control(
            'legends',
            [
                'label' => esc_html__('Select Legends to Show', 'megaro'),
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
        $legends = $settings['legends'];
        $all_tags = self::get_dietary_tags_list();

        if (empty($legends)) {
            return;
        }
        ?>
        <section class="lg:py-12 py-8">
            <div class="container">
                <div class="w-full lg:w-1/2 mx-auto">
                    <ul class="flex flex-row flex-wrap justify-center items-center gap-3">
                        <?php foreach ($legends as $legend):
                            if (isset($all_tags[$legend])):
                                $tag = $all_tags[$legend];
                                ?>
                                <li class="flex flex-row items-center gap-1">

                                    <p class="w-5 h-5 flex flex-row justify-center items-center text-body-sm text-white rounded-full"
                                       style="background-color: <?= $tag['color'] ?>">
                                        <?= $tag['symbol'] ?>
                                    </p>
                                    <p class="text-body-sm"><?= $tag['label'] ?></p>

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