<header id="site-header">
  <nav id="primary-navigation">
      <a href="<?= get_home_url() ?>" class="horizon-glyph toast-is-ready">
          <span class="horizon-glyph-glyph">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          	 viewBox="0 0 145.5 129.9" enable-background="new 0 0 145.5 129.9" xml:space="preserve">
          <polygon fill="#FFFFFF" points="145.5,129.9 145.5,0 112.2,0 112.2,72.3 33.6,72.3 33.6,0 0,0 0,129.9 33.6,129.9 33.6,99 112.2,99
          	112.2,129.9 "/>
          </svg>
        </span>
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
