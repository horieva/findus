<?php
get_header();
$layout_version = findus_get_listing_archive_version();
if ($layout_version == 'default') {
	findus_render_breadcrumbs();
}
?>
	<section id="main-container" class="inner">
		
		<div id="primary" class="content-area">
			<div class="entry-content">
				<div id="main" class="site-main">
				<?php
					global $wp_query;
					
					$pagination = '';
					if ( !findus_get_config('listing_show_loadmore', true) ) {
						$pagination = 'show_pagination="true"';
					}
					$shortcode = '[jobs show_tags="true" show_more="false" '.$pagination.' orderby="featured" order="DESC"]';
					echo do_shortcode(  $shortcode );
				?>
				</div><!-- #main -->
			</div>
		</div><!-- #primary -->
	</section>
<?php get_footer(); ?>