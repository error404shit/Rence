<?php get_header() ?>
<main>
	<!-- <div class="p-3"></div> -->
	<div class="container">
		<div class="row">
			<div class="col-12 col-xl-6 mb-4 archive-container">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post() ?>
						<?php 
							get_template_part( 'templates/content', 'archive-content' );
						 ?>
				<?php endwhile ?>
				<?php else: ?>
						<div class="no-result">	
							<h3 class='text-center mt-5'>
								Sorry, but nothing matched your search terms. Please try again with some different keywords
							</h3><br>
							<?php get_search_form(  ) ?>
						</div>
			<?php endif ?>
			<!-- Start Pagination -->
		    <div class="row col-12">
		        <div class="pagination-container">    
			        <?php 
			            global $wp_query;
			            pagination($wp_query->max_num_pages, 3);
			        ?>
		        </div>
		    </div>
		    <!-- End Pagination -->
			</div>
			<div id="left-sidebar" class="col-12 col-xl-3">
				<?php get_template_part( '/sidebar/sidebar', 'left' ); ?>
			</div>
			<div id="right-sidebar" class="col-12 col-xl-3">
				<?php get_template_part( '/sidebar/sidebar', 'right' ); ?>
			</div>
		</div>
	</div>
	<div class="container-fluid wave p-5"></div>
</main>
<?php get_footer() ?>