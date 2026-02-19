<?php

add_action('admin_notices', function () {

  $missing = [];

  // Check ACF
  if (!class_exists('ACF')) {
    $missing[] = 'Advanced Custom Fields (ACF)';
  }

  // Check Elementor
  if (!did_action('elementor/loaded')) {
    $missing[] = 'Elementor';
  }

  if (!empty($missing)) {
    echo '<div class="notice notice-error is-dismissible">';
    echo '<p><strong>Warning:</strong> To use this theme properly, the following plugins must be installed and active:</p>';
    echo '<ul><li>' . implode('</li><li>', $missing) . '</li></ul>';
    echo '</div>';
  }

});
