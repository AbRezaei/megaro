<?php

class TextSlider extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'text_slider';
  }

  public function get_title(): string
  {
    return 'Text Slider';
  }

  public function get_icon(): string
  {
    return 'eicon-post-slider';
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
        'items',
        [
            'label' => esc_html__('Items', 'barnham'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name' => 'title',
                    'label' => esc_html__('Title', 'barnham'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '',
                    'label_block' => true,
                ],
                [
                    'name' => 'overline',
                    'label' => esc_html__('Overline', 'barnham'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ],
                [
                    'name' => 'description',
                    'label' => esc_html__('Description', 'barnham'),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'rows' => 10,
                ],
                [
                    'name' => 'btn_text',
                    'label' => esc_html__('Button Text', 'barnham'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ],
                [
                    'name' => 'btn_link',
                    'label' => esc_html__('Button Link', 'barnham'),
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
    $items = $settings['items'];
    ?>
    <section>
      <div class="container relative z-0">
        <div class="" data-slider="text">
          <div class="swiper md:mb-10 mb-6">
            <div class="swiper-wrapper">

              <?php foreach ($items as $item): ?>
                <div class="swiper-slide">
                  <div class="text-primary text-center pb-4 px-4 md:px-0">

                    <?php if ($item['overline']): ?>
                      <div class="md:text-xl font-bold md:mb-4 mb-2 uppercase"><?= $item['overline'] ?></div>
                    <?php endif; ?>

                    <?php if ($item['title']): ?>
                      <div class="heading-2 md:mb-4 mb-2 uppercase"><?= $item['title'] ?></div>
                    <?php endif; ?>

                    <?php if ($item['description']): ?>
                      <div class="sub-heading max-w-93.75 mx-auto md:mb-8 mb-4">
                        <?= $item['description'] ?>
                      </div>
                    <?php endif; ?>

                    <?php if ($item['btn_text']): ?>
                      <a
                          class="btn-outline"
                          href="<?= $item['btn_link']['url'] ?>"
                          target="<?= $item['btn_link']['is_external'] ? '_blank' : '_self' ?>"
                      >
                        <?= $item['btn_text'] ?>
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
          <div class="">
            <button
                class="slide-prev block absolute z-10 top-1/2 -translate-y-1/2 md:w-13.5 w-8 left-1 bg-white disabled:opacity-50 cursor-pointer rounded-full"
            >
              <svg width="54" height="54" viewBox="0 0 54 54" fill="none"
                   xmlns="http://www.w3.org/2000/svg" class="w-full"
              >
                <path d="M29.25 19.125L21.375 27L29.25 34.875" stroke="#192959" stroke-width="3"
                      stroke-linecap="round" stroke-linejoin="round"
                />
                <path
                    d="M27 49.5C14.5733 49.5 4.5 39.4267 4.5 27C4.5 14.5733 14.5733 4.5 27 4.5C39.4267 4.5 49.5 14.5733 49.5 27C49.5 39.4267 39.4267 49.5 27 49.5Z"
                    stroke="#192959" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                />
              </svg>
            </button>
            <button
                class="slide-next block  absolute z-10 top-1/2 -translate-y-1/2 md:w-13.5 w-8 right-1 bg-white disabled:opacity-50 cursor-pointer rounded-full"
            >
              <svg width="54" height="54" viewBox="0 0 54 54" fill="none"
                   xmlns="http://www.w3.org/2000/svg" class="w-full"
              >
                <path d="M24.75 19.125L32.625 27L24.75 34.875" stroke="#192959" stroke-width="3"
                      stroke-linecap="round" stroke-linejoin="round"
                />
                <path
                    d="M27 49.5C39.4267 49.5 49.5 39.4267 49.5 27C49.5 14.5733 39.4267 4.5 27 4.5C14.5733 4.5 4.5 14.5733 4.5 27C4.5 39.4267 14.5733 49.5 27 49.5Z"
                    stroke="#192959" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
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