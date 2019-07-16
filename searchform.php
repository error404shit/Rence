<form class="col-xl-12" role ="search" method="get" action="<?php echo home_url('/') ?>">
	<div class="form-row">
		<div class="form-goup col-md-8 input-container">
			<input type="search" class="form-control" placeholder="Enter text..." value="<?php echo get_search_query(); ?>" name="s" title="Search">
		</div>
		<div class="form-goup col-md-4 btn-contianer">
		<button type="submit" id="searchbutton" class="btn btn-block btn-custom" name="submit" value="<?php esc_attr_x('Search', 'submit button') ?>">SEARCH
		</button>
		</div>
	</div>
</form>