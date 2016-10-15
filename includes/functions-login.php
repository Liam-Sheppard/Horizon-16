<?php


function hide_posts_admin_menu(){
  remove_menu_page('edit.php');
}
add_action('admin_menu', 'hide_posts_admin_menu');


function hide_posts_admin_bar()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_node( 'new-post' );
}
add_action( 'admin_bar_menu', 'hide_posts_admin_bar' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Horizon16';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/css/style-login.min.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
