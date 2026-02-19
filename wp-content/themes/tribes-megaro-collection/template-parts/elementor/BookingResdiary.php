<?php

class BookingResdiary extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'bookingResdiary';
  }

  public function get_title(): string
  {
    return 'Booking Resdiary';
  }

  public function get_icon(): string
  {
    return 'eicon-code';
  }

  public function get_categories(): array
  {
    return ['barnham'];
  }

  protected function render()
  {
    $date = isset($_GET['date']) ? sanitize_text_field(wp_unslash($_GET['date'])) : '';
    $time = isset($_GET['time']) ? sanitize_text_field(wp_unslash($_GET['time'])) : '';

    $iframe_url = 'https://booking.resdiary.com/widget/Standard/BrasserieatBarnhamBroom/31396';
    $query = [];

    if (!empty($date)) {
      $query['date'] = $date;
    }

    if (!empty($time)) {
      $query['time'] = $time;
    }

    $query['covers'] = 2;

    if (!empty($query)) {
      $iframe_url = add_query_arg($query, $iframe_url);
    }
    ?>

    <div class="container">
      <div class="flex justify-center">
        <iframe
            src="<?= esc_url($iframe_url) ?>"
            allowtransparency="true"
            frameborder="0"
            style="width:100%; border:none; min-height: 770px;"
        ></iframe>
      </div>
    </div>

    <?php
  }
}
