<?php
/**
 * Template Name: Hotel Location
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
      <li class="group active">
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

        <p class="text-body-lg text-primary text-center mb-4">OVERLINE</p>
        <h1 class="text-heading-1 text-center mb-4">LOCATION</h1>
        <p class="text-body-lg text-center text-[#404040]">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis condimentum nunc at risus mattis, quis
          dictum ex iaculis.
        </p>

      </div>
    </div>
  </header>
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
