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
      <?php if (is_multitouch()) : ?>
        <?php
        $next_grad = get_next_graduate($current_graduate['ID']);
        $next_grad_img = get_stylesheet_directory_uri() . '/assets/images/graduate-images-600x400/graduate-' . $next_grad['ID'] . '.png';
        $prev_grad = get_prev_graduate($current_graduate['ID']);
        $prev_grad_img = get_stylesheet_directory_uri() . '/assets/images/graduate-images-600x400/graduate-' . $prev_grad['ID'] . '.png';
        ?>
        <div class='mt-workface-switch'>
          <div class='mt-switch'></div>
          <div class='mt-work'><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 179.97 209.33"><path class="a" d="M24.41,201.31a4.23,4.23,0,0,1-4.54-3.88L8,46.37a4.23,4.23,0,0,1,3.88-4.54L32.63,40.2l0.73-8.08-22.1,1.74A12.21,12.21,0,0,0,0,47L11.9,198.06a12.23,12.23,0,0,0,12.16,11.27c0.33,0,.65,0,1,0l108.26-8.51a12.12,12.12,0,0,0,8.33-4.24,11.82,11.82,0,0,0,1.39-2l-15-1.35Z"/><path class="b" d="M168.85,9.82L60.7,0.05A12.23,12.23,0,0,0,47.43,11.12l-1.81,20-0.73,8.08L33.79,162A12.22,12.22,0,0,0,44.87,175.3l91.31,8.25,8.08,0.73,8.76,0.79a10.48,10.48,0,0,0,1.12,0A12.22,12.22,0,0,0,166.29,174L179.92,23.09A12.23,12.23,0,0,0,168.85,9.82ZM158.32,173.28a4.23,4.23,0,0,1-4.58,3.83l-10.12-.91-8.08-.73-90-8.13a4.23,4.23,0,0,1-3.83-4.59L53,38.6l0.73-8.08L55.4,11.84A4.22,4.22,0,0,1,59.6,8H60l108.15,9.78A4.22,4.22,0,0,1,172,22.37Z"/><path class="a" d="M168.85,9.82L60.7,0.05A12.23,12.23,0,0,0,47.43,11.12L33.79,162A12.22,12.22,0,0,0,44.87,175.3L153,185.07a10.48,10.48,0,0,0,1.12,0A12.22,12.22,0,0,0,166.29,174L179.92,23.09A12.23,12.23,0,0,0,168.85,9.82ZM158.32,173.28a4.23,4.23,0,0,1-4.58,3.83L45.59,167.34a4.23,4.23,0,0,1-3.83-4.59L55.4,11.84A4.22,4.22,0,0,1,59.6,8H60l108.15,9.78A4.22,4.22,0,0,1,172,22.37Z"/></svg></div>
          <div class='mt-face'><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 161.05 201.22"><path class="a" d="M205,185.24V157.12a0.76,0.76,0,0,0,0-.15v-1.25a0.17,0.17,0,0,0,0-.11,8.73,8.73,0,0,0-.11-1A47.49,47.49,0,0,0,184.47,119h-0.05v-0.09l-0.87-.58-0.09-.07c-0.85-.66-1.72-1.3-2.6-1.86l-0.25-.15a51.75,51.75,0,0,0-27.45-8H95.87a51.82,51.82,0,0,0-27.47,8l-0.25.15c-1.36.85-2.67,1.85-3.94,2.83l-0.92.72-0.12.1c-0.43.32-.85,0.65-1.27,1s-0.83.66-1.24,1-0.81.7-1.2,1a13,13,0,0,0-1.16,1.09l-0.76.73c-0.33.34-.65,0.62-1,1a0.9,0.9,0,0,1-.45.38h0v0.18c-0.27.3-.54,0.73-0.8,1l-0.19.23-0.2.24-0.11.14a0.52,0.52,0,0,0-.1.11c-0.69.83-1.35,1.69-2,2.58-0.21.29-.42,0.59-0.62,0.89q-0.51.75-1,1.53c-0.15.23-.29,0.46-0.43,0.7-0.58,1-1.13,2-1.64,3-0.32.63-.62,1.27-0.91,1.91-0.14.32-.29,0.65-0.42,1s-0.32.74-.46,1.12l-0.33.86-0.36,1c-0.14.39-.27,0.79-0.39,1.19-0.2.62-.38,1.25-0.56,1.89-0.13.46-.24,0.93-0.35,1.39-0.06.23-.11,0.47-0.16,0.71-0.31,1.38-.56,2.77-0.74,4.19,0,0.37-.1.75-0.13,1.13-0.08.75-.15,1.51-0.19,2.28v0.11h0c0,0.82,0,1.65,0,2.48v33a8,8,0,0,0,4,7h0l0.24,0.13a12.22,12.22,0,0,0,8,3H192.78a12.46,12.46,0,0,0,8.26-3.15h0.07a8,8,0,0,0,3.89-7v-0.55c0.06-.59,0-1.21,0-1.83v-3.46h0Zm-152-9V160.65c0-23.77,19.1-43.41,42.87-43.41h57.29c23.77,0,42.84,19.64,42.84,43.41V188.7a3.31,3.31,0,0,1-3.07,3.53H56.25A3.34,3.34,0,0,1,53,188.82s0-.08,0-0.12V176.24Z" transform="translate(-43.98)"/><path class="a" d="M124.55,0a48.5,48.5,0,1,0,48.5,48.5A48.5,48.5,0,0,0,124.55,0Zm0,88.92A40.42,40.42,0,1,1,165,48.5a40.42,40.42,0,0,1-40.45,40.42h0Z" transform="translate(-43.98)"/></svg></div>
        </div>
      <?php endif ?>
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

<?php if (is_multitouch()) : ?>
  <?php
  $next_grad = get_next_graduate($current_graduate['ID']);
  $next_grad_img = get_stylesheet_directory_uri() . '/assets/images/graduate-images-600x400/graduate-' . $next_grad['ID'] . '.png';
  $prev_grad = get_prev_graduate($current_graduate['ID']);
  $prev_grad_img = get_stylesheet_directory_uri() . '/assets/images/graduate-images-600x400/graduate-' . $prev_grad['ID'] . '.png';
  ?>
  <div class='multitouch-navbar'>
    <a href='/graduates' class='mt-grads-btn'>All Graduates</a>
    <?php echo '<a href="' . $prev_grad['permalink'] . '" class="grad-nav grad-prev">' ?>
      <div class='grad-img' style='background-image: url("<?php echo $prev_grad_img ?>")'></div>
      <?php echo '<div class="mt-graduate"><span class="mt-graduate__label">Prev Graduate</span><span class="mt-graduate__name">' . $prev_grad['full_name'] . '</span></div>'; ?>
    </a>
    <?php echo '<a href="' . $next_grad['permalink'] . '" class="grad-nav grad-next">' ?>
      <?php echo '<div class="mt-graduate"><span class="mt-graduate__label">Next Graduate</span><span class="mt-graduate__name">' . $next_grad['full_name'] . '</span></div>'; ?>
      <div class='grad-img' style='background-image: url("<?php echo $next_grad_img ?>")'></div>
    </a>
  </div>
<?php endif ?>




<?php



get_footer();

?>
