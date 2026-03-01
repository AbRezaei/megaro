<?php

class BookingEnquiry extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'booking-enquiry';
    }

    public function get_title(): string
    {
        return 'Booking Enquiry';
    }

    public function get_icon(): string
    {
        return 'eicon-form-horizontal';
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

        $this->add_bg_color_control();
        $this->add_section_heading_control();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_color = $settings['bg_color'];

        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">

                <?php $this->render_section_heading_template($settings); ?>
                <div class="lg:w-1/2 mx-auto">
                    <form action="#" class="grid grid-cols-1 sm:grid-cols-2 lg:gap-10 gap-8">

                        <div class="sm:col-span-2">

                            <p class="text-body-sm mb-2">Service</p>
                            <div x-data="select()" class="relative">

                                <select x-ref="selectInput" name="service_id" class="hidden">

                                    <option value="" disabled selected>Massage</option>
                                    <option value="1">This is a test - 1</option>
                                    <option value="2">This is a test - 2</option>
                                    <option value="3">This is a test - 3</option>
                                    <option value="4">This is a test - 4</option>
                                    <option value="5">This is a test - 5</option>
                                    <option value="6">This is a test - 6</option>
                                    <option value="7">This is a test - 7</option>

                                </select>
                                <div x-bind="trigger"
                                     class="h-15 flex flex-col justify-center bg-white border px-4 relative cursor-pointer select-none duration-300"
                                     :class="open ? 'border-primary' : 'border-secondary'">
                                    <div class="flex justify-between items-center">

                                        <div class="flex items-center gap-2">

                                            <p x-text="display" class="text-body-lg"
                                               :class="display === options[0]?.label ? 'text-[#737373]' : ''"></p>

                                        </div>
                                        <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-down-black.svg"
                                             alt="Arrow icon"
                                             x-bind:class="{'rotate-180': open}"
                                             class="w-6! h-6! duration-300">

                                    </div>
                                </div>
                                <div x-bind="dialogue" x-cloak
                                     class="absolute top-full left-0 w-full z-1 bg-white mt-1 max-h-60 overflow-auto">
                                    <template x-for="item in options" :key="item.value">
                                        <div>

                                            <template x-if="item.disabled">
                                                <div x-text="item.label"
                                                     class="text-body-lg text-gray-500 py-2 px-4 cursor-not-allowed"></div>
                                            </template>
                                            <template x-if="!item.disabled">
                                                <div x-bind="option(item)" x-text="item.label"
                                                     class="text-body-lg py-2 px-4 hover:bg-primary/10 cursor-pointer duration-300"></div>
                                            </template>

                                        </div>
                                    </template>
                                </div>

                            </div>

                        </div>
                        <div class="sm:col-span-2">

                            <p class="text-body-sm mb-2">Name</p>
                            <input type="text" placeholder="Enter your Name" class="w-full">

                        </div>
                        <div>

                            <p class="text-body-sm mb-2">Email</p>
                            <input type="text" placeholder="Enter your Email" class="w-full">

                        </div>
                        <div>

                            <p class="text-body-sm mb-2">Phone</p>
                            <input type="text" placeholder="Enter your Phone" class="w-full">

                        </div>
                        <div class="sm:col-span-2">

                            <p class="text-body-sm mb-2">Message</p>
                            <textarea placeholder="Enter your Message" class="w-full"></textarea>

                        </div>
                        <div class="sm:col-span-2">
                            <button class="btn btn-primary-fill btn-lg">Make enquiry</button>
                        </div>
                        <div class="sm:col-span-2">
                            <p class="text-body-md">By subscribing, you agree to our Terms & Conditions</p>
                        </div>

                    </form>
                </div>

            </div>
        </section>
        <?php
    }
}