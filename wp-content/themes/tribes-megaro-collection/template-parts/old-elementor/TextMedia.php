<?php

class TextMedia extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'text_media';
  }

  public function get_title(): string
  {
    return 'Text Media';
  }

  public function get_icon(): string
  {
    return 'eicon-image';
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
        'mobile_position',
        [
            'label' => esc_html__('Mobile Position', 'megaro'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'top',
            'options' => [
                'top' => esc_html__('Top', 'megaro'),
                'bottom' => esc_html__('Bottom', 'megaro'),
            ],
        ]
    );
    $this->add_control(
        'align',
        [
            'label' => esc_html__('Align Items', 'megaro'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'center',
            'options' => [
                'center' => esc_html__('Center', 'megaro'),
                'top' => esc_html__('Top', 'megaro'),
            ],
        ]
    );
    $this->add_control(
        'icon',
        [
            'label' => esc_html__('Icon', 'megaro'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'media_types' => ['image'],
        ]
    );
    $this->add_control(
        'title',
        [
            'label' => esc_html__('Title', 'megaro'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('', 'megaro'),
        ]
    );
    $this->add_control(
        'description',
        [
            'label' => esc_html__('Description', 'megaro'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
        ]
    );
    $this->add_control(
        'btns',
        [
            'label' => esc_html__('Buttons', 'megaro'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'prevent_empty' => false,
            'fields' => [
                [
                    'name' => 'text',
                    'label' => esc_html__('Text', 'megaro'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '',
                    'label_block' => true,
                ],
                [
                    'name' => 'link',
                    'label' => esc_html__('Link', 'megaro'),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => ['url', 'is_external', 'nofollow'],
                    'label_block' => true,
                ],
                [
                    'name' => 'width',
                    'label' => esc_html__('Width', 'megaro'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'auto' => esc_html__('Auto', 'megaro'),
                        'full' => esc_html__('Full', 'megaro'),
                    ],
                    'default' => 'auto',
                ],
                [
                    'name' => 'type',
                    'label' => esc_html__('Type', 'megaro'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'fill' => esc_html__('Fill', 'megaro'),
                        'outline' => esc_html__('Outline', 'megaro'),
                        'fill_2' => esc_html__('Secondary Fill', 'megaro'),
                    ],
                    'default' => 'fill',
                ],
            ],
            'default' => [],
            'title_field' => '{{{ text }}}',
        ]
    );
    $this->add_control(
        'image',
        [
            'label' => esc_html__('Image', 'megaro'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'media_types' => ['image'],
        ]
    );
    $this->add_control(
        'image2',
        [
            'label' => esc_html__('Image 2', 'megaro'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'media_types' => ['image'],
        ]
    );
    $this->add_control(
        'embedded',
        [
            'label' => esc_html__('Embedded', 'megaro'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'rows' => 10,
        ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $position = $settings['position'] ? $settings['position'] : 'right';
    $icon = $settings['icon']['url'];
    $icon_alt = $settings['icon']['alt'];
    $image = $settings['image']['url'];
    $image_alt = $settings['image']['alt'];
    $image2 = $settings['image2']['url'];
    $image2_alt = $settings['image2']['alt'];
    $title = $settings['title'];
    $description = $settings['description'];
    $btns = $settings['btns'];
    $btns_container = count($btns) > 2 ? 'md:inline-grid grid md:grid-cols-[max-content_max-content]' : 'flex flex-wrap';
    $image_ar = $image2 ? 'aspect-100/110' : "aspect-90/55";
    $embedded = $settings['embedded'];
    $align = $settings['align'];
    $mobile_position = $settings['mobile_position'];
    ?>

    <section>
      <div class="container">
        <div class="grid grid-cols-12 lg:gap-x-10 md:gap-y-10 gap-y-6 <?= $align === "center" ? "items-center" : "" ?>">
          <div
              class="<?= $image2 ? 'xl:col-span-5' : 'lg:col-span-6' ?> col-span-full <?= $position == "right" ? 'lg:order-first' : 'lg:order-last' ?> <?= $mobile_position === "top" ? 'order-last' : 'order-first' ?>"
          >
            <div class="text-primary">
              <?php if ($icon): ?>
                <div class="md:w-6 w-6 mb-4 overflow-hidden">
                  <img class="h-full! w-full object-cover object-center" src="<?= $icon ?>" alt="<?= $icon_alt ?>">
                </div>
              <?php endif; ?>
              <?php if ($title): ?>
                <div class="heading-3 uppercase">
                  <?= $title ?>
                </div>
              <?php endif; ?>

              <?php if ($description): ?>
                <div
                    class="mt-2 leading-6 [&>h3]:md:text-[22px] [&>h3]:text-[16px] [&>h3]:md:leading-8 [&>h3]:font-bold [&>h3]:uppercase [&>h2]:uppercase copy"
                >
                  <?= $description ?>
                </div>
              <?php endif; ?>

              <div class="<?= $btns_container ?> gap-4 md:mt-8 mt-4">

                <?php foreach ($btns as $btn):
                  $class = $btn['width'] === "full" ? 'col-span-2 w-full ' : 'md:inline-flex md:w-auto ';
                  $class .= $btn['type'] === "fill" ? 'btn-fill' : ($btn['type'] === "outline" ? 'btn-outline' : 'btn-fill-2');
                  ?>
                  <a
                      class="<?= $class ?> "
                      href="<?= $btn['link']['url'] ?>"
                      target="<?= $btn['link']['is_external'] ? '_blank' : '_self' ?>"
                  >
                    <?= $btn['text'] ?>
                  </a>
                <?php endforeach; ?>

              </div>
            </div>
          </div>
          <div
              class="<?= $image2 ? 'xl:col-span-7' : 'lg:col-span-6' ?> col-span-full <?= $position == "right" ? 'lg:order-last' : 'lg:order-first' ?> <?= $mobile_position === "top" ? 'order-first' : 'order-last' ?>"
          >

            <?php /*if ($title): */ ?><!--
              <div class="heading-3 uppercase text-primary hidden xl:block mb-4">
                <?php /*= $title */ ?>
              </div>
            --><?php /*endif; */ ?>

            <?php if (!$embedded): ?>
              <div class="flex gap-x-4 <?= $settings['position'] == "right" ? 'xl:justify-end justify-center' : '' ?>">
                <?php if ($image): ?>
                  <div class="<?= $image_ar ?> h-full! max-w-full rounded-md overflow-hidden">
                    <img class="h-full! w-full object-cover object-center" src="<?= $image ?>" alt="<?= $image_alt ?>">
                  </div>
                <?php endif; ?>

                <?php if ($image2): ?>
                  <div class="<?= $image_ar ?> h-full! max-w-full rounded-md overflow-hidden">
                    <img class="h-full! w-full object-cover object-center" src="<?= $image2 ?>"
                         alt="<?= $image2_alt ?>"
                    >
                  </div>
                <?php endif; ?>
              </div>
            <?php else : ?>
              <div>
                <?= $embedded ?>
              </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </section>

    <?php
  }
}
