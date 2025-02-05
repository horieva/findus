<?php
$listing_is_claimed = get_post_meta( get_the_ID(), '_claimed', true );
if ( !$listing_is_claimed ) {
?>
	<div class="widget widget-claim">
		<h2 class="widget-title">
			<span><?php esc_html_e('Claim', 'findus'); ?></span>
		</h2>
		<div class="box-inner">
			<?php esc_html_e('Claim your free business page to have your changes published immediately.', 'findus'); ?>
			<a href="#claim-listing" class="claim-this-business" data-id="<?php the_ID(); ?>"><?php esc_html_e( 'Claim this business', 'findus' ); ?></a>
		</div>
	</div>
	<?php get_template_part( 'apus-findus/claim/claim-form'); ?>
<?php
}