<article id="post-<?php the_ID() ?>" <?php post_class('single-header pb-3') ?>>
	<div class="custom-card">
		<div class="section custom-card-body">
			<?php the_title( sprintf( '<h3 class="text-white text-uppercase">', esc_url( get_permalink() ) ), '</h3>' ); ?><br>
			<div class="row no-gutters mb-2">
				<div class="meta-time mr-3">
					<small><?php the_time( 'F j, Y' ) ?></small>
				</div>
				<div class="meta-author mr-3">
					<small><?php echo '<span><i class="fa fa-user"></i></span>'.' '.get_the_author() ?></small>
				</div>
				<div class="meta-commen mr-3">
					<small><?php echo '<span class=""><i class="fa fa-comments"></i></span>' . ' ' . comment_count() ?></small>
				</div>		
				<div class="meta-author mr-3">
					<small><?php echo '<span><i class="fa fa-eye"></i></span>'.' '. getPostViews(get_the_ID()); ?></small>
				</div>
			</div>
		</div>
	</div>
	<div class="sr-only">
		<?php setPostViews( get_the_ID() ); ?>
	</div>
</article>