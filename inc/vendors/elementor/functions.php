<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'Findus_Elementor_Extensions' ) ) {
    final class Findus_Elementor_Extensions {

        private static $_instance = null;

        
        public function __construct() {
            add_action( 'elementor/elements/categories_registered', array( $this, 'add_widget_categories' ) );
            add_action( 'init', array( $this, 'elementor_widgets' ),  100 );
            add_filter( 'findus_generate_post_builder', array( $this, 'render_post_builder' ), 10, 2 );

            add_action( 'elementor/controls/controls_registered', array( $this, 'modify_controls' ), 10, 1 );
            add_action('elementor/editor/before_enqueue_styles', array( $this, 'style' ) );
        }

        public static function instance () {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }
        
        public function add_widget_categories( $elements_manager ) {
            $elements_manager->add_category(
                'findus-elements',
                [
                    'title' => esc_html__( 'Findus Elements', 'findus' ),
                    'icon' => 'fa fa-shopping-bag',
                ]
            );

            $elements_manager->add_category(
                'findus-listings-elements',
                [
                    'title' => esc_html__( 'Findus Listing Elements', 'findus' ),
                ]
            );

            $elements_manager->add_category(
                'findus-header-elements',
                [
                    'title' => esc_html__( 'Findus Header Elements', 'findus' ),
                ]
            );

        }

        public function elementor_widgets() {
            // general elements
            get_template_part( 'inc/vendors/elementor/widgets/heading' );
            get_template_part( 'inc/vendors/elementor/widgets/posts' );
            get_template_part( 'inc/vendors/elementor/widgets/call_to_action' );
            get_template_part( 'inc/vendors/elementor/widgets/features_box' );
            get_template_part( 'inc/vendors/elementor/widgets/icon_list' );
            get_template_part( 'inc/vendors/elementor/widgets/social_links' );
            get_template_part( 'inc/vendors/elementor/widgets/testimonials' );
            get_template_part( 'inc/vendors/elementor/widgets/brands' );
            get_template_part( 'inc/vendors/elementor/widgets/popup_video' );
            get_template_part( 'inc/vendors/elementor/widgets/banner' );
            get_template_part( 'inc/vendors/elementor/widgets/countdown' );
            get_template_part( 'inc/vendors/elementor/widgets/nav_menu' );
            get_template_part( 'inc/vendors/elementor/widgets/counter' );
            get_template_part( 'inc/vendors/elementor/widgets/team' );
            
            if ( findus_is_revslider_activated() ) {
                get_template_part( 'inc/vendors/elementor/widgets/revslider' );
            }

            // header elements
            get_template_part( 'inc/vendors/elementor/header_widgets/logo' );
            get_template_part( 'inc/vendors/elementor/header_widgets/primary_menu' );
            get_template_part( 'inc/vendors/elementor/header_widgets/user_info' );

            if ( findus_is_mailchimp_activated() ) {
                get_template_part( 'inc/vendors/elementor/widgets/mailchimp' );
            }

            if ( findus_is_wp_job_manager_activated() ) {
                get_template_part( 'inc/vendors/elementor/listing_widgets/listings' );
                get_template_part( 'inc/vendors/elementor/listing_widgets/listings_maps' );
                get_template_part( 'inc/vendors/elementor/listing_widgets/search_form' );
                get_template_part( 'inc/vendors/elementor/listing_widgets/category_banner' );
                get_template_part( 'inc/vendors/elementor/listing_widgets/category_banner_list' );
                get_template_part( 'inc/vendors/elementor/listing_widgets/city_banner' );
                
                get_template_part( 'inc/vendors/elementor/listing_widgets/edit_profile' );
                get_template_part( 'inc/vendors/elementor/listing_widgets/my_bookmark' );
                get_template_part( 'inc/vendors/elementor/listing_widgets/my_dashboard' );
                get_template_part( 'inc/vendors/elementor/listing_widgets/my_follow' );
                get_template_part( 'inc/vendors/elementor/listing_widgets/my_reviews' );
                get_template_part( 'inc/vendors/elementor/listing_widgets/user_menu' );

                // header
                get_template_part( 'inc/vendors/elementor/listing_widgets/header_search_form' );
                get_template_part( 'inc/vendors/elementor/listing_widgets/add_listing_btn' );
            }

            if ( findus_is_apus_wc_paid_listings_activated() ) {
                get_template_part( 'inc/vendors/elementor/wc_paid_widgets/packages' );
                get_template_part( 'inc/vendors/elementor/wc_paid_widgets/user_packages' );
            }

            if ( findus_is_woocommerce_activated() ) {
                get_template_part( 'inc/vendors/elementor/woo_header_widgets/woo_cart' );
            }
        }

        public function style() {
            wp_enqueue_style('findus-flaticon',  get_template_directory_uri() . '/css/flaticon.css');
            wp_enqueue_style('font-themify-icons',  get_template_directory_uri() . '/css/themify-icons.css');
            wp_enqueue_style('font-et-line',  get_template_directory_uri() . '/css/et-line.css');
        }

        public function modify_controls( $controls_registry ) {
            // Get existing icons
            $icons = $controls_registry->get_control( 'icon' )->get_settings( 'options' );
            // Append new icons
            $new_icons = array_merge(
                array(
                    'flaticon-magnifying-glass' => 'flaticon-magnifying-glass',
                    'flaticon-shopping-basket' => 'flaticon-shopping-basket',
                    'flaticon-in' =>'flaticon-in',
                    'flaticon-placeholder' => 'flaticon-placeholder',
                    'flaticon-wine' => 'flaticon-wine', 
                    'flaticon-museum' => 'flaticon-museum',
                    'flaticon-popcorn' => 'flaticon-popcorn',
                    'flaticon-cutlery' => 'flaticon-cutlery',
                    'flaticon-bed' => 'flaticon-bed',
                    'flaticon-zoom-in' => 'flaticon-zoom-in',
                    'flaticon-like' => 'flaticon-like',
                    'flaticon-place' => 'flaticon-place',
                    'flaticon-contact' => 'flaticon-contact',
                    'flaticon-heart' => 'flaticon-heart',
                    'flaticon-shopping-bag' => 'flaticon-shopping-bag',
                    'flaticon-tent' => 'flaticon-tent',
                    'flaticon-event' => 'flaticon-event',
                    'flaticon-house' => 'flaticon-house',
                    'flaticon-house-1' => 'flaticon-house-1',
                    'flaticon-building' => 'flaticon-building',
                    'flaticon-building-with-big-windows' => 'flaticon-building-with-big-windows',
                    'flaticon-credit-card' => 'flaticon-credit-card',
                    'flaticon-wifi' => 'flaticon-wifi',
                    'flaticon-parking' => 'flaticon-parking',
                    'flaticon-cigar' => 'flaticon-cigar',
                    'flaticon-bicycle' => 'flaticon-bicycle',
                    'flaticon-handicap' => 'flaticon-handicap',
                    'flaticon-reservation' => 'flaticon-reservation',
                    'flaticon-coupon' => 'flaticon-coupon',
                    'flaticon-tent-1' => 'flaticon-tent-1',
                    'flaticon-view' => 'flaticon-view',
                    'flaticon-share' => 'flaticon-share',
                    'flaticon-call' => 'flaticon-call',
                    'flaticon-mail' => 'flaticon-mail',
                    'flaticon-tap' => 'flaticon-tap',
                    'flaticon-consulting-message' => 'flaticon-consulting-message',
                    'flaticon-bed-1' => 'flaticon-bed-1',
                    'flaticon-people' => 'flaticon-people',
                    'flaticon-food' => 'flaticon-food',
                    'flaticon-user' => 'flaticon-user',
                    'flaticon-event-1' => 'flaticon-event-1',
                    'flaticon-view-1' => 'flaticon-view-1',
                    'flaticon-eraser' => 'flaticon-eraser',
                    'flaticon-dustbin' => 'flaticon-dustbin',
                    'ti-location-pin' => 'ti-location-pin',
                    'ti-email' => 'ti-email',
                    'ti-mobile' => 'ti-mobile',
                    'ti-world' => 'ti-world',
                    'icon-trophy' => 'icon-trophy',
                    'icon-layers' => 'icon-layers',
                    'icon-happy' => 'icon-happy',
                    'icon-dial' => 'icon-dial',
                    'ti-map-alt' => 'ti-map-alt',
                    'ti-user' => 'ti-user',
                ),
                $icons
            );
            // Then we set a new list of icons as the options of the icon control
            $controls_registry->get_control( 'icon' )->set_settings( 'options', $new_icons );
        }
        

        public function render_page_content($post_id) {
            if ( class_exists( 'Elementor\Core\Files\CSS\Post' ) ) {
                $css_file = new Elementor\Core\Files\CSS\Post( $post_id );
                $css_file->enqueue();
            }

            return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_id );
        }

        public function render_post_builder($html, $post) {
            if ( !empty($post) && !empty($post->ID) ) {
                return $this->render_page_content($post->ID);
            }
            return $html;
        }
    }
}

if ( did_action( 'elementor/loaded' ) ) {
    // Finally initialize code
    Findus_Elementor_Extensions::instance();
}