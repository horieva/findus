<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Findus_Elementor_Listings_Place_Search_Form extends Elementor\Widget_Base {

	public function get_name() {
        return 'apus_listings_search_form';
    }

	public function get_title() {
        return esc_html__( 'Apus Search Form', 'findus' );
    }
    
	public function get_categories() {
        return [ 'findus-listings-elements' ];
    }

	protected function register_controls() {


        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Search Form', 'findus' ),
                'tab' => Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'search_keyword',
            [
                'label' => esc_html__( 'Show Search Keyword', 'findus' ),
                'type' => Elementor\Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => esc_html__( 'Hide', 'findus' ),
                'label_off' => esc_html__( 'Show', 'findus' ),
            ]
        );
        $this->add_control(
            'enable_autocompleate_search',
            [
                'label' => esc_html__( 'Enable autocompleate search', 'findus' ),
                'type' => Elementor\Controls_Manager::SWITCHER,
                'default' => '1',
                'label_on' => esc_html__( 'Yes', 'findus' ),
                'label_off' => esc_html__( 'No', 'findus' ),
            ]
        );
        
        $this->add_control(
            'show_search_suggestions',
            [
                'label' => esc_html__( 'Show Search Suggestions', 'findus' ),
                'type' => Elementor\Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => esc_html__( 'Hide', 'findus' ),
                'label_off' => esc_html__( 'Show', 'findus' ),
            ]
        );

        if ( findus_get_config('listing_filter_show_categories') ) {
            $this->add_control(
                'search_category',
                [
                    'label' => esc_html__( 'Show Search Category', 'findus' ),
                    'type' => Elementor\Controls_Manager::SWITCHER,
                    'default' => '',
                    'label_on' => esc_html__( 'Hide', 'findus' ),
                    'label_off' => esc_html__( 'Show', 'findus' ),
                ]
            );
        }

        if ( get_option( 'job_manager_enable_types' ) && findus_get_config('listing_filter_show_types') ) {
            $this->add_control(
                'search_type',
                [
                    'label' => esc_html__( 'Show Search Type', 'findus' ),
                    'type' => Elementor\Controls_Manager::SWITCHER,
                    'default' => '',
                    'label_on' => esc_html__( 'Hide', 'findus' ),
                    'label_off' => esc_html__( 'Show', 'findus' ),
                ]
            );
        }

        if ( findus_get_config('listing_filter_show_regions') ) {
            $this->add_control(
                'search_region',
                [
                    'label' => esc_html__( 'Show Search Region', 'findus' ),
                    'type' => Elementor\Controls_Manager::SWITCHER,
                    'default' => '',
                    'label_on' => esc_html__( 'Hide', 'findus' ),
                    'label_off' => esc_html__( 'Show', 'findus' ),
                ]
            );
        }
        if ( findus_get_config('listing_filter_show_location') ) {
            $this->add_control(
                'search_location',
                [
                    'label' => esc_html__( 'Show Search Location', 'findus' ),
                    'type' => Elementor\Controls_Manager::SWITCHER,
                    'default' => '',
                    'label_on' => esc_html__( 'Hide', 'findus' ),
                    'label_off' => esc_html__( 'Show', 'findus' ),
                ]
            );
        }

        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'findus' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'horizontal' => esc_html__('Horizontal', 'findus'),
                    'horizontal v2' => esc_html__('Horizontal V2', 'findus'),
                    'vertical' => esc_html__('Vertical', 'findus'),
                ),
                'default' => 'horizontal'
            ]
        );

   		$this->add_control(
            'el_class',
            [
                'label'         => esc_html__( 'Extra class name', 'findus' ),
                'type'          => Elementor\Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'findus' ),
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        ?>
        <div class="widget-listingsearch listingsearch-<?php echo esc_attr($style); ?> <?php echo esc_attr($el_class); ?>">
            <?php get_job_manager_template( 'job-filters-simple.php', $settings ); ?>
        </div>
        <?php

    }

}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Findus_Elementor_Listings_Place_Search_Form );
} else {
    Elementor\Plugin::instance()->widgets_manager->register( new Findus_Elementor_Listings_Place_Search_Form );
}