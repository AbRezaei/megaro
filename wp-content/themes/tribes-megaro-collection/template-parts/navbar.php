<?php
$header_logo = get_field('header_logo', 'option');
?>


<nav class="fixed top-0 left-0 z-11 h-20 lg:h-28 w-full bg-neutral-linen border-b border-[#E5E5E5] lg:py-4 py-2">
  <div class="container">

    <!-- Desktop navbar -->
    <div class="hidden lg:flex flex-row justify-between items-center gap-4">
      <?php if ($header_logo): ?>
        <a href="<?= get_home_url() ?>">
          <img src="<?= $header_logo ?>" alt="Logo" class="w-auto h-20 object-contain object-center">
        </a>
      <?php endif; ?>
      <div class="flex flex-row items-center gap-10">

        <ul class="flex flex-row items-center gap-10">
          <?php render_navbar_desktop_menu('navbar-menu'); ?>
        </ul>
        <?= render_navbar_cta_menu('navbar-menu'); ?>
      </div>

    </div>

    <!-- Mobile navbar -->
    <div class="lg:hidden">

      <div class="relative z-11 flex flex-row justify-between items-center gap-4">
        <?php if ($header_logo): ?>
          <a href="<?= get_home_url() ?>">
            <img src="<?= $header_logo ?>" alt="Logo" class="w-auto h-16 object-contain object-center">
          </a>
        <?php endif; ?>
        <button x-on:click="$store.page.toggleHamburgerMenu()"
                class="flex flex-row items-center gap-1"
        >

          <span>Menu</span>
          <img x-show="!$store.page.showHamburgerMenu" x-cloak
               src="<?= get_template_directory_uri() . '/assets/img/svg/menu-black.svg'; ?>" alt="Menu icon"
               class="w-5 h-5 object-contain object-center"
          >
          <img x-show="$store.page.showHamburgerMenu" x-cloak
               src="<?= get_template_directory_uri() . '/assets/img/svg/close-black.svg'; ?>"
               alt="Close icon"
               class="w-5 h-5 object-contain object-center"
          >

        </button>

      </div>
      <div x-bind:class="{'translate-x-0!': $store.page.showHamburgerMenu}"
           class="fixed top-20 right-0 z-10 translate-x-full w-dvw h-[calc(100dvh-5rem)] flex flex-col bg-neutral-linen overflow-auto pb-6 duration-300"
      >

        <ul class="grow flex flex-col justify-center">
          <?php render_navbar_mobile_menu('navbar-menu'); ?>
        </ul>
        <div>
          <div class="container">
            <?php render_navbar_cta_menu('navbar-menu'); ?>
          </div>
        </div>

      </div>

    </div>

  </div>
</nav>
