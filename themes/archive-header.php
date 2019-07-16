<?php 
if ( have_posts() ) :
	get_template_part( 'templates/content', 'archive-header' );
endif; wp_reset_postdata();
?>