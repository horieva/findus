<?php
$select_class = !empty($categories_class) ? $categories_class : '';
?>
<div class="select-categories <?php echo esc_attr($select_class); ?>">
	
	<?php
	$placeholder = !empty($categories_label) ? $categories_label : esc_html__( 'Filter by category', 'findus' );
	
	if ( empty( $selected_category ) ) {
		//try to see if there is a search_categories (notice the plural form) GET param
		$search_categories = isset( $_REQUEST['search_categories'] ) ? $_REQUEST['search_categories'] : '';
		
		
		if ( ! empty( $search_categories ) && is_array( $search_categories ) ) {
			$selected_category = [];
			foreach ($search_categories as $value) {
				$value = sanitize_text_field( stripslashes( $value ) );
				if ( ! empty( $value ) ) {
					if ( is_numeric( $value ) ) {
						$selected_category[] = intval( $value );
					} else {
						$term = get_term_by( 'slug', $value, 'job_listing_category' );
						$selected_category = 0;
						if ( !empty($term->term_id) ) {
							$selected_category[] = $term->term_id;
						}
					}
				}
			}
		} else {
			$search_categories = sanitize_text_field( stripslashes( $search_categories ) );
			if ( ! empty( $search_categories ) ) {
				if ( is_numeric( $search_categories ) ) {
					$selected_category = intval( $search_categories );
				} else {
					$term = get_term_by( 'slug', $search_categories, 'job_listing_category' );
					$selected_category = 0;
					if ( !empty($term->term_id) ) {
						$selected_category = $term->term_id;
					}
				}
			} elseif (  ! empty( $categories ) ) {
				if ( is_array($categories) ) {
					$selected_category = intval( $categories[0] );
				} else {
					$selected_category = intval( $categories );
				}
			}
		}
	}
	?>
	<?php
	if ( get_option( 'job_manager_enable_default_category_multiselect', false ) ) {
		job_manager_dropdown_categories( array( 'taxonomy' => 'job_listing_category', 'hierarchical' => 1, 'show_option_all' => $placeholder, 'placeholder' => $placeholder, 'name' => 'search_categories', 'orderby' => 'name', 'multiple' => true, 'hide_empty'  => false, 'selected' => $selected_category ) );
	} else {
		job_manager_dropdown_categories( array( 'taxonomy' => 'job_listing_category', 'hierarchical' => 1, 'show_option_all' => $placeholder, 'placeholder' => $placeholder, 'name' => 'search_categories', 'orderby' => 'name', 'multiple' => false, 'hide_empty'  => false, 'selected' => $selected_category ) );
	}
	?>

</div>