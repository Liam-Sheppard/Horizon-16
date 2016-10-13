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
  <ul class='strip-container'>

    <?php
    for ($x = 0; $x <= 46; $x++) {
      partial('graduate', [
        'name' => 'Michael Schmidt',
      ]);
    }
    ?>

  </ul>
</div>

<?php
partial('footer');

get_footer();

?>
