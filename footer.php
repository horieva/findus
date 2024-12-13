<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Findus
 * @since Findus 1.0
 */
$footer = apply_filters( 'findus_get_footer_layout', 'default' );
?>

	</div><!-- .site-content -->

	<footer id="apus-footer" class="apus-footer" role="contentinfo">
		<?php if ( !empty($footer) ): ?>
			<?php findus_display_footer_builder($footer); ?>
		<?php else: ?>
			
			<div class="apus-copyright">
				<div class="container">
					<div class="copyright-content">
						<div class="text-copyright text-center">
							<?php
											
								$allowed_html_array = array( 'a' => array('href' => array()) );
								echo wp_kses(sprintf(__('&copy; %s - Findus. All Rights Reserved. <br/> Powered by <a href="//apusthemes.com">ApusTheme</a>', 'findus'), date("Y")), $allowed_html_array);
							?>

						</div>
						
					</div>
				</div>
			</div>
		<?php endif; ?>
		
	</footer><!-- .site-footer -->

	<?php if ( findus_get_config('back_to_top') ) { ?>
		<a href="#" id="back-to-top">
			<i class="fas fa-long-arrow-alt-up"></i>
		</a>
	<?php } ?>
</div><!-- .site -->
<?php wp_footer(); ?>
</body>
</html>