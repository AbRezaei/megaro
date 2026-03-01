<?php

add_action('wp_enqueue_scripts', function () {
  $version = wp_get_theme()->get('Version');
  $version = time();

  wp_enqueue_style('site', get_asset('style.css'), [], $version, 'all');
  wp_enqueue_script('site', get_asset('main.js'), [], $version, true);

});
