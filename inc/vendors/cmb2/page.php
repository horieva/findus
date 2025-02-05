<?php

if ( !function_exists( 'findus_page_metaboxes' ) ) {
	function findus_page_metaboxes(array $metaboxes) {
		global $wp_registered_sidebars;
        $sidebars = array( '' => esc_html__('Choose a sidebar to display', 'findus') );

        if ( !empty($wp_registered_sidebars) ) {
            foreach ($wp_registered_sidebars as $sidebar) {
                $sidebars[$sidebar['id']] = $sidebar['name'];
            }
        }
        $headers = array_merge( array('global' => esc_html__( 'Global Setting', 'findus' )), findus_get_header_layouts() );
        $footers = array_merge( array('global' => esc_html__( 'Global Setting', 'findus' )), findus_get_footer_layouts() );

        $columns = array(
            '' => esc_html__( 'Global Setting', 'findus' ),
            '1' => esc_html__('1 Column', 'findus'),
            '2' => esc_html__('2 Columns', 'findus'),
            '3' => esc_html__('3 Columns', 'findus'),
            '4' => esc_html__('4 Columns', 'findus'),
            '6' => esc_html__('6 Columns', 'findus')
        );

		$prefix = 'apus_page_';

        // Listing Page
        $fields = array(
            array(
                'name' => esc_html__( 'Layout Style', 'findus' ),
                'id'   => $prefix.'layout_version',
                'type' => 'select',
                'options' => array(
                    '' => esc_html__( 'Global Setting', 'findus' ),
                    'half-map' => esc_html__('Half Map', 'findus'),
                    'default' => esc_html__('Default', 'findus')
                )
            ),
            array(
                'id' => $prefix.'display_mode',
                'type' => 'select',
                'name' => esc_html__('Default Display Mode', 'findus'),
                'options' => array(
                    '' => esc_html__( 'Global Setting', 'findus' ),
                    'grid' => esc_html__('Grid', 'findus'),
                    'list' => esc_html__('List', 'findus'),
                )
            ),
            array(
                'id' => $prefix.'listing_columns',
                'type' => 'select',
                'name' => esc_html__('Grid Listing Columns', 'findus'),
                'options' => $columns,
            ),
            array(
                'id' => $prefix.'sortby_default',
                'type' => 'select',
                'name' => esc_html__('Default Sortby', 'findus'),
                'options' => array(
                    '' => esc_html__( 'Global Setting', 'findus' ),
                    'default' => esc_html__( 'Default Order', 'findus' ),
                    'date-desc' => esc_html__( 'Newest First', 'findus' ),
                    'date-asc' => esc_html__( 'Oldest First', 'findus' ),
                    'rating-desc' => esc_html__( 'Highest Rating', 'findus' ),
                    'rating-asc' => esc_html__( 'Lowest Rating', 'findus' ),
                    'random' => esc_html__( 'Random', 'findus' ),
                ),
            ),
        );
        
        $metaboxes[$prefix . 'listing_setting'] = array(
            'id'                        => $prefix . 'listing_setting',
            'title'                     => esc_html__( 'Listings Settings', 'findus' ),
            'object_types'              => array( 'page' ),
            'context'                   => 'normal',
            'priority'                  => 'high',
            'show_names'                => true,
            'fields'                    => $fields
        );

	    $fields = array(
			array(
				'name' => esc_html__( 'Select Layout', 'findus' ),
				'id'   => $prefix.'layout',
				'type' => 'select',
				'options' => array(
					'main' => esc_html__('Main Content Only', 'findus'),
					'left-main' => esc_html__('Left Sidebar - Main Content', 'findus'),
					'main-right' => esc_html__('Main Content - Right Sidebar', 'findus'),
				)
			),
			array(
                'id' => $prefix.'fullwidth',
                'type' => 'select',
                'name' => esc_html__('Is Full Width?', 'findus'),
                'default' => 'no',
                'options' => array(
                    'no' => esc_html__('No', 'findus'),
                    'yes' => esc_html__('Yes', 'findus')
                )
            ),
            array(
                'id' => $prefix.'sidebar',
                'type' => 'select',
                'name' => esc_html__('Sidebar', 'findus'),
                'options' => $sidebars
            ),
            array(
                'id' => $prefix.'show_breadcrumb',
                'type' => 'select',
                'name' => esc_html__('Show Breadcrumb?', 'findus'),
                'options' => array(
                    'no' => esc_html__('No', 'findus'),
                    'yes' => esc_html__('Yes', 'findus')
                ),
                'default' => 'yes',
            ),
            array(
                'id' => $prefix.'description',
                'type' => 'text',
                'name' => esc_html__('Description for Breadcrumb', 'findus'),
            ),
            array(
                'id' => $prefix.'breadcrumb_color',
                'type' => 'colorpicker',
                'name' => esc_html__('Breadcrumb Background Color', 'findus')
            ),
            array(
                'id' => $prefix.'breadcrumb_image',
                'type' => 'file',
                'name' => esc_html__('Breadcrumb Background Image', 'findus')
            ),
            array(
                'id' => $prefix.'header_type',
                'type' => 'select',
                'name' => esc_html__('Header Layout Type', 'findus'),
                'description' => esc_html__('Choose a header for your website.', 'findus'),
                'options' => $headers,
                'default' => 'global'
            ),
            array(
                'id' => $prefix.'header_transparent',
                'type' => 'select',
                'name' => esc_html__('Header Transparent?', 'findus'),
                'options' => array(
                    'no' => esc_html__('No', 'findus'),
                    'yes' => esc_html__('Yes', 'findus')
                ),
                'default' => 'no',
            ),
            array(
                'id' => $prefix.'footer_type',
                'type' => 'select',
                'name' => esc_html__('Footer Layout Type', 'findus'),
                'description' => esc_html__('Choose a footer for your website.', 'findus'),
                'options' => $footers,
                'default' => 'global'
            ),
            array(
                'id' => $prefix.'extra_class',
                'type' => 'text',
                'name' => esc_html__('Extra Class', 'findus'),
                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'findus')
            )
    	);
		
	    $metaboxes[$prefix . 'display_setting'] = array(
			'id'                        => $prefix . 'display_setting',
			'title'                     => esc_html__( 'Display Settings', 'findus' ),
			'object_types'              => array( 'page' ),
			'context'                   => 'normal',
			'priority'                  => 'high',
			'show_names'                => true,
			'fields'                    => $fields
		);

        
        
	    return $metaboxes;
	}
}
add_filter( 'cmb2_meta_boxes', 'findus_page_metaboxes' );

if ( !function_exists( 'findus_cmb2_style' ) ) {
	function findus_cmb2_style() {
		wp_enqueue_style( 'findus-cmb2-style', get_template_directory_uri() . '/inc/vendors/cmb2/assets/style.css', array(), '1.0' );
	}
}
add_action( 'admin_enqueue_scripts', 'findus_cmb2_style' );