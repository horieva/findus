<?php

get_header();

?>
	<div id="primary" class="content-area">
		<div class="container top-content hidden-lg hidden-md">
			<a href="javascript:void(0)" class="mobile-sidebar-btn"> <i class="fas fa-bars"></i> <?php echo esc_html__('Show Sidebar', 'findus'); ?></a>
			<div class="mobile-sidebar-panel-overlay"></div>
		</div>
		
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				get_template_part( 'job_manager/single/layouts/v1' );
			?>
			
		<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();