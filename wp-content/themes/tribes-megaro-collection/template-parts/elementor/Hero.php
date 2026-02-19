<?php

class Hero extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'hero';
  }

  public function get_title(): string
  {
    return 'Hero';
  }

  public function get_icon(): string
  {
    return 'eicon-image-hotspot';
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
        'height',
        [
            'label' => esc_html__('Height', 'elementor'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'full',
            'options' => [
                'full' => esc_html__('Full', 'elementor'),
                '80' => esc_html__('80%', 'elementor'),
            ],
        ]
    );

    $this->add_control(
        'image',
        [
            'label' => esc_html__('Image', 'barnham'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'media_types' => ['image']
        ]
    );
    $this->add_control(
        'title',
        [
            'label' => esc_html__('Title', 'barnham'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'rows' => 10,
        ]
    );
    $this->add_control(
        'btn_text',
        [
            'label' => esc_html__('Button Text', 'barnham'),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]
    );
    $this->add_control(
        'btn_link',
        [
            'label' => esc_html__('Button Link', 'barnham'),
            'type' => \Elementor\Controls_Manager::URL,
            'options' => ['url', 'is_external', 'nofollow'],
            'label_block' => true,
        ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $height = $settings['height'];
    $hero_image = $settings['image']['url'];
    $title = $settings['title'];
    $btn_text = $settings['btn_text'];
    $btn_link = $settings['btn_link'];
    ?>
    <section class="relative">
      <?php if ($hero_image): ?>
        <!-- background image -->
        <div class="absolute -z-10 h-full w-full bg-cover bg-center"
             style="background-image: url('<?= $hero_image ?>')"
        ></div>
      <?php endif; ?>

      <!-- background overlay -->
      <div class="absolute -z-9 h-full w-full <?= $hero_image ? 'bg-black/30' : 'bg-black/60' ?>"></div>

      <div class="container text-white">
        <div
            class="flex flex-col justify-center <?= $height == "full" ? 'md:min-h-[100vh]' : 'md:min-h-[80vh]' ?> min-h-[50vh]"
        >
          <div class="w-full text-center md:pt-[30%] pt-[40%]">
            <?php if ($title): ?>
              <div class="heading-1">
                <?= $title ?>
              </div>
            <?php endif; ?>

            <?php if ($btn_text): ?>
              <a
                  href="<?= $btn_link['url'] ?>"
                  target="<?= $btn_link['is_external'] ? '_blank' : '_self' ?>"
                  class="btn-fill inline-block md:mt-8 mt-4"
              >
                <?= $btn_text ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>

    </section>

    <?php
  }
}
