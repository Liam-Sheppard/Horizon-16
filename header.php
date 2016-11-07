<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <title>Horizon / QUT Interactive + Visual Design Graduate Exhibition 2016</title>
    <meta property="og:url"                content="https://www.horizon16.com" />
    <meta property="og:image" content="<?= get_stylesheet_directory_uri() ?>/assets/images/og-horizon.png" />
    <meta property="og:title" content="Horizon 16 | QUT Interactive + Visual Design Graduate Exhibition 2016" />
    <meta property="og:description" content="QUT Interactive + Visual Design Graduate Exhibition 2016" />
    <meta name="description"        content="QUT Interactive + Visual Design Graduate Exhibition 2016">
    <?php
    /*
    For when I get around to thisx
    if (is_home()) {

      echo '<meta property="og:title" content="Horizon 16 | QUT Interactive + Visual Design Graduate Exhibition 2016" />';
      echo '<meta property="og:description" content="QUT Interactive + Visual Design Graduate Exhibition 2016" />';
      echo '<meta name="description"        content="QUT Interactive + Visual Design Graduate Exhibition 2016">';

    } else if (is_page_template('graduates.php')) {

      echo '<meta property="og:title" content="Horizon 16 | QUT Interactive + Visual Design Graduate Exhibition 2016" />';
      echo '<meta property="og:description" content="Meet the graduating class of QUT Interactive + Visual Design for 2016." />';
      echo '<meta name="description"        content="Meet the graduating class of QUT Interactive + Visual Design for 2016." />';

    } else if (is_single()) {

      echo '<meta property="og:title" content="' . get_the_title() . ' | QUT Interactive + Visual Design Graduates of 2016" />';

    } else if (is_author()) {

      echo '<meta property="og:title" content="' . get_the_title() .  ' | QUT Interactive + Visual Design Graduates of 2016" />';
      var_dump(get_queried_object());

    }
    */
    ?>
    <?php partial('favicon'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type='text/javascript' src='<?= get_stylesheet_directory_uri() ?>/assets/js/jquery-3.1.0.min.js'></script>
    <?php

    wp_head();
    if(!is_multitouch()){
      partial('google-analytics');
    }
    ?>
  </head>
    <body <?php body_class() ?>>
