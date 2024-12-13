<?php
global $post;
?>
<div <?php job_listing_class('job-grid-style'); ?> <?php echo trim(findus_display_map_data($post)); ?>>

	<div class="listing-image">
		<?php findus_display_listing_cover_image('findus-card-image'); ?>
		<div class="flags-top-wrapper">
			<?php do_action( 'findus-listings-grid-flags-top', $post ); ?>
		</div>
		<div class="flags-bottom-wrapper">
			<?php do_action( 'findus-listings-grid-flags-bottom', $post ); ?>
		</div>
	</div>
	<div class="bottom-grid">
		<div class="listing-content">
			<?php do_action( 'findus-listings-grid-logo', $post ); ?>
			<div class="listing-content-inner clearfix">
				<?php do_action( 'findus-listings-grid-title-above', $post ); ?>
				<h3 class="listing-title">
					<a href="<?php the_job_permalink(); ?>"><?php the_title(); ?></a>
					<?php do_action( 'findus-listings-logo-after', $post ); ?>
				</h3>
				<?php do_action( 'findus-listings-grid-title-below', $post ); ?>
			</div>
		</div>
		<div class="listing-contact">
			<?php do_action( 'findus-listings-grid-contact-info', $post ); ?>
		</div>
		<div class="listing-content-bottom">
			<?php do_action( 'findus-listings-grid-metas', $post ); ?>
		</div>
	</div>
</div>