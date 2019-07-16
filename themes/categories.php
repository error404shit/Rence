<?php
	if (  get_theme_mod( 'category_post_selection' ) != '') {
		$args = new WP_Query( array( 
			'type'					=> 'post',
			'posts_per_page'		=> 4,
			'cat'					=> intval( get_theme_mod( 'category_post_selection', 1 ) ),
			'ignore_sticky_posts'	=> 1
		) );
	}else{
	$args = new WP_Query( array( 
		'type'					=>	'post',
		'posts_per_page'		=>	4,
		'offset'				=>	11,
		'ignore_sticky_posts'	=>	1
	 ) );
	}
	if ( $args->have_posts() ) :
		while ( $args->have_posts() ) : $args->the_post();
 ?>
 			<div class="col-12 col-md-6">
 				<?php get_template_part( 'templates/content', 'categories' ) ?>
 			</div>
		<?php endwhile; ?>
	<?php endif; wp_reset_postdata(); ?>