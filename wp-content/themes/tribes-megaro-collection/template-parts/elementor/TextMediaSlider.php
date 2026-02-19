<?php

class TextMediaSlider extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'text_media_slider';
  }

  public function get_title(): string
  {
    return 'Text Media Slider';
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
        'items',
        [
            'label' => esc_html__('Items', 'megaro'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name' => 'image',
                    'label' => esc_html__('Choose Image', 'megaro'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ],
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
                    'name' => 'btns',
                    'label' => esc_html__('Buttons', 'megaro'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
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
    $items = $settings['items'];
    $image_ar = "aspect-90/55";


    ?>

    <section>
      <div class="container relative z-0">
        <div class="" data-slider="textMedia">
          <div class="swiper md:mb-10 mb-6">
            <div class="swiper-wrapper">
              <?php foreach ($items as $item): ?>
                <?php
                $image = $item['image']['url'];
                $image_alt = $item['image']['alt'];
                $title = $item['title'];
                $description = $item['description'];
                $btns = $item['btns'];
                $btns_container = count($btns) > 2 ? 'md:inline-grid grid md:grid-cols-[max-content_max-content]' : 'flex flex-wrap';
                ?>
                <div class="swiper-slide">
                  <div class="grid grid-cols-12 lg:gap-x-10 md:gap-y-10 gap-y-6 items-center">
                    <div
                        class="lg:col-span-6 col-span-full xl:order-first order-last"
                    >
                      <div class="text-primary">
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
                        class="lg:col-span-6 col-span-full xl:order-last order-first"
                    >
                      <div class="flex gap-x-4 xl:justify-end justify-center">
                        <?php if ($image): ?>
                          <div class="<?= $image_ar ?> h-full! max-w-full rounded-md overflow-hidden">
                            <img class="h-full! w-full object-cover object-center" src="<?= $image ?>"
                                 alt="<?= $image_alt ?>"
                            >
                          </div>
                        <?php endif; ?>
                      </div>
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
