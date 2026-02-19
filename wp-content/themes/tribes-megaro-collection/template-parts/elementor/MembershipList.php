<?php

class MembershipList extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'membership_list';
  }

  public function get_title(): string
  {
    return 'Membership List';
  }

  public function get_icon(): string
  {
    return 'eicon-price-list';
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
        'list',
        [
            'label' => esc_html__('List', 'barnham'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name' => 'title',
                    'label' => esc_html__('Title', 'barnham'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'rows' => 10,
                    'default' => '',
                    'placeholder' => esc_html__('Type your description here', 'barnham'),
                ],
                [
                    'name' => 'price',
                    'label' => esc_html__('Price', 'barnham'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'rows' => 10,
                    'default' => '',
                    'placeholder' => esc_html__('Type your description here', 'barnham'),
                ],
                [
                    'name' => 'items',
                    'label' => esc_html__('Items', 'barnham'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => [
                        [
                            'name' => 'text',
                            'label' => esc_html__('Text', 'barnham'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ]
                    ],
                    'default' => [],
                    'title_field' => '{{{ text }}}',
                ],
                [
                    'name' => 'more_text',
                    'label' => esc_html__('More Text', 'barnham'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'rows' => 10,
                    'default' => esc_html__('And More', 'barnham'),
                ],
                [
                    'name' => 'btn_text',
                    'label' => esc_html__('Button Text', 'barnham'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'rows' => 10,
                    'default' => '',
                ],
                [
                    'name' => 'btn_link',
                    'label' => esc_html__('Button Link', 'barnham'),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => ['url', 'is_external', 'nofollow'],
                    'label_block' => true,
                ],
                [
                    'name' => 'bottom_text',
                    'label' => esc_html__('Bottom Text', 'barnham'),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'default' => '',
                ],

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
    $list = $settings['list'];

    ?>
    <section>
      <div class="container">
        <div data-slider="membershipList">
          <div class="swiper md:mb-8 mb-6">
            <div class="swiper-wrapper">

              <?php foreach ($list as $item): ?>
                <div class="swiper-slide">
                  <?php if ($item['title']): ?>
                    <div
                        class="heading-3 bg-primary text-white text-center md:h-28 h-16 flex items-center justify-center px-2 uppercase"
                    >
                      <?= $item['title'] ?>
                    </div>
                  <?php endif; ?>
                  <div class="bg-[#F3F5F8] text-primary md:py-6 py-4">
                    <?php if ($item['price']): ?>
                      <div class="heading-3 text-center px-2 md:mb-3 mb-2 uppercase">
                        <?= $item['price'] ?>
                      </div>
                    <?php endif; ?>
                    <div class="md:mb-6 mb-4">
                      <?php foreach ($item['items'] as $item2): ?>
                        <div class="flex gap-2 border-b border-primary/20 p-3">
                          <div class="md:w-7 w-5 shrink-0">
                            <svg viewBox="0 0 32 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" class="w-full"
                            >
                              <path
                                  d="M16.0003 2.66797C8.66699 2.66797 2.66699 8.66797 2.66699 16.0013C2.66699 23.3346 8.66699 29.3346 16.0003 29.3346C23.3337 29.3346 29.3337 23.3346 29.3337 16.0013C29.3337 8.66797 23.3337 2.66797 16.0003 2.66797ZM13.3337 22.668L6.66699 16.0013L8.54699 14.1213L13.3337 18.8946L23.4537 8.77463L25.3337 10.668L13.3337 22.668Z"
                                  fill="#192959"
                              />
                            </svg>
                          </div>
                          <div class="sub-heading">
                            <?= $item2['text'] ?>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <div class="text-center md:mb-3 mb-2">

                      <?php if ($item['more_text']): ?>
                        <div class="sub-heading font-bold md:mb-8 mb-6 uppercase">
                          <?= $item['more_text'] ?>
                        </div>
                      <?php endif; ?>

                      <?php if ($item['btn_text']): ?>
                        <a
                            href="<?= $item['btn_link']['url'] ?>"
                            target="<?= $item['btn_link']['is_external'] ? '_blank' : '_self' ?>"
                            class="btn-fill"
                        >
                          <?= $item['btn_text'] ?>
                        </a>
                      <?php endif; ?>

                      <?php if ($item['bottom_text']): ?>
                        <div class="sub-heading md:mt-8 mt-6">
                          <?= $item['bottom_text'] ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>

            </div>
          </div>

          <!-- pagination -->
          <div class="slider-pagination flex justify-center"></div>
        </div>
      </div>
    </section>
    <?php
  }
}