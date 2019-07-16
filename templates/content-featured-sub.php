<article id="post-<?php the_ID() ?>" <?php post_class('featured-sub-post1 p-2') ?>>
	<div class="featured-sub-post">
		<header>
			<?php the_title( sprintf( '<h3><a href="%s" class="text-uppercase" title="'.get_the_title().'">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		</header>
		<div class="section">
			<div class="featured-cats">
				<?php
				$category = get_the_category();
				echo '<ul class="post-categories">';
				if ( !empty( $category[0]->cat_name ) ) :
					echo '<li>' . '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a>' . '</li>';
				endif;
				echo '</ul>';
				?>
			</div>
			<div>
				<?php echo "<p>".excerpt(30)."</p>"; ?>
			</div>
		</div>
	</div>
</article>