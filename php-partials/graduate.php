<li class="single-grad active <?= isset($disciplines) ? implode(' ', $disciplines) : false ?>">
  <a href="<?= isset($permalink) ? $permalink : get_home_url() + '/graduates' ?>" class="grad-container">
    <img src="<?= $image ?>">
    <span class='grad-name'><span class="board"></span><span class="name"><?= $name ?></span></span>
  </a>
</li>
