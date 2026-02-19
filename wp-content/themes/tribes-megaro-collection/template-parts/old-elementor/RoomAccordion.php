<?php

class RoomAccordion extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'room_accordion';
  }

  public function get_title(): string
  {
    return 'Room Accordion';
  }

  public function get_icon(): string
  {
    return 'eicon-accordion';
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
        'position',
        [
            'label' => esc_html__('Image Position', 'megaro'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'right',
            'options' => [
                'right' => esc_html__('Right', 'megaro'),
                'left' => esc_html__('Left', 'megaro'),
            ],
        ]
    );
    $this->add_control(
        'images',
        [
            'label' => esc_html__('Images', 'megaro'),
            'type' => \Elementor\Controls_Manager::GALLERY,
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
        'tags',
        [
            'label' => esc_html__('Tags', 'megaro'),
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
                    'name' => 'content',
                    'label' => esc_html__('Content', 'megaro'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '',
                    'show_label' => false,
                ]
            ],
            'default' => [
            ],
            'title_field' => '{{{ title }}}',
        ]
    );
    $this->add_control(
        'items',
        [
            'label' => esc_html__('Accordion Items', 'megaro'),
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
                    'label' => esc_html__('Description', 'megaro'),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
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
    $items = $settings['items'];
    $image_position = $settings['position'];
    $images = $settings['images'];
    $title = $settings['title'];
    $tags = $settings['tags'];
    ?>

    <section>
      <div class="container">
        <div class="accordion-slider text-primary" data-slider="imageAccordion">

          <div class="mb-4 hidden lg:block w-1/2 <?= $image_position == 'right' ? 'ml-auto' : '' ?> ">
            <?php if ($title): ?>
              <div class="heading-2 mb-4 uppercase"><?= $title ?></div>
            <?php endif; ?>

            <?php if ($tags): ?>

              <div class="flex flex-wrap items-center gap-x-6 gap-y-2 ">
                <?php foreach ($tags as $index => $tag): ?>

                  <div
                      class="flex items-center gap-2 flex-wrap"
                  >
                    <span class="font-bold text-sm md:text-xl uppercase "><?= $tag['title'] ?>: </span>
                    <span class="font-medium text-sm md:text-lg "><?= $tag['content'] ?></span>
                  </div>

                  <?php if ($index < count($tags) - 1): ?>
                    <div class="w-0.5 h-4 bg-primary"></div>
                  <?php endif; ?>

                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="flex flex-wrap lg:flex-nowrap gap-10">

            <div class="<?= $image_position == 'right' ? 'lg:order-2' : '' ?> order-1 lg:w-1/2 w-full">
              <div class="w-full">
                <div class="swiper w-full relative lg:h-135">
                  <div class="swiper-wrapper w-full">
                    <?php foreach ($images as $image): ?>
                      <div class="swiper-slide lg:h-full">
                        <div class="aspect-100/74 h-full! max-w-full! overflow-hidden">
                          <img class="w-full! h-full! object-cover object-center rounded-[10px]!"
                               alt="<?= $image['alt'] ?>"
                               src="<?= $image['url'] ?>"
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

            <div class="<?= $image_position == 'right' ? 'lg:order-1' : '' ?> order-2 lg:w-1/2 w-full">

              <div class="mb-3 lg:hidden block">

                <?php if ($title): ?>
                  <span class="heading-2 uppercase mb-2"><?= $title ?></span>
                <?php endif; ?>

                <?php if ($tags): ?>

                  <div class="flex flex-wrap items-center gap-x-3 gap-y-2 ">
                    <?php foreach ($tags as $index => $tag): ?>

                      <div
                          class="flex items-center gap-2 flex-wrap"
                      >
                        <span class="font-bold text-sm md:text-xl uppercase "><?= $tag['title'] ?>: </span>
                        <span class="font-medium text-sm md:text-lg "><?= $tag['content'] ?></span>
                      </div>

                      <?php if ($index < count($tags) - 1): ?>
                        <div class="w-0.5 h-4 bg-primary"></div>
                      <?php endif; ?>

                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>

              </div>

              <div x-data="{openDropdownId : 0}">

                <?php foreach ($items as $index => $item): ?>
                  <div
                      class="<?= $index < count($items) - 1 ? 'border-b border-primary/20' : '' ?>"
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
                        <svg
                            width="30" height="30" viewBox="0 0 30 30" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                              fill-rule="evenodd" clip-rule="evenodd"
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

                        <?php if ($item['description']): ?>
                          <div class="sub-heading md:mb-5 mb-3 pt-1 room-copy">
                            <?= $item['description'] ?>
                          </div>
                        <?php endif; ?>

                        <?php if ($item['btn_text']): ?>
                          <a
                              class="btn-fill inline-block mt-6"
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