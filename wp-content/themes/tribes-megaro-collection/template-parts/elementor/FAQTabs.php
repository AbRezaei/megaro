<?php

class FAQTabs extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'faq_tabs';
  }

  public function get_title(): string
  {
    return 'FAQ Tabs';
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
        'tabs',
        [
            'label' => esc_html__('Tabs', 'megaro'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name' => 'title',
                    'label' => esc_html__('Title', 'megaro'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '',
                    'label_block' => true,
                ],
            ],
            'title_field' => '{{{ title }}}',
        ]
    );

    $this->add_control(
        'faq_items',
        [
            'label' => esc_html__('Items', 'megaro'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name' => 'tabs',
                    'label' => esc_html__('Tabs', 'megaro'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '',
                    'description' => esc_html__('Enter tab title(s). Use comma to assign multiple tabs.', 'megaro'),
                ],
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
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                ]
            ],
            'default' => [
            ],
            'title_field' => '{{{ title }}}',
        ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $tabs = $settings['tabs'];
    $faq_items = $settings['faq_items'];
    ?>

    <section>
      <div
          x-data="{ activeItem: 'all'}"
          class="container text-primary "
      >
        <div
            x-data="{isDropdownOpen: false}"
            class="relative md:cursor-default cursor-pointer md:mb-16 mb-6"
        >
          <div
              @click="isDropdownOpen = !isDropdownOpen"
              class="md:hidden flex items-center border border-primary/20 rounded px-4 py-2"
          >
            <span x-text="activeItem" class="uppercase"></span>
            <div
                class="w-5 size-5 inline-flex items-center justify-center min-w-5 duration-300 ml-auto"
                :class="{'rotate-180': isDropdownOpen}"
            >
              <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M15 19.1378L22.2262 11.9134L20.9006 10.5859L15 16.4866L9.10124 10.5859L7.77374 11.9134L15 19.1378Z"
                      fill="#192959"
                />
              </svg>
            </div>
          </div>

          <div
              x-show="!$store.page.mobileMode || isDropdownOpen"
              @click.outside="$store.page.mobileMode ? (isDropdownOpen = false) : '' ;"
              x-collapse
              x-cloak
              x-collapse-on-mobile
              class="md:block! md:h-auto! md:static absolute z-10 top-[calc(100%+2px)] left-0 bg-white md:w-auto w-full lg:text-[28px] md:text-2xl text-primary text-nowrap md:rounded-none rounded md:shadow-none shadow-md md:p-2"
          >

            <div
                x-data="{items: ['all', <?php foreach ($tabs as $tab): ?> '<?= strtolower($tab['title']) ?>', <?php endforeach; ?>]}"
                class="md:flex flex-wrap gap-8 md:gap-y-4 justify-center md:divide-y-0 divide-y divide-primary/10 overflow-auto hidden-scrollbar md:p-0 p-2"
            >
              <template x-for="(item, index) in items">
                <div
                    @click="activeItem = item; $store.page.mobileMode ? (isDropdownOpen = false) : ''"
                    class="relative cursor-pointer px-2 py-2"
                    :class="{'font-bold!' : activeItem === item}"
                >
                  <span x-text="item" class="uppercase"></span>
                  <div
                      class="md:block hidden absolute -bottom-px -left-0.5 w-[calc(100%+4px)] bg-primary h-1.5 opacity-0 duration-300"
                      :class="{'opacity-100!' : activeItem === item}"
                  >
                  </div>
                </div>
              </template>
            </div>
          </div>
        </div>

        <div x-data="{openIndex: -1}" class="max-w-5xl md:border-t border-primary/20 mx-auto relative">

          <?php foreach ($faq_items as $i => $item):
            $tabs = preg_split('/[\r\n,]+/', (string)($item['tabs'] ?? ''));
            $tabs = array_filter(array_map(static function ($tab) {
              return strtolower(trim($tab));
            }, $tabs));
            ?>
            <div
                class="border-b border-primary/20"
                x-show="(activeItem === 'all'<?php foreach ($tabs as $tab): ?> || activeItem === '<?= esc_attr($tab) ?>'<?php endforeach; ?>)"
                x-transition
            >
              <div
                  class="flex items-center cursor-pointer md:text-xl font-semibold py-2"
                  @click="openIndex = (openIndex === <?= $i ?>) ? -1 : <?= $i ?>"
              >
                <span><?= $item['title'] ?></span>

                <div
                    class="ml-auto duration-300"
                    :class="{'rotate-180' : openIndex === <?= $i ?>}"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M14.9997 19.1378L22.2259 11.9134L20.9003 10.5859L14.9997 16.4866L9.10094 10.5859L7.77344 11.9134L14.9997 19.1378Z"
                          fill="rgb(25, 41, 89)"
                    />
                  </svg>

                </div>
              </div>

              <div x-show="openIndex === <?= $i ?>" x-collapse x-cloak>
                <div class="text-sm pb-4">
                  <?= $item['content'] ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </section>
    <?php
  }
}
