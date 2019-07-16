<article id="post-<?php the_ID() ?>" <?php post_class('recent-post-main') ?>>
	<header>
		<figure>
			<a href="<?php the_permalink(); ?>">
				<img class="img-fluid" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" onerror="javascript:this.src='<?php echo get_template_directory_uri() . "/assets/img/No_image.png"; ?>'" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
			</a>
		</figure>
	</header>
	<div class="categories-cats">
			<?php
			$category = get_the_category();
			if ( !empty( $category[0]->cat_name ) ) :
				echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a>';
			endif;
			?>
	</div>
	<div class="section">
		<div>
			<div>
				<?php the_title( sprintf( '<h3><a href="%s" title="'.get_the_title().'">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			</div>
			<div class="row no-gutters mb-2">
				<div class="meta-time mr-auto">
					<small><?php the_time( 'F j, Y' ) ?></small>
				</div>
				<div class="meta-author mr-auto">
					<small><?php echo '<span><i class="fa fa-user text-secondary" style="font-size:12px"></i></span>'.' '.get_the_author() ?></small>
				</div>
				<div class="meta-commen mr-auto">
					<small><?php echo '<span class=""><i class="fa fa-comments text-secondary" style="font-size:12px"></i></span>' . ' ' . comment_count() ?></small>
				</div>		
				<div class="meta-author mr-auto">
					<small><?php echo '<span><i class="fa fa-eye text-secondary" style="font-size:12px"></i></span>'.' '. getPostViews(get_the_ID()); ?></small>
				</div>
			</div>
			<div>
				<?php echo "<p>".excerpt(30)."</p>"; ?>
				<a class="a-btn" href='<?php the_permalink() ?>'>READ MORE</a>
			</div>
		</div>
	</div>
</article>