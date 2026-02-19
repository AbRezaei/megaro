<?php

class Contact extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'contact';
  }

  public function get_title(): string
  {
    return 'Contact';
  }

  public function get_icon(): string
  {
    return 'eicon-site-identity';
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
        ]
    );
    $this->add_control(
        'contacts',
        [
            'label' => esc_html__('Contact List', 'barnham'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name' => 'text',
                    'label' => esc_html__('Text', 'barnham'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '',
                    'label_block' => true,
                ],
                [
                    'name' => 'icon',
                    'label' => esc_html__('Icon', 'barnham'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [],
                ],
                [
                    'name' => 'link',
                    'label' => esc_html__('Link', 'barnham'),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => ['url', 'is_external', 'nofollow'],
                    'label_block' => true,
                ]
            ],
            'default' => [],
            'title_field' => '{{{ text }}}',
        ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $title = $settings['title'];
    $contacts = $settings['contacts'];

    ?>

    <section>
      <div class="container">
        <div class="md:flex text-primary items-center justify-center lg:gap-x-16 md:gap-x-10">
          <div class="max-w-80 md:mb-0 mb-6">
            <?php if ($title): ?>
              <div class="heading-2">
                <?= $title ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="md:block hidden h-28 w-1.5 bg-primary rounded"></div>
          <div class="max-w-80 md:space-y-5 space-y-3">
            <?php foreach ($contacts as $contact): ?>
              <div class="flex items-start gap-3">

                <?php if ($contact['icon']['url']): ?>
                  <div class="md:w-6 w-5 md:min-w-6 min-w-5">
                    <img src="<?= $contact['icon']['url'] ?>"
                         alt="<?= $contact['icon']['alt'] ?>"
                    >
                  </div>
                <?php endif; ?>

                <?php if ($contact['text']): ?>

                  <?php if ($contact['link']['url']): ?>
                    <a href="<?= $contact['link']['url'] ?>">
                      <?= $contact['text'] ?>
                    </a>
                  <?php else: ?>
                    <p>  <?= $contact['text'] ?></p>
                  <?php endif; ?>

                <?php endif; ?>


              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
    <?php
  }
}
