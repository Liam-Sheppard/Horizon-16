<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <title>Horizon / QUT Interactive + Visual Design Graduate Exhibition 2016</title>
    <meta property="og:url"                content="https://www.horizon16.com" />
    <?php

    if(is_home()){

      echo '<meta property="og:title" content="QUT Interactive + Visual Design Graduate Exhibition 2016" />';
      echo '<meta property="og:description" content="QUT Interactive + Visual Design Graduate Exhibition 2016" />';
      echo '<meta property="og:image" content="<?= get_stylesheet_directory_uri() ?>/assets/images/og-horizon.png" />';

    }  else if (is_page_template('graduates.php')) {

      echo '<meta property="og:title" content="QUT Interactive + Visual Design Graduates of 2016" />';
      echo '<meta property="og:description" content="Meet the graduating class of QUT IVD for 2016" />';
      echo '<meta property="og:image" content="<?= get_stylesheet_directory_uri() ?>/assets/images/og-horizon.png" />';

    } else if (is_single()){

      echo '<meta property="og:title" content="' . get_the_title() . ' />';

    }

    ?>
    <?php partial('favicon'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type='text/javascript' src='<?= get_stylesheet_directory_uri() ?>/assets/js/jquery-3.1.0.min.js'></script>
    <?php

    wp_head();
    partial('google-analytics');
    ?>
  </head>
    <body <?php body_class() ?>>
