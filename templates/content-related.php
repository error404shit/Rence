<article id="post-<?php the_ID() ?>" <?php post_class('related-post') ?>>
	<header>
		<figure>
			<a href="<?php the_permalink(); ?>">
				<img class="img-fluid" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" onerror="javascript:this.src='<?php echo get_template_directory_uri() . "/assets/img/No_image.png"; ?>'" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
			</a>
		</figure>
	</header>
	<div class="section">
		<div>
			<div>
				<?php the_title( sprintf( '<h3><a href="%s" title="'.get_the_title().'">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			</div>
		</div>
	</div>
</article>