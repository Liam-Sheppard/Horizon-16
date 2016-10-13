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

<div class="panel panel--graduate-strips">
  <div class="graduates-container">

    <h1 class="h2">Graduates</h1>

    <div class="strips-container">
      <div class="strip">
          <?php
          for ($x = 0; $x <= 16; $x++) {
            partial('graduate', [
              'name' => 'Michael Schmidt',
              'image' => get_stylesheet_directory_uri() . '/assets/images/graduate-images-600x400/bae-haram.png',
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
            ]);
          }
          ?>
      </div>
    </div>

  </div>





</div>

<?php
partial('footer');

get_footer();

?>
