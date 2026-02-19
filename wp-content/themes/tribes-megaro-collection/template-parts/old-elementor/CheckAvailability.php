<?php

class CheckAvailability extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'checkAvailability';
  }

  public function get_title(): string
  {
    return 'Check Availability';
  }

  public function get_icon(): string
  {
    return 'eicon-search-bold';
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
            'default' => esc_html__('Check Availability', 'megaro'),
        ]
    );
    $this->add_control(
        'btn_text',
        [
            'label' => esc_html__('Button Text', 'megaro'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Search', 'megaro'),
        ]
    );
    $this->add_control(
        'type',
        [
            'label' => esc_html__('Type', 'megaro'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'all',
            'options' => [
                'all' => esc_html__('ALL', 'megaro'),
                '0' => esc_html__('STAY', 'megaro'),
                '1' => esc_html__('EAT', 'megaro'),
                '2' => esc_html__('GOLF', 'megaro'),
                '3' => esc_html__('SPA', 'megaro'),
                '4' => esc_html__('MEETING', 'megaro'),
            ]
        ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();

    $title = $settings['title'];
    $btn_text = $settings['btn_text'];
    $type = $settings['type'];
    $active_type = (int)($type === "all" ? 0 : $type);
    ?>


    <section
        x-data='checkAvailability(<?= wp_json_encode(['activeType' => $active_type]) ?>)'
    >
      <input x-ref="rangeDateInput" type="text" class="hidden" aria-hidden="true">
      <input x-ref="dateInput" type="text" class="hidden" aria-hidden="true">

      <div class="md:container">
        <div class="bg-primary md:py-20 py-7 sm:p-6 p-4">
          <div class="heading-2 text-white text-center md:mb-8 mb-4 uppercase"><?= esc_html($title) ?></div>

          <?php if ($type == "all"): ?>
            <div class="relative md:flex justify-center items-center md:cursor-default cursor-pointer mb-6">
              <div
                  @click="isDropdownOpen = !isDropdownOpen"
                  @click.outside="isDropdownOpen = false"
                  class="md:hidden flex items-center text-white border border-white rounded px-4 py-2"
              >
                <span x-text="currentTypeName()" class="uppercase"></span>
                <div
                    class="w-5 min-w-5 ml-auto"
                    :class="{'rotate-180': isDropdownOpen}"
                >
                  <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M15 19.1378L22.2262 11.9134L20.9006 10.5859L15 16.4866L9.10124 10.5859L7.77374 11.9134L15 19.1378Z"
                          fill="#ffffff"
                    />
                  </svg>
                </div>
              </div>
              <div
                  x-show="!$store.page.mobileMode || isDropdownOpen"
                  @click.outside="clickOutside()"
                  x-collapse x-collapse-on-mobile x-cloak
                  class="md:block! md:h-auto! md:static absolute z-10 top-[calc(100%+2px)] left-0 md:bg-transparent bg-white md:w-auto w-full lg:text-[28px] md:text-2xl md:text-white text-primary text-nowrap md:rounded-none rounded md:shadow-none shadow-md md:p-2"
              >
                <div
                    class="md:flex justify-center gap-8 md:border-b border-white/20 md:divide-y-0 divide-y divide-primary/10 md:p-0 p-2"
                >

                  <template x-for="(item, index) in types">
                    <div
                        @click="setActiveType(index)"
                        class="relative cursor-pointer lg:px-6 md:px-4 px-2 py-2"
                    >
                      <span x-text="item.name" class="uppercase"></span>
                      <div
                          class="md:block hidden absolute -bottom-px -left-0.5 w-[calc(100%+4px)] bg-white h-1.5 rounded opacity-0 duration-300"
                          :class="{'opacity-100!' : activeType === index}"
                      >
                      </div>
                    </div>
                  </template>

                </div>
              </div>
            </div>

          <?php endif; ?>


          <div class="js-checkavailability">
            <div class="grid grid-cols-12 md:gap-x-4 gap-x-3 gap-y-5 max-w-287.5 mx-auto">

              <!--    Date picker        -->
              <div class="lg:col-span-5 col-span-6" x-cloak>
                <div
                    x-ref="rangeDateTrigger"
                    @click.stop="openDateRangePicker()"
                    class="js-checkavailability-date-trigger bg-white font-medium md:text-xl text-sm text-primary flex items-center rounded cursor-pointer md:p-4 p-2.5"
                >
                  <div class="md:w-7.5 md:min-w-7.5 w-5 min-w-5">
                    <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                      <path
                          d="M23.0312 25H5.96875C4.87938 25 4 24.1067 4 23V7C4 5.89333 4.87938 5 5.96875 5H23.0312C24.1206 5 25 5.89333 25 7V23C25 24.1067 24.1206 25 23.0312 25ZM5.96875 6.33333C5.60125 6.33333 5.3125 6.62667 5.3125 7V23C5.3125 23.3733 5.60125 23.6667 5.96875 23.6667H23.0312C23.3988 23.6667 23.6875 23.3733 23.6875 23V7C23.6875 6.62667 23.3988 6.33333 23.0312 6.33333H5.96875Z"
                          fill="#192959"
                      />
                      <path
                          d="M9.90625 9.33333C9.53875 9.33333 9.25 9.04 9.25 8.66667V4.66667C9.25 4.29333 9.53875 4 9.90625 4C10.2737 4 10.5625 4.29333 10.5625 4.66667V8.66667C10.5625 9.04 10.2737 9.33333 9.90625 9.33333ZM19.0938 9.33333C18.7262 9.33333 18.4375 9.04 18.4375 8.66667V4.66667C18.4375 4.29333 18.7262 4 19.0938 4C19.4613 4 19.75 4.29333 19.75 4.66667V8.66667C19.75 9.04 19.4613 9.33333 19.0938 9.33333ZM24.3438 12H4.65625C4.28875 12 4 11.7067 4 11.3333C4 10.96 4.28875 10.6667 4.65625 10.6667H24.3438C24.7113 10.6667 25 10.96 25 11.3333C25 11.7067 24.7113 12 24.3438 12Z"
                          fill="#192959"
                      />
                    </svg>
                  </div>
                  <div class="flex-1 text-center px-2">
                    <span
                        class="js-checkavailability-date-label block text-left"
                        x-text="rangeDateLabel"
                    ></span>
                  </div>
                  <div class="md:w-7.5 md:min-w-7.5 w-5 min-w-5 opacity-0">
                    <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.9999 19.1378L22.2262 11.9134L20.9006 10.5859L14.9999 16.4866L9.10118 10.5859L7.77368 11.9134L14.9999 19.1378Z"
                            fill="black"
                      />
                    </svg>
                  </div>
                </div>
              </div>

              <!--     Guests number (Stay)       -->
              <div class="lg:col-span-5 col-span-6 relative"
                   x-show="currentTypeName() === 'stay'" x-cloak
              >
                <div
                    class="bg-white font-medium md:text-xl text-sm text-primary flex items-center md:gap-3 gap-1 rounded md:p-4 p-2.5"
                >
                  <div class="md:w-7.5 md:min-w-7.5 w-5 min-w-5">
                    <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                      <path
                          d="M15 15.5C17.3472 15.5 19.25 13.5972 19.25 11.25C19.25 8.90279 17.3472 7 15 7C12.6528 7 10.75 8.90279 10.75 11.25C10.75 13.5972 12.6528 15.5 15 15.5Z"
                          stroke="#192959"
                          stroke-width="1.5"
                      />
                      <path
                          d="M7.75 24.5C7.75 20.7721 10.7721 17.75 14.5 17.75H15.5C19.2279 17.75 22.25 20.7721 22.25 24.5"
                          stroke="#192959"
                          stroke-width="1.5"
                          stroke-linecap="round"
                      />
                    </svg>
                  </div>
                  <div
                      class=" w-full"
                      @click.outside="isGuestsDropdownOpen = false"
                  >
                    <button
                        type="button"
                        @click="isGuestsDropdownOpen = !isGuestsDropdownOpen"
                        class="w-full bg-transparent text-left text-primary flex items-center"
                    >
                      <span x-text="guestLabel()"></span>
                      <div class="md:w-7.5 md:min-w-7.5 w-5 min-w-5 ml-auto duration-200"
                           :class="{'rotate-180': isGuestsDropdownOpen}"
                      >
                        <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14.9999 19.1378L22.2262 11.9134L20.9006 10.5859L14.9999 16.4866L9.10118 10.5859L7.77368 11.9134L14.9999 19.1378Z"
                                fill="black"
                          />
                        </svg>
                      </div>
                    </button>

                    <div
                        x-show="isGuestsDropdownOpen"
                        x-cloak
                        class="absolute z-30 top-[calc(100%+1px)] w-full left-0 bg-white rounded shadow-md border border-primary/10 overflow-hidden"
                    >
                      <template x-for="item in [1,2,3,4,5,6]" :key="item">
                        <button
                            type="button"
                            @click="setGuests(item)"
                            class="w-full md:text-lg text-sm px-3 py-2 duration-150 text-left"
                            :class="guests === item ? 'bg-primary text-white' : 'text-primary hover:bg-primary/10'"
                            x-text="item + ' ' + (item === 1 ? 'Adult' : 'Adults')"
                        ></button>
                      </template>
                    </div>
                  </div>
                </div>
              </div>

              <!--     Delegates number (Meeting)       -->
              <div class="lg:col-span-5 col-span-6 relative"
                   x-show="currentTypeName() === 'meeting'" x-cloak
              >
                <div
                    class="bg-white font-medium md:text-xl text-sm text-primary flex items-center md:gap-3 gap-1 rounded md:p-4 p-2.5"
                >
                  <div class="md:w-7.5 md:min-w-7.5 w-5 min-w-5">
                    <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                      <path
                          d="M15 15.5C17.3472 15.5 19.25 13.5972 19.25 11.25C19.25 8.90279 17.3472 7 15 7C12.6528 7 10.75 8.90279 10.75 11.25C10.75 13.5972 12.6528 15.5 15 15.5Z"
                          stroke="#192959"
                          stroke-width="1.5"
                      />
                      <path
                          d="M7.75 24.5C7.75 20.7721 10.7721 17.75 14.5 17.75H15.5C19.2279 17.75 22.25 20.7721 22.25 24.5"
                          stroke="#192959"
                          stroke-width="1.5"
                          stroke-linecap="round"
                      />
                    </svg>
                  </div>
                  <div class="w-full">
                    <input
                        type="number"
                        min="1"
                        x-model.number="meetingDelegates"
                        class="w-full bg-transparent text-left text-primary outline-none"
                        placeholder="Number of delegates"
                    >
                  </div>
                </div>
              </div>

              <!--    Time dropdown (Eat/Golf)        -->
              <div class="lg:col-span-5 col-span-6 relative" x-show="currentTypeName() === 'eat' || currentTypeName() === 'golf'"
                   x-cloak
              >
                <div
                    class="bg-white font-medium md:text-xl text-sm text-primary flex items-center md:gap-3 gap-1 rounded md:p-4 p-2.5"
                >
                  <div class="md:w-7.5 md:min-w-7.5 w-5 min-w-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -3 35 35" fill="none" class="w-full">
                      <path
                          d="M15 28.125C12.4041 28.125 9.86654 27.3552 7.70815 25.913C5.54975 24.4709 3.86749 22.421 2.87409 20.0227C1.88069 17.6244 1.62077 14.9854 2.1272 12.4394C2.63363 9.89345 3.88367 7.55479 5.71923 5.71923C7.55479 3.88367 9.89345 2.63363 12.4394 2.1272C14.9854 1.62077 17.6244 1.88069 20.0227 2.87409C22.421 3.86749 24.4709 5.54975 25.913 7.70815C27.3552 9.86654 28.125 12.4041 28.125 15C28.125 18.481 26.7422 21.8194 24.2808 24.2808C21.8194 26.7422 18.481 28.125 15 28.125ZM15 3.75001C12.775 3.75001 10.5999 4.40981 8.74984 5.64597C6.89979 6.88214 5.45785 8.63915 4.60636 10.6948C3.75488 12.7505 3.53209 15.0125 3.96617 17.1948C4.40026 19.3771 5.47171 21.3816 7.04505 22.955C8.6184 24.5283 10.623 25.5998 12.8052 26.0338C14.9875 26.4679 17.2495 26.2451 19.3052 25.3937C21.3609 24.5422 23.1179 23.1002 24.354 21.2502C25.5902 19.4001 26.25 17.225 26.25 15C26.25 12.0163 25.0647 9.15484 22.955 7.04505C20.8452 4.93527 17.9837 3.75001 15 3.75001Z"
                          fill="#192959"
                      />
                      <path d="M19.3031 20.625L14.0625 15.3844V6.5625H15.9375V14.6062L20.625 19.3031L19.3031 20.625Z"
                            fill="#192959"
                      />
                    </svg>
                  </div>
                  <div
                      class="w-full"
                      @click.outside="isTypeTimeDropdownOpen = false"
                  >
                    <button
                        type="button"
                        @click="isTypeTimeDropdownOpen = !isTypeTimeDropdownOpen"
                        class="w-full bg-transparent text-left text-primary flex items-center"
                    >
                      <span x-text="currentTypeTimeLabel()"></span>
                      <div class="md:w-7.5 md:min-w-7.5 w-5 min-w-5 ml-auto duration-200"
                           :class="{'rotate-180': isTypeTimeDropdownOpen}"
                      >
                        <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14.9999 19.1378L22.2262 11.9134L20.9006 10.5859L14.9999 16.4866L9.10118 10.5859L7.77368 11.9134L14.9999 19.1378Z"
                                fill="black"
                          />
                        </svg>
                      </div>
                    </button>
                    <div
                        x-show="isTypeTimeDropdownOpen"
                        x-cloak
                        class="absolute z-30 top-[calc(100%+8px)] max-h-50 md:max-h-75 left-0 w-full bg-white rounded shadow-md border border-primary/10 overflow-auto"
                    >
                      <template x-for="(item, index) in currentTypeTimes()" :key="item.value">
                        <button
                            type="button"
                            @click="setTypeTime(index)"
                            class="w-full text-left md:text-lg text-sm px-3 py-2 duration-150"
                            :class="currentTypeTimeIndex() === index ? 'bg-primary text-white' : 'text-primary hover:bg-primary/10'"
                            x-text="item.name"
                        ></button>
                      </template>
                    </div>
                  </div>
                </div>
              </div>

              <!--    SpaType picker        -->
              <div class="lg:col-span-5 col-span-6 relative" x-show="currentTypeName() === 'spa'" x-cloak>
                <div
                    class="bg-white font-medium md:text-xl text-sm text-primary flex items-center md:gap-3 gap-1 rounded md:p-4 p-2.5"
                >
                  <div class="md:w-7.5 md:min-w-7.5 w-5 min-w-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="none" class="w-full">
                      <path
                          d="M14.4326 26.0467C13.2151 25.8076 11.9988 25.4067 10.7838 24.8442C9.56882 24.2817 8.48132 23.4988 7.52132 22.4955C6.56132 21.4921 5.78048 20.2559 5.17882 18.7867C4.57715 17.3176 4.27715 15.5588 4.27882 13.5105V13.308C4.27882 13.0805 4.34882 12.8971 4.48882 12.758C4.62798 12.618 4.81132 12.548 5.03882 12.548H5.19257C6.06257 12.548 7.0959 12.7555 8.29257 13.1705C9.49007 13.5855 10.5063 14.0959 11.3413 14.7017C11.4421 13.3042 11.7563 11.8451 12.2838 10.3242C12.8113 8.80339 13.4901 7.44297 14.3201 6.24297C14.5059 5.98464 14.7326 5.85547 15.0001 5.85547C15.2676 5.85547 15.4942 5.98464 15.6801 6.24297C16.5101 7.44297 17.1888 8.81172 17.7163 10.3492C18.2438 11.8859 18.558 13.353 18.6588 14.7505C19.4455 14.1921 20.4213 13.6976 21.5863 13.2667C22.7513 12.8359 23.8092 12.5963 24.7601 12.548L24.9801 12.5242C25.1967 12.5084 25.3826 12.5776 25.5376 12.7317C25.6917 12.8867 25.7609 13.0726 25.7451 13.2892L25.7213 13.558C25.6088 15.1896 25.3367 16.6638 24.9051 17.9805C24.4734 19.298 23.8734 20.4663 23.1051 21.4855C22.3359 22.5046 21.3921 23.3796 20.2738 24.1105C19.1555 24.8413 17.8592 25.4463 16.3851 25.9255C16.1142 26.0155 15.7888 26.0684 15.4088 26.0842C15.0288 26.1001 14.7038 26.0876 14.4338 26.0467M15.4176 24.938C15.1892 21.5005 14.153 18.8913 12.3088 17.1105C10.4646 15.3296 8.20965 14.2305 5.54382 13.813C5.50215 13.813 5.50215 13.813 5.54382 13.813C5.77298 17.3338 6.84048 19.9796 8.74632 21.7505C10.6521 23.5213 12.8763 24.5838 15.4188 24.938C15.4605 24.9588 15.4605 24.9642 15.4188 24.9542C15.3771 24.9442 15.3771 24.9388 15.4188 24.938M12.5626 15.563C13.0276 15.9496 13.4771 16.4276 13.9113 16.9967C14.3455 17.5667 14.7084 18.1126 15.0001 18.6342C15.2809 18.1126 15.6413 17.5667 16.0813 16.9967C16.5205 16.4267 16.9726 15.9488 17.4376 15.563C17.4284 14.2955 17.2101 12.9596 16.7826 11.5555C16.3559 10.1521 15.7617 8.81172 15.0001 7.53422C14.2392 8.81172 13.6451 10.1484 13.2176 11.5442C12.7901 12.9401 12.5717 14.2796 12.5626 15.563ZM15.6538 20.1067C15.9038 20.7734 16.1092 21.4463 16.2701 22.1255C16.4309 22.8046 16.5638 23.603 16.6688 24.5205C17.6271 24.1896 18.5551 23.7463 19.4526 23.1905C20.3501 22.6346 21.1488 21.928 21.8488 21.0705C22.5488 20.213 23.1355 19.1909 23.6088 18.0042C24.0821 16.8176 24.3651 15.4205 24.4576 13.813C24.4576 13.7713 24.4576 13.7713 24.4576 13.813C22.4351 14.1046 20.6359 14.8159 19.0601 15.9467C17.4842 17.0776 16.3488 18.4642 15.6538 20.1067Z"
                          fill="#192959"
                      />
                    </svg>
                  </div>

                  <div
                      class="w-full"
                      @click.outside="isSpaTypeDropdownOpen = false"
                  >
                    <button
                        type="button"
                        @click="isSpaTypeDropdownOpen = !isSpaTypeDropdownOpen"
                        class="w-full bg-transparent text-left text-primary flex items-center"
                    >
                      <span x-text="spaTypeLabel()"></span>
                      <div class="md:w-7.5 md:min-w-7.5 w-5 min-w-5 ml-auto duration-200"
                           :class="{'rotate-180': isSpaTypeDropdownOpen}"
                      >
                        <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14.9999 19.1378L22.2262 11.9134L20.9006 10.5859L14.9999 16.4866L9.10118 10.5859L7.77368 11.9134L14.9999 19.1378Z"
                                fill="black"
                          />
                        </svg>
                      </div>
                    </button>
                    <div
                        x-show="isSpaTypeDropdownOpen"
                        x-cloak
                        class="absolute z-30 top-[calc(100%+8px)]  max-h-50 md:max-h-75 left-0 w-full bg-white rounded shadow-md border border-primary/10 overflow-auto"
                    >
                      <template x-for="(item, index) in spaTypes" :key="index">
                        <button
                            type="button"
                            @click="setSpaType(index)"
                            class="w-full text-left md:text-lg text-sm px-3 py-2 duration-150"
                            :class="activeSpaType === index ? 'bg-primary text-white' : 'text-primary hover:bg-primary/10'"
                            x-text="item.name"
                        ></button>
                      </template>
                    </div>
                  </div>
                </div>
              </div>

              <!--    Button        -->
              <div class="lg:col-span-2 col-span-full text-center">
                <button
                    type="button"
                    @click="submitSearch()"
                    class="lg:block lg:w-full bg-white font-medium md:text-xl text-sm text-primary rounded md:py-4 py-2.5 lg:px-2.5 px-10 hover:opacity-90 duration-300"
                >
                  <span class="inline-block md:h-7.5 uppercase">
                    <?= esc_html($btn_text) ?>
                  </span>
                </button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <?php
  }
}
