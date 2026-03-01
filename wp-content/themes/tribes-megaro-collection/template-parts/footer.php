<?php
$footer_logo = get_field('footer_logo', 'option');
$footer_description = get_field('footer_description', 'option');
$footer_socials = get_field('footer_socials', 'option');
$footer_copyright = get_field('footer_copyright', 'option');
?>

<footer class="bg-neutral-graphite">
  <div class="container">

    <div class="lg:py-16 py-12">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:gap-24 gap-16">

        <div>
          <?php if ($footer_logo): ?>
            <div class="mb-6">
              <a href="<?= get_home_url() ?>">
                <img
                    src="<?= esc_url($footer_logo) ?>"
                    alt="Logo icon"
                    class="w-auto h-20 object-contain object-center"
                >
              </a>
            </div>
          <?php endif; ?>


          <?php if ($footer_description): ?>
            <div class="text-body-sm text-[#E5E5E5] mb-6"><?= $footer_description ?></div>
          <?php endif; ?>

          <?php if ($footer_socials): ?>
            <div class="flex flex-wrap gap-3">
              <?php foreach ($footer_socials as $social): ?>
                <a href="<?= $social['url'] ?>" class="hover:opacity-70" target="_blank">
                  <img src="<?= $social['icon'] ?>" alt="Social icon"
                       class="w-6 h-6 object-contain object-center"
                  >
                </a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

        <?php render_footer_menu_columns('footer-menu'); ?>

      </div>
    </div>

    <?php if ($footer_copyright): ?>
      <hr class="border-neutral-stone">
      <div class="lg:py-16 py-12">
        <div class="text-[#A3A3A3] text-body-md text-center"><?= wp_kses_post(do_shortcode($footer_copyright)) ?></div>
      </div>
    <?php endif; ?>

  </div>
</footer>
