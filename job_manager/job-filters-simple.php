<?php
/**
 * The template for displaying the WP Job Manager Filters on the front page hero
 *
 * @package Findus
 */

$show_categories = true;
if ( ! get_option( 'job_manager_enable_categories' ) ) {
	$show_categories = false;
}

$atts = apply_filters( 'job_manager_ouput_jobs_defaut', array(
    'per_page' => get_option( 'job_manager_per_page' ),
    'orderby' => 'featured',
    'order' => 'DESC',
    'show_categories' => $show_categories,
    'show_tags' => false,
    'categories' => true,
    'selected_category' => false,
    'job_types' => false,
    'location' => false,
    'keywords' => false,
    'selected_job_types' => false,
    'show_category_multiselect' => false,
    'selected_region' => false
) );

$classes = '';
if ( isset($enable_autocompleate_search) && $enable_autocompleate_search ) {
    wp_enqueue_script( 'handlebars', get_template_directory_uri() . '/js/handlebars.min.js', array(), null, true);
    wp_enqueue_script( 'typeahead-jquery', get_template_directory_uri() . '/js/typeahead.jquery.js', array('jquery', 'handlebars'), null, true);
    $classes = 'apus-autocompleate-input';
}
?>

<?php do_action( 'job_manager_job_filters_before', $atts ); ?>

<form class="job_search_form  js-search-form" action="<?php echo findus_get_listings_page_url(); ?>" method="get" role="search">

	<?php if ( ! get_option('permalink_structure') ) {
		//if the permalinks are not activated we need to put the listings page id in a hidden field so it gets passed
		$listings_page_id = get_option( 'job_manager_jobs_page_id', false );
		//only do this in case we do have a listings page selected
		if ( false !== $listings_page_id ) {
			echo '<input type="hidden" name="p" value="' . $listings_page_id . '">';
		}
	} ?>

	<?php do_action( 'job_manager_job_filters_start', $atts ); ?>

	<div class="search_jobs clearfix search_jobs--frontpage">

		<?php do_action( 'job_manager_job_filters_search_jobs_start', $atts ); ?>
		<div class="inner-left">
				<?php 
					// check number
					$numbers = array();
					if( !empty($search_keyword) && $search_keyword ){
						$numbers[] = 1;
					}
					if ( !empty($search_type) && get_option( 'job_manager_enable_types' ) && findus_get_config('listing_filter_show_types') ) { 
						$numbers[] = 1;
					}
					if ( !empty($search_category) && true === $show_categories && findus_get_config('listing_filter_show_categories') ) {
						$numbers[] = 1;
					}
					if ( !empty($search_region) && $search_region && findus_get_config('listing_filter_show_regions') ) {
						$numbers[] = 1;
					}
					if ( !empty($search_location) && $search_location && findus_get_config('listing_filter_show_location') ) {
						$numbers[] = 1;
					}
				?>
				<div class="inner-content number-<?php echo esc_attr( count($numbers) ); ?>">
					<!-- keywords -->
					<?php if ( !empty($search_keyword) && $search_keyword  ) {
						$has_search_menu = false;
						if ( has_nav_menu( 'suggestions_search' ) )  {
							$has_search_menu = true;
						}
					?>
						<div class="search-field-wrapper search-filter-wrapper <?php echo esc_attr($has_search_menu ? 'has-suggestion' : ''); ?>">
							<i class="icon-pencil"></i>
							<input class="search-field <?php echo esc_attr($classes); ?>" autocomplete="off" type="text" name="search_keywords" placeholder="<?php esc_attr_e( 'Keywords...', 'findus' ); ?>" value="<?php the_search_query(); ?>"/>
							<?php
							if ( !empty($show_search_suggestions) && $show_search_suggestions ) {
								$args = array(
				                    'theme_location' => 'suggestions_search',
				                    'container_class' => 'navbar-collapse navbar-collapse-suggestions',
				                    'menu_class' => 'nav search-suggestions-menu',
				                    'fallback_cb' => '',
				                    'walker' => new Findus_Nav_Menu()
				                );
				                wp_nav_menu($args);
				            }
			                ?>
						</div>
					<?php } ?>
					<!-- categories -->
					<?php if ( !empty($search_category) && true === $show_categories && findus_get_config('listing_filter_show_categories') ) { ?>
				        <div class="search_categories  search-filter-wrapper">
			        		<i class="icon-layers"></i>
			            	<?php job_manager_dropdown_categories( array( 'taxonomy' => 'job_listing_category', 'hierarchical' => 1, 'show_option_all' => esc_html__( 'Filter by category', 'findus' ), 'placeholder' => esc_html__( 'Filter by category', 'findus' ), 'name' => 'search_categories', 'orderby' => 'name', 'multiple' => false, 'hide_empty' 	  => false ) ); ?>
				        </div>
			        <?php } ?>
			        
			        <!-- region -->
					<?php if ( !empty($search_type) && get_option( 'job_manager_enable_types' ) && findus_get_config('listing_filter_show_types') ) { ?>
						<div class="search_location search-filter-wrapper">
							<i class="icon-layers"></i>
							<?php job_manager_dropdown_categories( array( 'taxonomy' => 'job_listing_type', 'hierarchical' => 1, 'show_option_all' => esc_html__( 'Filter by type', 'findus' ), 'placeholder' => esc_html__( 'Filter by type', 'findus' ), 'name' => 'job_type_select', 'orderby' => 'name', 'multiple' => false, 'hide_empty' => false ) ); ?>
						</div>
					<?php } ?>

					<!-- region -->
					<?php if ( !empty($search_region) && $search_region && findus_get_config('listing_filter_show_regions') ) { ?>
						<div class="search_location search-filter-wrapper">
							<i class="icon-map-pin"></i>
							<?php job_manager_dropdown_categories( array( 'taxonomy' => 'job_listing_region', 'hierarchical' => 1, 'show_option_all' => esc_html__( 'Filter by region', 'findus' ), 'placeholder' => esc_html__( 'Filter by region', 'findus' ), 'name' => 'job_region_select', 'orderby' => 'name', 'multiple' => false, 'hide_empty' => false ) ); ?>
						</div>
					<?php } ?>

					<!-- location -->
					<?php if ( !empty($search_location) && $search_location && findus_get_config('listing_filter_show_location') ) { ?>
						<div class="search_location last-search search-filter-wrapper">
							<i class="icon-map-pin"></i>
							<input type="text" name="search_location" placeholder="<?php esc_attr_e( 'Location', 'findus' ); ?>" id="search_location<?php echo esc_attr(findus_get_config('listing_filter_show_distance') ? '_distance' : ''); ?>" />
							<span class="clear-location"><i class="ti-close"></i></span>
							<?php if ( findus_get_config('listing_filter_show_distance') ) { ?>
								<span class="loading-me"></span>
								<span class="find-me"><?php get_template_part( 'images/icon/location' ); ?></span>
								<input type="hidden" name="search_lat" />
								<input type="hidden" name="search_lng" />
							<?php } ?>
						</div>
					<?php } ?>

			        <div class="submit ali-right">
						<button class="search-submit btn btn-theme" name="submit">
							<?php esc_html_e( 'Search', 'findus' ); ?>
						</button>
					</div>
				</div>	
		</div>
		<?php do_action( 'job_manager_job_filters_search_jobs_end', $atts ); ?>

	</div>
</form>
<?php do_action( 'job_manager_job_filters_after', $atts ); ?> 