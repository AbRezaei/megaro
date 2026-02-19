<?php

class IconList extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'icon-list';
  }

  public function get_title(): string
  {
    return 'Icon List';
  }

  public function get_icon(): string
  {
    return 'eicon-gallery-grid';
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
        'title',
        [
            'label' => esc_html__('Title', 'megaro'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'rows' => 10,
            'default' => '',
        ]
    );
    $this->add_control(
        'col',
        [
            'label' => esc_html__('Columns', 'megaro'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                '3' => esc_html__('3', 'megaro'),
                '4' => esc_html__('4', 'megaro'),
            ],
        ]
    );
    $this->add_control(
        'icons',
        [
            'label' => esc_html__('Icons', 'megaro'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name' => 'title',
                    'label' => esc_html__('Title', 'megaro'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '',
                    'label_block' => true,
                ],
                [
                    'name' => 'icon',
                    'label' => esc_html__('Icon', 'megaro'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ],
            ],
            'default' => [
            ],
            'title_field' => '{{{ title }}}',
        ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $title = $settings['title'];
    $icons = $settings['icons'];
    $col = $settings['col'];
    ?>
    <section>
      <div class="container">
        <?php if ($title): ?>
          <div class="heading-2 text-primary text-center mb-10">
            <?= $title ?>
          </div>
        <?php endif; ?>
        <div
            class="flex flex-wrap justify-center md:gap-y-16 gap-y-8 text-primary text-center"
        >
          <?php foreach ($icons as $icon): ?>
            <div class="<?= $col === '4' ? "md:w-1/4 w-1/2" : "md:w-1/3 w-1/2" ?> col-span-1"
            >
              <div class="flex flex-col justify-center items-center">
                <div class="md:size-36! size-20! flex items-center justify-center bg-primary rounded-full! mb-3">
                  <div class="md:w-22.5! w-11.5! p-1 md:p-2 ">
                    <img src="<?= $icon['icon']['url'] ?>" class="w-full h-full! object-contain"
                         alt="<?= $icon['icon']['alt'] ?>"
                    >
                  </div>
                </div>
                <?php if ($icon['title']): ?>
                  <div class="heading-4 uppercase">
                    <?= $icon['title'] ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php
  }
}