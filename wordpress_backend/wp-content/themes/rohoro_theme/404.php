<?php get_header(); ?>
<section class="default-page padding-common">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2><?php _e('Error') ?></span>404 - <?php _e('Not Found') ?></h2>
				<h3>This is somewhat embarrassing, isn’t it?</h3>
				<p>It seems we can’t find what you’re looking for. Perhaps searching can help.</p>
				<a href="<?php echo get_site_url(); ?>" class="button__primary button__primary-fill">
					<span>go to the home</span>
				</a>
				
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>