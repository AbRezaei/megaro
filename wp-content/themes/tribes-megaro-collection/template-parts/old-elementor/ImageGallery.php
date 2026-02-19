<?php

class ImageGallery extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'image_gallery';
  }

  public function get_title(): string
  {
    return 'Image Gallery';
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
            'default' => '',
        ]
    );
    $this->add_control(
        'description',
        [
            'label' => esc_html__('Description', 'megaro'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'rows' => 10,
            'default' => '',
        ]
    );
    $this->add_control(
        'images',
        [
            'label' => esc_html__('Images', 'megaro'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name' => 'title',
                    'label' => esc_html__('Title', 'megaro'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '',
                ],
                [
                    'name' => 'image',
                    'label' => esc_html__('Image', 'megaro'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'media_types' => ['image'],
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




    $this->add_control(
        'images',
        [
            'label' => esc_html__('Images', 'megaro'),
            'type' => \Elementor\Controls_Manager::GALLERY,
            'show_label' => false,
            'default' => [],
        ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $title = $settings['title'];
    $description = $settings['description'];
    $images = $settings['images'];
    ?>

    <section data-slider="gallery">
      <div class="max-w-384 mx-auto">
        <div class="text-primary text-center lg:mb-12 md:mb-8 mb-6">
          <?php if ($title): ?>
            <h2 class="heading-2 md:mb-3 mb-2 uppercase">
              <?= $title ?>
            </h2>
          <?php endif; ?>
          <?php if ($description): ?>
            <div class="sub-heading px-4">
              <?= $description ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="slider relative z-0">
        <div class="swiper w-full max-w-384">
          <div class="swiper-wrapper">
            <?php foreach ($images as $item): ?>
              <div class="swiper-slide xl:w-1/4! md:w-2/5! w-60! max-w-112.5 md:px-3 px-2">
                <div class="aspect-80/100!">
                  <img class="w-full! h-full! object-cover object-center rounded-md!"
                       src="<?= $item['image']['url'] ?>" alt="<?= $item['image']['alt'] ?>"
                  >
                </div>
                <div class="text-center md:text-[22px] text-[16px] text-primary md:mt-6 mt-3"><?= $item['title'] ?></div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- navigation -->
        <div class="md:hidden">
          <button
              class="block slide-prev absolute z-10 top-1/2 -translate-y-1/2 xl:w-13.5 w-9 left-4 disabled:scale-0 cursor-pointer rounded-full"
          >
            <svg viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M29.25 19.125L21.375 27L29.25 34.875" stroke="#ffffff" stroke-width="3"
                    stroke-linecap="round" stroke-linejoin="round"
              />
              <path
                  d="M27 49.5C14.5733 49.5 4.5 39.4267 4.5 27C4.5 14.5733 14.5733 4.5 27 4.5C39.4267 4.5 49.5 14.5733 49.5 27C49.5 39.4267 39.4267 49.5 27 49.5Z"
                  stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
              />
            </svg>
          </button>
          <button
              class="block slide-next absolute z-10 top-1/2 -translate-y-1/2 xl:w-13.5 w-9 right-4 disabled:scale-0 cursor-pointer rounded-full"
          >
            <svg viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M24.75 19.125L32.625 27L24.75 34.875" stroke="#ffffff" stroke-width="3"
                    stroke-linecap="round" stroke-linejoin="round"
              />
              <path
                  d="M27 49.5C39.4267 49.5 49.5 39.4267 49.5 27C49.5 14.5733 39.4267 4.5 27 4.5C14.5733 4.5 4.5 14.5733 4.5 27C4.5 39.4267 14.5733 49.5 27 49.5Z"
                  stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
              />
            </svg>
          </button>
        </div>
      </div>
    </section>
    <?php
  }
}