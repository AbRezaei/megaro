<?php

class Banner extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'banner';
  }

  public function get_title(): string
  {
    return 'Banner';
  }

  public function get_icon(): string
  {
    return 'eicon-order-start';
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
        'padding',
        [
            'label' => esc_html__('Padding', 'megaro'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'large',
            'options' => [
                'large' => esc_html__('Large', 'megaro'),
                'small' => esc_html__('Small', 'megaro'),
            ]
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
        'subtitle',
        [
            'label' => esc_html__('Subtitle', 'megaro'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'rows' => 10,
        ]
    );
    $this->add_control(
        'btn_text',
        [
            'label' => esc_html__('Button Text', 'megaro'),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]
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
        'image',
        [
            'label' => esc_html__('Choose Image', 'megaro'),
            'type' => \Elementor\Controls_Manager::MEDIA,

        ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();

    $title = $settings['title'];
    $subtitle = $settings['subtitle'];
    $btn_text = $settings['btn_text'];
    $btn_link = $settings['btn_link'];
    $image = $settings['image'];
    $padding = $settings['padding'];
    ?>

    <section class="relative flex items-center overflow-hidden <?= $padding === "large" ? "md:py-48 py-28" : "md:py-24 py-12" ?>">
      <!-- background image -->
      <div class="absolute -z-10 h-full w-full bg-cover bg-center"
           style="background-image: url(<?= $image['url'] ?>)"
      ></div>

      <!-- background overlay -->
      <div class="absolute -z-9 h-full w-full bg-black/50"></div>

      <div class="container">
        <div class="text-center text-white">

          <?php if ($title): ?>
            <div class="heading-1 md:mb-6 mb-4 uppercase"><?= $title ?></div>
          <?php endif; ?>

          <?php if ($subtitle): ?>
            <div class="md:text-xl md:leading-6! md:mb-8 mb-4">
              <?= $subtitle ?>
            </div>
          <?php endif; ?>

          <a
              class="btn-fill-2"
              href="<?= $btn_link['url'] ?>"
              target="<?= $btn_link['is_external'] ? '_blank' : '_self' ?>"
          >
            <?= $btn_text ?>
          </a>
        </div>
      </div>
    </section>
    <?php
  }
}