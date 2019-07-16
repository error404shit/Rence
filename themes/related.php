<div class="slick-container p-2 pb-5">
	<section class="slider responsive2">
		<?php
		// Default arguments
		$args = array(
			'posts_per_page' 		=> 6, // How many items to display
			'post__not_in'   		=> array( get_the_ID() ), // Exclude current post
			'no_found_rows'  		=> true, // We don't ned pagination so this speeds up the query
			'ignore_sticky_posts'	=>	1
		);
		// Check for current post category and add tax_query to the query arguments
		$cats 	  = wp_get_post_terms( get_the_ID(), 'category' ); 
		$cats_ids = array();  
		foreach( $cats as $wpex_related_cat ) {
			$cats_ids[] = $wpex_related_cat->term_id; 
		}
		if ( ! empty( $cats_ids ) ) {
			$args['category__in'] = $cats_ids;
		}
		// Query posts
		$wpex_query = new wp_query( $args );
		// Post ID that should not be repeated
		$post_id = ($args['post__not_in']);
		// If no related post
		$category   = get_the_category();
		$id         = $category[0]->term_id;
		$categories = get_category($id);
		$count      = $categories->category_count;
		if ( $count <= 1 ) {
			$qry = new wp_query( array(
				'type'					=> 'post',
				'orderby'				=> 'rand',
				'posts_per_page'		=> 6,
				'post__not_in'			=> $post_id,
				'ignore_sticky_posts'	=>	1
			) );
			if ( $qry->have_posts() ) {
				while ( $qry->have_posts() ) {
					$qry->the_post();?>
			<div class="col-12 hide">
				<?php get_template_part( 'templates/content', 'related' ); ?>
			</div>
			<?php	}
			}else{ echo 'test'; } wp_reset_postdata();
		}
		// End of No related post
		// Loop through posts
		foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
			<div class="col-12 hide">
				<?php get_template_part( 'templates/content', 'related' ); ?>
			</div>
		<?php
		// End loop
		endforeach;
		// Reset post data
		wp_reset_postdata(); ?>
	</section>
</div>