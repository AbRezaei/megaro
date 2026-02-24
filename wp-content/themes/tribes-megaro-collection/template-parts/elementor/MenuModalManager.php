<?php

class MenuModalManager extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'menu-modal-manager';
    }

    public function get_title(): string
    {
        return 'Menu Modal Manager';
    }

    public function get_icon(): string
    {
        return 'eicon-form-horizontal';
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
                'label' => esc_html__('Modal Settings', 'megaro'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_bg_color_control();
        $this->add_text_color_control();

        $this->add_control(
            'show_modal_list',
            [
                'label' => esc_html__('Show Modal List?', 'megaro'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'megaro'),
                'label_off' => esc_html__('Hide', 'megaro'),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => esc_html__('Turn off if you only want to load modals in the background for other buttons.', 'megaro'),
            ]
        );

        $elementor_templates = get_posts([
            'post_type' => 'elementor_library',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ]);

        $template_options = ['' => esc_html__('Select a Template', 'megaro')];
        if (!empty($elementor_templates) && !is_wp_error($elementor_templates)) {
            foreach ($elementor_templates as $template) {
                $template_options[$template->ID] = $template->post_title;
            }
        }

        $this->add_control(
            'modals',
            [
                'label' => esc_html__('Menus / Modals', 'megaro'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__('Menu Title', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'label_block' => true,
                    ],
                    [
                        'name' => 'id',
                        'label' => esc_html__('Unique Modal ID', 'megaro'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'description' => esc_html__(
                            'Example: breakfast. Open this modal from ANY button by setting its link to #modal-breakfast',
                            'megaro'
                        ),
                    ],
                    [
                        'name' => 'template',
                        'label' => esc_html__('Modal Content (Template)', 'megaro'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'options' => $template_options,
                        'default' => '',
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_color = $settings['bg_color'];
        $text_color = $settings['text_color'];
        $show_modal_list = $settings['show_modal_list'];
        $modals = $settings['modals'];

        if (empty($modals)) return;
        ?>
        <div x-data="menuModals()">

            <?php if ($show_modal_list === 'yes'): ?>
                <section class="<?= $bg_color ?> <?= $text_color ?> lg:py-24 py-16">
                    <div class="container">
                        <ul>
                            <?php foreach ($modals as $modal): ?>
                                <li class="py-4 text-center border-b border-black/20">
                                    <a href="#modal-<?= $modal['id'] ?>"
                                       class="text-heading-4 hover:opacity-70"><?= $modal['title'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </section>
            <?php endif; ?>
            <template x-teleport="body">
                <div>
                    <?php foreach ($modals as $modal):if (empty($modal['id']) || empty($modal['template'])) continue; ?>
                        <div x-bind="dialogue"
                             x-cloak
                             data-modal-id="#modal-<?= $modal['id'] ?>"
                             class="fixed inset-0 z-30 bg-secondary overflow-y-auto">
                            <div class="lg:py-10 py-8">

                                <div class="container">
                                    <div class="flex flex-row justify-end hover:opacity-70 mb-4">
                                        <button x-bind="close">
                                            <img src="<?= get_template_directory_uri() ?>/assets/img/svg/close-square-black.svg"
                                                 alt="Close icon"
                                                 class="w-12! h-12!">
                                        </button>
                                    </div>
                                </div>
                                <?php echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($modal['template']); ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </template>

        </div>
        <?php
    }
}