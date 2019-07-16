<div class="col-12 mb-3">
	<?php
	if (  get_theme_mod( 'category_a_post_selection' ) != '') {
		$args = new WP_Query( array( 
			'type'					=> 'post',
			'posts_per_page'		=> 1,
			'cat'					=> intval( get_theme_mod( 'category_a_post_selection', 1 ) ),
			'ignore_sticky_posts'	=> 1
		) );
	}else{ 
		$args = new WP_Query( array( 
			'type'					=>	'post',
			'posts_per_page'		=>	1,
			'offset'				=>	15,
			'ignore_sticky_posts'	=>	1
		 ) );
	}
		if ( $args->have_posts() ):
			while ( $args->have_posts() ) : $args->the_post();
	 ?>
	 			<?php get_template_part( 'templates/content', 'category-a' ) ?>
	<?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>
</div>
<div class="col-12">
	<?php
	if (  get_theme_mod( 'category_a_post_selection' ) != '') {
		$args = new WP_Query( array( 
			'type'					=> 'post',
			'posts_per_page'		=> 3,
			'offset'				=> 1,
			'cat'					=> intval( get_theme_mod( 'category_a_post_selection', 1 ) ),
			'ignore_sticky_posts'	=> 1
		) );
	}else{  
		$args = new WP_Query( array( 
			'type'					=>	'post',
			'posts_per_page'		=>	3,
			'offset'				=>	16,
			'ignore_sticky_posts'	=>	1
		 ) );
	}
		if ( $args->have_posts() ):
			while ( $args->have_posts() ) : $args->the_post();
	 ?>
	 			<?php get_template_part( 'templates/content', 'category-a-sub' ) ?>
	<?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>
</div>