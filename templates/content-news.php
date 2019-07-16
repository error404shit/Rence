<article id="post-<?php the_ID() ?>" <?php post_class('news-container') ?> >
	<div class="col-12 pl-0 d-inline-flex">
		<header class="pl-2 pr-2 pb-1 pt-1">
		    <?php the_title( sprintf( '<p class="pb-0 mb-0 text-uppercase d-flex  align-content-center flex-wrap p-1"><a href="%s" class="text-white" title="'.get_the_title().'">', esc_url( get_permalink() ) ), '</a></p>' ); ?>
		</header>
	</div>
</article>