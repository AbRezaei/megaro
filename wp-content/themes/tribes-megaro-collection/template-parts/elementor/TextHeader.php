<?php

class TextHeader extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'textHeader';
  }

  public function get_title(): string
  {
    return 'Text Header';
  }

  public function get_icon(): string
  {
    return 'eicon-columns';
  }

  public function get_categories(): array
  {
    return ['barnham'];
  }

  protected function register_controls()
  {
    $this->start_controls_section(
        'section_content',
        [
            'label' => esc_html__('Content', 'barnham'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'icon',
        [
            'label' => esc_html__('Icon', 'barnham'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'media_types' => ['image', 'svg'],
        ]
    );
    $this->add_control(
        'title',
        [
            'label' => esc_html__('Title', 'barnham'),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]
    );
    $this->add_control(
        'overline',
        [
            'label' => esc_html__('Overline', 'barnham'),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]
    );
    $this->add_control(
        'text',
        [
            'label' => esc_html__('Text', 'barnham'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'rows' => 10,
        ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $icon = $settings['icon']['url'];
    $title = $settings['title'];
    $overline = $settings['overline'];
    $text = $settings['text'];
    ?>

    <section>
      <div class="container">
        <div class="text-center text-primary">
          <?php if ($icon): ?>
            <img src="<?= $icon ?>" class="block mx-auto w-11 mb-4" alt="icon">
          <?php endif; ?>

          <?php if ($overline): ?>
            <div class="sub-heading font-bold! md:mb-3 mb-2 uppercase">
              <?= $overline ?>
            </div>
          <?php endif; ?>

          <?php if ($title): ?>
            <h2 class="heading-2 md:mb-5 mb-4 uppercase">
              <?= $title ?>
            </h2>
          <?php endif; ?>

          <?php if ($text): ?>
            <div class="sub-heading max-w-3xl mx-auto copy">
              <?= $text ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <?php
  }
}