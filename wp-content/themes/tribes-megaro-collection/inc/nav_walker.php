<?php

class nav_walker extends Walker_Nav_Menu
{

  public function start_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= '
        <div
            x-show="navItemIsOpen"
            @click.outside="navItemIsOpen = false"
            x-collapse
            class="pl-4 md:text-xl text-sm">
        ';
  }

  public function end_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= '</div>';
  }

  public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $title = esc_html($item->title);
    $url = esc_url($item->url);
    $has_children = in_array('menu-item-has-children', $item->classes);

    if ($depth === 0 && $has_children) {
      $output .= '
            <div x-data="{ navItemIsOpen: false }">
                <div
                    @click.self="navItemIsOpen = !navItemIsOpen"
                    class="flex items-center cursor-pointer py-1"
                >
                    <a href="'. $url .'">' . $title . '</a>
                    <div class="duration-300 md:w-8 w-5 ml-auto"
                        :class="{\'rotate-180\': navItemIsOpen}">
                        <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"  @click.self="navItemIsOpen = !navItemIsOpen">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15 19.1378L22.2262 11.9134L20.9006 10.5859L15 16.4866L9.10124 10.5859L7.77374 11.9134L15 19.1378Z"
                                fill="black"/>
                        </svg>
                    </div>
                </div>
            ';

    } elseif ($depth > 0) {
      $output .= "<a href='$url' class='block py-2'> $title </a>";

    } else {
      $output .= "<div><a href='$url' class='block py-1'> <span> $title</span>  </a></div>";

    }
  }

  public function end_el(&$output, $item, $depth = 0, $args = null)
  {
    if ($depth === 0 && in_array('menu-item-has-children', $item->classes)) {
      $output .= '</div>';
    }
  }
}

