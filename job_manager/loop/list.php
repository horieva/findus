<?php
global $post;
?>
<div <?php job_listing_class('job-list-style'); ?> <?php echo trim(findus_display_map_data($post)); ?>>
	<div class="flex-sm">
		<div class="left-inner">
			<div class="listing-image">
				<?php findus_display_listing_cover_image('findus-list-image'); ?>
				<div class="flags-top-wrapper">
					<?php do_action( 'findus-listings-list-flags-top', $post ); ?>
				</div>
				<div class="flags-bottom-wrapper">
					<?php do_action( 'findus-listings-list-flags-bottom', $post ); ?>
				</div>
			</div>
		</div>
		<div class="right-inner flex">
			<div class="inner-right flex flex-column">
				<div class="listing-content">
					<div class="listing-content-inner">
						<?php do_action( 'findus-listings-list-title-above', $post ); ?>
						<h3 class="listing-title">
							<a href="<?php the_job_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<?php do_action( 'findus-listings-list-title-below', $post ); ?>
					</div>
				</div>
				<div class="listing-content-bottom">
					<?php do_action( 'findus-listings-list-metas', $post ); ?>
				</div>
			</div>
		</div>
	</div>
</div>