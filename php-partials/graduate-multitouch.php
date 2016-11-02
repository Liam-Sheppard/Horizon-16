<li class="single-grad active <?= isset($disciplines) ? implode(' ', $disciplines) : false ?>">
  <a href="<?= isset($permalink) ? $permalink : get_home_url() + '/graduates' ?>" class="grad-container-nohover">
    <img src="<?= $image ?>">
    <span class='grad-name-multitouch'><span class="board"></span><span class="name-multitouch"><?= $name ?></span></span>
  </a>
</li>
