<?php

class Careers extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'careers';
  }

  public function get_title(): string
  {
    return 'Careers';
  }

  public function get_icon(): string
  {
    return 'eicon-post-list';
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
        'items',
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
                    'name' => 'subtitle',
                    'label' => esc_html__('Subtitle', 'megaro'),
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
                    'name' => 'email',
                    'label' => esc_html__('Email', 'megaro'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => 'housekeeping@megaro-broom.co.uk',
                    'label_block' => true,
                ],
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
    $cards = $settings['items'];
    ?>

    <section>
      <div
          x-data="{activeItem: 'ALL'}"
          class="container"
      >
        <div
            x-data="{isDropdownOpen: false}"
            class="relative md:cursor-default cursor-pointer md:mb-8 mb-6"
        >
          <div
              @click="isDropdownOpen = !isDropdownOpen"
              class="md:hidden flex items-center text-primary border border-primary/20 rounded px-4 py-2"
          >
            <span x-text="activeItem"></span>
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
              x-show="!$store.page.mobileMode  || isDropdownOpen"
              @click.outside="$store.page.mobileMode ? (isDropdownOpen = false) : ''"
              x-collapse
              x-collapse-on-mobile
              x-cloak
              class="md:block! md:!h-auto md:static absolute z-10 top-[calc(100%+2px)] left-0 bg-white md:w-auto w-full lg:text-[28px] md:text-2xl text-primary text-nowrap md:rounded-none rounded md:shadow-none shadow-md md:p-2"
          >
            <div
                x-data="{items: ['ALL', <?php foreach ($tabs as $tab): ?> '<?= strtoupper($tab['title']) ?>', <?php endforeach; ?>]}"
                class="md:flex gap-8 md:divide-y-0 divide-y divide-primary/10 overflow-auto hidden-scrollbar md:p-0 p-2"
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

        <div class="grid grid-cols-12 md:gap-x-8 md:gap-y-8 gap-y-4">
          <?php foreach ($cards as $card):
            $tabs = explode(PHP_EOL, $card['tabs']);
            ?>
            <div
                x-transition
                x-show="(activeItem === 'ALL' <?php foreach ($tabs as $tab): ?> || activeItem === '<?= strtoupper(trim($tab)) ?>'<?php endforeach; ?>)"
                class="xl:col-span-4 md:col-span-6 col-span-full"
            >
              <div class="bg-white h-full flex flex-col text-primary border border-[#D4D4D4] rounded md:p-6 p-4">
                <?php if ($card['title']): ?>
                  <div class="heading-4 md:mb-4 mb-2">
                    <?= $card['title'] ?>
                  </div>
                <?php endif; ?>
                <?php if ($card['subtitle']): ?>
                  <div class="md:text-xl text-sm font-bold md:mb-4 mb-3 uppercase">
                    <?= $card['subtitle'] ?>
                  </div>
                <?php endif; ?>
                <?php if ($card['description']): ?>
                  <div class="md:text-xl text-sm font-medium md:mb-6 mb-4 copy">
                    <?= $card['description'] ?>
                  </div>
                <?php endif; ?>
                <?php if ($card['action']): ?>
                  <div class="flex justify-center mb-2">
                    <a class="btn-fill w-full " href="mailto:<?= $card["email"] ?>">Apply Now</a>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php
  }
}