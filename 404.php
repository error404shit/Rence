<?php get_header() ?>
<main>
	<div class="p-3"></div>
	<div class="container page404 mb-5">
		<div class="col-12">
			<div class="error-container text-center mt-5 mb-5">
				<h1 class="heading">
					<div class="row">
						<div class="col-12 col-xl-4 span-1">4</div>
						<div class="col-12 col-xl-4 span-2">0</div>
						<div class="col-12 col-xl-4 span-3">4</div>
					</div>
				</h1>
			</div>
			<div class="vertical-text">
				<ul class="error-vertical">
					<li>
						<h1>E</h1>
					</li>
					<li>
						<h1>R</h1>
					</li>
					<li>
						<h1>R</h1>
					</li>
					<li>
						<h1>O</h1>
					</li>
					<li>
						<h1>R</h1>
					</li>
				</ul>
			</div>
			<div class="col-12 text-center mb-4">
				<h1 class="not-found">NOT FOUND</h1>
			</div>
			<div class="col-12 text-center">
				<p class="text-uppercase">The page you requested could not be found. try refining your search or use the navigation above to locate the post.</p>
			</div>
			<div class="col-12 text-center mt-5">
				<a href="<?php echo home_url() ?>" class="btn-404">RETURN HOME</a>
			</div>
		</div>
	</div>
	<div class="container-fluid wave p-5"></div>
</main>
<?php get_footer() ?>