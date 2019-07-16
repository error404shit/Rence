<article id="post-<?php the_ID() ?>" <?php post_class('featured-post') ?>>
	<header>
		<figure>
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" onerror="javascript:this.src='<?php echo get_template_directory_uri() . "/assets/img/No_image.png"; ?>'" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
			</a>
		</figure>		
	</header>
</article>