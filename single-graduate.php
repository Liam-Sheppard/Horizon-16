<?php
/**
* Template Name: Single Graduate
*
*/
?>

<?php

get_header();

partial('header');

?>

<div class="panel panel--single-graduate">

  <div class='left-panel grad-1' id='leftPanelJS'>
    <div class='grad-image'></div>
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
    </div>
  </div>

  <div class='right-panel'>
    <h1>
      Liam Sheppard
    </h1>

    <h2>
      UX/UI / Web
    </h2>

    <!-- <span class="horizon-rule horizon-rule--top-end"></span> -->
    <div class="panel-bridge"></div>
    <!-- <span class="horizon-rule horizon-rule--bottom-end"></span> -->

    <p class='paragraph'>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut ipsum nec felis ullamcorper placerat. Curabitur ac purus vitae augue feugiat venenatis ac non diam. Donec venenatis libero dui. In hac habitasse platea dictumst. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta, nisi rhoncus bibendum pellentesque, orci ligula auctor magna, ut tempus velit ex facilisis lacus. In vitae iaculis odio. Proin feugiat gravida metus, eget egestas lacus fermentum at. Sed non ipsum at purus viverra molestie vel nec felis.
    </p>

    <div class="panel-bridge"></div>
    <span class="horizon-rule horizon-rule--bottom-end"></span>
    <div class='fun-facts'>
      <div class='fact'>
        <span class='number'>15+</span>
        <span class='text'>Games of Dota 2 per week</span>
      </div>
      <div class='fact'>
        <span class='number'>5</span>
        <span class='text'>Hours of Reddit per day</span>
      </div>
      <div class='fact'>
        <span class='number'>2</span>
        <span class='text'>Pizzas per week</span>
      </div>
    </div>
    <span class="horizon-rule horizon-rule--top-end"></span>
    <div class="panel-bridge"></div>
    <a href="#" class='fancy-link'>View my Portfolio</a>
  </div>

</div>


<?php

//partial('footer');

get_footer();

?>
