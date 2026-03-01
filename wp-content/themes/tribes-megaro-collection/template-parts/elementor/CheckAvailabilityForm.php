<?php

class CheckAvailabilityForm extends \Elementor\Widget_Base
{
    use SharedControls;

    public function get_name(): string
    {
        return 'check-availability-form';
    }

    public function get_title(): string
    {
        return 'Check Availability Form';
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
        $this->add_text_color_control();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $bg_color = $settings['bg_color'];
        $text_color = $settings['text_color'];

        ?>
        <section class="<?= $bg_color ?> lg:py-24 py-16">
            <div class="container">
                <div>

                    <h3 class="<?= $text_color ?> text-heading-3 text-center mb-10">CHECK AVAILABILITY</h3>
                    <div x-data="tabs()">

                        <ul class="flex flex-row justify-center items-center mb-8" data-tabs>

                            <li>
                                <button x-bind="tab"
                                        data-tab="room"
                                        :class="activeTab === 'room' ? 'text-white border-white' : 'text-[#A3A3A3] border-[#A3A3A3]'"
                                        class="whitespace-nowrap p-4 border-b-2 text-body-lg">
                                    Room
                                </button>
                            </li>
                            <li>
                                <button x-bind="tab"
                                        data-tab="table"
                                        :class="activeTab === 'table' ? 'text-white border-white' : 'text-[#A3A3A3] border-[#A3A3A3]'"
                                        class="whitespace-nowrap p-4 border-b-2 text-body-lg">
                                    Table
                                </button>
                            </li>

                        </ul>
                        <ul data-panels class="relative">

                            <li x-bind="panel" data-panel="room" x-cloak>
                                <div class="flex lg:flex-row flex-col lg:items-center items-stretch gap-y-4">

                                    <div class="grow">
                                        <div x-data="select()" class="relative">

                                            <select x-ref="selectInput" name="hotel_id" class="hidden">

                                                <option value="" disabled selected>Select hotel</option>
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

                                                <p class="text-body-sm">Label</p>
                                                <div class="flex justify-between items-center">

                                                    <div class="flex items-center gap-2">

                                                        <p x-text="display" class="text-body-lg"
                                                           :class="display === options[0]?.label ? 'text-[#737373]' : ''"></p>

                                                    </div>
                                                    <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/chevron-down-black.svg"
                                                         alt="Arrow icon"
                                                         x-bind:class="{'rotate-180': open}"
                                                         class="w-6 h-6 duration-300">

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
                                    <div class="grow">
                                        <div x-data="datepicker()" class="relative">

                                            <input x-ref="dateInput" name="booking_date" type="text" class="hidden"
                                                   placeholder="Select Date"/>
                                            <div x-ref="triggerDiv">
                                                <div x-bind="trigger"
                                                     class="h-15 flex flex-col justify-center bg-white border border-secondary px-4 relative cursor-pointer select-none">

                                                    <p class="text-body-sm">Label</p>
                                                    <div class="flex justify-between items-center">

                                                        <div class="flex items-center gap-2">

                                                            <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/calendar-black.svg"
                                                                 alt="Calendar icon"
                                                                 class="w-6 h-6">
                                                            <p x-text="display" class="text-body-lg text-[#737373]"></p>

                                                        </div>
                                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/chevron-down-black.svg"
                                                             alt="Arrow icon"
                                                             x-bind:class="{'rotate-180': open}"
                                                             class="w-6 h-6 duration-300">

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="grow">
                                        <div x-data="datepicker()" class="relative">

                                            <input x-ref="dateInput" name="booking_date" type="text" class="hidden"
                                                   placeholder="Select Date"/>
                                            <div x-ref="triggerDiv">
                                                <div x-bind="trigger"
                                                     class="h-15 flex flex-col justify-center bg-white border border-secondary px-4 relative cursor-pointer select-none">

                                                    <p class="text-body-sm">Label</p>
                                                    <div class="flex justify-between items-center">

                                                        <div class="flex items-center gap-2">

                                                            <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/calendar-black.svg"
                                                                 alt="Calendar icon"
                                                                 class="w-6 h-6">
                                                            <p x-text="display" class="text-body-lg text-[#737373]"></p>

                                                        </div>
                                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/chevron-down-black.svg"
                                                             alt="Arrow icon"
                                                             x-bind:class="{'rotate-180': open}"
                                                             class="w-6 h-6 duration-300">

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="grow">
                                        <div x-data="select()" class="relative">

                                            <select x-ref="selectInput" name="people" class="hidden">

                                                <option value="" disabled selected>Select</option>
                                                <option value="1">1 person</option>
                                                <option value="2">2 people</option>
                                                <option value="3">3 people</option>
                                                <option value="4">4 people</option>
                                                <option value="5">5 people</option>
                                                <option value="6">6 people</option>
                                                <option value="7">7 people</option>

                                            </select>
                                            <div x-bind="trigger"
                                                 class="h-15 flex flex-col justify-center bg-white border px-4 relative cursor-pointer select-none duration-300"
                                                 :class="open ? 'border-primary' : 'border-secondary'">

                                                <p class="text-body-sm">Label</p>
                                                <div class="flex justify-between items-center">

                                                    <div class="flex items-center gap-2">

                                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/user-black.svg"
                                                             alt="User icon"
                                                             class="w-6 h-6">
                                                        <p x-text="display" class="text-body-lg"
                                                           :class="display === options[0]?.label ? 'text-[#737373]' : ''"></p>

                                                    </div>
                                                    <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/chevron-down-black.svg"
                                                         alt="Arrow icon"
                                                         x-bind:class="{'rotate-180': open}"
                                                         class="w-6 h-6 duration-300">

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
                                    <button class="btn btn-primary-fill btn-lg !h-15">Check availability</button>

                                </div>
                            </li>
                            <li x-bind="panel" data-panel="table" x-cloak>
                                <div class="flex lg:flex-row flex-col lg:items-center items-stretch gap-y-4">

                                    <div class="grow">
                                        <div x-data="select()" class="relative">

                                            <select x-ref="selectInput" name="venue_id" class="hidden">

                                                <option value="" disabled selected>Select venue</option>
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

                                                <p class="text-body-sm">Label</p>
                                                <div class="flex justify-between items-center">

                                                    <div class="flex items-center gap-2">

                                                        <p x-text="display" class="text-body-lg"
                                                           :class="display === options[0]?.label ? 'text-[#737373]' : ''"></p>

                                                    </div>
                                                    <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/chevron-down-black.svg"
                                                         alt="Arrow icon"
                                                         x-bind:class="{'rotate-180': open}"
                                                         class="w-6 h-6 duration-300">

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
                                    <div class="grow">
                                        <div x-data="select()" class="relative">

                                            <select x-ref="selectInput" name="people" class="hidden">

                                                <option value="" disabled selected>Select</option>
                                                <option value="1">1 person</option>
                                                <option value="2">2 people</option>
                                                <option value="3">3 people</option>
                                                <option value="4">4 people</option>
                                                <option value="5">5 people</option>
                                                <option value="6">6 people</option>
                                                <option value="7">7 people</option>

                                            </select>
                                            <div x-bind="trigger"
                                                 class="h-15 flex flex-col justify-center bg-white border px-4 relative cursor-pointer select-none duration-300"
                                                 :class="open ? 'border-primary' : 'border-secondary'">

                                                <p class="text-body-sm">Label</p>
                                                <div class="flex justify-between items-center">

                                                    <div class="flex items-center gap-2">

                                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/user-black.svg"
                                                             alt="User icon"
                                                             class="w-6 h-6">
                                                        <p x-text="display" class="text-body-lg"
                                                           :class="display === options[0]?.label ? 'text-[#737373]' : ''"></p>

                                                    </div>
                                                    <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/chevron-down-black.svg"
                                                         alt="Arrow icon"
                                                         x-bind:class="{'rotate-180': open}"
                                                         class="w-6 h-6 duration-300">

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
                                    <div class="grow">
                                        <div x-data="datepicker()" class="relative">

                                            <input x-ref="dateInput" name="booking_date" type="text" class="hidden"
                                                   placeholder="Select Date"/>
                                            <div x-ref="triggerDiv">
                                                <div x-bind="trigger"
                                                     class="h-15 flex flex-col justify-center bg-white border border-secondary px-4 relative cursor-pointer select-none">

                                                    <p class="text-body-sm">Label</p>
                                                    <div class="flex justify-between items-center">

                                                        <div class="flex items-center gap-2">

                                                            <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/calendar-black.svg"
                                                                 alt="Calendar icon"
                                                                 class="w-6 h-6">
                                                            <p x-text="display" class="text-body-lg text-[#737373]"></p>

                                                        </div>
                                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/chevron-down-black.svg"
                                                             alt="Arrow icon"
                                                             x-bind:class="{'rotate-180': open}"
                                                             class="w-6 h-6 duration-300">

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="grow">
                                        <div x-data="select()" class="relative">

                                            <select x-ref="selectInput" name="time" class="hidden">

                                                <option value="" disabled selected>Select</option>
                                                <option value="0">00:00</option>
                                                <option value="1">01:00</option>
                                                <option value="2">02:00</option>
                                                <option value="3">03:00</option>
                                                <option value="4">04:00</option>
                                                <option value="5">05:00</option>
                                                <option value="6">06:00</option>
                                                <option value="7">07:00</option>
                                                <option value="8">08:00</option>
                                                <option value="9">09:00</option>
                                                <option value="10">10:00</option>
                                                <option value="11">11:00</option>
                                                <option value="12">12:00</option>
                                                <option value="13">13:00</option>
                                                <option value="14">14:00</option>
                                                <option value="15">15:00</option>
                                                <option value="16">16:00</option>
                                                <option value="17">17:00</option>
                                                <option value="18">18:00</option>
                                                <option value="19">19:00</option>
                                                <option value="20">20:00</option>
                                                <option value="21">21:00</option>
                                                <option value="22">22:00</option>
                                                <option value="23">23:00</option>

                                            </select>
                                            <div x-bind="trigger"
                                                 class="h-15 flex flex-col justify-center bg-white border px-4 relative cursor-pointer select-none duration-300"
                                                 :class="open ? 'border-primary' : 'border-secondary'">

                                                <p class="text-body-sm">Label</p>
                                                <div class="flex justify-between items-center">

                                                    <div class="flex items-center gap-2">

                                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/clock-black.svg"
                                                             alt="Clock icon"
                                                             class="w-6 h-6">
                                                        <p x-text="display" class="text-body-lg"
                                                           :class="display === options[0]?.label ? 'text-[#737373]' : ''"></p>

                                                    </div>
                                                    <img src="<?= get_template_directory_uri(); ?>/assets/img/svg/chevron-down-black.svg"
                                                         alt="Arrow icon"
                                                         x-bind:class="{'rotate-180': open}"
                                                         class="w-6 h-6 duration-300">

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
                                    <button class="btn btn-primary-fill btn-lg !h-15">Find a table</button>

                                </div>
                            </li>

                        </ul>

                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}