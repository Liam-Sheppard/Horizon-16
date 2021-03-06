<?php
get_header();
partial('header');
$current_graduate = get_graduates([get_queried_object()->post_author])[0];
$gallery = get_field('work_gallery');
?>

<?php /*<div class="fixed-polys scene">

  <div class="polygon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 594.4 383.72" class="polygon layer" data-desktop-depth="0.2" data-mobile-depth="1" data-depth="0.3"><polyline class="a" points="0.37 216.58 254.51 0.7 594.03 383.22"/><polyline class="b" points="594.03 383.22 200 349.7 0.37 216.58"/></svg>
  </div>
  <div class="polygon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 594.3 409.59" class="polygon layer" data-desktop-depth="0.03" data-mobile-depth="1" data-depth="0.3"><polyline class="a" points="290.47 226.32 153.24 1.15 0.47 424.32"/><polyline class="b" points="0.47 424.32 238.47 311.82 290.47 226.32"/></svg>
  </div>

</div> */ ?>

<div class="work-content">

  <div>
      <h1><?= get_the_title() ?></h1>
      <p class="graduate-label"><a href="<?= $current_graduate['permalink'] ?>">by <?= $current_graduate['full_name'] ?></a></p>
      <div class="work-carousel">
        <?php
        // if($videos = get_field('videos')){
        //   foreach($videos as $video){
        //     switch($video['host']){
        //
        //       case 'youtube':
        //         partial('video/responsive-video', [
        //           'src' => 'https://www.youtube.com/embed/' . $video['video_id']
        //         ]);
        //         break;
        //
        //       case 'vimeo':
        //         partial('video/responsive-video', [
        //           'src' => 'https://player.vimeo.com/video/' . $video['video_id']
        //         ]);
        //         break;
        //
        //     }
        //   }
        // }
        foreach($gallery as $item){
          echo '<div class="work-carousel-item"><img src="'. $item['sizes']['large'] .'"></div>';
        }
        ?>
      </div>
      <article class="work-description text-center">
        <?= apply_filters('the_content', get_the_excerpt()) ?>
      </article>

      <?php
      if(!is_multitouch()){
        if($project_url = get_field('project_url')) : ?>
          <div class="project-url-link">
            <a href="<?= $project_url ?>" target="_blank" class="button button--black">Visit the project</a>
          </div>
        <?php endif;
      } ?>

  </div>
  <?php if (is_multitouch()) : ?>
    <div class='mt-close-btn-left mt-close-work'>
      <div class='mt-close-btn'></div>
      <span class='mt-close-text'>
        Close work
      </span>
    </div>
    <div class='mt-close-btn-right mt-close-work'>
      <span class='mt-close-text'>
        Close work
      </span>
      <div class='mt-close-btn'></div>
    </div>
  <?php endif; ?>
</div>

<?php
get_footer();
