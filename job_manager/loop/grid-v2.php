<?php
global $post;
?>
<div <?php job_listing_class('job-grid-v2'); ?> <?php echo trim(findus_display_map_data($post)); ?>>

	<div class="listing-image">
		<?php findus_display_listing_cover_image('findus-card-image-v2'); ?>
		<div class="flags-top-wrapper">
			<?php do_action( 'findus-listings-grid-v2-flags-top', $post ); ?>
		</div>
		<div class="flags-bottom-wrapper">
			<?php do_action( 'findus-listings-grid-v2-flags-bottom', $post ); ?>
			<h3 class="listing-title">
				<a href="<?php the_job_permalink(); ?>"><?php the_title(); ?></a>
				<?php do_action( 'findus-listings-logo-after', $post ); ?>
			</h3>
		</div>
	</div>
	<div class="bottom-grid">
		<?php do_action( 'findus-listings-grid-v2-logo', $post ); ?>
		<div class="listing-content-bottom">
			<?php do_action( 'findus-listings-grid-v2-metas', $post ); ?>
		</div>
	</div>
</div>