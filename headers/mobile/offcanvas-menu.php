<div id="apus-mobile-menu" class="apus-offcanvas hidden-lg"> 
    <button type="button" class="btn btn-toggle-canvas" data-toggle="offcanvas">
        <i class="ti-close"></i>
    </button>
    <div class="apus-offcanvas-body">
        <div class="header-top-mobile clearfix">
            <?php if ( findus_is_wp_job_manager_activated() ): 
                $show = findus_get_config('show_add_listing', 'always');
                if ( $show == 'always' || ($show == 'show_logedin' && is_user_logged_in()) ) {
            ?>
                    <div class="add-listing">
                        <a class="btn btn-addlisting btn-theme" href="<?php echo esc_url( get_permalink(get_option( 'job_manager_submit_job_form_page_id' )) );?>"><i class="ti-plus" aria-hidden="true"></i> <?php esc_html_e('Add Listing', 'findus'); ?></a>   
                    </div>
                <?php } ?>
            <?php endif; ?>
        </div>
        <nav class="navbar navbar-offcanvas navbar-static" role="navigation">
            <?php
                $args = array(
                    'theme_location' => 'primary',
                    'container_class' => 'navbar-collapse navbar-offcanvas-collapse',
                    'menu_class' => 'nav navbar-nav',
                    'fallback_cb' => '',
                    'menu_id' => 'main-mobile-menu',
                    'walker' => new Findus_Mobile_Menu()
                );
                wp_nav_menu($args);
            ?>
        </nav>
    </div>
</div>
<div class="over-dark"></div>