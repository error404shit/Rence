<article id="post-<?php the_ID() ?>" <?php post_class('post-nav-tab p-2') ?>>
	<div class="row">
		<div class="col-12">
			<div class="section">
				<?php 
					$args = array(
					    'status'  => 'approve',
					    'post_id' => $post->ID, // use post_id, not post_ID
					);
					$comments = get_comments( $args );
					$count = count($comments);

					if ( $count > 0 ) {
						foreach ( $comments as $comment ) :
						    echo '<p>'.$comment->comment_content.'</p>';
						endforeach;
					} else{
						echo "<p>0 Comments</p>";
					}
				 ?>
			</div>
		</div>
	</div><hr>
</article>