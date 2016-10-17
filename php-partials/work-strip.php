<?php

$image_count = $images ? count($images) : 0;

if ($image_count > 0){

?>

  <a href="javascript:void(0)" class="work-strip gallery-count-<?= $image_count ?>">
    <?php
    if($image_count && $images){
        foreach($images as $image){
          if($image_count < 2){
            echo '<div class="work-image" style="background-image: url(' . $image['sizes']['large'] . ')"></div>';
          } else {
            echo '<div class="work-image" style="background-image: url(' . $image['sizes']['work-thumbnail'] . ')"></div>';
          }
        }
    }
    echo isset($title ) ? '<div class="work-title">' . $title . '</div>' : false;
    ?>
  </a>

<?php } ?>
