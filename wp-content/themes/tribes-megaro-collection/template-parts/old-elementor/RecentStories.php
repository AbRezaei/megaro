<?php

class RecentStories extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'recent_stories';
  }

  public function get_title(): string
  {
    return 'Recent Stories';
  }

  public function get_icon(): string
  {
    return 'eicon-image-rollover';
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
            'default' => '',
        ]
    );
    $this->add_control(
        'description',
        [
            'label' => esc_html__('Description', 'megaro'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'rows' => 10,
            'default' => '',
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

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $title = $settings['title'];
    $description = $settings['description'];
    $btn_text = $settings['btn_text'];
    $btn_link = $settings['btn_link'];

    $args = array(
        'post_type' => 'post',
        'order_by' => 'post_id',
        'order' => 'ASC',
        'posts_per_page' => 3
    );
    $query = new WP_Query($args);
    ?>

    <section data-slider="stories">
      <div class="container">
        <div class="grid grid-cols-12 gap-x-6 gap-y-4 md:mb-10 mb-8">
          <div class="xl:col-span-6 md:col-span-8 col-span-full text-primary">

            <?php if ($title): ?>
              <div class="heading-2 md:mb-4 mb-2 uppercase">
                <?= $title ?>
              </div>
            <?php endif; ?>

            <?php if ($description): ?>
              <div class="sub-heading max-w-137.5 mb-2 md:mb-0">
                <?= $description ?>
              </div>
            <?php endif; ?>

          </div>
          <div class="xl:col-span-6 md:col-span-4 col-span-full">
            <div class="md:text-right">
              <?php if ($btn_text): ?>
                <a
                    href="<?= $btn_link['url'] ?>"
                    target="<?= $btn_link['is_external'] ? '_blank' : '_self' ?>"
                    class="btn-outline"
                >
                  <?= $btn_text ?>
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div>
          <div class="swiper md:mb-10 mb-8">
            <div class="swiper-wrapper">

              <?php while ($query->have_posts()) : $query->the_post();
                $image_id = get_post_thumbnail_id(get_the_ID());
                $image_url = wp_get_attachment_image_url($image_id, 'full');
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

                $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $short_description = get_field('short_description');

                ?>

                <div class="swiper-slide">
                  <div class="group relative aspect-square rounded-md overflow-hidden md:mb-4 mb-3">
                    <a href="<?php the_permalink() ?>">
                      <img class="h-full! w-full! object-cover" src="<?= $image_url ?>" alt="<?= $image_alt ?>">
                    </a>


                    <div
                        class="absolute left-0 top-full group-hover:top-0 h-full w-full flex flex-col items-center justify-center text-center bg-black/70 text-white rounded-md duration-300 p-5"
                    >
                      <div class="md:text-[28px] md:leading-9 text-xl font-bold mb-3">
                        <?= the_title() ?>
                      </div>
                      <div class="w-24 bg-white h-0.5 rounded mb-4"></div>
                      <?php if ($short_description): ?>
                        <div class="md:text-xl text-sm mb-6"><?= $short_description ?>
                        </div>
                      <?php endif; ?>
                      <a href="<?php the_permalink() ?>"
                         class="btn-outline-2"
                      >
                        VIEW
                      </a>
                    </div>
                  </div>
                  <div class="text-primary">
                    <a href="<?php the_permalink() ?>"
                       class="line-clamp-2 text-primary md:text-[28px] md:leading-9 leading-5 font-bold md:mb-0 mb-2"
                    >
                      <?= the_title() ?>
                    </a>
                    <a href="<?php the_permalink() ?>">
                      <div class="md:hidden text-sm"><?= $short_description ?></div>
                    </a>
                  </div>
                </div>
              <?php endwhile; ?>
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