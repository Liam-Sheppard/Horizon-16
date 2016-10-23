<?php
get_header();
partial('header');
$current_graduate = get_graduates([get_queried_object()->post_author])[0];
$gallery = get_field('work_gallery');
?>

<div class="fixed-polys scene">

  <div class="polygon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 594.4 383.72" class="polygon layer" data-desktop-depth="0.2" data-mobile-depth="1" data-depth="0.3"><polyline class="a" points="0.37 216.58 254.51 0.7 594.03 383.22"/><polyline class="b" points="594.03 383.22 200 349.7 0.37 216.58"/></svg>
  </div>
  <div class="polygon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 594.3 409.59" class="polygon layer" data-desktop-depth="0.03" data-mobile-depth="1" data-depth="0.3"><polyline class="a" points="290.47 226.32 153.24 1.15 0.47 424.32"/><polyline class="b" points="0.47 424.32 238.47 311.82 290.47 226.32"/></svg>
  </div>

</div>

<div class="work-content">
  <a href="javascript:void(0)" class="close-works"><span class="close-works__label">Back to </span><span class="close-works__name">Profile</span></a>

  <div>
      <h1><?= get_the_title() ?></h1>
      <p class="graduate-label">by <?= $current_graduate['full_name'] ?></p>
      <div class="work-carousel">
        <?php
        foreach($gallery as $item){
          echo '<div class="work-carousel-item"><img src="'. $item['sizes']['large'] .'"></div>';
        }
        ?>
      </div>
      <article class="work-description text-center">
        <?= apply_filters('the_content', get_the_excerpt()) ?>
      </article>

      <?php if($project_url = get_field('project_url')) : ?>
        <div class="project-url-link">
          <a href="<?= $project_url ?>" target="_blank" class="button button--black">Visit the project</a>
        </div>
      <?php endif; ?>

  </div>
</div>



<?php
get_footer();
?>
