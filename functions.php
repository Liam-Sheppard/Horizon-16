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
  wp_register_script('bundled-js', get_stylesheet_directory_uri() . '/assets/js/bundle.min.js', [], 1.2, true);
  wp_localize_script('bundled-js', 'siteData', [
    'homeUrl' => get_home_url(),
    'themeUri' => get_stylesheet_directory_uri(),
  ]);
  wp_enqueue_style('styles', get_stylesheet_directory_uri(). '/assets/css/styles.min.css', [], 1.2, 'screen');
  wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/assets/js/modernizr.min.js', [], 1.0, false  );
  wp_enqueue_script('bundled-js');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts_and_styles');

function enable_thumbs(){
  add_theme_support( 'post-thumbnails' );
}
add_action( 'init', 'enable_thumbs' );


function register_works(){
  $args = [
    'label' => 'Works',
    'description' => 'A piece of design work created by the author.',
    'public' => true,
    'has_archive' => false,
    'menu_icon' => 'dashicons-format-gallery',
    'supports' => [
      'title', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes'
    ],

  ];
  register_post_type('work', $args);
}
add_action( 'init', 'register_works' );



require_once get_stylesheet_directory() . '/includes/functions-graduates.php';

require_once get_stylesheet_directory() . '/includes/functions-login.php';
