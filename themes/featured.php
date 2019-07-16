<div class="slider slider-for">
	<?php 
		$args = new WP_Query( array( 
			'type'					=>	'post',
			'posts_per_page'		=>	6,
			'ignore_sticky_posts'	=>	1
		 ) );
		if ( $args->have_posts() ) :
			while ( $args->have_posts() ) : $args->the_post(); ?>
					<?php get_template_part( 'templates/content', 'featured' ); ?>
			<?php endwhile;
		endif; wp_reset_postdata();
	 ?>
</div>
<div class="sub-featured-container container p-0">
	<div class="col-12 mb-5">
		<div class="slider slider-for">
			<?php 
				$args = new WP_Query( array( 
					'type'					=>	'post',
					'posts_per_page'		=>	6,
					'ignore_sticky_posts'	=>	1
				 ) );
				if ( $args->have_posts() ) :
					while ( $args->have_posts() ) : $args->the_post(); ?>
							<?php get_template_part( 'templates/content', 'featured-sub' ); ?>
					<?php endwhile;
				endif; wp_reset_postdata();
			 ?>
		</div>
	</div>
	<div class="col-12">
		<div class="slider slider-nav">
			<?php 
				$args = new WP_Query( array( 
					'type'					=>	'post',
					'posts_per_page'		=>	6,
					'ignore_sticky_posts'	=>	1
				 ) );
				if ( $args->have_posts() ) :
					while ( $args->have_posts() ) : $args->the_post(); ?>
						<div class="col-12 p-3 slider-nav-cont">
							<?php get_template_part( 'templates/content', 'featured-title' ); ?>
						</div>
					<?php endwhile;
				endif; wp_reset_postdata();
			 ?>
		</div>
	</div>
</div>