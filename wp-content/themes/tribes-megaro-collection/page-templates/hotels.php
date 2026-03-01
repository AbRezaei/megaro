<?php
/**
 * Template Name: Hotels
 * Description: 
 */
?>
<?php get_header(); ?>


<main class="">

  <header class="bg-secondary lg:py-24 py-16">
    <div class="container">
      <div class="lg:w-1/2 mx-auto">

        <p class="text-body-lg text-primary text-center mb-4">OVERLINE</p>
        <h1 class="text-heading-1 text-center mb-4">HOTELS</h1>
        <p class="text-body-lg text-center text-[#404040]">
          Tortor interdum condimentum nunc molestie quam lectus euismod pulvinar risus. Cursus in odio aenean.
        </p>

      </div>
    </div>
  </header>
  <section class="bg-neutral-linen lg:py-24 py-16">
    <div class="container">
      <div>
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

</main>


<?php get_footer(); ?>
