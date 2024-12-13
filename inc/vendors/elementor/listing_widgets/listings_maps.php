<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Findus_Elementor_Listings_Maps extends Elementor\Widget_Base {

	public function get_name() {
        return 'apus_listings_maps';
    }

	public function get_title() {
        return esc_html__( 'Apus Listings Maps', 'findus' );
    }
    
	public function get_categories() {
        return [ 'findus-listings-elements' ];
    }
    
	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Listings', 'findus' ),
                'tab' => Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => esc_html__( 'Number listings to show', 'findus' ),
                'type' => Elementor\Controls_Manager::TEXT,
                'input_type' => 'number',
                'default' => 4
            ]
        );

        $this->add_control(
            'get_by',
            [
                'label' => esc_html__( 'Get Listings By', 'findus' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'recent' => esc_html__('Recent Listing', 'findus'),
                    'popular' => esc_html__('Popular Listing', 'findus'),
                    'featured' => esc_html__('Featured Listing', 'findus'),
                    'rand' => esc_html__('Random', 'findus'),
                ),
                'default' => 'recent'
            ]
        );

        $this->add_control(
            'category_slugs',
            [
                'label' => esc_html__( 'Categories Slug', 'findus' ),
                'type' => Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => '',
                'placeholder' => esc_html__( 'Enter id spearate by comma(,)', 'findus' ),
            ]
        );

        $this->add_control(
            'region_slugs',
            [
                'label' => esc_html__( 'Regions Slug', 'findus' ),
                'type' => Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => '',
                'placeholder' => esc_html__( 'Enter id spearate by comma(,)', 'findus' ),
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

                $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__( 'Style', 'findus' ),
                'tab' => Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'height',
            [
                'label' => esc_html__( 'Height', 'findus' ),
                'type' => Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1440,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #apus-listing-map' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


    }

	protected function render() {
        $settings = $this->get_settings();
        extract( $settings );
        ?>
        <div class="widget-listing-maps <?php echo esc_attr($el_class); ?>">
            <div id="apus-listing-map" class="apus-listing-map" data-settings="<?php echo esc_attr(json_encode($settings)); ?>"></div>
            <div class="job_listings_cards hidden"></div>
        </div>
        <?php
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Findus_Elementor_Listings_Maps );
} else {
    Elementor\Plugin::instance()->widgets_manager->register( new Findus_Elementor_Listings_Maps );
}