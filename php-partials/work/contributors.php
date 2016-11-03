<?php
if($contributors = get_field('contributors')){ ?>

  <ul class="project-contributors">
    <?php
    foreach($contributors as $contributor){
      var_dump($contributor);
      ?>

      <li class="contributor">
        <div class="contributor-photo" style="background-image: url(<?= get_stylesheet_directory_uri() . '/assets/images/graduate-images-600x400/graduate-' . $contributor . '.png' ?>);"></div>
        <span class="contributor-name graduate-label"><?= get_graduates([intval($contributor)])['first_name'] ?></span>
      </li>

    <?php } ?>
  </ul>

<?php
}
