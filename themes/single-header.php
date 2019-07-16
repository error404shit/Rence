<?php 
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( 'templates/content', 'single-header' );
	endwhile;
endif; wp_reset_postdata();
?>