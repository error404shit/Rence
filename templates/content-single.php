<article id="post-<?php the_ID() ?>" <?php post_class('single-content pt-3') ?>>
	<?php if ( get_theme_mod( 'thumbnail_display' ) == 0 ) : ?>
	<figure class="pl-3 pr-3">
		<a href="<?php the_permalink(); ?>">
			<img class="img-single" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" onerror="javascript:this.src='<?php echo get_template_directory_uri() . "/assets/img/No_image.png"; ?>'" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
		</a>
	</figure>
	<?php endif; ?>
	<div class="section">	
		<div class="categories-cats mb-3 pl-3 pr-3">
				<?php
				$category = get_the_category();
				if ( !empty( $category[0]->cat_name ) ) :
					echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a>';
				endif;
				if ( !empty( $category[1]->cat_name ) ) :
					echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[1]->cat_name . '</a>';
				endif;
				if ( !empty( $category[2]->cat_name ) ) :
					echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[2]->cat_name . '</a>';
				endif;
				if ( !empty( $category[3]->cat_name ) ) :
					echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[3]->cat_name . '</a>';
				endif;
				if ( !empty( $category[4]->cat_name ) ) :
					echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[4]->cat_name . '</a>';
				endif;
				if ( !empty( $category[5]->cat_name ) ) :
					echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[5]->cat_name . '</a>';
				endif;
				?>
		</div>
		<hr>
		<div class="col-12 col-md-12 pl-3 pr-3 pb-3 content-container">
			<div class="edit-container mb-2">
				<?php edit_post_link( 'Edit this'); ?>
			</div>
			<div class="single-post-content text-dark aritcle-content-img mb-4">
				<?php the_content() ?>
			</div>
			<div class="single-post-tag-container">
				<?php the_tags('<span class="single-tag">TAGS <i class="fa fa-tags"></i></span> ', ' '); ?>
			</div>
		</div>
	</div>
</article>