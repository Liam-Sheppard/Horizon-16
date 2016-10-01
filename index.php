<?php

get_header();

partial('primary-navigation');

?>

<div class="panel scene">
  <?php
  partial('poly-background');
  partial('landing-content');
  ?>
</div>

<?php

partial('social-media');

partial('sponsors');

get_footer();
