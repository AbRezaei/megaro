<?php

class CustomerReviews extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'customer_reviews';
  }

  public function get_title(): string
  {
    return 'Customer Reviews';
  }

  public function get_icon(): string
  {
    return 'eicon-star-o';
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
            'default' => '',
        ]
    );
    $this->add_control(
        'description',
        [
            'label' => esc_html__('Description', 'barnham'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'rows' => 10,
            'default' => '',
        ]
    );

    $this->add_control(
        'comments',
        [
            'label' => esc_html__('Repeater Comments', 'barnham'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name' => 'image',
                    'label' => esc_html__('Image', 'barnham'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ],
                [
                    'name' => 'rate',
                    'label' => esc_html__('Rate', 'barnham'),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 5,
                    'default' => 4,
                ],
                [
                    'name' => 'comment',
                    'label' => esc_html__('Description', 'barnham'),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => '',
                    'placeholder' => esc_html__('Type your description here', 'barnham'),
                ]
            ],
            'default' => [],
            'title_field' => '{{{ comment }}}',
        ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $title = $settings['title'];
    $description = $settings['description'];
    $comments = $settings['comments'];
    ?>
    <section data-slider="reviews">
      <div class="container">
        <div class="text-center text-primary md:mb-2">

          <?php if ($title): ?>
            <div class="heading-2 mb-2 uppercase">
              <?= $title ?>
            </div>
          <?php endif; ?>

          <?php if ($description): ?>
            <div class="sub-heading">
              <?= $description ?>
            </div>
          <?php endif; ?>

        </div>

        <?php if ($comments): ?>
          <div>
            <div class="swiper mb-2">
              <div class="swiper-wrapper">

                <?php foreach ($comments as $comment): ?>
                  <div class="swiper-slide h-auto! md:px-5 px-4 py-7">
                    <div
                        class="bg-white h-full text-primary md:shadow-[0_4px_15px_8px_#ACACAC40] shadow-[0_4px_12px_5px_#ACACAC40] rounded-[10px] p-5"
                    >
                      <?php if ($comment['image']['url']): ?>
                        <div class="h-16 mb-2">
                          <img class="h-full max-w-full block mx-auto" alt="<?= $comment['image']['alt'] ?>"
                               src="<?= $comment['image']['url'] ?>"
                          >
                        </div>
                      <?php endif; ?>
                      <div class="relative flex justify-center mb-4">
                        <div class="flex justify-center gap-2 w-29.5">

                          <?php for ($i = 0; $i < 5; $i++): ?>
                            <div class="w-4.25 min-w-4.25">
                              <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                   xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                    d="M9.11271 2.11854C9.05044 2.0112 8.96107 1.9221 8.85354 1.86016C8.74601 1.79823 8.6241 1.76562 8.5 1.76562C8.37591 1.76562 8.25399 1.79823 8.14646 1.86016C8.03893 1.9221 7.94956 2.0112 7.88729 2.11854L5.96488 5.43212C5.89829 5.54673 5.80682 5.64492 5.69722 5.71946C5.58762 5.794 5.46268 5.84298 5.33163 5.86279L1.72834 6.40679C1.12342 6.49887 0.91092 7.26245 1.38267 7.65345L4.06654 9.8762C4.31446 10.0823 4.43134 10.4075 4.37113 10.7241L3.66917 14.411C3.64424 14.5419 3.65676 14.6772 3.7053 14.8013C3.75383 14.9255 3.83641 15.0334 3.94353 15.1127C4.05066 15.192 4.178 15.2395 4.3109 15.2497C4.4438 15.2599 4.57688 15.2324 4.69484 15.1703L8.08775 13.3839C8.21488 13.317 8.35636 13.282 8.5 13.282C8.64364 13.282 8.78513 13.317 8.91225 13.3839L12.3052 15.1703C12.4231 15.2324 12.5562 15.2599 12.6891 15.2497C12.822 15.2395 12.9493 15.192 13.0565 15.1127C13.1636 15.0334 13.2462 14.9255 13.2947 14.8013C13.3432 14.6772 13.3558 14.5419 13.3308 14.411L12.6289 10.7241C12.5991 10.5684 12.6117 10.4076 12.6653 10.2585C12.7188 10.1094 12.8115 9.97734 12.9335 9.8762L15.618 7.65274C16.0891 7.26316 15.8766 6.49816 15.271 6.40679L11.6691 5.86279C11.5379 5.84308 11.4128 5.79414 11.3031 5.7196C11.1934 5.64506 11.1018 5.54681 11.0351 5.43212L9.11271 2.11854Z"
                                    fill="#C1BCAF"
                                />
                              </svg>
                            </div>
                          <?php endfor; ?>

                        </div>
                        <div class="absolute top-0 left-[calc(50%-59px)] w-29.5">
                          <div style="width: <?= $comment['rate'] * 20 ?>%"
                               class="w-full flex gap-2 overflow-hidden"
                          >

                            <?php for ($i = 0; $i < 5; $i++): ?>
                              <div class="w-4.25 min-w-4.25">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                     xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                      d="M9.11271 2.11854C9.05044 2.0112 8.96107 1.9221 8.85354 1.86016C8.74601 1.79823 8.6241 1.76562 8.5 1.76562C8.37591 1.76562 8.25399 1.79823 8.14646 1.86016C8.03893 1.9221 7.94956 2.0112 7.88729 2.11854L5.96488 5.43212C5.89829 5.54673 5.80682 5.64492 5.69722 5.71946C5.58762 5.794 5.46268 5.84298 5.33163 5.86279L1.72834 6.40679C1.12342 6.49887 0.91092 7.26245 1.38267 7.65345L4.06654 9.8762C4.31446 10.0823 4.43134 10.4075 4.37113 10.7241L3.66917 14.411C3.64424 14.5419 3.65676 14.6772 3.7053 14.8013C3.75383 14.9255 3.83641 15.0334 3.94353 15.1127C4.05066 15.192 4.178 15.2395 4.3109 15.2497C4.4438 15.2599 4.57688 15.2324 4.69484 15.1703L8.08775 13.3839C8.21488 13.317 8.35636 13.282 8.5 13.282C8.64364 13.282 8.78513 13.317 8.91225 13.3839L12.3052 15.1703C12.4231 15.2324 12.5562 15.2599 12.6891 15.2497C12.822 15.2395 12.9493 15.192 13.0565 15.1127C13.1636 15.0334 13.2462 14.9255 13.2947 14.8013C13.3432 14.6772 13.3558 14.5419 13.3308 14.411L12.6289 10.7241C12.5991 10.5684 12.6117 10.4076 12.6653 10.2585C12.7188 10.1094 12.8115 9.97734 12.9335 9.8762L15.618 7.65274C16.0891 7.26316 15.8766 6.49816 15.271 6.40679L11.6691 5.86279C11.5379 5.84308 11.4128 5.79414 11.3031 5.7196C11.1934 5.64506 11.1018 5.54681 11.0351 5.43212L9.11271 2.11854Z"
                                      fill="#192959"
                                  />
                                </svg>
                              </div>
                            <?php endfor; ?>

                          </div>
                        </div>
                      </div>

                      <?php if ($comment['comment']): ?>
                        <div class="sub-heading">
                          <?= $comment['comment'] ?>
                        </div>
                      <?php endif; ?>

                    </div>
                  </div>
                <?php endforeach; ?>

              </div>
            </div>

            <!-- pagination -->
            <div class="slider-pagination flex justify-center"></div>
          </div>
        <?php endif; ?>
      </div>
    </section>
    <?php
  }
}