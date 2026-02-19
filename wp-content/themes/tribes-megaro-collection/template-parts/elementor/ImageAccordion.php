<?php

class ImageAccordion extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'image_accordion';
  }

  public function get_title(): string
  {
    return 'Image Accordion';
  }

  public function get_icon(): string
  {
    return 'eicon-accordion';
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
        'title',
        [
            'label' => esc_html__('Title', 'barnham'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('', 'barnham'),
        ]
    );
    $this->add_control(
        'items',
        [
            'label' => esc_html__('Items', 'barnham'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name' => 'image',
                    'label' => esc_html__('Choose Image', 'barnham'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ],
                [
                    'name' => 'title',
                    'label' => esc_html__('Title', 'barnham'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '',
                    'label_block' => true,
                ],
                [
                    'name' => 'description',
                    'label' => esc_html__('Description', 'barnham'),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
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
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                      // 'custom_attributes' => '',
                    ],
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
    $title = $settings['title'];
    $items = $settings['items'];
    ?>

    <section>
      <div class="container">
        <div class="accordion-slider text-primary" data-slider="imageAccordion">
          <?php if ($title): ?>
            <h2 class="heading-3 lg:mb-1 mb-3 uppercase">
              <?= $title ?>
            </h2>
          <?php endif; ?>
          <div class="flex flex-wrap md:flex-nowrap gap-10">

            <div class="lg:w-1/2 lg:block hidden">
              <div class="w-full">
                <div class="swiper w-full relative lg:h-135">
                  <div class="swiper-wrapper w-full">
                    <?php foreach ($items as $item): ?>
                      <div class="swiper-slide lg:h-full">
                        <div class="aspect-100/74 h-full max-w-full overflow-hidden">
                          <img class="w-full h-full! object-cover object-center rounded-[10px]!"
                               alt="<?= $item['image']['alt'] ?>"
                               src="<?= $item['image']['url'] ?>"
                          >
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>

                  <!-- pagination -->
                  <div class="slider-pagination flex justify-center absolute bottom-4! left-0 z-10 w-full"></div>
                </div>
              </div>

            </div>

            <div class="lg:w-1/2 w-full">
              <div x-data="{openDropdownId : 0}">

                <?php foreach ($items as $index => $item): ?>
                  <div
                      class="<?= $index < count($items) - 1 ? 'border-b border-primary/20' : '' ?>"
                      data-action="change-slide" data-slide="<?= $index ?>"
                  >
                    <div
                        class="flex items-center cursor-pointer gap-2 md:text-xl md:leading-6! font-semibold md:py-3.5 py-2.5"
                        @click="openDropdownId = (openDropdownId === <?= $index ?>) ? -1 :<?= $index ?>"
                    >

                      <span class="heading-3 uppercase"><?= $item['title'] ?></span>

                      <div
                          class="duration-300 ml-auto min-w-fit"
                          :class="{'rotate-180' : openDropdownId === <?= $index ?>}"
                      >
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                             xmlns="http://www.w3.org/2000/svg"
                        >
                          <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15 19.1378L22.2262 11.9134L20.9006 10.5859L15 16.4866L9.10124 10.5859L7.77374 11.9134L15 19.1378Z"
                                fill="black"
                          />
                        </svg>
                      </div>
                    </div>
                    <div
                        x-show="openDropdownId === <?= $index ?>"
                        x-collapse
                        <?= $index != 0 ? 'x-cloak' : '' ?>
                    >
                      <div class="pb-6">

                        <?php if ($item['image']['url']): ?>
                          <img
                              class="lg:hidden block w-full h-auto! object-cover md:mb-4 mb-3 rounded-[10px]!"
                              alt="<?= $item['image']['alt'] ?>"
                              src="<?= $item['image']['url'] ?>"
                          >
                        <?php endif; ?>

                        <?php if ($item['description']): ?>
                          <div class="sub-heading md:mb-8 mb-4 pt-1">
                            <?= $item['description'] ?>
                          </div>
                        <?php endif; ?>

                        <?php if ($item['btn_text']): ?>
                          <a
                              class="btn-fill"
                              href="<?= $item['btn_link']['url'] ?>"
                              target="<?= $item['btn_link']['is_external'] ? '_blank' : '_self' ?>"
                          >
                            <?= $item['btn_text'] ?>
                          </a>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>

              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <?php
  }
}