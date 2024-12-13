<div class="my-listing-item-wrapper job_listing ">
	<div class="flex-middle">
		<?php
		if ( has_post_thumbnail( $job->ID ) ) {
		?>
			<div class="listing-image">
				<div class="listing-image-inner">
					<?php findus_display_listing_cover_image('findus-image-mylisting', true, $job); ?>
					<?php findus_display_listing_review($job); ?>
				</div>
			</div>
		<?php } ?>
		<div class="listing-content">
			<h3 class="listing-title">
				<?php if ( $job->post_status == 'publish' ) : ?>
					<a href="<?php echo get_permalink( $job->ID ); ?>"><?php echo trim($job->post_title); ?></a>
				<?php else : ?>
					<?php echo trim($job->post_title); ?>
				<?php endif; ?>
			</h3>
			<?php findus_listing_tagline($job); ?>
			<?php findus_display_listing_location($job); ?>
			<?php findus_display_listing_phone($job); ?>
		</div>
	</div>
</div>