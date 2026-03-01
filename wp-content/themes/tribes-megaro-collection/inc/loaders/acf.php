<?php

// ACF Option page
add_action('acf/init', function () {
  if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme settings',
        'menu_title' => 'Theme settings',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        'redirect' => true,
        'position' => 59
    ]);

    // Subpages
    acf_add_options_sub_page([
        'page_title' => 'General',
        'menu_title' => 'General',
        'parent_slug' => 'theme-options',
    ]);

  }
});


// Load ACF JSON
add_filter('acf/settings/load_json', function ($paths) {
  $paths[] = get_stylesheet_directory() . '/inc/acf-json';
  return $paths;
});


// Save ACF JSON
add_filter('acf/settings/save_json', function () {
  return get_stylesheet_directory() . '/inc/acf-json';
});


// control JSON filename on save (PERMANENT)
add_action('acf/update_field_group', function ($field_group) {

  // Validate required data
  if (empty($field_group['ID']) || empty($field_group['key']) || !str_starts_with($field_group['key'], 'group_')) return;


  $key = $field_group['key']; // group_xxxxx
  $title = $field_group['title'] ?? 'no-title';

  /**
   * Sanitize title for filename
   * - Converts to lowercase
   * - Replaces spaces with hyphens
   * - Keeps readable characters
   */
  $safe_title = sanitize_title($title);

  if (empty($safe_title)) {
    $safe_title = 'no-title';
  }

  // Remove "group_" prefix from key
  $key_short = str_replace('group_', '', $key);

  // Final filename: title first, then key
  // Example: hero-section_group_64fabc123.json
  $new_filename = "{$safe_title}_group_{$key_short}.json";

  // ACF JSON folder
  $folder = get_stylesheet_directory() . '/inc/acf-json/';

  // Default ACF filename
  $old_file = $folder . $key . '.json';
  $new_file = $folder . $new_filename;

  // Rename file if it exists
  if (file_exists($old_file)) {
    if (!rename($old_file, $new_file)) {
      error_log("ACF JSON rename failed: {$old_file}");
    }
  }

}, 20);
