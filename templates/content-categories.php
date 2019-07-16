<article id="post-<?php the_ID() ?>" <?php post_class('categories') ?>>
	<figure>
		<a href="<?php the_permalink(); ?>">
			<img class="img-fluid" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" onerror="javascript:this.src='<?php echo get_template_directory_uri() . "/assets/img/No_image.png"; ?>'" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
		</a>
	</figure>
	<header>
		<div class="overlay">
			<div class="p-2">
				<?php the_title( sprintf( '<h3><a href="%s" class="text-white" title="'.get_the_title().'">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			</div>
			<div class="categories-cats">
				<?php
				$category = get_the_category();
				if ( !empty( $category[0]->cat_name ) ) :
					echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a>';
				endif;
				if ( !empty( $category[1]->cat_name ) ) :
					echo '<a href="' . get_category_link($category[1]->term_id) . '">' . $category[1]->cat_name . '</a>';
				endif;
				?>
			</div>
		</div>
	</header>
</article>