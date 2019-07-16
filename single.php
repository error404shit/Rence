<?php get_header() ?>
<main>
	<!-- <div class="p-3"></div> -->
	<div class="container">
		<div class="row">
			<div class="col-12 col-xl-6">
				<?php require_once 'themes/single.php' ?>
			<!-- Start Pagination -->
			<?php 
			global $count;
			$posts = get_posts(  );
			$count = count($posts);
			?>
			<?php if ( $count > 1 ) : ?>
			<div class ="row mb-4 mt-4 ml-0 mr-0 page-contianer">

					<?php
					$prevPost = get_previous_post();
					if ( !empty( $prevPost ) ){
					?>
						<div class="col-12 col-sm-5 page-btn-single prev-left"> 
					<?php
					$prevthumbnail = get_the_post_thumbnail($prevPost->ID);
					 previous_post_link('
						<h5 class="post-nav-title-next" title="'.get_the_title($prevPost->ID).'">
							%link
						</h5>', ''.'%title', false);
					?>
						</div>
					<?php
					}else{
					?>
					<div class="col-12 col-sm-5"></div>
					<?php } ?>

				<div class="col-12 col-sm-2 btn-single text-center">
					<?php 
						$prevPost = get_previous_post();
						if ( !empty( $prevPost ) ){
					 ?>
					<i class="fas fa-angle-double-left"></i>
					<?php 
						}
					 ?>
					<?php
						$nextPost = get_next_post();
						if ( !empty( $nextPost ) ){
					 ?>
					<i class="fas fa-angle-double-right"></i>
					<?php 
						} 
					?>
				</div>			

				<?php
				$nextPost = get_next_post();
				if ( !empty( $nextPost ) ){
				?>
					<div class="col-12 col-sm-5 page-btn-single next-right">
				<?php
					$nextthumbnail = get_the_post_thumbnail($nextPost->ID);
					 next_post_link('
						<h5 class="post-nav-title-next" title="'.get_the_title($nextPost->ID).'">%link
						</h5>', '%title'.'', false);
				?>
					</div>
				<?php
				}
				?>
			</div>
			<?php endif; ?>
			<!-- End Pagination -->
			<?php if ( get_theme_mod( 'authorbox_option' ) == 0 ): ?>
			<!-- Start Author Box -->
			<div class="author-container mb-4">
				<div class="p-2 author-box-title">ABOUT THE AUTHOR</div>
				<div class="media author-box">
				    <div class="media-figure">
				        <?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
				    </div>
				    <div class="media-body">
				        <h4 class="text-uppercase"><?php the_author(); ?></h4>
				        <p><?php the_author_meta('description'); ?></p>
				        <div class="author-icons">
				        	<?php if ( !empty( get_the_author_meta('facebook') ) ): ?>
					            <a href="<?php the_author_meta('facebook'); ?>" target="_blank" rel="nofollow" class="author-facebook mr-2">
					                <i class="fa fak fa-facebook"></i>
					            </a>
				        	<?php endif ?>
				        	<?php if ( !empty( get_the_author_meta('twitter') ) ): ?>
					            <a href="<?php the_author_meta('twitter'); ?>" target="_blank" rel="nofollow" class="author-twitter mr-2">
					                <i class="fa fak fa-twitter"></i>
					            </a>
				        	<?php endif ?>
				        	<?php if ( !empty( get_the_author_meta('instagram') ) ): ?>
					            <a href="<?php the_author_meta('instagram'); ?>" target="_blank" rel="nofollow" class="author-instagram mr-2">
					                <i class="fa fak fa-instagram"></i>
					            </a>
				        	<?php endif ?>
				        	<?php if ( !empty( get_the_author_meta('linkedin') ) ): ?>
					            <a href="<?php the_author_meta('linkedin'); ?>" target="_blank" rel="nofollow" class="author-linkedin mr-2">
					                <i class="fa fak fa-linkedin"></i>
					            </a>
				        	<?php endif ?>
				        </div>
				    </div>
				</div>
			</div>
			<?php endif ?>
			<!-- End of Author Box -->
			<?php if ( get_theme_mod('related_display') == 0 ): ?>
			<!-- Start Related Post -->
			<div class="col-12 mb-4 p-0 related-container">
				<?php 
				global $count;
				$posts = get_posts(  );
				$count = count($posts);
				?>
				<?php if ( $count > 1 ) : ?>
				<div class="title-related">
					<p class="titles p-2 mb-0 text-uppercase">Related Posts</p>
				</div>
				<div class="col-12 p-0 mt-4">
					<?php include "themes/related.php"; ?>
				</div>
				<?php endif ?>
				<!-- End Related Post -->
			</div>
			<?php endif; ?>
			<!-- Start Comment Section -->
			<div class="col-12 p-0 mb-4 comments-container">
				<?php
				if ( comments_open() ) {
					comments_template();
				}else{
					echo '<h5 class="text-center comment-closed p-3">Sorry, Comments are closed!</h5>';
				}
				?>
			</div>
			<!-- End Comment Section -->
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
<?php get_footer() ?>