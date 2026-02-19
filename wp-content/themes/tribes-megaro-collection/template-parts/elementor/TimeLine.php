<?php

class TimeLine extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'time_line';
  }

  public function get_title(): string
  {
    return 'Time Line';
  }

  public function get_icon(): string
  {
    return 'eicon-form-horizontal';
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
        'items',
        [
            'label' => esc_html__('Items', 'barnham'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => [
                [
                    'name' => 'title',
                    'label' => esc_html__('Title', 'barnham'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '',
                    'label_block' => true,
                ],
                [
                    'name' => 'content',
                    'label' => esc_html__('Content', 'barnham'),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => '',
                    'show_label' => false,
                ],
                [
                    'name' => 'image',
                    'label' => esc_html__('Choose Image', 'barnham'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [],
                ]
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
    $title = $settings['title'];
    $items = $settings['items'];
    ?>

    <section class="timeline container text-primary " x-data="timeLine()" x-init="init()">
      <?php if ($title): ?>
        <h3 class="timeline-title text-center heading-2 uppercase mb-6">
          <?= $title ?>
        </h3>
      <?php endif; ?>
      <div class="timeline-items-container mt-4 relative pl-4 md:pl-0">
        <!-- starting dot -->
        <div
            data-timeline-item-dot="0"
            class="timeline-item-dot mx-auto rounded-full size-(--dot-size) left-[calc(16px-var(--dot-size)/2)] md:left-[calc(50%-var(--dot-size)/2)] bg-white border-3 border-primary absolute top-0 z-1"
        ></div>

        <!-- items -->
        <?php
        $count = count($items);
        if ($count - 1 > 0): ?>
          <div class="timeline-items grid gap-12 relative pt-12 ">
            <?php

            foreach ($items as $index => $item):
              if ($index + 1 != $count):?>
                <div
                    class="timeline-row grid grid-flow-col max-md:grid-cols-[auto_1ft] grid-cols-[1fr_auto_1fr] group gap-x-4"
                >
                  <div
                      <?php if ($index % 2 == 1): ?>style="justify-self:end" <?php endif;
                  ?>
                      data-timeline-item="<?= $index + 1 ?>"
                      class="timeline-item opacity-0  transition-opacity duration-500 max-md:order-1 md:group-odd:order-1 md:group-even:-order-1 flex-1 flex flex-col gap-2"
                  >
                    <?php if ($item['image']['url']): ?>
                      <div>
                        <img src="<?= $item['image']['url'] ?>" class="w-full h-auto! rounded-lg!"
                             alt="<?= $item['image']['alt'] ?>"
                        />
                      </div>
                    <?php endif; ?>

                    <?php if ($item['title']): ?>
                      <h4 class="timeline-item-title relative overflow-visible heading-3 uppercase">
                        <?= $item['title'] ?>
                      </h4>
                    <?php endif; ?>

                    <?php if ($item['content']): ?>
                      <?= $item['content'] ?>
                    <?php endif; ?>
                  </div>
                  <div
                      data-timeline-item-dot="<?= $index + 1 ?>"
                      class="timeline-item-dot z-1 rounded-full size-(--dot-size) bg-white border-3 border-primary relative top-[46%] -left-[calc(var(--dot-size)/2)] md:left-0"
                  ></div>
                  <div
                      class="flex-1 max-md:hidden group-odd:-order-1 group-even:order-1"
                  ></div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
            <div class="timeline-progress-container grid">
              <div
                  class="timeline-progress-bg h-full w-(--empty-progress-width) top-0 left-[calc(0%-var(--empty-progress-width)/2)] md:left-[calc(50%-var(--empty-progress-width)/2)] absolute bg-primary"
              ></div>
              <div
                  style="height: 0%"
                  class="timeline-progress w-(--filled-progress-width) top-0 left-[calc(0%-var(--filled-progress-width)/2)] md:left-[calc(50%-var(--filled-progress-width)/2)] absolute bg-primary"
              ></div>
            </div>

          </div>
        <?php endif; ?>

        <!-- last item -->
        <?php
        $last_item = array_pop($items);
        if ($count > 0): ?>
          <div
              class="timeline-row grid group gap-y-8 max-md:place-content-start max-md:items-start"
          >
            <div
                data-timeline-item-dot="<?= $count ?>"
                class="timeline-item-dot mr-auto md:mx-auto rounded-full size-(--dot-size) bg-white border-3 border-primary max-md:relative max-md:-left-[calc(var(--dot-size)/2)]"
            ></div>

            <div
                data-timeline-item="<?= $count ?>"
                class="timeline-item duration-500 flex-1 opacity-0 transition-opacity justify-self-center flex flex-col gap-2 md:w-1/2"
            >

              <h4
                  class="timeline-item-title relative overflow-visible uppercase heading-3 md:text-center"
              >
                <?= $last_item['title'] ?>
              </h4>

              <div class="md:text-center mb-2">
                <?= $last_item['content'] ?>
              </div>

              <div>
                <img class="w-full h-auto! rounded-lg!" src="<?= $last_item['image']['url'] ?>"
                     alt="<?= $last_item['image']['alt'] ?>"
                />
              </div>

            </div>
          </div>
        <?php endif; ?>

      </div>
    </section>
    <?php
  }
}
