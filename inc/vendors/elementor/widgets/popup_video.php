<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Findus_Elementor_Popup_Video extends Widget_Base {

	public function get_name() {
        return 'apus_popup_video';
    }

	public function get_title() {
        return esc_html__( 'Apus Popup Video', 'findus' );
    }

	public function get_icon() {
        return 'eicon-youtube';
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

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'findus' ),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__( 'Content', 'findus' ),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'video_link',
            [
                'label' => esc_html__( 'Youtube Video Link', 'findus' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'url',
            ]
        );

        $this->add_control(
            'img_src',
            [
                'name' => 'image',
                'label' => esc_html__( 'Background Image', 'findus' ),
                'type' => Controls_Manager::MEDIA,
                'placeholder'   => esc_html__( 'Upload Background Image', 'findus' ),
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'findus' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('Default', 'findus'),
                    'st_center' => esc_html__('Center', 'findus'),
                ),
                'default' => ''
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


        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__( 'Tyles', 'findus' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'findus' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .title-video' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Title Typography', 'findus' ),
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .title-video',
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Description Color', 'findus' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Description Typography', 'findus' ),
                'name' => 'desc_typography',
                'selector' => '{{WRAPPER}} .description',
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        ?>
        <div class="widget-video <?php echo esc_attr($el_class.' '.$style);?>">
            <div class="video-wrapper-inner">
                <?php
                if ( !empty($img_src['id']) ) {
                ?>
                    <?php echo findus_get_attachment_thumbnail($img_src['id'], 'full'); ?>
                <?php } ?>
                <a class="popup-video clearfix" href="<?php echo esc_url($video_link); ?>">
                    <span class="popup-video-inner">
                        <i class="fas fa-play" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
            <div class="video-content">
                <?php if ( !empty($title) ) { ?>
                    <h2 class="title-video">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php } ?>
                <?php if ( !empty($content) ) { ?>
                    <div class="description"><?php echo trim($content); ?></div>
                <?php } ?>
            </div>
        </div>
        <?php
    }

}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Findus_Elementor_Popup_Video );
} else {
    Plugin::instance()->widgets_manager->register( new Findus_Elementor_Popup_Video );
}