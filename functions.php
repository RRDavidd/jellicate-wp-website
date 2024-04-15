<?php

//enqueue scripts and styles
function enqueue_scripts_and_stylesheets() {
  //bootstrap node module
  wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');

  //my css and js
  wp_enqueue_style('stylesheet', get_template_directory_uri() . '/stylesheets/css/general.css');
  wp_enqueue_script('scripts', get_template_directory_uri() . '/js/general.min.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts_and_stylesheets');

//make post editor classic editor
add_filter('use_block_editor_for_post', '__return_false', 10);

//enable featured image for posts
add_theme_support('post-thumbnails');

//enable woocommerce support
add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support() {
  add_theme_support('woocommerce');
}
