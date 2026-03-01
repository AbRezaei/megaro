<?php

function get_asset($path): string
{
  return get_template_directory_uri() . '/dist/assets/' . $path;
}

add_shortcode('current_year', function () {
  return wp_date('Y');
});
