<?php
/**
 * Template Name: Hotel Rooms
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
      <li class="group active">
        <a href="#"
           class="block text-body-md hover:opacity-70 py-4 border-b-2 border-transparent group-[.active]:border-primary">Rooms</a>
      </li>
      <li class="group">
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

  <header class="bg-secondary lg:py-24 py-16">
    <div class="container">
      <div class="lg:w-1/2 mx-auto">

        <p class="text-body-lg text-primary text-center mb-4">REST EASY</p>
        <h1 class="text-heading-1 text-center mb-4">ROOMS & SUITES</h1>
        <p class="text-body-lg text-center text-[#404040]">
          Our rooms and suites are designed to delight in deeply immersive mini-universes straight out of a
          theatric novel. With five different themes, you haven’t tried one until you've tried them all.
        </p>

      </div>
    </div>
  </header>
  <section class="bg-neutral-linen lg:py-24 py-16">
    <div class="container">
      <div>
        <ul class="lg:space-y-16 space-y-12">

          <li class="grid grid-cols-1 md:grid-cols-5 md:gap-x-8 lg:gap-x-16 xl:gap-x-24 gap-y-6">

            <div class="md:col-span-2 md:order-1 order-2">

              <h4 class="text-heading-4 mb-6">Diesel Corner Studio</h4>
              <ul class="flex flex-row flex-wrap items-center gap-3">

                <li class="text-body-md text-[#404040]">2 Guests</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">48 sqm</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">King bed</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">Dog-friendly</li>

              </ul>
              <hr class="border-primary my-6">
              <p class="text-body-lg text-[#404040] lg:mb-10 mb-8">The interiors are a quirky artistic
                                                                   compositions printed on metal sheets and soft cushions, using local cultural icons from
                                                                   the British bulldog to Harry Potter's owl, revisited with humour. A dash of rock and
                                                                   roll, this room comes with carpets evoking burnt rubber on asphalt and shimmering,
                                                                   petrol coloured walls.</p>
              <a href="#" class="btn btn-black-outline btn-lg">Room details</a>

            </div>
            <div class="md:col-span-3 md:order-2 order-1">
              <div class="swiper relative" data-slider="rooms">

                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/hero-sample-2.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-1.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-2.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-3.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-4.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-5.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>

                </div>
                <button data-swiper-button-previous
                        class="absolute top-1/2 -translate-y-1/2 left-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-left-black.svg" alt="Arrow icon"
                       class="w-4 h-4">
                </button>
                <button data-swiper-button-next
                        class="absolute top-1/2 -translate-y-1/2 right-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-right-black.svg" alt="Arrow icon"
                       class="w-4 h-4">
                </button>
                <div data-swiper-pagination></div>

              </div>
            </div>

          </li>
          <li class="grid grid-cols-1 md:grid-cols-5 md:gap-x-8 lg:gap-x-16 xl:gap-x-24 gap-y-6">

            <div class="md:col-span-2 md:order-1 order-2">

              <h4 class="text-heading-4 mb-6">Pop Diva Suites</h4>
              <ul class="flex flex-row flex-wrap items-center gap-3">

                <li class="text-body-md text-[#404040]">2 Guests</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">48 sqm</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">King bed</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">Dog-friendly</li>

              </ul>
              <hr class="border-primary my-6">
              <p class="text-body-lg text-[#404040] lg:mb-10 mb-8">
                Dubbed 'Pop Diva Studios', each room has the compact and versatile layout of a
                backstage, movie artist studio with dedicated bar lounge, and dressing area in a
                glamourous palette of vibrant reds and seductive gold.
              </p>
              <a href="#" class="btn btn-black-outline btn-lg">Room details</a>

            </div>
            <div class="md:col-span-3 md:order-2 order-1">
              <div class="swiper relative" data-slider="rooms">

                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-36.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-7.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-8.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-9.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-10.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-1.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>

                </div>
                <button data-swiper-button-previous
                        class="absolute top-1/2 -translate-y-1/2 left-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-left-black.svg" alt="Arrow icon"
                       class="w-4 h-4">
                </button>
                <button data-swiper-button-next
                        class="absolute top-1/2 -translate-y-1/2 right-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-right-black.svg" alt="Arrow icon"
                       class="w-4 h-4">
                </button>
                <div data-swiper-pagination></div>

              </div>
            </div>

          </li>
          <li class="grid grid-cols-1 md:grid-cols-5 md:gap-x-8 lg:gap-x-16 xl:gap-x-24 gap-y-6">

            <div class="md:col-span-2 md:order-1 order-2">

              <h4 class="text-heading-4 mb-6">Britannia Rose</h4>
              <ul class="flex flex-row flex-wrap items-center gap-3">

                <li class="text-body-md text-[#404040]">2 Guests</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">48 sqm</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">King bed</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">Dog-friendly</li>

              </ul>
              <hr class="border-primary my-6">
              <p class="text-body-lg text-[#404040] lg:mb-10 mb-8">
                For the finer things in life, enjoy Britannia Rose's wine-themed interior. Each room has
                a warm, dramatic design scheme in five shades of red and pink inspired by classic red
                grape varieties: Cabernet, Merlot, Pinot Noir, Sangiovese and Tempranillo. Don't miss
                the 'in vino veritas' custom wallpaper.
              </p>
              <a href="#" class="btn btn-black-outline btn-lg">Room details</a>

            </div>
            <div class="md:col-span-3 md:order-2 order-1">
              <div class="swiper relative" data-slider="rooms">

                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-34.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-1.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-2.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-3.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-4.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-5.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>

                </div>
                <button data-swiper-button-previous
                        class="absolute top-1/2 -translate-y-1/2 left-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-left-black.svg" alt="Arrow icon"
                       class="w-4 h-4">
                </button>
                <button data-swiper-button-next
                        class="absolute top-1/2 -translate-y-1/2 right-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-right-black.svg" alt="Arrow icon"
                       class="w-4 h-4">
                </button>
                <div data-swiper-pagination></div>

              </div>
            </div>

          </li>
          <li class="grid grid-cols-1 md:grid-cols-5 md:gap-x-8 lg:gap-x-16 xl:gap-x-24 gap-y-6">

            <div class="md:col-span-2 md:order-1 order-2">

              <h4 class="text-heading-4 mb-6">Groove Britannia</h4>
              <ul class="flex flex-row flex-wrap items-center gap-3">

                <li class="text-body-md text-[#404040]">2 Guests</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">48 sqm</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">King bed</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">Dog-friendly</li>

              </ul>
              <hr class="border-primary my-6">
              <p class="text-body-lg text-[#404040] lg:mb-10 mb-8">
                Spend a night in this music inspired space, where dancing in your room is heavily
                encouraged. You'll find individually designed beds, mobile wardrobes, and rippling
                silver surfaces inspired by the first Apollo space programme, British glam rock, and
                disco balls.
              </p>
              <a href="#" class="btn btn-black-outline btn-lg">Room details</a>

            </div>
            <div class="md:col-span-3 md:order-2 order-1">
              <div class="swiper relative" data-slider="rooms">

                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-37.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-7.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-8.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-9.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-10.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-1.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>

                </div>
                <button data-swiper-button-previous
                        class="absolute top-1/2 -translate-y-1/2 left-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-left-black.svg" alt="Arrow icon"
                       class="w-4 h-4">
                </button>
                <button data-swiper-button-next
                        class="absolute top-1/2 -translate-y-1/2 right-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-right-black.svg" alt="Arrow icon"
                       class="w-4 h-4">
                </button>
                <div data-swiper-pagination></div>

              </div>
            </div>

          </li>
          <li class="grid grid-cols-1 md:grid-cols-5 md:gap-x-8 lg:gap-x-16 xl:gap-x-24 gap-y-6">

            <div class="md:col-span-2 md:order-1 order-2">

              <h4 class="text-heading-4 mb-6">Backstage Britannia</h4>
              <ul class="flex flex-row flex-wrap items-center gap-3">

                <li class="text-body-md text-[#404040]">2 Guests</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">48 sqm</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">King bed</li>
                <li class="w-2 h-2 bg-primary rotate-45"></li>
                <li class="text-body-md text-[#404040]">Dog-friendly</li>

              </ul>
              <hr class="border-primary my-6">
              <p class="text-body-lg text-[#404040] lg:mb-10 mb-8">
                Adorned with flight-case furniture straight off of a movie set that has just been
                unloaded from the trailer or private jet of a DJ or band on a world tour. This room has
                a rebellious punk rock edge inspired by the acid house scene of nearby Camden and King's
                Cross's past.
              </p>
              <a href="#" class="btn btn-black-outline btn-lg">Room details</a>

            </div>
            <div class="md:col-span-3 md:order-2 order-1">
              <div class="swiper relative" data-slider="rooms">

                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-38.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-1.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-2.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-3.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-4.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>
                  <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/sample-5.jpg" alt="Sample"
                         class="w-full md:h-120 h-55 object-cover object-center">
                  </div>

                </div>
                <button data-swiper-button-previous
                        class="absolute top-1/2 -translate-y-1/2 left-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-left-black.svg" alt="Arrow icon"
                       class="w-4 h-4">
                </button>
                <button data-swiper-button-next
                        class="absolute top-1/2 -translate-y-1/2 right-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
                  <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-right-black.svg" alt="Arrow icon"
                       class="w-4 h-4">
                </button>
                <div data-swiper-pagination></div>

              </div>
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
