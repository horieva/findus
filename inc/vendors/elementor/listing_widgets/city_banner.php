<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Findus_Elementor_Listings_City_Banner extends Elementor\Widget_Base {

	public function get_name() {
        return 'apus_listings_city_banner';
    }

	public function get_title() {
        return esc_html__( 'Apus Listings City Banner', 'findus' );
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
            'title',
            [
                'label' => esc_html__( 'Title', 'findus' ),
                'type' => Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter your Title here', 'findus' ),
            ]
        );

        $this->add_control(
            'slug',
            [
                'label' => esc_html__( 'City Slug', 'findus' ),
                'type' => Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter your City Slug here', 'findus' ),
            ]
        );

        $this->add_control(
            'more_text',
            [
                'label' => esc_html__( 'Text More', 'findus' ),
                'type' => Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => esc_html__( 'Enter your More text here', 'findus' ),
                'default' => 'Get All Listing'
            ]
        );

        $this->add_control(
            'show_nb_listings',
            [
                'label' => esc_html__( 'Show Number Listings', 'findus' ),
                'type' => Elementor\Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => esc_html__( 'Hide', 'findus' ),
                'label_off' => esc_html__( 'Show', 'findus' ),
            ]
        );

        $this->add_control(
            'img_src',
            [
                'name' => 'image',
                'label' => esc_html__( 'City Image', 'findus' ),
                'type' => Elementor\Controls_Manager::MEDIA,
                'placeholder'   => esc_html__( 'Upload Image Here', 'findus' ),
            ]
        );
        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'findus' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('Default', 'findus'),
                ),
                'default' => ''
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
            'section_numbers_style',
            [
                'label' => esc_html__( 'Numbers', 'findus' ),
                'tab' => Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label' => esc_html__( 'Color', 'findus' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .number' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'number_bg_color',
            [
                'label' => esc_html__( 'Background', 'findus' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .number' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'number_br_color',
            [
                'label' => esc_html__( 'Border Color', 'findus' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .number' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__( 'Title', 'findus' ),
                'tab' => Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'findus' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_link_style',
            [
                'label' => esc_html__( 'More Text', 'findus' ),
                'tab' => Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'more_color',
            [
                'label' => esc_html__( 'Color', 'findus' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .more_text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'more_hv_color',
            [
                'label' => esc_html__( 'Color Hover', 'findus' ),
                'type' => Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .more_text:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .more_text:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        if ( empty($slug) ) {
            return;
        }
        ?>
        <div class="city-banner <?php echo esc_attr($el_class); ?>">
    
            <?php
            $term = get_term_by( 'slug', $slug, 'job_listing_region' );
            if ($term) {
            ?>
                <a class="<?php echo esc_attr($style); ?>" href="<?php echo esc_url(get_term_link( $term, 'job_listing_region' )); ?>">
                    <div class="city-banner-inner">

                            <?php
                            $img_bg_src = ( isset( $img_src['id'] ) && $img_src['id'] != 0 ) ? wp_get_attachment_url( $img_src['id'] ) : '';
                            if ( !empty($img_bg_src) ) {
                                $style_bg = 'style="background-image:url('.esc_url($img_bg_src).')"';
                            ?>
                                <div class="city-image" <?php echo trim($style_bg); ?>></div>
                            <?php } ?>

                            <div class="inner-content">
                                <?php if ( !empty($title) ) { ?>
                                    <h4 class="title">
                                        <?php echo trim($title); ?>
                                    </h4>
                                <?php } ?>
                                
                                <?php if ( !empty($more_text) ) { ?>
                                    <span class="more_text">
                                        <?php echo trim($more_text); ?>
                                    </span>
                                <?php } ?>
                                <?php if ( $show_nb_listings ) {
                                    $args = array(
                                        'tax_query' => array(array(
                                            'taxonomy'      => 'job_listing_region',
                                            'field'         => 'slug',
                                            'terms'         => $term->slug,
                                            'operator'      => 'IN'
                                        )),
                                        'posts_per_page' => 1,
                                        'post_status' => 'publish',
                                        'fields' => 'ids'
                                    );
                                    $query = new WP_Query( $args );
                                    $count = $query->found_posts;
                                ?>
                                    <span class="number"><?php echo sprintf(_n('%d Listing', '%d Listings', $count, 'findus'), $count); ?></span>
                                <?php } ?>
                            </div>  
                    </div>
                </a>
            <?php } ?>
        </div>
        <?php
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Findus_Elementor_Listings_City_Banner );
} else {
    Elementor\Plugin::instance()->widgets_manager->register( new Findus_Elementor_Listings_City_Banner );
}