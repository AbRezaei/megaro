<?php
/**
 * Template Name: Hotel Room
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

  <header class="w-full h-dvh flex flex-col justify-center items-center py-6"
          style="background-image: radial-gradient(25.28% 100% at 50% 51.67%, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%), linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), linear-gradient(360deg, rgba(0, 0, 0, 0.7) 13.43%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.5) 100%), url('<?= get_template_directory_uri() ?>/assets/img/hero-sample-2.jpg'); background-size: cover; background-position:center; background-repeat: no-repeat">
    <div class="container">
      <div class="lg:w-1/2 flex flex-col justify-center items-center mx-auto">

        <div class="mb-10">
          <h1 class="text-display text-white text-center">DIESEL <br> CORNER <br> STUDIO</h1>
        </div>
        <a href="#" class="btn btn-primary-fill btn-lg">Book now</a>

      </div>
    </div>
  </header>
  <section class="bg-tertiary py-6">
    <div class="container">
      <ul class="flex flex-row flex-wrap justify-center items-center lg:gap-x-10 gap-x-8 gap-y-4">

        <li class="text-body-lg text-[#E5E5E5]">2 Guests</li>
        <li class="w-2 h-2 bg-secondary rotate-45"></li>
        <li class="text-body-lg text-[#E5E5E5]">48 sqm</li>
        <li class="w-2 h-2 bg-secondary rotate-45"></li>
        <li class="text-body-lg text-[#E5E5E5]">King bed</li>
        <li class="w-2 h-2 bg-secondary rotate-45"></li>
        <li class="text-body-lg text-[#E5E5E5]">Dog-friendly</li>

      </ul>
    </div>
  </section>
  <section class="bg-secondary lg:py-24 py-16">
    <div class="container">
      <div class="lg:w-2/3 mx-auto">
        <h4 class="text-heading-4 text-center text-[#404040]">
          The interiors are a quirky artistic compositions printed on metal sheets and soft cushions, using
          local cultural icons from the British bulldog to Harry Potter's owl, revisited with humour.
        </h4>
      </div>
    </div>
  </section>
  <section class="bg-neutral-linen lg:py-24 py-16">
    <div class="container">
      <div class="grid grid-cols-1 md:grid-cols-5 md:gap-x-8 lg:gap-x-16 xl:gap-x-24 gap-y-16">

        <div class="md:col-span-2 md:order-1 order-1">
          <div class="border-y border-primary lg:py-10 py-8">

            <h4 class="text-heading-4 mb-6">Room Features</h4>
            <p class="text-body-lg text-[#404040]">
              King size or Queen size bed <br>
              Cosy sitting area <br>
              Size: 39–48 m2 (420–517 ft2) <br>
              Minibar with British treats <br>
              High-end coffee machine <br>
              Widescreen TV <br>
              Luxury bath amenities <br>
              Wireless internet
            </p>

          </div>
        </div>
        <div class="md:col-span-3 md:order-2 order-2">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-14.jpg" alt="Sample"
               class="w-full md:h-146 h-65 object-cover object-center">
        </div>

      </div>
    </div>
  </section>
  <section class="bg-neutral-linen py-2">
    <div class="swiper relative" data-slider="double">

      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-1.jpg" alt="Sample"
               class="w-full lg:h-118 sm:h-80 h-60 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-39.jpg" alt="Sample"
               class="w-full lg:h-118 sm:h-80 h-60 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-3.jpg" alt="Sample"
               class="w-full lg:h-118 sm:h-80 h-60 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-4.jpg" alt="Sample"
               class="w-full lg:h-118 sm:h-80 h-60 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-5.jpg" alt="Sample"
               class="w-full lg:h-118 sm:h-80 h-60 object-cover object-center">
        </div>
        <div class="swiper-slide">
          <img src="<?= get_template_directory_uri() ?>/assets/img/sample-6.jpg" alt="Sample"
               class="w-full lg:h-118 sm:h-80 h-60 object-cover object-center">
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
      <div data-swiper-pagination class="w-fit! flex items-center gap-2 mx-auto mt-6 pb-2"></div>

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
  <section class="bg-cover bg-center bg-no-repeat lg:py-24 py-16"
           style="background-image: url('<?= get_template_directory_uri() ?>/assets/img/sample-12.jpg')">
    <div class="container">
      <div class="flex sm:flex-row flex-col justify-between items-center gap-x-4 gap-y-12">

        <div class="lg:w-1/3 sm:w-1/2 w-full">

          <p class="text-body-lg text-[#F0E5E7] mb-6">UNWIND</p>
          <h2 class="text-heading-2 text-white lg:mb-10 mb-8">IN-ROOM WELLBEING</h2>
          <p class="text-body-lg text-[#E5E5E5] lg:mb-10 mb-8">Unwind with in-room massages, facials, beauty
                                                               treatments and personal training, all easily booked through our concierge team.</p>
          <a href="#" class="btn btn-white-outline btn-lg">Discover more</a>

        </div>
        <img src="<?= get_template_directory_uri() ?>/assets/img/sample-13.jpg" alt="Sample"
             class="lg:w-90 sm:w-1/2 w-full aspect-square object-cover object-center border-8 border-neutral-linen">

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
