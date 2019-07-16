<div class="col-12 col-md-6">
	<?php 
		$args = new WP_Query( array( 
			'type'					=>	'post',
			'posts_per_page'		=>	1,
			'offset'				=>	6,
			'ignore_sticky_posts'	=>	1
		 ) );
		if ( $args->have_posts() ) :
			while ( $args->have_posts() ) : $args->the_post();
				get_template_part( 'templates/content', 'recent-post-main' );
	 ?>
			<?php endwhile; ?>
		<?php endif; wp_reset_postdata(); ?>
</div>
<div class="col-12 col-md-6">
	<?php 
		$args = new WP_Query( array( 
			'type'					=>	'post',
			'posts_per_page'		=>	4,
			'offset'				=>	7,
			'ignore_sticky_posts'	=>	1
		 ) );
		if ( $args->have_posts() ) :
			while ( $args->have_posts() ) : $args->the_post();
	 			get_template_part( 'templates/content', 'recent-post-sub' );
	 ?>
	 	<?php endwhile; ?>
	<?php endif; wp_reset_postdata(); ?>
</div>