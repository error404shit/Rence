<?php 
$default = new WP_Query( array( 
	'type'					=> 'post',
	'posts_per_page'		=> -1,
	'ignore_sticky_posts'	=> 1
) );
if ( $default->have_posts() ) {
	while ($default->have_posts()) {
		$default->the_post(); ?>
		<section>
			<?php get_template_part( 'templates/content', 'archive-content' ); ?>
		</section>
	<?php }
} wp_reset_postdata();

 ?>