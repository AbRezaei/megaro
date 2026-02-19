<?php

require_once get_template_directory() . '/inc/theme-requirements.php';
require_once get_template_directory() . '/inc/loaders/assets.php';
require_once get_template_directory() . '/inc/loaders/acf.php';
require_once get_template_directory() . '/inc/loaders/elementor.php';
require_once get_template_directory() . '/inc/nav_walker.php';


// post-thumbnails
add_theme_support('post-thumbnails');


// Menu locations
add_action('after_setup_theme', function () {
  register_nav_menus(
      array(
          'navbar-menu' => 'Navbar Menu',
          'footer-menu' => 'Footer Menu',
          'bottom-menu' => 'Bottom Menu'
      )
  );
});


// Support mime types
add_filter('upload_mimes', function ($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
});
