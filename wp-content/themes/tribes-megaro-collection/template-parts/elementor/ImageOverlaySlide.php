<?php

class ImageOverlaySlide extends \Elementor\Widget_Base
{
    public function get_name(): string
    {
        return 'image_overlay_slide';
    }

    public function get_title(): string
    {
        return 'Image Overlay Slide';
    }

    public function get_icon(): string
    {
        return 'eicon-image-rollover';
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
                'label' => esc_html__('Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => '',
            ]
        );
        $this->add_control(
            'button_title',
            [
                'label' => esc_html__('Button Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
            ]
        );
        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
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
        $button_title = $settings['button_title'];
        $button_link = $settings['button_link'];
        $cards = $settings['cards'];
        ?>
        <section>
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-4 md:mb-10 mb-8">
                    <div class="xl:col-span-6 md:col-span-8 col-span-full text-primary">
                        <?php if ($title): ?>
                            <div class="heading-2 md:mb-4 mb-2">
                                <?= $title ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($description): ?>
                            <div class="sub-heading max-w-[550px]">
                                <?= $description ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($button_title): ?>
                        <div class="xl:col-span-6 md:col-span-4 col-span-full">
                            <div class="md:text-right">
                                <a href="<?= $button_link['url'] ?>"
                                   class="inline-block border border-primary text-primary md:rounded-md rounded md:text-lg text-sm font-bold md:py-3 py-2 md:px-10 px-6">
                                    <?= $button_title ?>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="slider" slider-type="stories">
                    <div class="swiper md:mb-10 mb-8">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="group relative aspect-square rounded-md overflow-hidden md:mb-4 mb-3">
                                    <img class="h-full w-full object-cover" src="./assets/image/bg-header.png">

                                    <div class="absolute left-0 top-full group-hover:top-0 h-full w-full flex flex-col items-center justify-center text-center bg-black/70 text-white rounded-md duration-300 p-5">
                                        <div class="md:text-[28px] md:leading-[36px] text-xl font-bold mb-3">Benefits of
                                            choosing Barnham Broom
                                        </div>
                                        <div class="w-24 bg-white h-0.5 rounded mb-4"></div>
                                        <div class="md:text-xl text-sm mb-6">Barnham Broom offers a warm welcome</div>
                                        <a href="#"
                                           class="inline-block min-w-40 border border-white text-white md:rounded-md rounded md:text-lg text-sm font-bold md:py-3 py-2 md:px-10 px-6">
                                            VIEW
                                        </a>
                                    </div>
                                </div>
                                <div class="text-primary">
                                    <div class="line-clamp-2 text-primary md:text-[28px] md:leading-[36px] leading-5 font-bold md:mb-0 mb-2">
                                        Benefits of choosing Barnham Broom
                                    </div>
                                    <div class="md:hidden text-sm">Barnham Broom offers a warm welcome</div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="group relative aspect-square rounded-md overflow-hidden md:mb-4 mb-3">
                                    <img class="h-full w-full object-cover" src="./assets/image/bg-header.png">

                                    <div class="absolute left-0 top-full group-hover:top-0 h-full w-full flex flex-col items-center justify-center text-center bg-black/70 text-white rounded-md duration-300 p-5">
                                        <div class="md:text-[28px] md:leading-[36px] text-xl font-bold mb-3">Benefits of
                                            choosing Barnham Broom
                                        </div>
                                        <div class="w-24 bg-white h-0.5 rounded mb-4"></div>
                                        <div class="md:text-xl text-sm mb-6">Barnham Broom offers a warm welcome</div>
                                        <a href="#"
                                           class="inline-block min-w-40 border border-white text-white md:rounded-md rounded md:text-lg text-sm font-bold md:py-3 py-2 md:px-10 px-6">
                                            VIEW
                                        </a>
                                    </div>
                                </div>
                                <div class="text-primary">
                                    <div class="line-clamp-2 text-primary md:text-[28px] md:leading-[36px] leading-5 font-bold md:mb-0 mb-2">
                                        Benefits of choosing Barnham Broom
                                    </div>
                                    <div class="md:hidden text-sm">Barnham Broom offers a warm welcome</div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="group relative aspect-square rounded-md overflow-hidden md:mb-4 mb-3">
                                    <img class="h-full w-full object-cover" src="./assets/image/bg-header.png">

                                    <div class="absolute left-0 top-full group-hover:top-0 h-full w-full flex flex-col items-center justify-center text-center bg-black/70 text-white rounded-md duration-300 p-5">
                                        <div class="md:text-[28px] md:leading-[36px] text-xl font-bold mb-3">Benefits of
                                            choosing Barnham Broom
                                        </div>
                                        <div class="w-24 bg-white h-0.5 rounded mb-4"></div>
                                        <div class="md:text-xl text-sm mb-6">Barnham Broom offers a warm welcome</div>
                                        <a href="#"
                                           class="inline-block min-w-40 border border-white text-white md:rounded-md rounded md:text-lg text-sm font-bold md:py-3 py-2 md:px-10 px-6">
                                            VIEW
                                        </a>
                                    </div>
                                </div>
                                <div class="text-primary">
                                    <div class="line-clamp-2 text-primary md:text-[28px] md:leading-[36px] leading-5 font-bold md:mb-0 mb-2">
                                        Benefits of choosing Barnham Broom
                                    </div>
                                    <div class="md:hidden text-sm">Barnham Broom offers a warm welcome</div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="group relative aspect-square rounded-md overflow-hidden md:mb-4 mb-3">
                                    <img class="h-full w-full object-cover" src="./assets/image/bg-header.png">

                                    <div class="absolute left-0 top-full group-hover:top-0 h-full w-full flex flex-col items-center justify-center text-center bg-black/70 text-white rounded-md duration-300 p-5">
                                        <div class="md:text-[28px] md:leading-[36px] text-xl font-bold mb-3">Benefits of
                                            choosing Barnham Broom
                                        </div>
                                        <div class="w-24 bg-white h-0.5 rounded mb-4"></div>
                                        <div class="md:text-xl text-sm mb-6">Barnham Broom offers a warm welcome</div>
                                        <a href="#"
                                           class="inline-block min-w-40 border border-white text-white md:rounded-md rounded md:text-lg text-sm font-bold md:py-3 py-2 md:px-10 px-6">
                                            VIEW
                                        </a>
                                    </div>
                                </div>
                                <div class="text-primary">
                                    <div class="line-clamp-2 text-primary md:text-[28px] md:leading-[36px] leading-5 font-bold md:mb-0 mb-2">
                                        Benefits of choosing Barnham Broom
                                    </div>
                                    <div class="md:hidden text-sm">Barnham Broom offers a warm welcome</div>
                                </div>
                            </div>
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