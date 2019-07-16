<?php get_header(); ?>
<main>
	<?php 
	global $count;
	$posts = wp_count_posts(); 
	$count = $posts->publish;
	if ($count > 21) {
	 ?>
	<!-- Featured Posts -->
	<div class="featured-container container-fluid p-0">
		<?php require_once('themes/featured.php') ?>
	</div>
	<!-- End of Featured Posts -->
	<?php }else{ ?>
	<!-- Default -->
	<?php if ( has_header_image() ){ ?>
	<div class="container-fluid header-img mb-5" style="background: url('<?php header_image() ?>'); background-repeat: no-repeat; background-size: cover;" >
	<?php }else{ ?>
	<div class="container-fluid hero mb-5">
	<?php } ?>
		<div class="container p-5">
			<div class="breadcrumb"><?php echo custom_breadcrumbs(); ?></div>
		</div>
	</div>
	<?php } ?>
	<div class="container">
		<div class="row">
			<div class="col-12 col-xl-6">
				<?php 
				global $count;
				$posts = wp_count_posts(); 
				$count = $posts->publish;
				if ($count > 21) {
				 ?>
				<!-- Start of Recent Post -->
				<div class="col-12 p-0 recent-container mb-5">
					<div class="title pt-2 pb-2 pl-3 pr-3">Recent Posts</div>
					<div class="row content p-3">
						<?php require_once('themes/recent-post.php') ?>
					</div>
				</div>
				<!-- End of Recent Post -->
				<!-- Start of Categories -->
				<div class="col-12 p-0 category-container mb-5">
					<div class="title pt-2 pb-2 pl-3 pr-3">
						<?php if ( get_theme_mod( 'category_post_selection' ) != '' ) { echo ucfirst( get_cat_name( get_theme_mod( 'category_post_selection' ) ) ); } else { echo "Category"; } ?>
					</div>
					<div class="row content p-3">
						<?php require_once('themes/categories.php') ?>
					</div>					
				</div>
				<!-- End of Categories -->
				<!-- Start of Category A-B -->
				<div class="row">
					<div class="col-12 col-xl-6">
						<div class="col-12 p-0 category-a-container mb-5">
							<div class="title pt-2 pb-2 pl-3 pr-3">
								<?php if ( get_theme_mod( 'category_a_post_selection' ) != '' ) { echo ucfirst( get_cat_name( get_theme_mod( 'category_a_post_selection' ) ) ); } else { echo "Category A"; } ?>
							</div>
								<div class="row content p-3">
									<?php require_once('themes/category-a.php') ?>
								</div>					
						</div>
					</div>
					<div class="col-12 col-xl-6">
						<div class="col-12 p-0 category-b-container mb-5">
							<div class="title pt-2 pb-2 pl-3 pr-3">
								<?php if ( get_theme_mod( 'category_b_post_selection' ) != '' ) { echo ucfirst( get_cat_name( get_theme_mod( 'category_b_post_selection' ) ) ); } else { echo "Category B"; } ?>
							</div>
								<div class="row content p-3">
									<?php require_once('themes/category-b.php') ?>
								</div>					
						</div>
					</div>
				</div>
				<!-- End of Category A -->
				<?php }else{ ?>
				<!-- Start of Default Posts -->
				<div class="col-12 p-0 archive-container mb-5">
					<?php require_once('themes/default.php') ?>
				</div>
				<!-- End of Default Posts -->
				<?php } ?>
			</div>
			<div id="left-sidebar" class="col-12 col-xl-3">
				<?php get_template_part( '/sidebar/sidebar', 'left' ); ?>
			</div>
			<div id="right-sidebar" class="col-12 col-xl-3">
				<?php get_template_part( '/sidebar/sidebar', 'right' ); ?>
			</div>
		</div>
	</div>
	<div class="container-fluid p-5"></div>
</main>
<?php get_footer(); ?>