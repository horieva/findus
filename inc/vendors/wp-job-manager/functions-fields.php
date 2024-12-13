<?php
/**
 * apus findus
 *
 * @package    findus
 * @author     ApusTheme <apusthemes@gmail.com >
 * @license    GNU General Public License, version 3
 * @copyright  13/06/2016 ApusTheme
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// for custyom admin 'job_manager_input_' . $type

class Findus_Type_Place{

	public static function init() {
		
		// required/available form
		add_filter( 'apusfindus-custom-required-fields', array( __CLASS__, 'required_fields' ), 100 );
		add_filter( 'apusfindus-custom-available-fields', array( __CLASS__, 'available_fields' ), 100 );
		
		add_filter( 'findus_get_default_blocks_content', array( __CLASS__, 'blocks_content' ), 10 );
		add_filter( 'findus_get_default_blocks_sidebar_content', array( __CLASS__, 'blocks_sidebar_content' ), 10 );

		// custom field display
		add_filter( 'apusfindus_display_hooks', array( __CLASS__, 'custom_fields_display_hooks'), 1 );

	}

	public static function required_fields($dfields) {
		$fields['job_title'] = array(
			'label' => esc_html__('Title', 'findus'),
			'type' => 'text',
			'required' => true,
			'placeholder' => esc_html__('Title', 'findus'),
			'disable_check' => true,
			'show_in_submit_form'    => true,
			'show_in_admin_edit'    => true,
		);
		$fields['job_description'] = array(
			'label'       => esc_html__( 'Description', 'findus' ),
			'type'        => 'wp-editor',
			'required'    => true,
			'show_in_submit_form'    => true,
			'show_in_admin_edit'    => true,
			'disable_check' => true
		);
		return $fields;
	}

	public static function available_fields($dfields) {
		global $wp_taxonomies;

		// general
		$fields['job_tagline'] = array(
			'label' => esc_html__('Tagline', 'findus'),
			'type' => 'text',
			'required' => false,
			'placeholder' => esc_html__('tagline', 'findus'),
			'show_in_submit_form'    => true,
			'show_in_admin_edit'    => true,
		);
		$fields['job_location'] = array(
			'label'       => esc_html__( 'Location', 'findus' ),
			'type' => 'findus-location',
			'priority' => 2.3,
			'placeholder' => esc_html__( 'e.g 34 Wigmore Street, London', 'findus' ),
			'description' => esc_html__( 'Leave this blank if the location is not important.', 'findus' ),
		);

		// taxonomies
		$fields['job_regions'] = array(
			'type'        => 'findus-regions',
			'default' => '',
			'taxonomy' => 'job_listing_region',
			'placeholder' => esc_html__( 'Add Region', 'findus' ),
			'label' => esc_html__( 'Listing Region', 'findus' ),
		);
		$fields['job_category'] = array(
			'type'        => 'job_category',
			'select_type' => 'term-select',
			'default' => '',
			'taxonomy' => 'job_listing_category',
			'placeholder' => esc_html__( 'Add Category', 'findus' ),
			'label' => esc_html__( 'Listing Category', 'findus' ),
		);
		
		if ( get_option( 'job_manager_enable_types' ) ) {
			$fields['job_type'] = array(
				'type'        => 'job_type',
				'select_type' => 'term-select',
				'default' => '',
				'taxonomy' => 'job_listing_type',
				'placeholder' => esc_html__( 'Add Type', 'findus' ),
				'label' => esc_html__( 'Listing Type', 'findus' ),
			);
		}

		$fields['job_amenities'] = array(
			'type'        => 'job_amenities',
			'select_type' => 'term-select',
			'default' => '',
			'taxonomy' => 'job_listing_amenity',
			'placeholder' => esc_html__( 'Add Amenity', 'findus' ),
			'label' => esc_html__( 'Listing Amenity', 'findus' ),
		);
		
		if ( isset( $wp_taxonomies['job_listing_tag'] ) ) {
			$fields['job_tags'] = array(
				'label'       => esc_html__( 'Listing tags', 'findus' ),
				'description' => esc_html__( 'Comma separate tags, such as required skills or technologies, for this listing.', 'findus' ),
				'type'        => 'text',
				'placeholder' => esc_html__( 'e.g. PHP, Social Media, Management', 'findus' ),
			);
		}
		
		// price
		$fields['job_price_range'] = array(
			'label' => esc_html__('Price Range', 'findus'),
			'type' => 'select',
			'required' => false,
			'options' => apply_filters( 'apus_findus_price_ranges', array() ),
			'description' => '',
		);

		$fields['job_price_from'] = array(
			'label' => esc_html__('Price From', 'findus'),
			'type' => 'text',
			'required' => false,
			'placeholder' => esc_html__( 'e.g: 100', 'findus' ),
		);
		$fields['job_price_to'] = array(
			'label' => esc_html__('Price To', 'findus'),
			'type' => 'text',
			'required' => false,
			'placeholder' => esc_html__( 'e.g: 200', 'findus' ),
		);

		// hours
		$fields['job_hours'] = array(
			'label'       => esc_html__( 'Hours of Operation', 'findus' ),
			'type'        => 'findus-hours',
			'required'    => false,
			'placeholder' => '',
			'default'     => '',
			'sanitize_callback' => 'findus_sanitize_array_callback'
		);

		// contact
		$fields['job_phone'] = array(
			'label'       => esc_html__( 'Phone', 'findus' ),
			'type'        => 'text',
			'placeholder' => esc_html__( 'e.g +84-669-996', 'findus' ),
			'required'    => false,
		);
		$fields['job_email'] = array(
			'label'       => esc_html__( 'Email', 'findus' ),
			'type'        => 'text',
			'placeholder' => esc_html__( 'e.g youremail@email.com', 'findus' ),
			'required'    => false,
		);
		$fields['job_website'] = array(
			'label'       => esc_html__( 'Website', 'findus' ),
			'type'        => 'text',
			'placeholder' => esc_html__( 'e.g yourwebsite.com', 'findus' ),
			'required'    => false,
		);

		// Menu price
		$fields['job_menu_prices'] = array(
			'label'       => esc_html__( 'Menu Prices', 'findus' ),
			'type' => 'findus-menu-prices',
			'priority' => 3.9,
			'placeholder' => '',
			'description' => '',
			'sanitize_callback' => 'findus_sanitize_array_callback'
		);

		// media
		$fields['job_logo'] = array(
			'label'       => esc_html__( 'Logo', 'findus' ),
			'type'        => 'file',
			'description' => esc_html__( 'The image will be shown on listing cards.', 'findus' ),
			'required'    => false,
			'multiple_files'    => false,
			'ajax' 		  => true,
			'allow_types' => array(
				'jpg|jpeg|jpe',
				'jpeg',
				'gif',
				'png',
			),
		);
		$fields['job_cover_image'] = array(
			'label'       => esc_html__( 'Cover Image', 'findus' ),
			'type'        => 'file',
			'description' => esc_html__( 'The image will be shown on listing cards.', 'findus' ),
			'required'    => false,
			'multiple_files'    => false,
			'ajax' 		  => true,
			'allow_types' => array(
				'jpg|jpeg|jpe',
				'jpeg',
				'gif',
				'png',
			),
		);
		$fields['job_gallery_images'] = array(
			'label' => esc_html__( 'Gallery Images', 'findus' ),
			'priority' => 2.9,
			'required' => false,
			'type' => 'file',
			'ajax' => true,
			'placeholder' => '',
			'allow_types' => array(
				'jpg|jpeg|jpe',
				'jpeg',
				'gif',
				'png',
			),
			'multiple_files' => true,
		);
		$fields['job_video'] = array(
			'label'       => esc_html__( 'Video', 'findus' ),
			'type'        => 'text',
			'required'    => false,
			'placeholder' => esc_html__( 'A link to a video about your company', 'findus' ),
		);

		// socials
		$fields['job_socials'] = array(
			'label'       => esc_html__( 'Socials Link', 'findus' ),
			'type'        => 'repeater',
			'required'    => false,
			'fields' => array(
				'network' => array(
					'label'       => esc_html__( 'Network', 'findus' ),
					'name'        => 'job_socials_network[]',
					'type'        => 'select',
					'description' => '',
					'placeholder' => '',
					'options' => array(
						'' => esc_html__('Select Network', 'findus'),
						'fab fa-facebook-f' => esc_html__('Facebook', 'findus'),
						'fab fa-twitter' => esc_html__('Twitter', 'findus'),
						'fab fa-google-plus-g' => esc_html__('Google+', 'findus'),
						'fab fa-instagram' => esc_html__('Instagram', 'findus'),
						'fab fa-youtube' => esc_html__('Youtube', 'findus'),
						'fab fa-snapchat' => esc_html__('Snapchat', 'findus'),
						'fab fa-linkedin-in' => esc_html__('LinkedIn', 'findus'),
						'fab fa-reddit' => esc_html__('Reddit', 'findus'),
						'fab fa-tumblr' => esc_html__('Tumblr', 'findus'),
						'fab fa-pinterest' => esc_html__('Pinterest', 'findus'),
					)
				),
				'network_url' => array(
					'label'       => esc_html__( 'Network Url', 'findus' ),
					'name'        => 'job_socials_network_url[]',
					'type'        => 'text',
					'description' => '',
					'placeholder' => '',
				),
			),
			'sanitize_callback' => 'findus_sanitize_array_callback'
		);

		// Products
		$fields['job_products'] = array(
			'label'       => esc_html__( 'Woocommerce Products', 'findus' ),
			'type'        => 'multiselect',
			'required'    => false
		);

		return $fields;
	}

	public static function blocks_content() {
	    return apply_filters( 'findus_listing_single_content', array(
	        'description' => esc_html__( 'Description', 'findus' ),
	        'maps' => esc_html__( 'Maps', 'findus' ),
	        'amenities' => esc_html__( 'Amenities', 'findus' ),
	        'photos' => esc_html__( 'Photos', 'findus' ),
	        'menu-prices' => esc_html__( 'Menu Prices', 'findus' ),
	        'video' => esc_html__( 'Video', 'findus' ),
	        'hours' => esc_html__( 'Hours', 'findus' ),
	        'products' => esc_html__( 'Products', 'findus' ),
	        'comments' => esc_html__( 'Reviews', 'findus' ),
	    ));
	}

	public static function blocks_sidebar_content() {
	    return apply_filters( 'findus_listing_single_sidebar', array(
	        'amenities' => esc_html__( 'Amenities', 'findus' ),
	        'business-info' => esc_html__( 'Business Info', 'findus' ),
	        'contact-form' => esc_html__( 'Contact Business', 'findus' ),
	        'hours' => esc_html__( 'Hours', 'findus' ),
	        'nearby' => esc_html__( 'Nearby Places', 'findus' ),
	        'nearby_browse' => esc_html__( 'Browse Nearby Places', 'findus' ),
	        'price_range' => esc_html__( 'Price Range', 'findus' ),
	        'review-avg' => esc_html__( 'Review Average', 'findus' ),
	        'statistic' => esc_html__( 'Statistic', 'findus' ),
	        'tags' => esc_html__( 'Tags', 'findus' ),
	        'claim' => esc_html__( 'Claim Listing', 'findus' ),
	        'products-sidebar' => esc_html__( 'Products', 'findus' ),
	    ));
	}

	public static function custom_fields_display_hooks($hooks) {
		$hooks[''] = esc_html__('Choose a position', 'findus');
		$hooks['findus-single-listing-description'] = esc_html__('Single Listing - Description', 'findus');
		$hooks['findus-single-listing-contact'] = esc_html__('Single Listing - Business Information', 'findus');
		$hooks['findus-single-listing-amenities'] = esc_html__('Single Listing - Amenities Box', 'findus');
		$hooks['findus-single-listing-contact-form'] = esc_html__('Single Listing - Contact Form', 'findus');
		$hooks['findus-single-listing-hours'] = esc_html__('Single Listing - Hours', 'findus');
		$hooks['findus-single-listing-maps'] = esc_html__('Single Listing - Maps', 'findus');
		$hooks['findus-single-listing-menu-prices'] = esc_html__('Single Listing - Menu Prices', 'findus');
		$hooks['findus-single-listing-nearby'] = esc_html__('Single Listing - Nearby', 'findus');
		$hooks['findus-single-listing-nearby-browse'] = esc_html__('Single Listing - Browse Nearby', 'findus');
		$hooks['findus-single-listing-price-range'] = esc_html__('Single Listing - Price Range', 'findus');
		$hooks['findus-single-listing-review-avg'] = esc_html__('Single Listing - Review avg', 'findus');
		$hooks['findus-single-listing-statistic'] = esc_html__('Single Listing - Statistic', 'findus');
		return $hooks;
	}
	
}

Findus_Type_Place::init();