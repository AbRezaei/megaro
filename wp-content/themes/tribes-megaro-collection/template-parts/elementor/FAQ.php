<?php

class FAQ extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'faq';
  }

  public function get_title(): string
  {
    return 'FAQ';
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
        'title',
        [
            'label' => esc_html__('Title', 'megaro'),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]
    );
    $this->add_control(
        'overline',
        [
            'label' => esc_html__('Overline', 'megaro'),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]
    );
    $this->add_control(
        'description',
        [
            'label' => esc_html__('Description', 'megaro'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'rows' => 10,
        ]
    );
    $this->add_control(
        'btn_text',
        [
            'label' => esc_html__('Button Text', 'megaro'),
            'type' => \Elementor\Controls_Manager::TEXT,
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
        'faq_items',
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
                    'name' => 'content',
                    'label' => esc_html__('Content', 'megaro'),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => '',
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
    $title = $settings['title'];
    $overline = $settings['overline'];
    $description = $settings['description'];
    $btn_text = $settings['btn_text'];
    $btn_link = $settings['btn_link'];
    $faq_items = $settings['faq_items'];
    ?>

    <section>
      <div class="container">
        <div class="grid grid-cols-12 md:gap-10 gap-y-6 justify-between">
          <div class="md:col-span-5 col-span-full">
            <div class="text-primary">

              <?php if ($overline): ?>
                <div class="md:text-xl font-bold md:mb-4 mb-2">
                  <?= $overline ?>
                </div>
              <?php endif; ?>

              <?php if ($title): ?>
                <div class="heading-2 md:mb-4 mb-2 uppercase">
                  <?= $title ?>
                </div>
              <?php endif; ?>

              <?php if ($description): ?>
                <div class="sub-heading md:mb-8 mb-4 md:pr-12">
                  <?= $description ?>
                </div>
              <?php endif; ?>

              <?php if ($btn_text): ?>
                <a href="<?= $btn_link['url'] ?>"
                   class="btn-outline"
                >
                  <?= $btn_text ?>
                </a>
              <?php endif; ?>
            </div>
          </div>
          <div class="md:col-span-7 col-span-full text-primary">

            <?php
            foreach ($faq_items as $index => $item):?>

              <div class="border-t  border-primary/20 <?= $index + 1 == count($faq_items) ? 'md:border-b' : '' ?>"
                   x-data="{questionIsOpen: false}"
              >
                <div
                    class="flex items-center cursor-pointer md:text-xl md:leading-6! font-semibold md:py-3.5 py-2.5"
                    @click="questionIsOpen = !questionIsOpen"
                >
                  <span><?= $item['title'] ?></span>
                  <div
                      class="duration-300! ml-auto min-w-fit"
                      :class="{'rotate-180' : questionIsOpen}"
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
                    x-show="questionIsOpen"
                    @click.outside="questionIsOpen = false"
                    x-collapse
                    x-cloak
                >
                  <div class="md:text-base text-sm font-medium pb-3.5">
                    <?= $item['content'] ?>
                  </div>
                </div>
              </div>

            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
    <?php
  }
}