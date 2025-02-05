<?php
global $post;
?>
<header class="entry-header">
	<div class="container">
		<div class="entry-header-wrapper clearfix">
			<div class="row flex-bottom-sm">
				<div class="col-xs-12 col-lg-8 col-md-7 col-sm-7">	
					<div class="entry-header-left">
						<div class="flex-middle-md">
							<?php do_action( 'findus-single-listing-header-logo', $post ); ?>
							<div class="entry-header-content-inner">
								<div class="top-header">
									<?php do_action('findus-single-listing-header-title-above', $post); ?>
									<div class="entry-title-wrapper">
										<?php do_action('findus-single-listing-header-title', $post); ?>
									</div>
									<?php do_action('findus-single-listing-header-title-bellow', $post); ?>
								</div>
								<div class="header-metas">
									<?php do_action('findus-single-listing-header-metas', $post); ?>
								</div>
								<?php
								/**
								 * single_job_listing_start hook
								 *
								 * @hooked job_listing_meta_display - 20
								 * @hooked job_listing_company_display - 30
								 */
								do_action( 'single_job_listing_start' );
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-lg-4 col-md-5 col-sm-5">	
					<div class="entry-header-right">
						<?php do_action('findus-single-listing-header-right', $post); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header><!-- .entry-header -->