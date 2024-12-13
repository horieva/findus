<?php

// Shop Archive settings
function findus_woo_redux_config($sections, $sidebars, $columns) {
    
    // Woocommerce
    $sections[] = array(
        'icon' => 'el el-shopping-cart',
        'title' => esc_html__('Woocommerce', 'findus'),
        'fields' => array(
            array(
                'id' => 'show_product_breadcrumbs',
                'type' => 'switch',
                'title' => esc_html__('Breadcrumbs', 'findus'),
                'default' => 1
            ),
            array (
                'title' => esc_html__('Breadcrumbs Background Color', 'findus'),
                'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'findus').'</em>',
                'id' => 'woo_breadcrumb_color',
                'type' => 'color',
                'transparent' => false,
            ),
            array(
                'id' => 'woo_breadcrumb_image',
                'type' => 'media',
                'title' => esc_html__('Breadcrumbs Background', 'findus'),
                'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'findus'),
            ),
        )
    );
    // Archive settings
    $sections[] = array(
        'subsection' => true,
        'title' => esc_html__('Product Archives', 'findus'),
        'fields' => array(
            array(
                'id' => 'product_archive_layout',
                'type' => 'image_select',
                'compiler' => true,
                'title' => esc_html__('Archive Product Layout', 'findus'),
                'subtitle' => esc_html__('Select the layout you want to apply on your archive product page.', 'findus'),
                'options' => array(
                    'main' => array(
                        'title' => esc_html__('Main Content', 'findus'),
                        'alt' => esc_html__('Main Content', 'findus'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                    ),
                    'left-main' => array(
                        'title' => esc_html__('Left Sidebar - Main Content', 'findus'),
                        'alt' => esc_html__('Left Sidebar - Main Content', 'findus'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                    ),
                    'main-right' => array(
                        'title' => esc_html__('Main Content - Right Sidebar', 'findus'),
                        'alt' => esc_html__('Main Content - Right Sidebar', 'findus'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                    ),
                ),
                'default' => 'left-main'
            ),
            array(
                'id' => 'product_archive_fullwidth',
                'type' => 'switch',
                'title' => esc_html__('Is Full Width?', 'findus'),
                'default' => false
            ),
            array(
                'id' => 'product_archive_filter_sidebar',
                'type' => 'select',
                'title' => esc_html__('Filter Sidebar', 'findus'),
                'subtitle' => esc_html__('Show filter sidebar when shop only show Main Content.', 'findus'),
                'options' => array(
                    'none' => esc_html__('Do not show', 'findus'),
                    'right' => esc_html__('Right', 'findus'),
                    'top' => esc_html__('Categories + Sidebar in Top', 'findus'),
                ),
                'required' => array('product_archive_layout', '=', 'main'),
                'default' => 'none'
            ),
            array(
                'id' => 'product_archive_left_sidebar',
                'type' => 'select',
                'title' => esc_html__('Archive Left Sidebar', 'findus'),
                'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'findus'),
                'options' => $sidebars
            ),
            array(
                'id' => 'product_archive_right_sidebar',
                'type' => 'select',
                'title' => esc_html__('Archive Right Sidebar', 'findus'),
                'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'findus'),
                'options' => $sidebars
            ),
            array(
                'id' => 'product_display_mode',
                'type' => 'select',
                'title' => esc_html__('Display Mode', 'findus'),
                'subtitle' => esc_html__('Choose a default layout archive product.', 'findus'),
                'options' => array('grid' => esc_html__('Grid', 'findus'), 'list' => esc_html__('List', 'findus')),
                'default' => 'grid'
            ),
            array(
                'id' => 'number_products_per_page',
                'type' => 'text',
                'title' => esc_html__('Number of Products Per Page', 'findus'),
                'default' => 12,
                'min' => '1',
                'step' => '1',
                'max' => '100',
                'type' => 'slider'
            ),
            array(
                'id' => 'product_columns',
                'type' => 'select',
                'title' => esc_html__('Product Columns', 'findus'),
                'options' => $columns,
                'default' => 4
            ),
            array(
                'id' => 'show_quickview',
                'type' => 'switch',
                'title' => esc_html__('Show Quick View', 'findus'),
                'default' => 1
            ),
            array(
                'id' => 'show_swap_image',
                'type' => 'switch',
                'title' => esc_html__('Show Second Image (Hover)', 'findus'),
                'default' => 1
            ),
        )
    );
    // Product Page
    $sections[] = array(
        'subsection' => true,
        'title' => esc_html__('Single Product', 'findus'),
        'fields' => array(
            array(
                'id' => 'product_single_layout',
                'type' => 'image_select',
                'compiler' => true,
                'title' => esc_html__('Single Product Layout', 'findus'),
                'subtitle' => esc_html__('Select the layout you want to apply on your Single Product Page.', 'findus'),
                'options' => array(
                    'main' => array(
                        'title' => esc_html__('Main Only', 'findus'),
                        'alt' => esc_html__('Main Only', 'findus'),
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
                'default' => 'left-main'
            ),
            array(
                'id' => 'product_single_fullwidth',
                'type' => 'switch',
                'title' => esc_html__('Is Full Width?', 'findus'),
                'default' => false
            ),
            array(
                'id' => 'product_single_left_sidebar',
                'type' => 'select',
                'title' => esc_html__('Single Product Left Sidebar', 'findus'),
                'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'findus'),
                'options' => $sidebars
            ),
            array(
                'id' => 'product_single_right_sidebar',
                'type' => 'select',
                'title' => esc_html__('Single Product Right Sidebar', 'findus'),
                'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'findus'),
                'options' => $sidebars
            ),
            array(
                'id' => 'show_product_social_share',
                'type' => 'switch',
                'title' => esc_html__('Show Social Share', 'findus'),
                'default' => 1
            ),
            array(
                'id' => 'show_product_review_tab',
                'type' => 'switch',
                'title' => esc_html__('Show Product Review Tab', 'findus'),
                'default' => 1
            ),
            array(
                'id' => 'show_product_releated',
                'type' => 'switch',
                'title' => esc_html__('Show Products Releated', 'findus'),
                'default' => 1
            ),
            array(
                'id' => 'show_product_upsells',
                'type' => 'switch',
                'title' => esc_html__('Show Products upsells', 'findus'),
                'default' => 1
            ),
            array(
                'id' => 'number_product_releated',
                'title' => esc_html__('Number of related/upsells products to show', 'findus'),
                'default' => 4,
                'min' => '1',
                'step' => '1',
                'max' => '20',
                'type' => 'slider'
            ),
            array(
                'id' => 'releated_product_columns',
                'type' => 'select',
                'title' => esc_html__('Releated Products Columns', 'findus'),
                'options' => $columns,
                'default' => 4
            ),

        )
    );
    
    return $sections;
}
add_filter( 'findus_redux_framwork_configs', 'findus_woo_redux_config', 1, 3 );