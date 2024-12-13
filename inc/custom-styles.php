<?php
if ( !function_exists ('findus_custom_styles') ) {
	function findus_custom_styles() {
		ob_start();	
		?>

			<?php
				$main_font = findus_get_config('main_font');
				$main_font_family = isset($main_font['font-family']) ? $main_font['font-family'] : false;
				$main_font_size = isset($main_font['font-size']) ? $main_font['font-size'] : false;
				$main_font_weight = isset($main_font['font-weight']) ? $main_font['font-weight'] : false;
			?>
			<?php if ( $main_font_family ): ?>
				/* Main Font */
				.btn,
				body
				{
					font-family:  <?php echo '\'' . $main_font_family . '\','; ?> sans-serif;
				}
			<?php endif; ?>
			<?php if ( $main_font_size ): ?>
				/* Main Font Size */
				body
				{
					font-size: <?php echo esc_html($main_font_size); ?>;
				}
			<?php endif; ?>
			<?php if ( $main_font_weight ): ?>
				/* Main Font Weight */
				body
				{
					font-weight: <?php echo esc_html($main_font_weight); ?>;
				}
			<?php endif; ?>


			<?php
				$heading_font = findus_get_config('heading_font');
				$heading_font_family = isset($heading_font['font-family']) ? $heading_font['font-family'] : false;
				$heading_font_weight = isset($heading_font['font-weight']) ? $heading_font['font-weight'] : false;
			?>
			<?php if ( $heading_font_family ): ?>
				/* Heading Font */
				h1, h2, h3, h4, h5, h6
				{
					font-family:  <?php echo '\'' . $heading_font_family . '\','; ?> sans-serif;
				}			
			<?php endif; ?>

			<?php if ( $heading_font_weight ): ?>
				/* Heading Font Weight */
				h1, h2, h3, h4, h5, h6
				{
					font-weight: <?php echo esc_html($heading_font_weight); ?>;
				}			
			<?php endif; ?>
			

			/* check main color */ 
			<?php if ( findus_get_config('main_color') != "" ) : ?>
				/* seting border color main */
				.social-icons li a:hover,
				.job_filters .price_slider_wrapper .ui-slider-handle, .job_filters .search_distance_wrapper .ui-slider-handle,
				.category-banner-list:hover .btn-forwarded,.category-banner-list.style3:hover .btn-forwarded,
				.border-theme, .select2-container.select2-container--focus .select2-selection--multiple, .select2-container.select2-container--focus .select2-selection--single, .select2-container.select2-container--open .select2-selection--multiple, .select2-container.select2-container--open .select2-selection--single, .select2-container--default.select2-container--focus .select2-selection--multiple, .select2-container--default.select2-container--focus .select2-selection--single, .select2-container--default.select2-container--open .select2-selection--multiple, .select2-container--default.select2-container--open .select2-selection--single
				{
					border-color: <?php echo esc_html( findus_get_config('main_color') ) ?>;
				}

				/* seting background main */
				.social-icons li a:hover,.apus-pagination span.current, .apus-pagination a.current,.apus-pagination a:hover,
				.job_filters .price_slider_wrapper .ui-slider-handle, .job_filters .search_distance_wrapper .ui-slider-handle,
				.job_filters .price_slider_wrapper .ui-slider-range, .job_filters .search_distance_wrapper .ui-slider-range,
				.widget-features-box .features-box-image,.category-banner-list.style3:hover .btn-forwarded,
				.slick-carousel .slick-arrow:hover, .slick-carousel .slick-arrow:active, .slick-carousel .slick-arrow:focus,
				#back-to-top:active, #back-to-top:hover,
				.category-banner-list:hover .btn-forwarded, .listing-search-result-filter .results .reset, div.job_listings .job-manager-pagination ul li a:hover, div.job_listings .job-manager-pagination ul li span:hover
				{
					background: <?php echo esc_html( findus_get_config('main_color') ) ?>;
				}
				/* setting color*/
				.apus-pagination span.prev i, .apus-pagination span.next i, .apus-pagination a.prev i, .apus-pagination a.next i,
				.widget_meta ul li:hover > a, .widget_archive ul li:hover > a, .widget_recent_entries ul li:hover > a, .widget_categories ul li:hover > a,.apus-breadscrumb .breadcrumb .active,
				.social-icons li a,.listing-amenity-list li a::before,.apus-single-listing .direction-map.active, .apus-single-listing .direction-map:hover,.apus-single-listing .direction-map i,.sidebar-detail-job .listing-day.current .day,
				.listing-amenity-list li a:hover, .listing-amenity-list li a:hover .amenity-icon,
				#back-to-top,.slick-carousel .slick-arrow,.btn-readmore:hover, .btn-readmore:active,
				a:hover, a:focus, .select2-container .select2-results__option[aria-selected="true"], .select2-container .select2-results__option[data-selected="true"], .select2-container .select2-results__option--highlighted[aria-selected], .select2-container .select2-results__option--highlighted[data-selected], .select2-container--default .select2-results__option[aria-selected="true"], .select2-container--default .select2-results__option[data-selected="true"], .select2-container--default .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-results__option--highlighted[data-selected], .show-filter2.active, .show-filter2:hover
				{
					color: <?php echo esc_html( findus_get_config('main_color') ) ?>;
				}

				.highlight,
				.text-theme{
					color: <?php echo esc_html( findus_get_config('main_color') ) ?> !important;
				}
				.bg-theme
				{
					background: <?php echo esc_html( findus_get_config('main_color') ) ?> !important;
				}

			<?php endif; ?>



			/* button for theme */
			<?php if ( findus_get_config('button_color') != "" ) : ?>
				div.job_listings .load_more_jobs,
				.product-block .add-cart .added_to_cart, .product-block .add-cart .button,
				.btn-theme{
					background: <?php echo esc_html( findus_get_config('button_color') ) ?>;
					border-color:<?php echo esc_html( findus_get_config('button_color') ) ?>;
				}
				.btn-theme.btn-outline{
					border-color:<?php echo esc_html( findus_get_config('button_color') ) ?>;
					color:<?php echo esc_html( findus_get_config('button_color') ) ?>;
				}
				.btn-theme.btn-outline:focus,
				.btn-theme.btn-outline:hover{
					background-color:<?php echo esc_html( findus_get_config('button_color') ) ?>;
					border-color:<?php echo esc_html( findus_get_config('button_color') ) ?>;
				}
			<?php endif; ?>

			<?php if ( findus_get_config('button_hover_color') != "" ) : ?>
				div.job_listings .load_more_jobs:hover,
				div.job_listings .load_more_jobs:focus,
				.btn-theme:focus,
				.btn-theme:active,
				.btn-theme:hover{
					background: <?php echo esc_html( findus_get_config('button_hover_color') ) ?>;
					border-color:<?php echo esc_html( findus_get_config('button_hover_color') ) ?>;
				}
				.product-block .add-cart .added_to_cart.added_to_cart, .product-block .add-cart .added_to_cart:hover, .product-block .add-cart .button.added_to_cart, .product-block .add-cart .button:hover,
				.product-block:hover .add-cart .added_to_cart, .product-block:hover .add-cart .button{
					border-color:<?php echo esc_html( findus_get_config('button_hover_color') ) ?>;
					color:<?php echo esc_html( findus_get_config('button_hover_color') ) ?>;
				}
			<?php endif; ?>

	<?php
		$content = ob_get_clean();
		$content = str_replace(array("\r\n", "\r"), "\n", $content);
		$lines = explode("\n", $content);
		$new_lines = array();
		foreach ($lines as $i => $line) {
			if (!empty($line)) {
				$new_lines[] = trim($line);
			}
		}
		
		return implode($new_lines);
	}
}