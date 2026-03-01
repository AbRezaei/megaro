<?php

function get_menu_data(string $location = 'navbar-menu'): array
{
  $empty_result = [
      'parents' => [],
      'children' => [],
  ];

  $locations = get_nav_menu_locations();
  if (empty($locations[$location])) {
    return $empty_result;
  }

  $menu = wp_get_nav_menu_object($locations[$location]);
  if (!$menu || empty($menu->term_id)) {
    return $empty_result;
  }

  $items = wp_get_nav_menu_items($menu->term_id);
  if (!is_array($items)) {
    return $empty_result;
  }

  $parents = [];
  $children = [];

  foreach ($items as $item) {
    $parent_id = isset($item->menu_item_parent) ? (int)$item->menu_item_parent : 0;

    if ($parent_id === 0) {
      $parents[] = $item;
      continue;
    }

    if (!isset($children[$parent_id])) {
      $children[$parent_id] = [];
    }

    $children[$parent_id][] = $item;
  }

  return [
      'parents' => $parents,
      'children' => $children,
  ];
}

function get_menu_item_acf_value(int $item_id, string $field)
{
  return get_field($field, 'menu_item_' . $item_id);
}

function get_menu_item_image_url_from_acf($image): string
{
  if (is_array($image) && !empty($image['url'])) {
    return (string)$image['url'];
  }

  if (is_numeric($image)) {
    $url = wp_get_attachment_image_url((int)$image, 'full');
    return $url ? $url : '';
  }

  if (is_string($image) && $image !== '') {
    return $image;
  }

  return '';
}

function get_menu_item_url($item): string
{
  $url = !empty($item->url) ? (string)$item->url : '';
  if ($url !== '') {
    return $url;
  }

  $object_id = isset($item->object_id) ? (int)$item->object_id : 0;
  if ($object_id > 0) {
    $permalink = get_permalink($object_id);
    if (is_string($permalink) && $permalink !== '') {
      return $permalink;
    }
  }

  return '#';
}

function get_menu_item_data($item): array
{
  $item_id = isset($item->ID) ? (int)$item->ID : 0;
  $type = get_menu_item_acf_value($item_id, 'type');
  $image = get_menu_item_acf_value($item_id, 'image');
  $description = get_menu_item_acf_value($item_id, 'description');
  $score = get_menu_item_acf_value($item_id, 'score');
  $cta_text = get_menu_item_acf_value($item_id, 'cta_text');

  return [
      'id' => $item_id,
      'title' => !empty($item->title) ? (string)$item->title : '',
      'url' => get_menu_item_url($item),
      'type' => $type,
      'image' => get_menu_item_image_url_from_acf($image),
      'description' => is_string($description) ? $description : '',
      'score' => is_numeric($score) ? max(0, (int)$score) : 0,
      'cta_text' => is_string($cta_text) ? $cta_text : '',
  ];
}


function render_desktop_submenu_by_type(array $children, string $menu_type): void
{
  $star_icon = get_template_directory_uri() . '/assets/img/svg/star-black.svg';

  if ($menu_type === 'Hotel Dropdown') {
    echo '<ul class="grid grid-cols-3 gap-x-16">';
    foreach ($children as $child) {
      $item_data = get_menu_item_data($child);
      $button_text = $item_data['cta_text'] !== '' ? $item_data['cta_text'] : 'View hotel';

      echo '<li class="flex flex-col text-center">';
      if ($item_data['image'] !== '') {
        echo '<div class="mb-6">';
        echo '<img src="' . esc_url($item_data['image']) . '" alt="' . esc_attr($item_data['title']) . '" class="w-full h-60 object-cover object-center">';
        echo '</div>';
      }
      echo '<div class="grow flex flex-col">';
      echo '<div class="grow">';
      echo '<h4 class="text-heading-4 mb-4">' . esc_html($item_data['title']) . '</h4>';
      echo '<div class="flex flex-row justify-center items-center mb-4">';
      for ($i = 0; $i < $item_data['score']; $i++) {
        echo '<img src="' . esc_url($star_icon) . '" alt="Star icon" class="w-6 h-6 object-contain object-center">';
      }
      echo '</div>';

      if ($item_data['description'] !== '') {
        echo '<div class="text-body-lg mb-6">' . wp_kses_post($item_data['description']) . '</div>';
      }

      echo '</div>';
      echo '<div><a href="' . esc_url($item_data['url']) . '" class="btn btn-black-outline btn-lg">' . esc_html($button_text) . '</a></div>';
      echo '</div>';
      echo '</li>';
    }
    echo '</ul>';
    return;
  }

  if ($menu_type === 'Restaurant Dropdown') {
    echo '<ul class="grid grid-cols-1 lg:grid-cols-2 gap-16">';
    foreach ($children as $child) {
      $item_data = get_menu_item_data($child);
      $button_text = $item_data['cta_text'] !== '' ? $item_data['cta_text'] : 'Discover more';

      echo '<li class="grid grid-cols-1 sm:grid-cols-2 xl:gap-10 gap-8">';
      echo '<div class="sm:order-1 order-2">';
      echo '<h4 class="text-heading-4 mb-4">' . esc_html($item_data['title']) . '</h4>';

      if ($item_data['description'] !== '') {
        echo '<div class="text-body-lg mb-6">' . wp_kses_post($item_data['description']) . '</div>';
      }

      echo '<a href="' . esc_url($item_data['url']) . '" class="btn btn-black-outline btn-lg">' . esc_html($button_text) . '</a>';
      echo '</div>';
      if ($item_data['image'] !== '') {
        echo '<div class="sm:order-2 order-1">';
        echo '<img src="' . esc_url($item_data['image']) . '" alt="' . esc_attr($item_data['title']) . '" class="w-full h-84 object-cover object-center">';
        echo '</div>';
      }
      echo '</li>';
    }
    echo '</ul>';
    return;
  }

  foreach ($children as $child) {
    $item_data = get_menu_item_data($child);
    echo '<li>';
    echo '<a href="' . esc_url($item_data['url']) . '" class="hover:opacity-70">';
    echo esc_html($item_data['title']);
    echo '</a>';
    echo '</li>';
  }
}

function render_navbar_desktop_menu(string $location = 'navbar-menu'): void
{
  $menu_data = get_menu_data($location);
  $arrow_icon = get_template_directory_uri() . '/assets/img/svg/chevron-down-black.svg';

  foreach ($menu_data['parents'] as $parent) {
    $parent_data = get_menu_item_data($parent);
    $menu_type = $parent_data['type'];
    $children = $menu_data['children'][$parent->ID] ?? [];
    $has_children = !empty($children);

    if ($menu_type === 'CTA') {
      continue;
    }

    if (!$has_children) {
      echo '<li>';
      echo '<a href="' . esc_url($parent_data['url']) . '" class="hover:opacity-70 text-body-lg">';
      echo esc_html($parent_data['title']);
      echo '</a>';
      echo '</li>';
      continue;
    }

    echo '<li x-data="{ open: false }">';
    echo '<button x-on:click="open = !open" class="text-body-lg flex flex-row items-center gap-1 hover:opacity-70">';
    echo '<span>' . esc_html($parent_data['title']) . '</span>';
    echo '<img x-bind:class="{\'rotate-180\': open}" src="' . esc_url($arrow_icon) . '" alt="Arrow icon" class="w-5 h-5 object-contain object-center duration-300">';
    echo '</button>';
    echo '<div x-show="open" x-on:click.outside="open = false" x-transition x-cloak class="fixed top-28 left-0 -translate-y-1 w-full bg-neutral-linen py-16 shadow-xl">';
    echo '<div class="container">';
    render_desktop_submenu_by_type($children, $menu_type);
    echo '</div>';
    echo '</div>';
    echo '</li>';
  }
}

function render_navbar_mobile_menu(string $location = 'navbar-menu'): void
{
  $menu_data = get_menu_data($location);

  foreach ($menu_data['parents'] as $parent) {
    $parent_data = get_menu_item_data($parent);
    echo '<li>';
    echo '<a href="' . esc_url($parent_data['url']) . '" class="block text-center text-body-xl py-4">';
    echo esc_html($parent_data['title']);
    echo '</a>';
    echo '</li>';
  }
}

function render_navbar_cta_menu(string $location = 'navbar-menu'): string
{
  $menu_data = get_menu_data($location);

  foreach ($menu_data['parents'] as $parent) {
    $parent_data = get_menu_item_data($parent);
    if ($parent_data['type'] !== 'CTA') {
      continue;
    }

    $button_text = $parent_data['cta_text'] !== '' ? $parent_data['cta_text'] : $parent_data['title'];
    echo '<a href="' . esc_url($parent_data['url']) . '" class="w-full lg:w-auto btn btn-black-outline btn-lg">'
        . esc_html($button_text)
        . '</a>';

    return '';
  }

  return '';
}

function render_footer_menu_columns(string $location = 'footer-menu'): void
{
  $menu_data = get_menu_data($location);

  foreach ($menu_data['parents'] as $parent) {
    $column_title = !empty($parent->title) ? (string)$parent->title : '';
    $children = $menu_data['children'][$parent->ID] ?? [];

    echo '<div>';
    echo '<p class="text-body-sm text-[#A3A3A3] mb-6">';
    echo strtoupper(esc_html($column_title));
    echo '</p>';

    if (!empty($children)) {
      echo '<ul class="space-y-2">';
      foreach ($children as $child) {
        $child_data = get_menu_item_data($child);
        echo '<li>';
        echo '<a href="' . esc_url($child_data['url']) . '" class="text-body-md text-[#E5E5E5] py-1 hover:opacity-70">';
        echo esc_html($child_data['title']);
        echo '</a>';
        echo '</li>';
      }
      echo '</ul>';
    }

    echo '</div>';
  }
}
