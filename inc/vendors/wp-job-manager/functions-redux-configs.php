<?php

function findus_wp_job_manager_redux_config_general($sections, $sidebars, $columns) {
    $general_fields = array(
        array(
            'id' => 'listing_general_region_settings',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3> '.esc_html__('Region Settings', 'findus').'</h3>',
        ),
        array(
            'id' => 'submit_listing_region_nb_fields',
            'type' => 'select',
            'title' => esc_html__('Number Fields', 'findus'),
            'options' => array(
                '1' => esc_html__('1 Field', 'findus'),
                '2' => esc_html__('2 Fields', 'findus'),
                '3' => esc_html__('3 Fields', 'findus'),
                '4' => esc_html__('4 Fields', 'findus'),
            ),
            'description' => esc_html__('You can set 4 fields for regions like: Country, State, City, District', 'findus'),
            'default' => 1
        ),
        array(
            'id' => 'submit_listing_region_1_field_label',
            'type' => 'text',
            'title' => esc_html__('First Field Label', 'findus'),
            'default' => '',
            'description' => esc_html__('First region field label', 'findus'),
            'required' => array('submit_listing_region_nb_fields', '=', array('1', '2', '3', '4')),
        ),
        array(
            'id' => 'submit_listing_region_2_field_label',
            'type' => 'text',
            'title' => esc_html__('Second Field Label', 'findus'),
            'default' => '',
            'description' => esc_html__('Second region field label', 'findus'),
            'required' => array('submit_listing_region_nb_fields', '=', array('2', '3', '4')),
        ),
        array(
            'id' => 'submit_listing_region_3_field_label',
            'type' => 'text',
            'title' => esc_html__('Third Field Label', 'findus'),
            'default' => '',
            'description' => esc_html__('Third region field label', 'findus'),
            'required' => array('submit_listing_region_nb_fields', '=', array('3', '4')),
        ),
        array(
            'id' => 'submit_listing_region_4_field_label',
            'type' => 'text',
            'title' => esc_html__('Fourth Field Label', 'findus'),
            'default' => '',
            'description' => esc_html__('Fourth region field label', 'findus'),
            'required' => array('submit_listing_region_nb_fields', '=', array('4')),
        ),
        array(
            'id' => 'listing_general_measurement_settings',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3> '.esc_html__('Measurement Settings', 'findus').'</h3>',
        ),
        array(
            'id' => 'listing_distance_unit',
            'type' => 'text',
            'title' => esc_html__('Distance Unit', 'findus'),
            'default' => 'ft',
        ),
        array(
            'id' => 'listing_general_hour_settings',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3> '.esc_html__('Other Settings', 'findus').'</h3>',
        ),
        array(
            'id' => 'listing_show_hour_status',
            'type' => 'switch',
            'title' => esc_html__('Show Hour Status', 'findus'),
            'default' => 1,
        ),
        array(
            'id' => 'listing_show_full_phone',
            'type' => 'switch',
            'title' => esc_html__('Show Full Phone Number', 'findus'),
            'default' => 0,
        )
    );

    $general_fields = apply_filters('findus_wp_job_manager_redux_config_general', $general_fields, $sections, $sidebars, $columns);
    $sections[] = array(
        'title' => esc_html__('Listing General', 'findus'),
        'fields' => $general_fields
    );

    return $sections;
}
add_filter( 'findus_redux_framwork_configs', 'findus_wp_job_manager_redux_config_general', 2, 3 );

function findus_wp_job_manager_redux_config_archive($sections, $sidebars, $columns) {
    
    // Archive Listings settings
    $sections[] = array(
        'title' => esc_html__('Listing Archives', 'findus'),
        'fields' => array(
            array(
                'id' => 'listing_archive_layout_version',
                'type' => 'image_select',
                'compiler' => true,
                'title' => esc_html__('Layout Style', 'findus'),
                'options' => array(
                    'half-map' => array(
                        'title' => esc_html__('Half Map', 'findus'),
                        'img' => get_template_directory_uri() . '/images/archive-layouts/half-map-v1.png'
                    ),
                    'default' => array(
                        'title' => esc_html__('Default', 'findus'),
                        'img' => get_template_directory_uri() . '/images/archive-layouts/default.png'
                    ),
                ),
                'default' => 'half-map',
            ),
            array(
                'id' => 'listing_archive_display_mode',
                'type' => 'select',
                'title' => esc_html__('Default Display Mode', 'findus'),
                'options' => array(
                    'grid' => esc_html__('Grid', 'findus'),
                    'list' => esc_html__('List', 'findus'),
                ),
                'default' => 'grid',
            ),
            array(
                'id' => 'listing_columns',
                'type' => 'select',
                'title' => esc_html__('Grid Listing Columns', 'findus'),
                'options' => $columns,
                'default' => 2,
                'required' => array('listing_archive_display_mode', '=', 'grid'),
            ),
            array(
                'id' => 'listing_filter_sortby_default',
                'type' => 'select',
                'title' => esc_html__('Default Sortby', 'findus'),
                'options' => apply_filters( 'findus-all-sortby-default', array(
                    'default' => esc_html__( 'Default Order', 'findus' ),
                    'date-desc' => esc_html__( 'Newest First', 'findus' ),
                    'date-asc' => esc_html__( 'Oldest First', 'findus' ),
                    'rating-desc' => esc_html__( 'Highest Rating', 'findus' ),
                    'rating-asc' => esc_html__( 'Lowest Rating', 'findus' ),
                    'random' => esc_html__( 'Random', 'findus' ),
                )),
                'default' => 'default'
            ),
            array(
                'id' => 'listing_show_loadmore',
                'type' => 'switch',
                'title' => esc_html__('Show Load More Button ?', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'listing_show_cat_title',
                'type' => 'switch',
                'title' => esc_html__('Show Category Title ?', 'findus'),
                'default' => 0,
            ),
            array(
                'id' => 'listing_show_cat_description',
                'type' => 'switch',
                'title' => esc_html__('Show Category Description ?', 'findus'),
                'default' => 0,
            ),
            array(
                'id' => 'sidebar_position',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('Sidebar Position', 'findus').'</h3>',
                'required' => array('listing_archive_layout_version', '=', array('default')),
            ),
            array(
                'id' => 'listing_archive_layout',
                'type' => 'image_select',
                'compiler' => true,
                'title' => esc_html__('Sidebar Layout', 'findus'),
                'subtitle' => esc_html__('Select a sidebar layout', 'findus'),
                'options' => array(
                    'main' => array(
                        'title' => esc_html__('Main Content', 'findus'),
                        'alt' => esc_html__('Main Content', 'findus'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                    ),
                    'left-main' => array(
                        'title' => esc_html__('Left - Main Sidebar', 'findus'),
                        'alt' => esc_html__('Left - Main Sidebar', 'findus'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                    ),
                    'main-right' => array(
                        'title' => esc_html__('Main - Right Sidebar', 'findus'),
                        'alt' => esc_html__('Main - Right Sidebar', 'findus'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                    ),
                ),
                'default' => 'left-main',
                'required' => array('listing_archive_layout_version', '=', array('default')),
            ),
            array(
                'id' => 'listing_archive_sidebar',
                'type' => 'select',
                'title' => esc_html__('Listings Sidebar', 'findus'),
                'subtitle' => esc_html__('Choose a sidebar for listings sidebar.', 'findus'),
                'options' => $sidebars,
                'default' => 'listing-archive-sidebar',
                'required' => array('listing_archive_layout_version', '=', array('default')),
            ),
            array(
                'id' => 'archive_breadcrumbs_settings',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('Breadcrumbs Settings', 'findus').'</h3>',
            ),
            array(
                'id' => 'show_listing_breadcrumbs',
                'type' => 'switch',
                'title' => esc_html__('Breadcrumbs', 'findus'),
                'default' => 1,
                'description' => esc_html__('Breadcrumb is only apply for Listing Archives version (List, Grid)', 'findus'),
            ),
            array(
                'title' => esc_html__('Breadcrumbs Background Color', 'findus'),
                'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'findus').'</em>',
                'id' => 'listing_breadcrumb_color',
                'type' => 'color',
                'transparent' => false,
            ),
            array(
                'id' => 'listing_breadcrumb_image',
                'type' => 'media',
                'title' => esc_html__('Breadcrumbs Background', 'findus'),
                'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'findus'),
            ),
            
        )
    );
    return $sections;
}
add_filter( 'findus_redux_framwork_configs', 'findus_wp_job_manager_redux_config_archive', 3, 3 );

function findus_wp_job_manager_redux_config_detail($sections, $sidebars, $columns) {
    
    $sections[] = array(
        'title' => esc_html__('Listing Detail', 'findus'),
        'fields' => array(
            array(
                'id' => 'listing_single_transparent_header',
                'type' => 'switch',
                'title' => esc_html__('Transparent header ?', 'findus'),
                'default' => 1,
            ),
            array(
                'id'        => 'listing_single_sort_content',
                'type'      => 'sorter',
                'title'     => esc_html__( 'Listing Content', 'findus' ),
                'subtitle'  => esc_html__( 'Please drag and arrange the block', 'findus' ),
                'options'   => array(
                    'enabled' => findus_get_default_blocks_content(),
                    'disabled' => array()
                )
            ),
            array(
                'id'        => 'listing_single_sort_sidebar',
                'type'      => 'sorter',
                'title'     => esc_html__( 'Listing Sidebar', 'findus' ),
                'subtitle'  => esc_html__( 'Please drag and arrange the block', 'findus' ),
                'options'   => array(
                    'enabled' => findus_get_default_blocks_sidebar_content(),
                    'disabled' => array()
                )
            ),
            array(
                'id' => 'show_listing_social_share',
                'type' => 'switch',
                'title' => esc_html__('Show Social Share', 'findus'),
                'default' => 1
            )

        )
    );
    return $sections;
}
add_filter( 'findus_redux_framwork_configs', 'findus_wp_job_manager_redux_config_detail', 4, 3 );


function findus_wp_job_manager_redux_config_filter($sections, $sidebars, $columns) {
    
    $sections[] = array(
        'title' => esc_html__('Listing Filter Settings', 'findus'),
        'fields' => array(
            
            array(
                'id' => 'listing_filter_show_categories',
                'type' => 'switch',
                'title' => esc_html__('Show categories field', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'listing_filter_show_types',
                'type' => 'switch',
                'title' => esc_html__('Show types field', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'listing_filter_show_regions',
                'type' => 'switch',
                'title' => esc_html__('Show regions field', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'listing_filter_show_location',
                'type' => 'switch',
                'title' => esc_html__('Show location field', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'listing_filter_show_distance',
                'type' => 'switch',
                'title' => esc_html__('Show distance field', 'findus'),
                'default' => 1,
                'required' => array('listing_filter_show_location', '=', 1),
            ),
            array(
                'id' => 'listing_filter_distance_default',
                'type' => 'text',
                'title' => esc_html__('Distance default', 'findus'),
                'default' => 50,
                'required' => array('listing_filter_show_location', '=', 1),
            ),
            array(
                'id' => 'listing_filter_distance_unit',
                'type' => 'select',
                'title' => esc_html__('Distance Unit', 'findus'),
                'options' => array(
                    'km' => esc_html__('Kilometre', 'findus'),
                    'miles' => esc_html__('Miles', 'findus'),
                ),
                'default' => 'km',
            ),
            array(
                'id' => 'listing_filter_show_price_range',
                'type' => 'switch',
                'title' => esc_html__('Show price range field', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'listing_filter_show_price_slider',
                'type' => 'switch',
                'title' => esc_html__('Show price slider field', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'listing_filter_price_min_default',
                'type' => 'text',
                'title' => esc_html__('Price Min default', 'findus'),
                'default' => 0,
                'required' => array('listing_filter_show_price_slider', '=', 1),
            ),
            array(
                'id' => 'listing_filter_price_max_default',
                'type' => 'text',
                'title' => esc_html__('Price Max default', 'findus'),
                'default' => 1000000,
                'required' => array('listing_filter_show_price_slider', '=', 1),
            ),
            array(
                'id' => 'listing_filter_show_amenities',
                'type' => 'switch',
                'title' => esc_html__('Show amenities field', 'findus'),
                'default' => 1,
            ),
        )
    );
    return $sections;
}
add_filter( 'findus_redux_framwork_configs', 'findus_wp_job_manager_redux_config_filter', 5, 3 );

function findus_wp_job_manager_redux_config($sections, $sidebars, $columns) {
    
    // review
    $sections[] = array(
        'title' => esc_html__('Listing Review Settings', 'findus'),
        'fields' => array(
            array(
                'id' => 'listing_review_enable',
                'type' => 'switch',
                'title' => esc_html__('Enable Review', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'listing_review_enable_upload_image',
                'type' => 'switch',
                'title' => esc_html__('Enable Upload Image', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'listing_review_enable_rating',
                'type' => 'switch',
                'title' => esc_html__('Enable Rating', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'listing_review_mode',
                'type' => 'select',
                'title' => esc_html__('Review Mode', 'findus'),
                'options' => array(
                    '5' => esc_html__('5 Stars', 'findus'),
                    '10' => esc_html__('10 Stars', 'findus')
                ),
                'default' => 10,
            ),
            array(
                'id'         => 'listing_review_categories',
                'type'       => 'repeater',
                'title'      => esc_html__( 'Review Categories', 'findus' ),
                'fields'     => array(
                    array(
                        'id' => 'listing_review_category_title',
                        'type' => 'text',
                        'title' => esc_html__('Title', 'findus'),
                    ),
                    array(
                        'id' => 'listing_review_category_key',
                        'type' => 'text',
                        'title' => esc_html__('Key', 'findus'),
                    )
                ),
            ),
            array(
                'id' => 'listing_review_enable_like_review',
                'type' => 'switch',
                'title' => esc_html__('Enable Like Review', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'listing_review_enable_dislike_review',
                'type' => 'switch',
                'title' => esc_html__('Enable DisLike Review', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'listing_review_enable_love_review',
                'type' => 'switch',
                'title' => esc_html__('Enable Love Review', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'listing_review_enable_reply_review',
                'type' => 'switch',
                'title' => esc_html__('Enable Reply Review', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'listing_review_edit_review_title',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('Edit Review Settings', 'findus').'</h3>',
            ),
            array(
                'id' => 'listing_review_enable_user_edit_his_review',
                'type' => 'switch',
                'title' => esc_html__('Allow Registered Users to Edit Comments Indefinitely', 'findus'),
                'default' => 1,
            )
        )
    );
    // Price Settings
    $sections[] = array(
        'title' => esc_html__('Listing Price Settings', 'findus'),
        'fields' => array(
            array(
                'id' => 'listing_currency_symbol',
                'type' => 'text',
                'title' => esc_html__('Currency Symbol', 'findus'),
                'default' => ''
            ),
            array(
                'id' => 'listing_currency_code',
                'type' => 'text',
                'title' => esc_html__('Currency Code', 'findus'),
                'default' => ''
            ),
            array(
                'id' => 'listing_currency_symbol_after_amount',
                'type' => 'switch',
                'title' => esc_html__('Show Symbol After Amount', 'findus'),
                'default' => 0,
            ),
            array(
                'id' => 'listing_currency_decimal_places',
                'type' => 'text',
                'title' => esc_html__('Decimal places', 'findus'),
                'default' => '',
            ),

            array(
                'id' => 'listing_currency_decimal_separator',
                'type' => 'text',
                'title' => esc_html__('Decimal Separator', 'findus'),
                'default' => ''
            ),
            array(
                'id' => 'listing_currency_thousands_separator',
                'type' => 'text',
                'title' => esc_html__('Thousands Separator', 'findus'),
                'default' => '',
                'subtitle' => esc_html__('If you need space, enter &nbsp;', 'findus')
            ),
        )
    );

    

    // sections after listings
    $lsections = apply_filters( 'findus_redux_config_sections_after_listing', array() );
    if ( !empty($lsections) ) {
        foreach ($lsections as $section) {
            $sections[] = $section;
        }
    }

    // Listing Map Settings
    $sections[] = array(
        'title' => esc_html__('Listing Map Settings', 'findus'),
        'fields' => array(
            // google map style
            array(
                'id' => 'listing_map_style_type',
                'type' => 'select',
                'title' => esc_html__('Maps Service', 'findus'),
                'options' => array(
                    'default' => esc_html__('Google Maps', 'findus'),
                    'mapbox' => esc_html__('MapBox', 'findus'),
                    'openstreetmap' => esc_html__('OpenStreetMap', 'findus'),
                ),
                'default' => 'default'
            ),
            array(
                'id' => 'listing_map_custom_style',
                'type' => 'textarea',
                'title' => esc_html__('Custom Style', 'findus'),
                'description' => wp_kses(__('<a href="//snazzymaps.com/">Get custom style</a> and paste it below. If there is nothing added, we will fallback to the Google Maps service.', 'findus'), array('a' => array('href' => array()))),
                'required' => array('listing_map_style_type', '=', 'default'),
            ),
            array(
                'id' => 'listing_mapbox_token',
                'type' => 'text',
                'title' => esc_html__('Mapbox Token', 'findus'),
                'description' => wp_kses(__('<a href="//www.mapbox.com/help/create-api-access-token/">Get a FREE token</a> and paste it below. If there is nothing added, we will fallback to the Google Maps service.', 'findus'), array('a' => array('href' => array()))),
                'required' => array('listing_map_style_type', '=', 'mapbox'),
            ),
            array(
                'id' => 'listing_mapbox_style',
                'type' => 'image_select',
                'compiler' => true,
                'title' => esc_html__('MapBox Style', 'findus'),
                'description' => esc_html__('Custom map styles works only if you have set a valid Mapbox API token in the field above.', 'findus'),
                'options' => array(
                    'streets-v11' => array(
                        'alt' => esc_html__('streets', 'findus'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/streets.png'
                    ),
                    'light-v10' => array(
                        'alt' => esc_html__('light', 'findus'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/light.png'
                    ),
                    'dark-v10' => array(
                        'alt' => esc_html__('dark', 'findus'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/dark.png'
                    ),
                    'outdoors-v11' => array(
                        'alt' => esc_html__('outdoors', 'findus'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/outdoors.png'
                    ),
                    'satellite-v9' => array(
                        'alt' => esc_html__('satellite', 'findus'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/satellite.png'
                    ),
                ),
                'default' => 'streets-v11',
                'required' => array('listing_map_style_type', '=', 'mapbox'),
            ),
            array(
                'id' => 'listing_map_latitude',
                'type' => 'text',
                'title' => esc_html__('Default Latitude', 'findus'),
                'default' => '54.800685'
            ),
            array(
                'id' => 'listing_map_longitude',
                'type' => 'text',
                'title' => esc_html__('Default Longitude', 'findus'),
                'default' => '-4.130859'
            ),
            array(
                'id' => 'listing_map_geocoder_country',
                'type' => 'select',
                'title' => esc_html__('Geocoder Country', 'findus'),
                'options' => findus_all_countries(),
                'default' => ''
            ),
        )
    );

    $sections[] = array(
        'title' => esc_html__('User Profile', 'findus'),
        'fields' => array(
            array(
                'id' => 'profile_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('General Settings', 'findus').'</h3>',
            ),
            array(
                'id' => 'profile_background_image',
                'type' => 'media',
                'title' => esc_html__('Profile Background', 'findus'),
                'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'findus'),
            ),
            array(
                'id' => 'user_profile_show_contact_form',
                'type' => 'switch',
                'title' => esc_html__('Show Contact Form', 'findus'),
                'default' => 1,
            ),
            array(
                'id' => 'user_profile_listing_number',
                'type' => 'text',
                'title' => esc_html__('Number of Listings Per Page', 'findus'),
                'default' => 25,
                'min' => '1',
                'step' => '1',
                'max' => '100',
                'type' => 'slider'
            ),
            array(
                'id' => 'user_profile_bookmark_number',
                'type' => 'text',
                'title' => esc_html__('Number of Bookmarks Per Page', 'findus'),
                'default' => 25,
                'min' => '1',
                'step' => '1',
                'max' => '100',
                'type' => 'slider'
            ),
            array(
                'id' => 'user_profile_reviews_number',
                'type' => 'text',
                'title' => esc_html__('Number of Reviews Per Page', 'findus'),
                'default' => 25,
                'min' => '1',
                'step' => '1',
                'max' => '100',
                'type' => 'slider'
            ),
            array(
                'id' => 'user_profile_follow_number',
                'type' => 'text',
                'title' => esc_html__('Number of Following/Follower Per Page', 'findus'),
                'default' => 25,
                'min' => '1',
                'step' => '1',
                'max' => '100',
                'type' => 'slider'
            ),
        )
    );

    $pages = array();
    $posts = get_posts( array(
        'post_type'   => 'page',
        'numberposts' => - 1
    ) );
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $pages[ $post->ID ] = $post->post_title;
        }
    }
    $sections[] = array(
        'title' => esc_html__('User Register Settings', 'findus'),
        'fields' => array(
            array(
                'id' => 'user_register_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('General Settings', 'findus').'</h3>',
            ),
            array(
                'id' => 'user_register_requires_approval',
                'type' => 'select',
                'title' => esc_html__('Moderate New User', 'findus'),
                'options' => array(
                    'auto'  => esc_html__( 'Auto Approve', 'findus' ),
                    'email_approve' => esc_html__( 'Email Approve', 'findus' ),
                    'admin_approve' => esc_html__( 'Administrator Approve', 'findus' ),
                ),
                'description' => esc_html__('Require admin approval of all new user', 'findus'),
                'default' => 'auto'
            ),

            array(
                'id' => 'user_register_approve_page',
                'type' => 'select',
                'title' => esc_html__('Approve User Page', 'findus'),
                'options' => $pages,
                'description' => esc_html__('This lets the plugin know the location of the approve page. The [findus_approve_user] shortcode should be on this page.', 'findus'),
                'default' => ''
            ),

            // Approve new user register
            array(
                'id' => 'user_register_setting_new_user',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('Email Setting: New user register (auto approve)', 'findus').'</h3>',
            ),
            array(
                'title'    => esc_html__( 'New user register Subject', 'findus' ),
                'desc'    => esc_html__( 'Enter email subject. You can add variables: {user_name}', 'findus' ),
                'id'      => 'user_register_auto_approve_subject',
                'type'    => 'text',
                'default' => 'New user register: {user_name}',
            ),
            array(
                'title'    => esc_html__( 'New user register Content', 'findus' ),
                'desc'    => esc_html__( 'Enter email content. You can add variables: {user_name}, {user_email}, {website_url}, {website_name}', 'findus' ),
                'id'      => 'user_register_auto_approve_content',
                'type'    => 'editor',
                'default' => '',
            ),
            // Approve new user register
            array(
                'id' => 'user_register_setting_approve',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('Email Setting: Approve new user register', 'findus').'</h3>',
            ),
            array(
                'title'    => esc_html__( 'Approve new user register Subject', 'findus' ),
                'desc'    => esc_html__( 'Enter email subject. You can add variables: {user_name}', 'findus' ),
                'id'      => 'user_register_need_approve_subject',
                'type'    => 'text',
                'default' => 'Approve new user register: {user_name}',
            ),
            array(
                'title'    => esc_html__( 'Approve new user register Content', 'findus' ),
                'desc'    => sprintf(esc_html__( 'Enter email content. You can add variables: %s', 'findus' ), '{user_name}, {user_email}, {approve_url}, {website_url}, {website_name}' ),
                'id'      => 'user_register_need_approve_content',
                'type'    => 'editor',
                'default' => '',
            ),
            // Approved user register
            array(
                'id' => 'user_register_setting_approved',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('Approved user', 'findus').'</h3>',
            ),
            array(
                'title'    => esc_html__( 'Approved user Subject', 'findus' ),
                'desc'    => sprintf(esc_html__( 'Enter email subject. You can add variables: %s', 'findus' ), '{user_name}' ),
                'id'      => 'user_register_approved_subject',
                'type'    => 'text',
                'default' => 'Approve new user register: {user_name}',
            ),
            array(
                'title'    => esc_html__( 'Approved user Content', 'findus' ),
                'desc'    => sprintf(__( 'Enter email content. You can add variables: %s', 'findus' ), '{user_name}, {user_email}, {website_url}, {website_name}' ),
                'id'      => 'user_register_approved_content',
                'type'    => 'editor',
                'default' => '',
            ),
            // Denied user register
            array(
                'id' => 'user_register_setting_denied',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('Denied user', 'findus').'</h3>',
            ),
            array(
                'title'    => esc_html__( 'Denied user Subject', 'findus' ),
                'desc'    => sprintf(__( 'Enter email subject. You can add variables: %s', 'findus' ), '{user_name}' ),
                'id'      => 'user_register_denied_subject',
                'type'    => 'text',
                'default' => 'Approve new user register: {user_name}',
            ),
            array(
                'title'    => esc_html__( 'Denied user Content', 'findus' ),
                'desc'    => sprintf(__( 'Enter email content. You can add variables: %s', 'findus' ), '{user_name}, {user_email}, {website_url}, {website_name}' ),
                'id'      => 'user_register_denied_content',
                'type'    => 'editor',
                'default' => '',
            ),
            // Reset Password
            array(
                'id' => 'user_register_setting_reset_password',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('Reset Password', 'findus').'</h3>',
            ),
            array(
                'title'    => esc_html__( 'Reset Password Subject', 'findus' ),
                'desc'    => sprintf(__( 'Enter email subject. You can add variables: %s', 'findus' ), '{user_name}' ),
                'id'      => 'user_reset_password_subject',
                'type'    => 'text',
                'default' => 'Your new password',
            ),
            array(
                'title'    => esc_html__( 'Reset Password Content', 'findus' ),
                'desc'    => sprintf(__( 'Enter email content. You can add variables: %s', 'findus' ), '{user_name}, {user_email}, {new_password}, {website_url}, {website_name}' ),
                'id'      => 'user_reset_password_content',
                'type'    => 'editor',
                'default' => 'Your new password is: {new_password}',
            ),
        )
    );
    // Email Template
    $email_template_fields = apply_filters( 'findus_email_template_fields', array());
    if ( !empty($email_template_fields) ) {
        $sections[] = array(
            'title' => esc_html__('Email Templates', 'findus'),
            'fields' => $email_template_fields
        );
    }
    
    $sections[] = array(
        'title' => esc_html__('Image Sizes', 'findus'),
        'fields' => array(
            array(
                'id' => 'card_grid_image_title',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('Card grid image', 'findus').'</h3>',
            ),
            array(
                'id' => 'image_size_card_grid_width',
                'type' => 'text',
                'title' => esc_html__('Card grid image width', 'findus'),
                'default' => '350',
            ),
            array(
                'id' => 'image_size_card_grid_height',
                'type' => 'text',
                'title' => esc_html__('Card grid image height', 'findus'),
                'default' => '200',
            ),
            array(
                'id' => 'card_list_image_title',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('Card list image', 'findus').'</h3>',
            ),
            array(
                'id' => 'image_size_card_list_width',
                'type' => 'text',
                'title' => esc_html__('Card list image width', 'findus'),
                'default' => '340',
            ),
            array(
                'id' => 'image_size_card_list_height',
                'type' => 'text',
                'title' => esc_html__('Card list image height', 'findus'),
                'default' => '260',
            ),
            array(
                'id' => 'thumb_small_image_title',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('Thumb small image', 'findus').'</h3>',
            ),
            array(
                'id' => 'image_size_thumb_small_width',
                'type' => 'text',
                'title' => esc_html__('Thumb small image width', 'findus'),
                'default' => '100',
            ),
            array(
                'id' => 'image_size_thumb_small_height',
                'type' => 'text',
                'title' => esc_html__('Thumb small image height', 'findus'),
                'default' => '100',
            ),
            array(
                'id' => 'gallery_image_title',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('Listing Gallery image', 'findus').'</h3>',
            ),
            array(
                'id' => 'image_size_gallery_width',
                'type' => 'text',
                'title' => esc_html__('Listing gallery image width', 'findus'),
                'default' => '480',
            ),
            array(
                'id' => 'image_size_gallery_height',
                'type' => 'text',
                'title' => esc_html__('Listing gallery image height', 'findus'),
                'default' => '550',
            ),

            array(
                'id' => 'full_image_title',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3> '.esc_html__('Listing Full image', 'findus').'</h3>',
            ),
            array(
                'id' => 'image_size_full_width',
                'type' => 'text',
                'title' => esc_html__('Listing full image width', 'findus'),
                'default' => '1920',
            ),
            array(
                'id' => 'image_size_full_height',
                'type' => 'text',
                'title' => esc_html__('Listing full image height', 'findus'),
                'default' => '550',
            ),
        )
    );

    return $sections;
}
add_filter( 'findus_redux_framwork_configs', 'findus_wp_job_manager_redux_config', 10, 3 );