<?php

class GroupBookingEnquiry extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'group-booking-enquiry';
    }

    public function get_title(): string
    {
        return 'Group Booking Enquiry';
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
                        <div>

                            <p class="text-body-sm mb-2">Number of guests</p>
                            <input type="text" placeholder="Enter Number of guests" class="w-full">

                        </div>
                        <div>

                            <p class="text-body-sm mb-2">Date</p>
                            <div x-data="datepicker()" class="relative">

                                <input x-ref="dateInput" name="booking_date" type="text" class="hidden"
                                       placeholder="Select Date"/>
                                <div x-ref="triggerDiv">
                                    <div x-bind="trigger"
                                         class="h-13 flex flex-col justify-center bg-white border border-secondary px-4 relative cursor-pointer select-none">

                                        <div class="flex justify-between items-center">

                                            <div class="flex items-center gap-2">
                                                <p x-text="display" class="text-body-lg text-[#737373]"></p>
                                            </div>
                                            <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-down-black.svg"
                                                 alt="Arrow icon"
                                                 x-bind:class="{'rotate-180': open}"
                                                 class="w-6 h-6 duration-300">

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="sm:col-span-2">

                            <p class="text-body-sm mb-2">Message</p>
                            <textarea placeholder="Tell us about what you want from your stay..."
                                      class="w-full"></textarea>

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