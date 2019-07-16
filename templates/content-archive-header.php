<article id="post-<?php the_ID() ?>" <?php post_class('single-header pb-4') ?>>
	<div class="row">
		<div class="col-12 col-xl-10 custom-card">
			<div class="section custom-card-body">
				<h3 class="text-white pt-4 pb-4 text-uppercase">
					<?php
					if (is_archive()){ 
						single_month_title(' ');
						if (is_category()){
							the_archive_title();
						}
						if (is_tag()){
							single_tag_title();
						}
					}
					?>
				</h3>
			</div>
		</div>
		<div class="col-12 col-xl-2 m-auto">
			<form method="post">
				<select id="filter-archive" class="filter-choices" name="filter-items">
					<option class='items' hidden>FILTER</option>
					<option class='items' value="latest">LATEST</option>
					<option class='items' value="popular">POPULAR</option>
				</select>
				<input id="cat" type="hidden" value="<?php $categories = get_the_category(); echo $category_id = $categories[0]->cat_ID; ?>">
			</form>
		</div>
	</div>
</article>