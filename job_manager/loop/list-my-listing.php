<?php
$views = intval( get_post_meta( $job->ID, '_listing_views_count', true) );
$updated_date = get_the_modified_time(get_option('date_format'), $job);
?>
<div class="my-listing-item-wrapper job_listing ">
	<div class="row flex-middle-sm">
		<div class="col-md-8 col-sm-9 col-xs-12">
			<div class="flex-middle">
				<?php
				if ( has_post_thumbnail( $job->ID ) ) {
				?>
					<div class="listing-image">
						<div class="listing-image-inner">
							<?php
							$linkable = false;
							if ( $job->post_status == 'publish' ) {
								$linkable = true;
							}
							findus_display_listing_cover_image('findus-image-mylisting', $linkable, $job);
							?>
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
		<div class="col-md-4 col-sm-3 col-xs-12 ali-right">
			<div class="right-inner">
				<?php
					$actions = array();
					switch ( $job->post_status ) {
						case 'publish' :
							$actions['edit'] = array( 'label' => '<i class="ti-pencil"></i>'.esc_html__( 'Edit', 'findus' ), 'nonce' => false );
							break;
						case 'expired' :
							if ( job_manager_get_permalink( 'submit_job_form' ) ) {
								$actions['relist'] = array( 'label' => '<i class="ti-pencil"></i>'.esc_html__( 'Relist', 'findus' ), 'nonce' => true );
							}
							break;
						case 'pending' :
							if ( job_manager_user_can_edit_pending_submissions() ) {
								$actions['edit'] = array( 'label' => '<i class="ti-pencil"></i>'.esc_html__( 'Edit', 'findus' ), 'nonce' => false );
							}
						break;
						case 'pending_payment' :
						case 'draft' :
						case 'preview' :
							$actions['continue'] = array( 'label' => '<i class="ti-pencil"></i>'.esc_html__( 'Continue Submission', 'findus' ), 'nonce' => true );
						break;
					}

					$actions['delete'] = array( 'label' => '<i class="ti-trash"></i>'.esc_html__( 'Delete', 'findus' ), 'nonce' => true );
					$actions = apply_filters( 'job_manager_my_job_actions', $actions, $job );

					foreach ( $actions as $action => $value ) {
						$action_url = add_query_arg( array( 'action' => $action, 'job_id' => $job->ID ) );
						if ( $value['nonce'] ) {
							$action_url = wp_nonce_url( $action_url, 'job_manager_my_job_actions' );
						}
						echo '<a href="' . esc_url( $action_url ) . '" class="job-dashboard-action-' . esc_attr( $action ) . '">'
							. trim( $value['label'] ) . '</a>';
					}
				?>
				<div class="listing-status">
					<div class="btn-status btn-status-<?php echo esc_attr($job->post_status); ?>">
						<?php
							$post_status = get_post_status_object( $job->post_status );
							if ( !empty($post_status->label) ) {
								echo esc_html($post_status->label);
							} else {
								echo esc_html($post->post_status);
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>			
</div>