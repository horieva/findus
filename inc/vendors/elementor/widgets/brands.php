<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Findus_Elementor_Brands extends Widget_Base {

	public function get_name() {
        return 'apus_brands';
    }

	public function get_title() {
        return esc_html__( 'Apus Brands', 'findus' );
    }

	public function get_categories() {
        return [ 'findus-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'findus' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_title', [
                'label' => esc_html__( 'Title', 'findus' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Brand Title' , 'findus' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'img_src',
            [
                'name' => 'image',
                'label' => esc_html__( 'Brand Image', 'findus' ),
                'type' => Controls_Manager::MEDIA,
                'placeholder'   => esc_html__( 'Upload Brand Image', 'findus' ),
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'findus' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__( 'Enter your brand link here', 'findus' ),
            ]
        );

        $this->add_control(
            'brands',
            [
                'label' => esc_html__( 'Brands', 'findus' ),
                'type' => Controls_Manager::REPEATER,
                'placeholder' => esc_html__( 'Enter your brands here', 'findus' ),
                'fields' => $repeater->get_controls(),
            ]
        );
        
        $this->add_control(
            'layout',
            [
                'label' => esc_html__( 'Layout', 'findus' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'grid' => esc_html__('Grid', 'findus'),
                    'carousel' => esc_html__('Carousel', 'findus'),
                ),
                'default' => 'carousel'
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'findus' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'default' => esc_html__('Default', 'findus'),
                    'dark' => esc_html__('Dark', 'findus'),
                ),
                'default' => 'default'
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'findus' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'number',
                'placeholder' => esc_html__( 'Enter your column number here', 'findus' ),
                'default' => 4
            ]
        );

   		$this->add_control(
            'el_class',
            [
                'label'         => esc_html__( 'Extra class name', 'findus' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'findus' ),
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        if ( !empty($brands) ) {
            if ( empty($columns) ) {
                $columns = 4;
            }
            $bcol = 12/$columns;

            ?>
            <div class="widget-brand <?php echo esc_attr($el_class.' '.$layout.' '.$style); ?>">
                <?php if ( $layout == 'grid' ) { ?>
                    <div class="row">
                        <?php foreach ($brands as $brand) { ?>
                            <?php
                                $img_src = ( isset( $brand['img_src']['id'] ) && $brand['img_src']['id'] != 0 ) ? wp_get_attachment_url( $brand['img_src']['id'] ) : '';
                                if ( $img_src ) {
                            ?>
                                    <div class="brand-item col-md-<?php echo esc_attr($bcol); ?>">
                                        <?php if ( !empty($brand['link']) ) { ?>
                                            <a href="<?php echo esc_url($brand['link']); ?>" <?php echo (!empty($brand['title']) ? 'title="'.esc_attr($brand['title']).'"' : ''); ?>>
                                        <?php } ?>
                                            <img src="<?php echo esc_url($img_src); ?>" <?php echo (!empty($brand['title']) ? 'alt="'.esc_attr($brand['title']).'"' : 'alt=""'); ?>>
                                        <?php if ( !empty($brand['link']) ) { ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class="slick-carousel <?php echo esc_attr( count($brands) <= $columns ) ? 'hidden-dots':''; ?>" data-items="<?php echo esc_attr($columns); ?>" <?php if($columns>= 6) echo esc_attr('data-smalldesktop=6'); ?> data-medium="4" data-smallmedium="4" data-extrasmall="2" data-smallest="2" data-pagination="true" data-nav="false">
                        <?php foreach ($brands as $brand) { ?>
                            <?php
                                $img_src = ( isset( $brand['img_src']['id'] ) && $brand['img_src']['id'] != 0 ) ? wp_get_attachment_url( $brand['img_src']['id'] ) : '';
                                if ( $img_src ) {
                            ?>  
                                    <div class="brand-item">
                                        <?php if ( !empty($brand['link']) ) { ?>
                                            <a href="<?php echo esc_url($brand['link']); ?>" <?php echo (!empty($brand['title']) ? 'title="'.esc_attr($brand['title']).'"' : ''); ?>>
                                        <?php } ?>
                                            <img src="<?php echo esc_url($img_src); ?>" <?php echo (!empty($brand['title']) ? 'alt="'.esc_attr($brand['title']).'"' : 'alt=""'); ?>>
                                        <?php if ( !empty($brand['link']) ) { ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <?php
        }
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Findus_Elementor_Brands );
} else {
    Plugin::instance()->widgets_manager->register( new Findus_Elementor_Brands );
}