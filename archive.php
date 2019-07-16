<?php get_header() ?>
<main>
	<!-- <div class="p-3"></div> -->
	<div class="container">
		<div class="row">
			<div id="show_filter" class="col-12 col-xl-6 mb-4 archive-container">
			<?php 
			require_once 'themes/archive.php';
			 ?>
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