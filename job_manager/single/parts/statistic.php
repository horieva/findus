<?php
global $post;
// get our custom meta
$views = intval( get_post_meta( $post->ID, '_listing_views_count', true) );
$totals_rating = intval( findus_get_total_reviews($post->ID) );
$favourites = intval( get_post_meta($post->ID, '_bookmark_count', true) );

$updated_date = get_the_modified_time(get_option('date_format'));
?>

<div id="listing-statistic" class="listing-statistic widget">
	<h2 class="widget-title">
		<span><?php esc_html_e('Statistic', 'findus'); ?></span>
	</h2>
	<div class="box-inner">
		<ul class="statistic-list">
			<?php
			if ( $views ) { ?>
				<li>
					<span class="left-inner">
						<span class="text-label"><i class="ti-eye"></i></span>
					</span>
					<span class="statistic-title">
						<span class="number"><?php echo wp_kses_post($views); ?></span> <?php echo sprintf(_n('View', 'Views', $views, 'findus'), $views); ?>
					</span>
				</li>
				<?php
			} ?>
			<?php
			if ( findus_listing_review_rating_enable() && !empty( $totals_rating ) ) : ?>
				<li>
					<span class="left-inner"><span class="text-label"><i class="far fa-star"></i></span></span>
					<span class="statistic-title"><span class="number"><?php echo wp_kses_post($totals_rating); ?></span> <?php echo sprintf(_n('Rating', 'Ratings', $totals_rating, 'findus'), $totals_rating); ?></span>
				</li>
			<?php endif;

			if ( ! empty( $favourites ) ) : ?>
				<li>
					<span class="left-inner"><span class="text-label"><i class="ti-heart"></i></span></span>
					<span class="statistic-title"><span class="number"><?php echo wp_kses_post($favourites); ?></span> <?php echo sprintf(_n('Favorite', 'Favorites', $favourites, 'findus'), $favourites); ?></span>
				</li>
			<?php endif;
			
			if ( ! empty($updated_date) ) {
				?>
					<li>
						<span class="left-inner"><span class="text-label"><i class="ti-pencil-alt"></i></span></span>
						<span class="statistic-title"><span class="number"><?php echo wp_kses_post($updated_date); ?> </span></span>
					</li>
			<?php } ?>
			
		</ul>
		
		<?php do_action('findus-single-listing-statistic', $post); ?>

	</div>
	<!-- form contact -->
</div>