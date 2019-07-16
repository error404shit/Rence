<footer class="footer">
  <div class="container-fluid footer-radius mb-5"></div>
	<div class="container mb-4 pt-4">
		<div class="row">
      <div class="col-12 col-xl-3">
        <div id="one-footer-sidebar">
          <?php get_template_part( '/sidebar/sidebar', 'footer-one' ); ?>
        </div>
      </div>  
      <div class="col-12 col-xl-3">
        <div id="two-footer-sidebar">
          <?php get_template_part( '/sidebar/sidebar', 'footer-two' ); ?>
        </div>
      </div>  
      <div class="col-12 col-xl-3">
        <div id="three-footer-sidebar">
          <?php get_template_part( '/sidebar/sidebar', 'footer-three' ); ?>
        </div>
      </div>
      <div class="col-12 col-xl-3">
        <div id="four-footer-sidebar">
          <?php get_template_part( '/sidebar/sidebar', 'footer-four' ); ?>
        </div>
      </div>    
    </div>
  </div>
  <div class="container-fluid bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-12 col-xl-6 align-content-center p-1 mt-1">
          <div class="p-1">
            <h5 class="devs text-white mb-auto p-1">© 2019 qqblogs Theme by webdevzap. All rights reserved.</h5>
          </div>
        </div>
        <div class="col-12 col-xl-3 border-right-custom align-content-center p-1">
          <!-- Footer Menu Navigation -->
          <nav class="navbar navbar-expand-lg navbar-top justify-content-center align-content-center">
            <div>
              <?php 
                wp_nav_menu( array(
                  'theme_location'  => 'header',
                  'container'       => false,
                  'depth'           => 3,
                  'menu_class'      => 'nav navbar-nav top-menu small',
                  'fallback_cb'     => 'link_to_menu_editor',
                  'walker'          => new Walker_Nav()
                ) ); 
              ?>
            </div>
          </nav>
        </div>
        <div class="socials-cont col-12 col-xl-3">
        <ul class="navbar nav socials d-inline-flex">
          <?php if ( !empty(get_theme_mod( 'facebook' ) ) && get_theme_mod( 'display_social_icons' ) == 1 ): ?>
          <li class="text-center fb">
            <a class="nav-link text-white" href="<?php echo get_theme_mod( 'facebook' ) ?>">
              <i class="fa fak fa-facebook"></i>
            </a>
          </li>
          <?php endif; ?>
          <?php if ( !empty(get_theme_mod( 'twitter' ) ) && get_theme_mod( 'display_social_icons' ) == 1 ): ?>
          <li class="text-center twitter">
            <a class="nav-link text-white" href="<?php echo get_theme_mod( 'twitter' ) ?>">
              <i class="fa fak fa-twitter"></i>
            </a>
          </li>
          <?php endif; ?>
          <?php if ( !empty( get_theme_mod( 'instagram' ) ) && get_theme_mod( 'display_social_icons' ) == 1 ): ?>
          <li class="text-center ig">
            <a class="nav-link text-white" href="<?php echo get_theme_mod( 'instagram' ) ?>">
              <i class="fa fak fa-instagram"></i>
            </a>
          </li>
          <?php endif ?>
          <?php if ( !empty( get_theme_mod( 'youtube' ) ) && get_theme_mod( 'display_social_icons' ) == 1 ): ?>
          <li class="text-center yt">
            <a class="nav-link text-white" href="<?php echo get_theme_mod( 'youtube' ) ?>">
              <i class="fa fak fa-youtube-play"></i>
            </a>
          </li>
          <?php endif ?>
          <?php if ( !empty( get_theme_mod( 'google+' ) ) && get_theme_mod( 'display_social_icons' ) == 1 ): ?>
          <li class="text-center gplus">
            <a class="nav-link text-white" href="<?php echo get_theme_mod( 'google+' ) ?>">
              <i class="fa fa-google-plus"></i>
            </a>
          </li>
          <?php endif ?>
          <?php if ( !empty( get_theme_mod( 'linkedin' ) ) && get_theme_mod( 'display_social_icons' ) == 1 ): ?>
          <li class="text-center in">
            <a class="nav-link text-white" href="<?php echo get_theme_mod( 'linkedin' ) ?>">
              <i class="fa fak fa-linkedin"></i>
            </a>
          </li>
          <?php endif ?>
        </ul>
        </div>
    </div>
    </div>
  </div>
		<?php wp_footer(); ?>
</footer>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=228235974485033&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}
(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>