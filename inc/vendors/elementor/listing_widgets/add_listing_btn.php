<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Findus_Elementor_Listings_Add_Listing_Button extends Elementor\Widget_Base {

	public function get_name() {
        return 'apus_listings_add_listing_btn';
    }

	public function get_title() {
        return esc_html__( 'Apus Add Listing Button', 'findus' );
    }
    
	public function get_categories() {
        return [ 'findus-header-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Settings', 'findus' ),
                'tab' => Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'findus' ),
                'type' => Elementor\Controls_Manager::TEXT,
                'default' => 'Add Listing',
            ]
        );

        $this->add_control(
            'show_add_listing',
            [
                'label' => esc_html__( 'Show Add Listing Button', 'findus' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('No', 'findus'),
                    'always' => esc_html__('Always', 'findus'),
                    'show_logedin' => esc_html__('Loged in', 'findus'),
                ],
                'default' => 'always',
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
        
        if ( $show_add_listing == 'always' || ($show_add_listing == 'show_logedin' && is_user_logged_in()) ) {
            $page_id = get_option( 'job_manager_submit_job_form_page_id' );
            $page_id = apply_filters( 'wpjm_page_id', $page_id );
        ?>
            <div class="add-listing <?php echo esc_attr($el_class); ?>">
                <a class="btn btn-theme" href="<?php echo esc_url( get_permalink($page_id) );?>"><i class="ti-plus"></i><?php echo wp_kses_post($title); ?></a>   
            </div>
        <?php }

    }

}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Findus_Elementor_Listings_Add_Listing_Button );
} else {
    Elementor\Plugin::instance()->widgets_manager->register( new Findus_Elementor_Listings_Add_Listing_Button );
}