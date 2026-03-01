<?php
/**
 * Template Name: Hotel
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

      <li class="group active">
        <a href="#"
           class="block text-body-md hover:opacity-70 py-4 border-b-2 border-transparent group-[.active]:border-primary">The
                                                                                                                         Megaro</a>
      </li>
      <li class="group">
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

<main class="">

  <header class="w-full h-dvh flex flex-col justify-center items-center py-6"
          style="background-image: radial-gradient(25.28% 100% at 50% 51.67%, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%), linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), linear-gradient(360deg, rgba(0, 0, 0, 0.7) 13.43%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.5) 100%), url('<?= get_template_directory_uri() ?>/assets/img/hero-sample-2.jpg'); background-size: cover; background-position:center; background-repeat: no-repeat">
    <div class="container">
      <div class="lg:w-1/2 flex flex-col justify-center items-center mx-auto">

        <div class="mb-10">
          <img src="<?= get_template_directory_uri() ?>/assets/img/logo-megaro.png" alt="Logo icon"
               class="w-auto lg:h-20 h-15 object-contain object-center">
        </div>
        <div class="mb-10">

          <h1 class="text-display text-white text-center mb-6">THE MEGARO HOTEL</h1>
          <div class="flex flex-row justify-center items-center mb-6">

            <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-white.svg" alt="Star icon"
                 class="w-6 h-6 object-contain object-center">
            <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-white.svg" alt="Star icon"
                 class="w-6 h-6 object-contain object-center">
            <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-white.svg" alt="Star icon"
                 class="w-6 h-6 object-contain object-center">
            <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-white.svg" alt="Star icon"
                 class="w-6 h-6 object-contain object-center">
            <img src="<?= get_template_directory_uri() ?>/assets/img/svg/star-white.svg" alt="Star icon"
                 class="w-6 h-6 object-contain object-center">

          </div>
          <p class="text-body-lg text-white text-center">King's Cross, London</p>

        </div>
        <a href="#" class="btn btn-primary-fill btn-lg">Book now</a>

      </div>
    </div>
  </header>
  <section class="bg-secondary lg:py-24 py-16">
    <div class="container">

      <div class="lg:w-2/3 mx-auto mb-16">

        <h2 class="text-heading-2 text-center">AS UNIQUELY INDIVIDUAL <br> AS YOU ARE</h2>
        <hr class="w-24 border-primary lg:my-10 my-8 mx-auto">
        <p class="text-body-xl text-center text-[#404040]">Behind our multicoloured, mural splattered façade,
                                                           we’re rewriting the entire rulebook. Always striving to deliver an uncompromised excellence in
                                                           service, our flagship hotel whole-heartedly embraces the changing face of London and combines all
                                                           the things that make life fun.</p>

      </div>
      <ul class="flex flex-wrap justify-around gap-6">

        <li class="flex flex-col items-center gap-4">

          <span class="w-2 h-2 bg-primary rotate-45"></span>
          <span class="text-body-lg">Pet-friendly stays</span>

        </li>
        <li class="flex flex-col items-center gap-4">

          <span class="w-2 h-2 bg-primary rotate-45"></span>
          <span class="text-body-lg">Art Deco architecture</span>

        </li>
        <li class="flex flex-col items-center gap-4">

          <span class="w-2 h-2 bg-primary rotate-45"></span>
          <span class="text-body-lg">Award-winning restaurant onsite</span>

        </li>

      </ul>

    </div>
  </section>
  <section class="bg-secondary space-y-2 py-2">

    <div class="swiper relative" data-slider="triple" data-slider-offset="0">

      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/hero-sample-2.jpg" alt="Sample"
               class="w-full h-78 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-31.jpg" alt="Sample"
               class="w-full h-78 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-32.jpg" alt="Sample"
               class="w-full h-78 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-4.jpg" alt="Sample"
               class="w-full h-78 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-5.jpg" alt="Sample"
               class="w-full h-78 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-6.jpg" alt="Sample"
               class="w-full h-78 object-cover object-center">
        </div>

      </div>
      <button data-swiper-button-previous
              class="absolute top-1/2 -translate-y-1/2 left-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
        <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-left-black.svg" alt="Arrow icon" class="w-4 h-4">
      </button>
      <button data-swiper-button-next
              class="absolute top-1/2 -translate-y-1/2 right-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
        <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-right-black.svg" alt="Arrow icon"
             class="w-4 h-4">
      </button>

    </div>
    <div class="swiper relative" data-slider="triple" data-slider-offset="250">

      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-1.jpg" alt="Sample"
               class="w-full h-78 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-33.jpg" alt="Sample"
               class="w-full h-78 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-34.jpg" alt="Sample"
               class="w-full h-78 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-4.jpg" alt="Sample"
               class="w-full h-78 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-5.jpg" alt="Sample"
               class="w-full h-78 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-6.jpg" alt="Sample"
               class="w-full h-78 object-cover object-center">
        </div>

      </div>
      <button data-swiper-button-previous
              class="absolute top-1/2 -translate-y-1/2 left-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
        <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-left-black.svg" alt="Arrow icon" class="w-4 h-4">
      </button>
      <button data-swiper-button-next
              class="absolute top-1/2 -translate-y-1/2 right-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
        <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-right-black.svg" alt="Arrow icon"
             class="w-4 h-4">
      </button>

    </div>

  </section>
  <section class="bg-tertiary lg:py-24 py-16">
    <div class="container">
      <div class="grid grid-cols-1 md:grid-cols-5 md:gap-x-8 lg:gap-x-16 xl:gap-x-24 gap-y-6 text-white">

        <div class="md:col-span-2 flex flex-col justify-center">
          <div>

            <p class="text-body-lg text-secondary mb-6">REST EASY</p>
            <h2 class="text-heading-2 text-white lg:mb-10 mb-8">ROOMS & <br> SUITES</h2>
            <p class="text-body-lg text-[#E5E5E5] lg:mb-10 mb-8">
              Our array of creatively decorated rooms and suites marry design, fashion, cinematography,
              and
              music, all inspired by bygone eras of King’s Cross’ past.
            </p>
            <a href="#" class="btn btn-white-outline btn-lg">Explore all rooms</a>

          </div>
        </div>
        <div class="md:col-span-3">
          <div class="swiper relative" data-slider="rooms">

            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <img src="<?= get_template_directory_uri() ?>/assets/img/sample-10.jpg" alt="Sample"
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
              <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-left-black.svg" alt="Arrow icon" class="w-4 h-4">
            </button>
            <button data-swiper-button-next
                    class="absolute top-1/2 -translate-y-1/2 right-6 z-1 w-10 h-10 flex justify-center items-center bg-white/70 rounded-full hover:bg-white/90">
              <img src="<?= get_template_directory_uri() ?>/assets/img/svg/chevron-right-black.svg" alt="Arrow icon"
                   class="w-4 h-4">
            </button>
            <div data-swiper-pagination></div>

          </div>
        </div>

      </div>
    </div>
  </section>
  <section class="bg-neutral-linen lg:py-24 py-16">
    <div class="container">

      <p class="text-body text-primary text-center lg:mb-10 mb-8">REASONS TO BOOK DIRECT</p>
      <ul class="flex flex-row flex-wrap justify-center gap-6">

        <li class="w-full sm:w-1/2 lg:w-1/3 flex flex-col justify-center items-center bg-secondary px-4 lg:py-10 py-8">

          <div class="mb-4">
            <img src="<?= get_template_directory_uri() ?>/assets/img/best-rates.png" alt="Card icon"
                 class="w-24 h-25 object-contain object-center">
          </div>
          <p class="text-body-xl mb-2">Best rate guaranteed</p>
          <p class="text-body-md text-[#737373]">when you book direct with us</p>

        </li>
        <li class="w-full sm:w-1/2 lg:w-1/3 flex flex-col justify-center items-center bg-secondary px-4 lg:py-10 py-8">

          <div class="mb-4">
            <img src="<?= get_template_directory_uri() ?>/assets/img/priority-upgrades.png" alt="Card icon"
                 class="w-24 h-25 object-contain object-center">
          </div>
          <p class="text-body-xl mb-2">Priority upgrades</p>
          <p class="text-body-md text-[#737373]">subject to availability</p>

        </li>

      </ul>

    </div>
  </section>
  <section class="bg-neutral-linen lg:py-24 py-16">
    <div class="container">

      <div class="flex flex-row lg:flex-nowrap flex-wrap justify-end xl:gap-x-24 gap-x-12 gap-y-16">

        <div class="lg:w-2/5 lg:order-1 order-1">

          <p class="text-body-lg text-primary mb-6">INDULGE</p>
          <h2 class="text-heading-2 lg:mb-10 mb-8">EAT & DRINK</h2>
          <p class="text-body-lg text-[#404040] lg:mb-10 mb-8">
            Indulge in two uniquely crafted experiences - Spagnoletti’s Italian dishes reimagined by
            multi-Michelin star Chef Patron Adam Simmonds, and the botanical craft cocktails of Hokus Pokus,
            our apothecary-inspired bar beneath King’s Cross.
          </p>
          <a href="#" class="btn btn-black-outline btn-lg">Discover more</a>

        </div>
        <div class="lg:w-3/5 md:w-4/5 w-full lg:order-2 order-2">

          <div class="relative z-1 flex flex-row justify-end">
            <img src="<?= get_template_directory_uri() ?>/assets/img/sample-11.png" alt="Sample"
                 class="w-4/5 aspect-square object-cover object-center"/>
          </div>
          <div class="relative z-1 flex flex-row justify-start md:-mt-32 -mt-20">
            <img src="<?= get_template_directory_uri() ?>/assets/img/sample-35.jpg" alt="Sample"
                 class="lg:w-2/5 w-1/2 aspect-square md:translate-x-0 translate-x-1/4 border-8 border-neutral-linen object-cover object-center"/>
          </div>
          <div class="relative z-1 flex flex-row justify-start md:-mt-32 -mt-20">
            <img src="<?= get_template_directory_uri() ?>/assets/img/hero-sample-3.jpg" alt="Sample"
                 class="lg:w-2/5 w-1/2 aspect-square md:-translate-x-1/2 border-8 border-neutral-linen object-cover object-center"/>
          </div>

        </div>

      </div>

    </div>
  </section>
  <section class="bg-cover bg-center bg-no-repeat lg:py-24 py-16"
           style="background-image: url('<?= get_template_directory_uri() ?>/assets/img/sample-12.jpg')">
    <div class="container">
      <div class="flex sm:flex-row flex-col justify-between items-center gap-x-4 gap-y-12">

        <div class="lg:w-1/3 sm:w-1/2 w-full">

          <p class="text-body-lg text-[#F0E5E7] mb-6">UNWIND</p>
          <h2 class="text-heading-2 text-white lg:mb-10 mb-8">IN-ROOM <br> WELLBEING</h2>
          <p class="text-body-lg text-[#E5E5E5] lg:mb-10 mb-8">Unwind with in-room massages, facials, beauty
                                                               treatments and personal training, all easily booked through our concierge team.</p>
          <a href="#" class="btn btn-white-outline btn-lg">Discover more</a>

        </div>
        <img src="<?= get_template_directory_uri() ?>/assets/img/sample-13.jpg" alt="Sample"
             class="lg:w-90 sm:w-1/2 w-full aspect-square object-cover object-center border-8 border-neutral-linen">

      </div>
    </div>
  </section>
  <section class="bg-neutral-linen lg:py-24 py-16">
    <div class="container">
      <div>

        <div class="flex flex-row lg:flex-nowrap flex-wrap justify-between gap-x-4 gap-y-12 lg:mb-16 mb-12">

          <div class="lg:w-2/7 w-full">

            <div class="mb-10">

              <h3 class="text-heading-3">Location</h3>
              <hr class="w-24 border-primary my-6">
              <p class="text-body-lg text-[#404040] mb-4">1 Belgrove St <br> London <br> WC1H 8AB</p>
              <a href="#"
                 class="w-fit flex flex-row items-center gap-2 border-b border-black hover:opacity-70">

                <span class="text-body-lg">Google Maps directions</span>
                <img src="<?= get_template_directory_uri() ?>/assets/img/svg/new-tab-black.svg" alt="New tab icon" class="w-5 h-5">

              </a>

            </div>
            <div class="relative">

              <img src="<?= get_template_directory_uri() ?>/assets/img/hero-sample-1.jpg" alt="Sample"
                   class="relative z-2 w-full h-82 object-cover object-center">
              <span class="absolute -bottom-3 -left-3 z-1 w-47 h-47 bg-primary"></span>

            </div>


          </div>
          <div class="lg:w-4/7 w-full">
            <iframe src="https://www.google.com/maps?q=Turin,Italy&output=embed" loading="lazy"
                    class="w-full h-full min-h-65">
            </iframe>
          </div>

        </div>
        <div class="grid lg:grid-cols-3 bg-tertiary lg:divide-x lg:divide-y-0 divide-y divide-white/20 lg:py-10 lg:px-0 px-8">

          <div class="lg:px-10 lg:py-0 py-8">

            <h5 class="text-heading-5 text-white mb-6">Getting here</h5>
            <ul class="space-y-2">

              <li class="flex flex-row items-center gap-1">

                <img src="<?= get_template_directory_uri() ?>/assets/img/svg/airplane-light.svg" alt="Airplane icon" class="w-6 h-6">
                <span class="text-body-md text-[#E5E5E5]">Heathrow - XX mins via public transport</span>

              </li>
              <li class="flex flex-row items-center gap-1">

                <img src="<?= get_template_directory_uri() ?>/assets/img/svg/airplane-light.svg" alt="Airplane icon" class="w-6 h-6">
                <span class="text-body-md text-[#E5E5E5]">Gatwick - XX mins via public transport</span>

              </li>
              <li class="flex flex-row items-center gap-1">

                <img src="<?= get_template_directory_uri() ?>/assets/img/svg/train-light.svg" alt="Airplane icon" class="w-6 h-6">
                <span class="text-body-md text-[#E5E5E5]">London King’s Cross - 2 mins walk</span>

              </li>
              <li class="flex flex-row items-center gap-1">

                <img src="<?= get_template_directory_uri() ?>/assets/img/svg/train-light.svg" alt="Airplane icon" class="w-6 h-6">
                <span class="text-body-md text-[#E5E5E5]">St. Pancras International - 2 mins walk</span>

              </li>
              <li class="flex flex-row items-center gap-1">

                <img src="<?= get_template_directory_uri() ?>/assets/img/svg/train-light.svg" alt="Airplane icon" class="w-6 h-6">
                <span class="text-body-md text-[#E5E5E5]">Euston Station - 16 mins walk</span>

              </li>
              <li class="flex flex-row items-center gap-1">

                <img src="<?= get_template_directory_uri() ?>/assets/img/svg/address-light.svg" alt="Airplane icon" class="w-6 h-6">
                <span class="text-body-md text-[#E5E5E5]">St. Pancras International - 2 mins walk</span>

              </li>

            </ul>

          </div>
          <div class="lg:px-10 lg:py-0 py-8">

            <h5 class="text-heading-5 text-white mb-6">Attractions</h5>
            <ul class="space-y-2">

              <li class="flex flex-row items-center gap-1">
                <span class="text-body-md text-[#E5E5E5]">British Library - 5 mins walk</span>
              </li>
              <li class="flex flex-row items-center gap-1">
                <span class="text-body-md text-[#E5E5E5]">Coal Drop Yard - 10 mins walk</span>
              </li>
              <li class="flex flex-row items-center gap-1">
                <span class="text-body-md text-[#E5E5E5]">British Museum- 15 mins walk</span>
              </li>
              <li class="flex flex-row items-center gap-1">
                <span class="text-body-md text-[#E5E5E5]">London Zoo / Regents Park- 13 mins cycle</span>
              </li>
              <li class="flex flex-row items-center gap-1">
                <span class="text-body-md text-[#E5E5E5]">Madame Tussaud- 12 mins by tube</span>
              </li>

            </ul>

          </div>
          <div class="lg:px-10 lg:py-0 py-8">

            <h5 class="text-heading-5 text-white mb-6">Neighbourhoods</h5>
            <ul class="space-y-2">

              <li class="flex flex-row items-center gap-1">
                <span class="text-body-md text-[#E5E5E5]">Camden Town - 9 mins cycle</span>
              </li>
              <li class="flex flex-row items-center gap-1">
                <span class="text-body-md text-[#E5E5E5]">Old Street  - 12 mins cycle</span>
              </li>
              <li class="flex flex-row items-center gap-1">
                <span class="text-body-md text-[#E5E5E5]">Oxford Street- 16 mins cycle</span>
              </li>

            </ul>

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

              <span class="text-body-lg">All Megaro articles</span>
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
