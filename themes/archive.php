<?php
if ( isset( $_POST['filter'] ) ) {
	if ( $_POST['filter'] == 'popular' ) {
		$categories  = get_the_category();
		$category_id = $categories[0]->cat_ID;
		$popularpost = new WP_Query( 
			array( 
				'posts_per_page' 		=> -1, 
				'meta_key'		 		=> 'post_views_count',
				'orderby' 		 		=> 'meta_value_num',
				'order'			 		=> 'DESC',
				'cat'					=> $category_id,
				'ignore_sticky_posts'	=> 1,
			) 
		);
		while ( $popularpost->have_posts() ) { 
			$popularpost->the_post();
			get_template_part( 'templates/content', 'archive-content' );	 
		}
	}
	if ( $_POST['filter'] == 'latest' ) {
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'templates/content', 'archive-content' );
			}
		}else{
			echo "<h1 class='text-center mt-5'>No Result Found!</h1>";
		}wp_reset_postdata();
	}
}else{
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'templates/content', 'archive-content' );
		}
	}else{
		echo "<h1 class='text-center mt-5'>No Result Found!</h1>";
	}wp_reset_postdata();
}
