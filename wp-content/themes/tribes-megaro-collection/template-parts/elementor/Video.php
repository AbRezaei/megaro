<?php

class Video extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'video';
  }

  public function get_title(): string
  {
    return 'Video';
  }

  public function get_icon(): string
  {
    return 'eicon-play';
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
        'embedded',
        [
            'label' => esc_html__('Embedded Code', 'megaro'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
        ]
    );

    $this->add_control(
        'poster',
        [
            'label' => esc_html__('Poster', 'megaro'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'media_types' => ['image'],
            'default' => [],
        ]
    );
    $this->add_control(
        'video',
        [
            'label' => esc_html__('Video', 'megaro'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'media_types' => ['video'],
            'default' => [],
        ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $title = $settings['title'];
    $embedded = $settings['embedded'];
    $video = $settings['video']['url'];
    $poster = $settings['poster']['url'];
    ?>
    <section class="max-w-384 mx-auto">
      <div class="">
        <?php if ($title): ?>
          <div class="heading-3 text-primary text-center md:mb-10 mb-5 uppercase px-4">
            <?= $title ?>
          </div>
        <?php endif; ?>
      </div>

      <?php if ($embedded): ?>
        <div class="youtube-wrapper">
          <?= $embedded ?>
        </div>
      <?php elseif ($video): ?>
        <div>
          <video
              class="w-full h-full min-w-full min-h-full object-cover"
              poster="<?= $poster ?>"
              controls
          >
            <source src="<?= $video ?>" type="video/mp4">
          </video>
        </div>
      <?php endif; ?>
    </section>
    <?php
  }
}