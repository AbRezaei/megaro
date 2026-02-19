<?php

class OpeningHours extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'opening_hours';
  }

  public function get_title(): string
  {
    return 'Opening Hours';
  }

  public function get_icon(): string
  {
    return 'eicon-posts-grid';
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
        ]
    );

    $this->add_control(
        'items',
        [
            'label' => esc_html__('Items', 'megaro'),
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
                    'label' => esc_html__('Content', 'megaro'),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => '',
                    'show_label' => false,
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
        <div
            x-data="{activeItem: '<?= count($items) > 0 ? strtoupper($items[0]['title']) : '' ?>'}"
            class="bg-primary text-white text-center md:rounded-none rounded-xl! md:py-20 py-7 sm:p-6 px-6"
        >
          <?php if ($title): ?>
            <h2 class="heading-2 md:mb-14 mb-4 uppercase"><?= $title ?></h2>
          <?php endif; ?>

          <div
              x-data="{isDropdownOpen: false}"
              class="md:hidden relative cursor-pointer mb-6"
          >
            <div
                @click="isDropdownOpen = !isDropdownOpen"
                class="flex items-center text-white border border-white rounded px-4 py-2"
            >
              <span class="line-clamp-1 uppercase" x-text="activeItem"></span>
              <div
                  class="w-5 min-w-5 ml-auto"
                  :class="{'rotate-180': isDropdownOpen}"
              >
                <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M15 19.1378L22.2262 11.9134L20.9006 10.5859L15 16.4866L9.10124 10.5859L7.77374 11.9134L15 19.1378Z"
                        fill="#ffffff"
                  />
                </svg>
              </div>
            </div>

            <div
                x-show="isDropdownOpen"
                @click.outside="$store.page.mobileMode ? (isDropdownOpen = false) : isDropdownOpen = isDropdownOpen"
                x-collapse
                x-cloak
                class="absolute z-10 top-[calc(100%+2px)] left-0 bg-white w-full text-primary text-nowrap rounded shadow-md"
            >
              <div
                  x-data="{items: [<?php foreach ($items as $item): ?> '<?= strtoupper($item['title']) ?>', <?php endforeach; ?>]}"
                  class="border-white/20 divide-y-[1px] divide-primary/10 overflow-auto hidden-scrollbar p-2"
              >
                <template x-for="(item, index) in items">
                  <div
                      @click="activeItem = item; isDropdownOpen = false"
                      class="relative cursor-pointer text-left px-2 py-2"
                      :class="{'font-bold!' : activeItem === item}"
                  >
                    <span x-text="item" class="uppercase"></span>
                  </div>
                </template>
              </div>
            </div>
          </div>

          <?php if (count($items) > 0): ?>
            <div class="grid grid-cols-12 md:gap-x-10 lg:gap-y-20 gap-y-14">
              <?php foreach ($items as $item): ?>
                <div
                    x-show="activeItem === '<?= strtoupper($item['title']) ?>'"
                    class="xl:col-span-4 md:col-span-6 col-span-full md:block!"
                >
                  <?php if ($item['title']): ?>
                    <div class="md:block hidden heading-4 mb-4 uppercase">
                      <?= $item['title'] ?>
                    </div>
                  <?php endif; ?>
                  <?php if ($item['description']): ?>
                    <div class="md:text-xl text-sm tracking-tight">
                      <?= $item['description'] ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <?php
  }
}