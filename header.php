<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>
<body>
<!-- Start News -->
<div class="news text-white no-gutters">
	<div class="container">
		<div class="row">
			<div class="col-12 col-xl-6">
				<div class="d-flex justify-content-center align-content-center flex-wrap headline-container">
					<div class="headline pt-1 pb-1" width="20%">
						<span class="news-title mr-3 pl-3 pr-3 pb-1 pt-1">Headline</span>	
						<button class="btn-marq pl-2 pr-2" onclick="changeMarquee('left')" id="leftBtn" value="Marquee Left">
							<i class='fas fa-angle-left fa-xs'></i>
						</button>
						<button class="btn-marq pl-2 pr-2" onclick="changeMarquee('right')" id="righBbtn" value="Marquee Right">
							<i class='fas fa-angle-right fa-xs'></i>
						</button>
					</div>
					<marquee id="myMarquee" class="m-auto" width="70%" onmouseover="this.stop()" onmouseout="this.start()">
						<div class="d-inline-flex">
							<?php 
								$news = new WP_Query( array( 
									'type'					=> 'post',
									'posts_per_page'		=> 6,
									'ignore_sticky_posts'	=> 1
								 ) );
								if ( $news->have_posts() ) :
									while ( $news->have_posts() ) : $news->the_post();
							?>
							<?php 
							 	get_template_part( 'templates/content', 'news' );
							?>
							<?php endwhile ?> 
						</div>
						<?php endif; wp_reset_postdata(); ?>
					</marquee>
				</div>
			</div>
			<div class="col-12 col-xl-3 border-right-custom">
				<!-- Top Menu Navigation -->
				<nav class="navbar navbar-expand-lg navbar-top justify-content-center align-content-center">
					<div class="p-1">
						<?php 
							wp_nav_menu( array(
								'theme_location' 	=> 'header',
								'container' 		=> false,
								'depth' 			=> 3,
								'menu_class' 		=> 'nav navbar-nav top-menu small',
								'fallback_cb'		=> 'link_to_menu_editor',
								'walker' 			=> new Walker_Nav()
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
<!-- End News -->
<!-- start Navigation -->
<div class="main-nav-container container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-12 col-xl-5">
				<header class="loggo">
					<?php if ( get_theme_mod( 'site_title_option' ) == 'logo-only' ) : ?>
						<div class="pt-2 pb-2 mt-1">
							<a href="<?php echo home_url() ?>">
								<img class="img-fluid" src="<?php echo get_theme_mod( 'logo' ) ?>" onerror="javascript:this.src='<?php echo get_template_directory_uri() . "/img/tier-.png"; ?>'" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ) ?>" title="TierFour">
								<h1 class="sr-only site-title mb-0">
									<?php bloginfo( 'name' ); ?>
								</h1>
								<?php $description = get_bloginfo( 'description', 'display' );?>
								<h2 class="sr-only"><?php echo $description ?></h2>
							</a>
						</div>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'site_title_option' ) == 'text-only' ||  get_theme_mod( 'site_title_option' ) == '' ) : ?>
						<div class="pt-2 pb-2">
							<h1 class="site-title mb-0">
								<a style="color:#<?php echo get_theme_mod( 'header_textcolor' );?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							</h1>
							<?php $description = get_bloginfo( 'description', 'display' );?>
							<h2 class="mb-0" style="color:#<?php echo get_theme_mod( 'header_textcolor' );?>"><?php echo $description; ?></h2>
						</div>
					<?php endif; ?>
				</header>
			</div>
			<div class="col-12 col-xl-7 main-nav">
				<!-- Start of Navigation -->
				<nav class="navbar navbar-expand-lg navbar-light p-0">
					<div class="navbar-header">
						<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
							<span><i class="fa fa-reorder" style="font-size:16px"></i></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
						<?php 
							wp_nav_menu( array(
								'theme_location'  => 'main',
								'container'       => false,
								'menu_class'      => 'nav navbar-nav mt-2 mt-lg-0',
								'depth'           => 0,
								'fallback_cb'	  => 'link_to_menu_editor',
								'walker'          => new Walker_Nav()
							) );
						 ?>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- End of Navigation -->
<div class="header-widget-container">
	<div class="container">
		<div id="sidebar-header">
			<?php get_template_part( '/sidebar/sidebar', 'header-widget' ); ?>
		</div>
	</div>
</div>
<?php 
if ( is_home() || is_front_page() || !is_page() && is_404() ) {
// }elseif (is_404()) {					
}else {
?>
<!-- Single Title Header Posts -->
<?php if ( has_header_image() ){ ?>
<div class="container-fluid header-img mb-5" style="background: url('<?php header_image() ?>'); background-repeat: no-repeat; background-size: cover;" >
<?php }else{ ?>
<div class="container-fluid hero mb-5">
<?php } ?>	
	<div class="container">
		<div class="breadcrumb"><?php echo custom_breadcrumbs(); ?></div>
		<?php
		if ( is_single() ) {
			require_once 'themes/single-header.php';
		}elseif ( is_archive() ) {
			require_once 'themes/archive-header.php';
		}elseif ( is_search() ) {
			echo "<h3 class='search-result pt-4 pb-4'>" . esc_html( get_search_query( false ) ) ."</h3>";
		}
		?>
	</div>
</div>
<!-- End of Single Title Header Posts -->
<?php } ?>
<!-- Scroll Top -->
<div class="container">	
	<button id="btn-scroll-top" class="scroll-top-arrow" style="display: none;">
		<i class="fa fa-chevron-up text-white" style="font-size:24px"></i>
	</button>
</div>