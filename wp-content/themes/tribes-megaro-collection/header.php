<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <title><?php wp_title() ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
      href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,100..900;1,9..144,100..900&family=Sofia+Sans:ital,wght@0,1..1000;1,1..1000&display=swap"
      rel="stylesheet"
  >

  <?php wp_head(); ?>
</head>

<body
    <?php body_class(); ?>
    x-data="{}"
    x-init="$store.page.init()"
    x-on:resize.window="$store.page.resized()"
    x-on:scroll.window="$store.page.scrolled()"
>
<?php get_template_part('template-parts/navbar'); ?>

