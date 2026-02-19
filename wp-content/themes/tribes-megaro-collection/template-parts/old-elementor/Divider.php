<?php

class Divider extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'divider';
  }

  public function get_title(): string
  {
    return 'Divider';
  }

  public function get_icon(): string
  {
    return 'eicon-justify-center-v';
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
        'icon',
        [
            'label' => esc_html__('Icon', 'megaro'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'media_types' => ['image', 'svg'],
        ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $icon = $settings['icon']['url'];
    ?>
    <section>
      <div class="flex items-center justify-center">
        <div class="h-0.5 w-1/2 bg-[linear-gradient(-90deg,rgb(25,41,89)0%,rgba(25,41,89,0)100%)]"></div>
        <?php if ($icon): ?>
          <div class="bg-white">
            <img class="w-6" src="<?= $icon ?>" alt="divider icon">
          </div>
        <?php endif; ?>
        <div class="h-0.5 w-1/2 bg-[linear-gradient(90deg,rgb(25,41,89)0%,rgba(25,41,89,0)100%)]"></div>
      </div>
    </section>
    <?php
  }
}