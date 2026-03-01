<?php
/**
 * Template Name: Hotel Eat & drink
 * Description: 
 */
?>
<?php get_header(); ?>
<style>
  :root {
    --color-primary: #98005D;
    --color-secondary: #EDDEE1;
    --color-mid: #E8C862;
    --color-tertiary: #4A182A;
  }
</style>

<nav class="fixed lg:top-28 top-20 left-0 z-10 w-full bg-neutral-linen border border-[#E5E5E5]">
  <div class="overflow-x-auto w-full">
    <ul class="flex justify-center min-w-full w-max lg:gap-10 gap-8 px-8">

      <li class="group">
        <a href="#"
           class="block text-body-md hover:opacity-70 py-4 border-b-2 border-transparent group-[.active]:border-primary">The
                                                                                                                         Megaro</a>
      </li>
      <li class="group">
        <a href="#"
           class="block text-body-md hover:opacity-70 py-4 border-b-2 border-transparent group-[.active]:border-primary">Rooms</a>
      </li>
      <li class="group active">
        <a href="#"
           class="block text-body-md hover:opacity-70 py-4 border-b-2 border-transparent group-[.active]:border-primary">Eat
                                                                                                                         & Drink</a>
      </li>
      <li class="group">
        <a href="#"
           class="block text-body-md hover:opacity-70 py-4 border-b-2 border-transparent group-[.active]:border-primary">Wellbeing</a>
      </li>
      <li class="group">
        <a href="#"
           class="block text-body-md hover:opacity-70 py-4 border-b-2 border-transparent group-[.active]:border-primary">Group
                                                                                                                         Booking</a>
      </li>
      <li class="group">
        <a href="#"
           class="block text-body-md hover:opacity-70 py-4 border-b-2 border-transparent group-[.active]:border-primary">Gallery</a>
      </li>
      <li class="group">
        <a href="#"
           class="block text-body-md hover:opacity-70 py-4 border-b-2 border-transparent group-[.active]:border-primary">Location</a>
      </li>

    </ul>
  </div>
</nav>

<main class="lg:pt-28 pt-20">

  <header class="w-full md:h-dvh flex flex-row md:flex-nowrap flex-wrap">

    <div class="md:w-1/2 w-full h-full md:order-1 order-2 relative bg-tertiary flex flex-col justify-center items-center md:py-4 py-16 after:content-[''] after:absolute md:after:top-1/2 after:-top-24 after:left-1/2 after:z-1 md:after:-translate-y-1/2 after:w-px md:after:h-4/5 after:h-[calc(100%+6rem)] after:bg-primary">
      <div class="container relative z-2">
        <div class="w-full lg:w-4/5 flex flex-col justify-center items-center bg-tertiary py-6 mx-auto">

          <p class="text-body-lg text-secondary text-center mb-4">INDULGE</p>
          <h1 class="text-heading-1 text-white text-center mb-4">EAT & DRINK</h1>
          <p class="text-body-lg text-[#E5E5E5] text-center">Discover our all-day pasta lab, and underground
                                                             apothecary bar.</p>

        </div>
      </div>
    </div>
    <div class="md:w-1/2 w-full md:h-full h-100 md:order-2 order-1">
      <img src="<?= get_template_directory_uri() ?>/assets/img/hero-sample-3.jpg" alt="Hero image"
           class="w-full h-full object-cover object-center">
    </div>

  </header>
  <section class="bg-secondary lg:py-24 py-16">
    <div class="container">
      <div class="lg:w-2/3 mx-auto">
        <h4 class="text-heading-4 text-center text-[#404040]">
          Indulge in two uniquely crafted experiences - Spagnoletti’s Italian dishes reimagined by
          multi-Michelin star Chef Patron Adam Simmonds, and the botanical craft cocktails of Hokus Pokus, our
          apothecary-inspired bar beneath King’s Cross.
        </h4>
      </div>
    </div>
  </section>
  <section class="bg-neutral-linen lg:py-24 py-16">
    <div class="container">
      <div class="lg:space-y-24 space-y-16">

        <div class="grid grid-cols-1 md:grid-cols-5 md:gap-x-8 lg:gap-x-16 xl:gap-x-24 gap-y-8">

          <div class="md:col-span-2 md:order-1 order-2">

            <div class="lg:mb-10 mb-8">
              <img src="<?= get_template_directory_uri() ?>/assets/img/logo-spagnoletti-2.png" alt="Logo icon"
                   class="w-20 h-20 object-contain object-center">
            </div>
            <h4 class="text-heading-4">Spagnoletti</h4>
            <hr class="w-24 border-primary my-6">
            <p class="text-body-lg text-[#404040] lg:mb-10 mb-8">
              We'll see you here each morning where you can tuck into all manner of fresh pastries, hot
              drinks, full English breakfasts to refuel you for the day. Step into our whimsically
              retro-futuristic space for relaxed sharing food all day long.
              <br>
              <br>
              <b>Our multi-Michelin star Chef Patron Adam Simmonds</b> is one of the nation’s brightest
              culinary names, bringing his signature light touch to our sumptuous menu of reimagined
              Italian classics with heavenly bold flavours
            </p>
            <div class="flex flex-wrap items-center gap-6">

              <a href="#" class="btn btn-black-outline btn-lg">Discover more</a>
              <a href="#" class="btn btn-black-outline btn-lg">Make reservation</a>

            </div>

          </div>
          <div class="md:col-span-3 md:order-2 order-1">
            <img src="<?= get_template_directory_uri() ?>/assets/img/sample-11.png" alt="Sample"
                 class="w-full md:h-183 h-82 object-cover object-center">
          </div>

        </div>
        <div class="grid grid-cols-1 md:grid-cols-5 md:gap-x-8 lg:gap-x-16 xl:gap-x-24 gap-y-8">

          <div class="md:col-span-2 md:order-2 order-2">

            <div class="lg:mb-10 mb-8">
              <img src="<?= get_template_directory_uri() ?>/assets/img/logo-hokus-pokus-2.png" alt="Logo icon"
                   class="w-20 h-20 object-contain object-center">
            </div>
            <h4 class="text-heading-4">Hokus Pokus</h4>
            <hr class="w-24 border-primary my-6">
            <p class="text-body-lg text-[#404040] lg:mb-10 mb-8">
              Looking for adventure? You’ll find late-night bar Hokus Pokus underground, with a hazy
              interior that mixes futuristic steampunk with a Victorian era apothecary.
              <br>
              <br>
              Let us surprise you with our <b>extraordinary cocktails, botanical concoctions, and magical
                                              libations</b> all made and brewed in-house, and served with an eccentric, scientific flair
              guaranteed to put you under a spell.
            </p>
            <div class="flex flex-wrap items-center gap-6">

              <a href="#" class="btn btn-black-outline btn-lg">Discover more</a>
              <a href="#" class="btn btn-black-outline btn-lg">Make reservation</a>

            </div>

          </div>
          <div class="md:col-span-3 md:order-1 order-1">
            <img src="<?= get_template_directory_uri() ?>/assets/img/sample-15.jpg" alt="Sample"
                 class="w-full md:h-183 h-82 object-cover object-center">
          </div>

        </div>

      </div>
    </div>
  </section>
  <section class="bg-neutral-graphite lg:py-24 py-16">
    <div class="container">
      <div>

        <h3 class="text-heading-3 text-white text-center lg:mb-16 mb-12">BOOK A TABLE</h3>
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
