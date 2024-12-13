<?php

add_action( 'apus_wjm_wc_paid_listings_package_options_product_tab_content', 'findus_product_package_options' );
function findus_product_package_options() {
	woocommerce_wp_text_input( array(
		'id'			=> '_listings_icon_class',
		'label'			=> esc_html__( 'Package icon class', 'findus' ),
		'desc_tip'		=> 'true',
		'description'	=> esc_html__( 'Enter icon class for this package', 'findus' ),
		'type' 			=> 'text',
	) );
}

function findus_save_package_option_field( $post_id ) {
	if ( isset( $_POST['_listings_icon_class'] ) ) {
		update_post_meta( $post_id, '_listings_icon_class', sanitize_text_field( $_POST['_listings_icon_class'] ) );
	}
}
add_action( 'woocommerce_process_product_meta_listing_package', 'findus_save_package_option_field'  );