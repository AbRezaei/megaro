<?php

class ImageContent extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'image_content';
  }

  public function get_title(): string
  {
    return 'Image Content';
  }

  public function get_icon(): string
  {
    return 'eicon-image';
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
        'image',
        [
            'label' => esc_html__('Image', 'megaro'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'media_types' => ['image']
        ]
    );
    $this->add_control(
        'position',
        [
            'label' => esc_html__('Image Position', 'megaro'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'right',
            'options' => [
                'right' => esc_html__('Right', 'megaro'),
                'left' => esc_html__('Left', 'megaro'),
            ]
        ]
    );
    $this->add_control(
        'title',
        [
            'label' => esc_html__('Title', 'megaro'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('', 'megaro'),
        ]
    );
    $this->add_control(
        'description',
        [
            'label' => esc_html__('Description', 'megaro'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
        ]
    );
    $this->add_control(
        'btn_text',
        [
            'label' => esc_html__('Button Text', 'megaro'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('', 'megaro'),
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
        'btn2_text',
        [
            'label' => esc_html__('Button2 Text', 'megaro'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('', 'megaro'),
        ]
    );
    $this->add_control(
        'btn2_link',
        [
            'label' => esc_html__('Button2 Link', 'megaro'),
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
    $image = $settings['image']['url'];
    $image_alt = $settings['image']['alt'];
    $title = $settings['title'];
    $description = $settings['description'];
    $btn_text = $settings['btn_text'];
    $btn_link = $settings['btn_link'];
    $btn2_text = $settings['btn2_text'];
    $btn2_link = $settings['btn2_link'];
    $position = $settings['position'] ? $settings['position'] : 'right';
    ?>

    <section class="relative z-0">
      <div class="max-w-384 mx-auto flex flex-wrap lg:flex-nowrap">

        <div
            class="<?= $position == 'right' ? 'lg:order-1' : 'lg:order-2' ?> order-2 lg:basisi-2/5 basis-full flex flex-col justify-center items-center text-primary text-center xl:px-20 lg:px-16 px-6 lg:py-12 py-6"
        >
          <?php if ($title): ?>
            <h2 class="heading-3 md:mb-5 mb-3 uppercase">
              <?= $title ?>
            </h2>
          <?php endif; ?>
          <?php if ($description): ?>
            <div class="sub-heading md:mb-8 mb-4 copy">
              <?= $description ?>
            </div>
          <?php endif; ?>

          <div class="flex flex-wrap justify-center gap-4">
            <?php if ($btn_text): ?>
              <a href="<?= $btn_link['url'] ?>"
                 target="<?= $btn_link['is_external'] ? '_blank' : '_self' ?>"
                 class="btn-fill"
              >
                <?= $btn_text ?>
              </a>
            <?php endif; ?>

            <?php if ($btn2_text): ?>
              <a href="<?= $btn2_link['url'] ?>"
                 target="<?= $btn2_link['is_external'] ? '_blank' : '_self' ?>"
                 class="btn-outline"
              >
                <?= $btn_text ?>
              </a>
            <?php endif; ?>
          </div>

        </div>

        <?php if ($image): ?>
          <div
              class="<?= $position == 'right' ? 'lg:order-2' : 'lg:order-1' ?> order-1  z-10 lg:basis-3/5 basis-full lg:px-2 lg:min-h-88 grow-0 shrink-0"
          >
            <img class="h-full! w-full object-cover md:rounded-lg!" src="<?= $image ?>" alt="<?= $image_alt ?>">
          </div>
        <?php endif; ?>
      </div>

    </section>
    <?php
  }
}