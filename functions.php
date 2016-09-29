<?php


if(!function_exists('partial')){
  /**
   * Gets partial template part
   * @param  string $slug Slug of the partial part
   */
  function partial($slug = '', $args = array()){
    extract($args);
    include get_stylesheet_directory() . '/php-partials/' . $slug . '.php';
  }
}


function remove_wp_bloat(){
  // Hide Admin Bar
  add_filter('show_admin_bar', '__return_false');
  // Remove Emoji injection
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('wp_head', 'wp_generator');
}
remove_wp_bloat();


function enqueue_scripts_and_styles(){
  wp_deregister_script('wp-embed');
  wp_deregister_script('jquery');

  wp_enqueue_style('styles', get_stylesheet_directory_uri(). '/horizon16/css/styles.min.css', [], 1.0, 'screen');
  wp_enqueue_script('bundled-js', get_stylesheet_directory_uri() . '/horizon16/js/bundle.min.js', [], 1.0, true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts_and_styles');
