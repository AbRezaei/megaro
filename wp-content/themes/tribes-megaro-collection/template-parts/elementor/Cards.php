<?php

class Cards extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'cards';
  }

  public function get_title(): string
  {
    return 'Cards';
  }

  public function get_icon(): string
  {
    return 'eicon-form-vertical';
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
        'cards',
        [
            'label' => esc_html__('Cards', 'megaro'),
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
                    'name' => 'description',
                    'label' => esc_html__('Title', 'megaro'),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => '',
                    'label_block' => true,
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
                [
                    'name' => 'btn_text',
                    'label' => esc_html__('Button Text', 'megaro'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ],
                [
                    'name' => 'btn_link',
                    'label' => esc_html__('Button Link', 'megaro'),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => ['url', 'is_external', 'nofollow'],
                    'label_block' => true,
                ]

            ],
            'default' => [],
            'title_field' => '{{{ title }}}',
        ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $cards = $settings['cards'];
    ?>

    <section>
      <div class="md:container">
        <div class="relative z-0" data-slider="card">
          <div class="swiper w-full md:mb-12 mb-6">
            <div class="swiper-wrapper pb-4">
              <?php foreach ($cards as $card): ?>
                <div
                    class="swiper-slide md:px-0 px-2"
                >
                  <div class="text-center">

                    <?php if ($card['title'] && $card['description']): ?>
                      <div class="heading-4 text-primary whitespace-nowrap md:mb-6 mb-2 uppercase">
                        <?= $card['title'] ?>
                      </div>
                    <?php endif; ?>

                    <div class="aspect-76/100! rounded-md overflow-hidden md:mb-6 mb-3">
                      <img class="h-full! w-full!" src="<?= $card['image']['url'] ?>"
                           alt="<?= $card['image']['alt'] ?>"
                      >
                    </div>

                    <?php if ($card['description']): ?>
                      <div class="sub-heading text-primary text-left md:mb-8 mb-4">
                        <?= $card['description'] ?>
                      </div>
                    <?php elseif ($card['title']): ?>
                      <div class="heading-4 line-clamp-1 text-primary md:mb-8 mb-4 uppercase">
                        <?= $card['title'] ?>
                      </div>
                    <?php endif; ?>



                    <?php if ($card['btn_text']): ?>
                      <a
                          class="btn-fill <?= $card['description'] ? 'w-full inline-block' : '' ?>"
                          href="<?= $card['btn_link']['url'] ?>"
                          target="<?= $card['btn_link']['is_external'] ? '_blank' : '_self' ?>"
                      >
                        <?= $card['btn_text'] ?>
                      </a>
                    <?php endif; ?>

                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- pagination -->
          <div class="slider-pagination flex justify-center"></div>


          <!-- navigation -->
          <div class="lg:hidden">
            <button
                class="slide-prev block w-9 absolute z-10 left-4 top-1/2 -translate-y-1/2 translat- disabled:scale-0 cursor-pointer rounded-full"
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
                class="slide-next block w-9 absolute z-10 right-4 top-1/2 -translate-y-1/2 disabled:scale-0 cursor-pointer rounded-full"
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
      </div>
    </section>

    <?php
  }
}