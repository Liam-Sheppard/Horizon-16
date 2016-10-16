<header id="site-header">
  <nav id="primary-navigation">
      <a href="<?= get_home_url() ?>" class="horizon-glyph toast-is-ready">
          <span class="horizon-glyph-glyph"></span>
      </a>
      <?php wp_nav_menu() ?>
      <a href="javascript:void(0)" class="hamburger toggle-mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </a>
  </nav>


  <?php partial('social-media'); ?>
</header>
