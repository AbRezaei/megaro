<?php

class SignatureHoles extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'signature_holes';
  }

  public function get_title(): string
  {
    return 'Signature Holes';
  }

  public function get_icon(): string
  {
    return 'eicon-single-page';
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
            'rows' => 10,
            'default' => '',
        ]
    );
    $this->add_control(
        'description',
        [
            'label' => esc_html__('Description', 'barnham'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => '',
        ]
    );
    $this->add_control(
        'image',
        [
            'label' => esc_html__('Choose Image', 'barnham'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );

    $this->add_control(
        'buttons',
        [
            'label' => esc_html__('Buttons', 'barnham'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name' => 'btn_text',
                    'label' => esc_html__('Button Text', 'barnham'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '',
                ],
                [
                    'name' => 'btn_link',
                    'label' => esc_html__('Button URL', 'barnham'),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => ['url', 'is_external', 'nofollow'],
                    'label_block' => true,
                ]
            ],
            'default' => [],
            'title_field' => '{{{ btn_text }}}',
        ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $title = $settings['title'];
    $description = $settings['description'];
    $image = $settings['image'];
    $buttons = $settings['buttons'];
    ?>
    <section>
      <div class="container">
        <div class="grid grid-cols-12 lg:gap-x-10 gap-y-4 text-primary">
          <div class="lg:col-span-6 col-span-full lg:order-first order-last md:text-left text-center flex flex-col justify-center">
            <?php if ($title): ?>
              <div class="heading-2 md:mb-4 mb-2 uppercase">
                <?= $title ?>
              </div>
            <?php endif; ?>
            <?php if ($description): ?>
              <div class="md:text-xl md:leading-6 text-2xl leading-7 md:mb-8 mb-4">
                <?= $description ?>
              </div>
            <?php endif; ?>
            <div class="grid grid-cols-12 gap-2">

              <?php foreach ($buttons as $button): ?>
                <div class="col-span-4">
                  <a href="<?= $button ['btn_link']['url'] ?>"
                     target="<?= $button['btn_link']['is_external'] ? '_blank' : '_self' ?>"
                     class="btn-fill w-full! block"
                  >
                    <?= $button['btn_text'] ?>
                  </a>
                </div>
              <?php endforeach; ?>

            </div>
          </div>
          <div class="lg:col-span-6 col-span-full">
            <?php if ($image['url']): ?>
              <div class="2xl:aspect-2/1 aspect-20/12 h-full! max-w-full md:rounded-md overflow-hidden">
                <img class="h-full! w-full object-cover" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
    <?php
  }
}