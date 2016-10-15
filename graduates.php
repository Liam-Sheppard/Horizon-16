<?php
/**
* Template Name: Graduates
*
*/
?>

<?php

get_header();

partial('header');

?>

<div class="panel panel--graduate-strips scene">
  <div class="polygon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 594.4 383.72" class="polygon layer" data-desktop-depth="0.2" data-mobile-depth="1" data-depth="0.3"><polyline class="a" points="0.37 216.58 254.51 0.7 594.03 383.22"/><polyline class="b" points="594.03 383.22 200 349.7 0.37 216.58"/></svg>
  </div>
  <div class="polygon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 594.3 409.59" class="polygon layer" data-desktop-depth="0.03" data-mobile-depth="1" data-depth="0.3"><polyline class="a" points="290.47 226.32 153.24 1.15 0.47 424.32"/><polyline class="b" points="0.47 424.32 238.47 311.82 290.47 226.32"/></svg>
  </div>
  <div class="graduates-container">

    <h1 class="h2">Graduates</h1>

    <?php partial('graduate-filters') ?>

    <div class="strips-container">
      <div class="strip">
          <?php
          for ($x = 0; $x <= 16; $x++) {
            partial('graduate', [
              'name' => 'Michael Schmidt',
              'image' => get_stylesheet_directory_uri() . '/assets/images/graduate-images-600x400/bae-haram.png',
              'disciplines' => [
                'graphic-design',
                'visual-art',
                'animation',
              ]
            ]);
          }
          ?>
      </div>
      <div class="strip">
          <?php
          for ($x = 0; $x <= 16; $x++) {
            partial('graduate', [
              'name' => 'Michael Schmidt',
              'image' => get_stylesheet_directory_uri() . '/assets/images/graduate-images-600x400/bae-haram.png',
              'disciplines' => [
                'web-design',
                'ui-ux',
                'ftv',
              ]
            ]);
          }
          ?>
      </div>
      <div class="strip">
          <?php
          for ($x = 0; $x <= 13; $x++) {
            partial('graduate', [
              'name' => 'Michael Schmidt',
              'image' => get_stylesheet_directory_uri() . '/assets/images/graduate-images-600x400/bae-haram.png',
              'disciplines' => [
                'web-design',
                'ui-ux',
                'ftv',
              ]
            ]);
          }
          ?>
      </div>
    </div>

  </div>





</div>

<?php


get_footer();

?>
