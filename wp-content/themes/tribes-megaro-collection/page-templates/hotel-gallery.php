<?php
/**
 * Template Name: Hotel Gallery
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
      <li class="group active">
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

<main class="lg:pt-32 pt-28">

  <section class="bg-secondary py-2">
    <ul class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-2">

      <li><img src="<?= get_template_directory_uri() ?>/assets/img/hero-sample-2.jpg" alt="Gallery item" class="w-full h-78 object-cover object-center">
      </li>
      <li><img src="<?= get_template_directory_uri() ?>/assets/img/sample-31.jpg" alt="Gallery item" class="w-full h-78 object-cover object-center">
      </li>
      <li><img src="<?= get_template_directory_uri() ?>/assets/img/hero-sample-1.jpg" alt="Gallery item" class="w-full h-78 object-cover object-center">
      </li>
      <li><img src="<?= get_template_directory_uri() ?>/assets/img/sample-4.jpg" alt="Gallery item" class="w-full h-78 object-cover object-center">
      </li>
      <li><img src="<?= get_template_directory_uri() ?>/assets/img/sample-5.jpg" alt="Gallery item" class="w-full h-78 object-cover object-center">
      </li>
      <li><img src="<?= get_template_directory_uri() ?>/assets/img/sample-6.jpg" alt="Gallery item" class="w-full h-78 object-cover object-center">
      </li>
      <li><img src="<?= get_template_directory_uri() ?>/assets/img/sample-7.jpg" alt="Gallery item" class="w-full h-78 object-cover object-center">
      </li>
      <li><img src="<?= get_template_directory_uri() ?>/assets/img/sample-8.jpg" alt="Gallery item" class="w-full h-78 object-cover object-center">
      </li>
      <li><img src="<?= get_template_directory_uri() ?>/assets/img/sample-9.jpg" alt="Gallery item" class="w-full h-78 object-cover object-center">
      </li>
      <li><img src="<?= get_template_directory_uri() ?>/assets/img/sample-10.jpg" alt="Gallery item"
               class="w-full h-78 object-cover object-center">
      </li>
      <li><img src="<?= get_template_directory_uri() ?>/assets/img/sample-11.png" alt="Gallery item"
               class="w-full h-78 object-cover object-center">
      </li>
      <li><img src="<?= get_template_directory_uri() ?>/assets/img/sample-12.jpg" alt="Gallery item"
               class="w-full h-78 object-cover object-center">
      </li>

    </ul>
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
