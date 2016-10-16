<?php

$current_graduate = get_graduates([get_queried_object()->data->ID])[0];

get_header();

partial('header');

?>

<div class="panel panel--single-graduate">

  <div class='left-panel grad-1' id='leftPanelJS'>
    <div class='grad-image' style="background-image: url(<?= get_stylesheet_directory_uri() ?>/assets/images/graduate-images-1800x1200/graduate-<?= $current_graduate['ID'] ?>.jpg);"></div>
  </div>

  <div class='right-panel'>
    <div class='name-and-discipline'>
      <h1><?= $current_graduate['full_name'] ?></h1>
      <h2><?= implode($current_graduate['disciplines_labels'], ' / ') ?></h2>
    </div>

    <div class='left-panel' id='workJS'>
      <div class='grad-work-container'>
        <a href='javascript:void(0)' class='work-strip'>
          <div class='work-image' style='background-image: url("<?= get_stylesheet_directory_uri() ?>/assets/images/temp/work1a.png")'></div>
          <div class='work-image' style='background-image: url("<?= get_stylesheet_directory_uri() ?>/assets/images/temp/work1b.png")'></div>
          <div class='work-image' style='background-image: url("<?= get_stylesheet_directory_uri() ?>/assets/images/temp/work1c.png")'></div>
          <div class='work-title'>Motion Graphics</div>
        </a>
        <a href='javascript:void(0)' class='work-strip'>
          <div class='work-image' style='background-image: url("<?= get_stylesheet_directory_uri() ?>/assets/images/temp/work2a.jpg")'></div>
          <div class='work-image' style='background-image: url("<?= get_stylesheet_directory_uri() ?>/assets/images/temp/work2b.jpg")'></div>
          <div class='work-image' style='background-image: url("<?= get_stylesheet_directory_uri() ?>/assets/images/temp/work2c.jpg")'></div>
          <div class='work-title'>ZYMK Apparel</div>
        </a>
        <a href='javascript:void(0)' class='work-strip'>
          <div class='work-image' style='background-image: url("<?= get_stylesheet_directory_uri() ?>/assets/images/temp/work3a.jpg")'></div>
          <div class='work-image' style='background-image: url("<?= get_stylesheet_directory_uri() ?>/assets/images/temp/work3b.png")'></div>
          <div class='work-image' style='background-image: url("<?= get_stylesheet_directory_uri() ?>/assets/images/temp/work3c.jpg")'></div>
          <div class='work-title'>Half of a Yellow Sun</div>
        </a>
        <a href='javascript:void(0)' class='work-strip'>
          <div class='work-image' style='background-image: url("<?= get_stylesheet_directory_uri() ?>/assets/images/temp/work3a.jpg")'></div>
          <div class='work-image' style='background-image: url("<?= get_stylesheet_directory_uri() ?>/assets/images/temp/work3b.png")'></div>
          <div class='work-image' style='background-image: url("<?= get_stylesheet_directory_uri() ?>/assets/images/temp/work3c.jpg")'></div>
          <div class='work-title'>Half of a Yellow Sun</div>
        </a>
      </div>
    </div>

    <!-- <span class="horizon-rule horizon-rule--top-end"></span> -->
    <div class="panel-bridge"></div>
    <!-- <span class="horizon-rule horizon-rule--bottom-end"></span> -->

    <?= ($bio = $current_graduate['bio']) ? apply_filters('the_content', $bio)  : false; ?>

    <div class="panel-bridge"></div>
    <span class="horizon-rule horizon-rule--bottom-end"></span>

    <?php
    $facts = get_field('facts', 'user_'.$current_graduate['ID']);
    if($facts){ ?>
      <ul class='fun-facts'>
        <?php foreach($facts as $fact) { ?>
          <li class='fact'>
            <span class='number'><?= $fact['number'] ?></span>
            <span class='text'><?= $fact['text'] ?></span>
          </li>
        <?php } ?>
    <?php } ?>

    <span class="horizon-rule horizon-rule--top-end"></span>
    <div class="panel-bridge"></div>

    <?php

    echo ($portfolio = $current_graduate['portfolio']) ? '<a href="' . $portfolio . '" class="fancy-link">View my Portfolio</a>' : '';

    if($social_links = $current_graduate['social_links']){
      echo "<ul class='profile-socialmedia'>";
        foreach($social_links as $social_link) {
          echo '<li><a href="'. $social_link['profile_url'] .'"><i class="icon-'. $social_link['social_network'] .'"></i></a></li>';
        }
      echo  "</ul>";
    } ?>


  </div>

</div>


<?php

get_footer();

?>
