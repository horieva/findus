<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Findus_Elementor_Listings_My_Follow extends Widget_Base {

	public function get_name() {
        return 'apus_listings_my_follow';
    }

	public function get_title() {
        return esc_html__( 'Apus My Follower/Following', 'findus' );
    }
    
	public function get_categories() {
        return [ 'findus-listings-elements' ];
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
            'display_type',
            [
                'label' => esc_html__( 'Display Type', 'findus' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'followers' => esc_html__("Followers", 'findus'),
                    'following' => esc_html__("Following", 'findus'),
                ),
                'default' => 'followers'
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

        ?>
        <div class="widget widget-my-follow box-user <?php echo esc_attr($el_class); ?>">
            <h2 class="user-name">
                <?php if ( $display_type == 'followers' ) { ?>
                    <?php esc_html_e( 'Follower', 'findus' ); ?>
                <?php }else{ ?>
                    <?php esc_html_e( 'Following', 'findus' ); ?>
                <?php } ?>
            </h2>
            <?php
            if ( ! is_user_logged_in() ) {
                ?>
                <div class="clearfix">
                    <div class="text-warning"><?php  esc_html_e( 'Please sign in before accessing this page.', 'findus' ); ?></div>
                </div>  
                <?php
            } else {
                $current_user_id = get_current_user_id();
                if ( $display_type == 'followers' ) {
                    $user_ids = get_user_meta( $current_user_id, '_apus_followers', true );
                } else {
                    $user_ids = get_user_meta( $current_user_id, '_apus_following', true );
                }
                get_job_manager_template( 'job_manager/profile/users.php', array('user_ids' => $user_ids) );
            }
            ?>
        </div>
        <?php

    }

}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Plugin::instance()->widgets_manager->register_widget_type( new Findus_Elementor_Listings_My_Follow );
} else {
    Plugin::instance()->widgets_manager->register( new Findus_Elementor_Listings_My_Follow );
}