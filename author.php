<?php

$current_graduate = get_graduates([get_queried_object()->data->ID])[0];

get_header();

partial('header', [
  'hide_social' => true
]);

?>

<div id="graduate-profile" class="panel panel--single-graduate">
  <div class="detailed-works"></div>

  <div class='left-panel grad-1' id='leftPanelJS'>
    <div class='grad-image' style="background-image: url(<?= get_stylesheet_directory_uri() ?>/assets/images/graduate-images-1800x1200/graduate-<?= $current_graduate['ID'] ?>.jpg);"></div>
  </div>

  <div class='right-panel'>
    <div class='name-and-discipline'>
      <h1><?= $current_graduate['full_name'] ?></h1>
      <?=
      $current_graduate['disciplines_labels'] ? '<h2>' . implode(array_slice($current_graduate['disciplines_labels'], 0, 3), ' + ') . '</h2>' : false;
      ?>
    </div>

    <div class='left-panel' id='workJS'>
      <div class='grad-work-container'>
        <?php
        $post_per_page = is_multitouch() ? 4 : 5;
        $works = new WP_Query([
          'post_type' => 'work',
          'posts_per_page' => $post_per_page,
          'author' => $current_graduate['ID'],
        ]);

        foreach($works->posts as $work){
          $gallery = get_field('work_gallery', $work->ID);
          partial('work-strip', [
            'ID' => $work->ID,
            'title'  => $work->post_title,
            'images' => (count($gallery)) ? array_slice($gallery, 0, 3) : false,
            'link' => get_permalink($work->ID)
          ]);
        }

        ?>

      </div>
    </div>

    <!-- <span class="horizon-rule horizon-rule--top-end"></span> -->
    <!-- <span class="horizon-rule horizon-rule--bottom-end"></span> -->

    <?php

    if ($bio = $current_graduate['bio']) {
      if(!is_multitouch()){
        echo '<div class="panel-bridge"></div>';
      }
        echo apply_filters('the_content', $bio);
        // echo '<div class="panel-bridge"></div>';
    }

    $facts = get_field('facts', 'user_'.$current_graduate['ID']);
    if($facts){ ?>
      <span class="horizon-rule horizon-rule--bottom-end"></span>
      <ul class='fun-facts'>
        <?php foreach($facts as $fact) { ?>
          <li class='fact'>
            <span class='number'><?= $fact['number'] ?></span>
            <span class='text'><?= $fact['text'] ?></span>
          </li>
        <?php } ?>
      </ul>
    <?php } ?>


    <?php
    if(!is_multitouch()){

      echo '<span class="horizon-rule horizon-rule--top-end"></span>';
      echo '<div class="panel-bridge"></div>';


      echo ($portfolio = $current_graduate['portfolio']) ? '<a target="_blank" href="' . $portfolio . '" class="fancy-link">View my Portfolio</a>' : '<a href="mailto:' . $current_graduate['email'] . '" class="fancy-link">' . $current_graduate['email'] . '</a>';

      if($social_links = $current_graduate['social_links']){
        echo "<ul class='profile-socialmedia'>";
          foreach($social_links as $social_link) {
            echo '<li><a href="'. $social_link['profile_url'] .'" target="_blank"><i class="icon-'. $social_link['social_network'] .'"></i></a></li>';
          }
        echo  "</ul>";
      }
    }


    if(!is_multitouch()){
      $next_grad = get_next_graduate($current_graduate['ID']);
      echo '<a href="' . $next_grad['permalink'] . '" class="next-graduate"><span class="next-graduate__label">Next Graduate</span><span class="next-graduate__name">' . $next_grad['full_name'] . '</span></a>';
    }
    ?>

  </div>

</div>




<?php



get_footer();

?>
