<?php get_header() ?>
<main>
	<!-- <div class="p-3"></div> -->
	<div class="container">
		<div class="row">
			<div class="col-12 <?php if( get_theme_mod( 'page_option' ) == 1 ){ echo 'col-xl-6'; } ?> page-container mb-5">
				<article class="index-page">
					<header class="page-header">
						<div class="title-page">
							<h3 class="p-2"><?php the_title() ?></h3>
						</div>
					</header>
					<div class="section">
						<div class="page-content">
							<?php 
								if ( have_posts() ) {
									while ( have_posts() ) {
										the_post();
										the_content();
									}
								}
							 ?>
						</div>
					</div>
				</article>
			</div>
			<?php if ( get_theme_mod( 'page_option' ) == 1 ): ?>
			<div id="left-sidebar" class="col-12 col-xl-3">
				<?php get_template_part( '/sidebar/sidebar', 'left' ); ?>
			</div>
			<div id="right-sidebar" class="col-12 col-xl-3">
				<?php get_template_part( '/sidebar/sidebar', 'right' ); ?>
			</div>
			<?php endif ?>
		</div>
	</div>
	<div class="container-fluid p-5"></div>
</main>
<?php get_footer() ?>