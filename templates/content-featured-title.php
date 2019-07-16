<article id="post-<?php the_ID() ?>" <?php post_class('featured-title-post') ?>>
	<div class="custom-card">
		<div class="section custom-card-body">
			<?php the_title( sprintf( '<h3>', esc_url( get_permalink() ) ), '</h3>' ); ?><br>
			<a href='<?php the_permalink() ?>' class='btn-custom small'>READ MORE</a>
		</div>
	</div>
</article>