<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Findus_Elementor_Listings_Category_Banner extends Elementor\Widget_Base {

	public function get_name() {
        return 'apus_listings_category_banner';
    }

	public function get_title() {
        return esc_html__( 'Apus Listings Category Banner', 'findus' );
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
                'label' => esc_html__( 'Category Slug', 'findus' ),
                'type' => Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter your Category Slug here', 'findus' ),
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
            'selected_icon',
            [
                'label' => esc_html__( 'Icon', 'findus' ),
                'type' => Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'style_box',
            [
                'label' => esc_html__( 'Style', 'findus' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('Style 1', 'findus'),
                    'style2' => esc_html__('Style 2', 'findus'),
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
            'section_title_style',
            [
                'label' => esc_html__( 'Style', 'findus' ),
                'tab' => Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'findus' ),
                'type' => Elementor\Controls_Manager::COLOR,
                
                'selectors' => [
                    '{{WRAPPER}} .category-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'findus' ),
                'type' => Elementor\Controls_Manager::COLOR,
                
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
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
        <div class="widget-listing-category-banner <?php echo esc_attr($el_class); ?>">
    
            <?php
            $term = get_term_by( 'slug', $slug, 'job_listing_category' );
            if ($term) {
            ?>
                <a href="<?php echo esc_url(get_term_link( $term, 'job_listing_category' )); ?>" >
                    <div class="category-banner-inner <?php echo esc_attr($style_box); ?>">
                        <div class="inner">
                            <?php 
                                if ( ! empty( $settings['icon'] ) ) {
                                    $this->add_render_attribute( 'icon', 'class', $settings['icon'] );
                                    $this->add_render_attribute( 'icon', 'aria-hidden', 'true' );
                                }
                                $migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
                                $is_new = empty( $settings['icon'] ) && Elementor\Icons_Manager::is_migration_allowed();
                            ?>
                            <?php if ( $is_new || $migrated ) : ?>
                                <div class="category-icon">
                                    <?php  Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </div>
                            <?php  else : ?>
                                <div class="category-icon">
                                    <i <?php echo trim($this->get_render_attribute_string( 'icon' )); ?>></i>
                                </div>
                            <?php endif; ?>
                            <?php if ( !empty($title) ) { ?>
                                <h4 class="title">
                                    <?php echo trim($title); ?>
                                </h4>
                            <?php } ?>

                            <?php if ( $show_nb_listings ) {
                                    $args = array(
                                        'tax_query' => array(array(
                                            'taxonomy'      => 'job_listing_category',
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
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Findus_Elementor_Listings_Category_Banner );
} else {
    Elementor\Plugin::instance()->widgets_manager->register( new Findus_Elementor_Listings_Category_Banner );
}