<?php
/**
 * Template Name: HomePage
 * Description:
 */
?>
<?php get_header(); ?>


<main class="">

  <header class="w-full h-dvh flex flex-col py-14"
          style="background-image: radial-gradient(25.28% 100% at 50% 51.67%, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%), linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), linear-gradient(360deg, rgba(0, 0, 0, 0.7) 13.43%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.5) 100%), url('<?= get_template_directory_uri() ?>/assets/img/hero-sample-1.jpg'); background-size: cover; background-position:center; background-repeat: no-repeat">

    <div class="grow flex flex-col justify-center">
      <div class="container">
        <div class="lg:w-1/2 text-center mx-auto">

          <h1 class="text-display text-white mb-6">THE MEGARO COLLECTION</h1>
          <p class="text-body-xl text-white mb-10">Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
          <a href="#" class="btn btn-primary-fill btn-lg">Book now</a>

        </div>
      </div>
    </div>
    <div>
      <div class="container">

        <p class="text-white text-center mb-4"><span class="font-medium">The Megaro Collection</span><span
              class="font-light">as uniquely individual as you are</span></p>
        <ul class="flex flex-row justify-center items-center lg:gap-10 gap-4">

          <li>
            <img src="<?= get_template_directory_uri() ?>/assets/img/logo-hokus-pokus.png" alt="Logo icon"
                 class="w-auto lg:h-16 h-9 object-contain object-center">
          </li>
          <li>
            <img src="<?= get_template_directory_uri() ?>/assets/img/logo-spagnoletti.png" alt="Logo icon"
                 class="w-auto lg:h-16 h-9 object-contain object-center">
          </li>
          <li>
            <img src="<?= get_template_directory_uri() ?>/assets/img/logo-california.png" alt="Logo icon"
                 class="w-auto lg:h-16 h-9 object-contain object-center">
          </li>
          <li>
            <img src="<?= get_template_directory_uri() ?>/assets/img/logo-megaro.png" alt="Logo icon"
                 class="w-auto lg:h-16 h-9 object-contain object-center">
          </li>
          <li>
            <img src="<?= get_template_directory_uri() ?>/assets/img/logo-gyle.png" alt="Logo icon"
                 class="w-auto lg:h-16 h-9 object-contain object-center">
          </li>
          <li>
            <img src="<?= get_template_directory_uri() ?>/assets/img/logo-derby.png" alt="Logo icon"
                 class="w-auto lg:h-11 h-5 object-contain object-center">
          </li>

        </ul>

      </div>
    </div>

  </header>
  <section class="bg-secondary lg:py-24 py-16">
    <div class="container">
      <div class="lg:w-2/3 mx-auto">

        <h2 class="text-heading-2 text-center">A HEADING THAT <br> INTRODUCES THE COLLECTION</h2>
        <hr class="w-24 border-primary lg:my-10 my-8 mx-auto">
        <p class="text-body-xl text-center text-[#404040]">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                           elit. Etiam eu nulla vitae velit condimentum interdum sed eu arcu. Maecenas lectus tellus, gravida
                                                           at vestibulum vel, condimentum id nulla.</p>

      </div>
    </div>
  </section>
  <section class="bg-neutral-linen lg:py-24 py-16">
    <div class="container">
      <div>

        <div class="lg:w-1/2 w-full mx-auto lg:mb-16 mb-12">

          <p class="text-body-lg text-primary text-center mb-6">OVERLINE</p>
          <h2 class="text-heading-2 text-center">OUR HOTELS</h2>

        </div>
        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-12">

          <li class="flex flex-col text-center">

            <div class="mb-6">
              <img src="<?= get_template_directory_uri() ?>/assets/img/sample-1.jpg" alt="Hotel image"
                   class="w-full lg:h-121 h-102 object-cover object-center">
            </div>
            <div class="grow flex flex-col">

              <div class="grow">

                <h4 class="text-heading-4 mb-4">The Megaro</h4>
                <div class="flex flex-row justify-center items-center mb-4">

                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-black.svg" alt="Star icon"
                       class="w-6 h-6 object-contain object-center">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-black.svg" alt="Star icon"
                       class="w-6 h-6 object-contain object-center">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-black.svg" alt="Star icon"
                       class="w-6 h-6 object-contain object-center">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-black.svg" alt="Star icon"
                       class="w-6 h-6 object-contain object-center">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-black.svg" alt="Star icon"
                       class="w-6 h-6 object-contain object-center">

                </div>
                <p class="text-body-lg mb-6">Our flagship hotel whole-heartedly embraces the changing
                                             face of London and combines all the things that make life fun.</p>

              </div>
              <div>
                <a href="#" class="btn btn-black-outline btn-lg">View hotel</a>
              </div>

            </div>

          </li>
          <li class="flex flex-col text-center">

            <div class="mb-6">
              <img src="<?= get_template_directory_uri() ?>/assets/img/sample-2.jpg" alt="Hotel image"
                   class="w-full lg:h-121 h-102 object-cover object-center">
            </div>
            <div class="grow flex flex-col">

              <div class="grow">

                <h4 class="text-heading-4 mb-4">The Gyle</h4>
                <div class="flex flex-row justify-center items-center mb-4">

                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-black.svg" alt="Star icon"
                       class="w-6 h-6 object-contain object-center">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-black.svg" alt="Star icon"
                       class="w-6 h-6 object-contain object-center">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-black.svg" alt="Star icon"
                       class="w-6 h-6 object-contain object-center">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-black.svg" alt="Star icon"
                       class="w-6 h-6 object-contain object-center">

                </div>
                <p class="text-body-lg mb-6">Tortor interdum condimentum nunc molestie quam lectus
                                             euismod pulvinar risus. Cursus in odio aenean.</p>

              </div>
              <div>
                <a href="#" class="btn btn-black-outline btn-lg">View hotel</a>
              </div>

            </div>

          </li>
          <li class="flex flex-col text-center">

            <div class="mb-6">
              <img src="<?= get_template_directory_uri() ?>/assets/img/sample-3.jpg" alt="Hotel image"
                   class="w-full lg:h-121 h-102 object-cover object-center">
            </div>
            <div class="grow flex flex-col">

              <div class="grow">

                <h4 class="text-heading-4 mb-4">The California</h4>
                <div class="flex flex-row justify-center items-center mb-4">

                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-black.svg" alt="Star icon"
                       class="w-6 h-6 object-contain object-center">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-black.svg" alt="Star icon"
                       class="w-6 h-6 object-contain object-center">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-black.svg" alt="Star icon"
                       class="w-6 h-6 object-contain object-center">

                </div>
                <p class="text-body-lg mb-6">Tortor interdum condimentum nunc molestie quam lectus
                                             euismod pulvinar risus. Cursus in odio aenean.</p>

              </div>
              <div>
                <a href="#" class="btn btn-black-outline btn-lg">View hotel</a>
              </div>

            </div>

          </li>

        </ul>

      </div>
    </div>
  </section>
  <section class="bg-secondary lg:py-24 py-16">
    <div class="container">
      <div>

        <div class="lg:w-1/2 w-full mx-auto lg:mb-16 mb-12">

          <p class="text-body-lg text-primary text-center mb-6">OVERLINE</p>
          <h2 class="text-heading-2 text-center">BARS & <br> RESTAURANTS</h2>

        </div>
        <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-16 xl:gap-x-24 gap-y-16">

          <li class="flex flex-col lg:gap-10 gap-8">

            <div class="md:order-2 order-1">
              <img src="<?= get_template_directory_uri() ?>/assets/img/sample-4.jpg" alt="Sample"
                   class="w-full lg:h-175 h-102 object-cover object-center">
            </div>
            <div class="md:order-1 order-2 xl:px-16 lg:px-10 px-6">

              <div class="lg:mb-6 mb-4">
                <img src="<?= get_template_directory_uri() ?>/assets/img/logo-spagnoletti-2.png" alt="Logo icon"
                     class="w-20 h-20 object-contain object-center">
              </div>
              <h4 class="text-heading-4">Spagnoletti</h4>
              <hr class="w-24 border-primary lg:my-6 my-4">
              <p class="text-body-lg text-[#404040] lg:mb-10 mb-6">Our multi-Michelin star Chef Patron
                                                                   Adam Simmonds is one of the nation’s brightest culinary names, bringing his signature
                                                                   light touch to our sumptuous menu of reimagined Italian classics with heavenly bold
                                                                   flavours.</p>
              <a href="#" class="btn btn-black-outline btn-lg">Discover more</a>

            </div>

          </li>
          <li class="flex flex-col lg:gap-10 gap-8">

            <div class="md:order-1 order-1">
              <img src="<?= get_template_directory_uri() ?>/assets/img/sample-5.jpg" alt="Sample"
                   class="w-full lg:h-175 h-102 object-cover object-center">
            </div>
            <div class="md:order-2 order-2 xl:px-16 lg:px-10 px-6">

              <div class="lg:mb-6 mb-4">
                <img src="<?= get_template_directory_uri() ?>/assets/img/logo-hokus-pokus-2.png" alt="Logo icon"
                     class="w-20 h-20 object-contain object-center">
              </div>
              <h4 class="text-heading-4">Hokus Pokus</h4>
              <hr class="w-24 border-primary lg:my-6 my-4">
              <p class="text-body-lg text-[#404040] lg:mb-10 mb-6">Hokus Pokus is a London underground bar
                                                                   serving botanical concoctions, craft cocktails and fine libations, inspired by the
                                                                   history of King’s Cross, Bloomsbury and Camden.</p>
              <a href="#" class="btn btn-black-outline btn-lg">Discover more</a>

            </div>

          </li>

        </ul>

      </div>
    </div>
  </section>
  <section class="bg-neutral-graphite lg:py-24 py-16">
    <div class="container">
      <div>

        <h3 class="text-heading-3 text-white text-center mb-10">CHECK AVAILABILITY</h3>
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
                        <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-down-black.svg" alt="Arrow icon"
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

                            <img src="<?= get_template_directory_uri() ?>/assets/img/svg/calendar-black.svg"
                                 alt="Calendar icon"
                                 class="w-6 h-6">
                            <p x-text="display" class="text-body-lg text-[#737373]"></p>

                          </div>
                          <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-down-black.svg" alt="Arrow icon"
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

                            <img src="<?= get_template_directory_uri() ?>/assets/img/svg/calendar-black.svg"
                                 alt="Calendar icon"
                                 class="w-6 h-6">
                            <p x-text="display" class="text-body-lg text-[#737373]"></p>

                          </div>
                          <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-down-black.svg" alt="Arrow icon"
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

                          <img src="<?= get_template_directory_uri() ?>/assets/img/svg/user-black.svg" alt="User icon"
                               class="w-6 h-6">
                          <p x-text="display" class="text-body-lg"
                             :class="display === options[0]?.label ? 'text-[#737373]' : ''"></p>

                        </div>
                        <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-down-black.svg" alt="Arrow icon"
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
                        <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-down-black.svg" alt="Arrow icon"
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

                          <img src="<?= get_template_directory_uri() ?>/assets/img/svg/user-black.svg" alt="User icon"
                               class="w-6 h-6">
                          <p x-text="display" class="text-body-lg"
                             :class="display === options[0]?.label ? 'text-[#737373]' : ''"></p>

                        </div>
                        <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-down-black.svg" alt="Arrow icon"
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

                            <img src="<?= get_template_directory_uri() ?>/assets/img/svg/calendar-black.svg"
                                 alt="Calendar icon"
                                 class="w-6 h-6">
                            <p x-text="display" class="text-body-lg text-[#737373]"></p>

                          </div>
                          <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-down-black.svg" alt="Arrow icon"
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

                          <img src="<?= get_template_directory_uri() ?>/assets/img/svg/clock-black.svg" alt="Clock icon"
                               class="w-6 h-6">
                          <p x-text="display" class="text-body-lg"
                             :class="display === options[0]?.label ? 'text-[#737373]' : ''"></p>

                        </div>
                        <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-down-black.svg" alt="Arrow icon"
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
  <section class="bg-neutral-linen lg:py-24 py-16">
    <div class="container">
      <div>

        <div class="lg:mb-16 mb-12">

          <p class="text-body-lg text-primary text-center mb-6">OVERLINE</p>
          <h2 class="text-heading-2 text-center mb-6">LOCATIONS</h2>
          <p class="text-body-lg text-[#404040] text-center">Perfectly placed in the heart of London.</p>

        </div>
        <div>
          <iframe src="https://www.google.com/maps?q=Turin,Italy&output=embed" loading="lazy"
                  class="w-full lg:h-150 h-75">
          </iframe>
        </div>

      </div>
    </div>
  </section>
  <section class="bg-secondary lg:py-24 py-16">
    <div class="container">
      <div class="flex flex-row lg:flex-nowrap flex-wrap justify-end xl:gap-x-24 gap-x-12 gap-y-16">

        <div class="lg:w-2/5 lg:order-1 order-1">

          <div class="lg:mb-10 mb-8">
            <img src="<?= get_template_directory_uri() ?>/assets/img/logo-derby-2.png" alt="Logo icon"
                 class="w-32 h-11 object-contain object-center">
          </div>
          <p class="text-body-lg text-primary mb-6">BUSINESS READY</p>
          <h2 class="text-heading-2 lg:mb-10 mb-8">MEETINGS & <br> EVENTS SPACES</h2>
          <p class="text-body-lg text-[#404040] lg:mb-10 mb-8">The Derby offers a collection of unique
                                                               spaces
                                                               for meetings, private dining, and corporate events. From focused boardroom sessions to
                                                               larger gatherings, it combines characterful interiors with flexible layouts and a
                                                               central London location — ideal for memorable events with purpose.</p>
          <a href="#" class="btn btn-black-outline btn-lg">View Meeting & Events</a>

        </div>
        <div class="lg:w-3/5 md:w-4/5 w-full lg:order-2 order-2">

          <div class="relative z-1 flex flex-row justify-end">
            <img src="<?= get_template_directory_uri() ?>/assets/img/sample-6.jpg" alt="Sample"
                 class="w-4/5 aspect-square object-cover object-center"/>
          </div>
          <div class="relative z-1 flex flex-row justify-start md:-mt-32 -mt-20">
            <img src="<?= get_template_directory_uri() ?>/assets/img/sample-7.jpg" alt="Sample"
                 class="lg:w-2/5 w-1/2 aspect-square md:translate-x-0 translate-x-1/4 border-8 border-secondary object-cover object-center"/>
          </div>

        </div>

      </div>
    </div>
  </section>
  <section class="bg-neutral-linen lg:py-24 py-16">
    <div class="container">
      <div>

        <div class="lg:mb-16 mb-12">

          <p class="text-body-lg text-primary text-center mb-6">OVERLINE</p>
          <h2 class="text-heading-2 text-center mb-6">BLOG</h2>
          <div class="flex flex-row justify-center items-center">
            <a href="#" class="group flex flex-row items-center gap-2 hover:opacity-70">

              <span class="text-body-lg">All articles</span>
              <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-right-black.svg" alt="Arrow icon"
                   class="w-4 h-4 group-hover:translate-x-1 duration-300">

            </a>
          </div>

        </div>
        <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-12">

          <li class="flex flex-col">

            <div class="mb-6">
              <img src="<?= get_template_directory_uri() ?>/assets/img/sample-8.jpg" alt="Sample"
                   class="w-full lg:h-100 h-55 object-cover object-center">
            </div>
            <div class="grow flex flex-col gap-8">

              <div class="grow">

                <p class="text-body-md text-[#737373] mb-4">20 Nov 2025</p>
                <h4 class="text-heading-4 mb-4">Late Summer in London 2025: Top Events Near King’s
                                                Cross</h4>
                <p class="text-body-lg text-[#404040]">Tortor interdum condimentum nunc molestie quam
                                                       lectus euismod pulvinar risus. </p>

              </div>
              <a href="#" class="w-fit text-body-lg underline underline-offset-4 hover:opacity-70">View
                                                                                                   article</a>

            </div>

          </li>
          <li class="flex flex-col">

            <div class="mb-6">
              <img src="<?= get_template_directory_uri() ?>/assets/img/sample-9.jpg" alt="Sample"
                   class="w-full lg:h-100 h-55 object-cover object-center">
            </div>
            <div class="grow flex flex-col gap-8">

              <div class="grow">

                <p class="text-body-md text-[#737373] mb-4">20 Nov 2025</p>
                <h4 class="text-heading-4 mb-4">Summer in London at The Megaro Hotel: Where Style Meets
                                                Adventure</h4>
                <p class="text-body-lg text-[#404040]">Tortor interdum condimentum nunc molestie quam
                                                       lectus euismod pulvinar risus.</p>

              </div>
              <a href="#" class="w-fit text-body-lg underline underline-offset-4 hover:opacity-70">View
                                                                                                   article</a>

            </div>

          </li>

        </ul>

      </div>
    </div>
  </section>
  <section class="bg-secondary py-16">
    <div class="container">
      <div class="lg:w-2/3 xl:w-1/2 mx-auto">

        <div class="mb-6">

          <p class="text-body-lg text-primary text-center mb-4">SUBSCRIBE</p>
          <h3 class="text-heading-3 text-center mb-4">NEWSLETTER</h3>
          <p class="text-body-lg text-center text-[#404040]">Be the first to hear about great offers, new
                                                             openings and events.</p>

        </div>
        <div class="flex flex-row justify-center items-center mb-6">

          <input type="text" class="lg:w-80 w-56 text-body-lg" placeholder="Email address">
          <button class="btn btn-primary-fill btn-lg">Subscribe</button>

        </div>
        <p class="text-body-md text-center text-[#737373]">By subscribing, you agree to our Terms &
                                                           Conditions</p>

      </div>
    </div>
  </section>

</main>


<?php get_footer(); ?>
