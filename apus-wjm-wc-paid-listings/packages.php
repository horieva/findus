<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( $packages ) : ?>
	<div class="widget widget-packages widget-subwoo">
		<div class="row">
			<?php foreach ( $packages as $key => $package ) :
				$product = wc_get_product( $package );
				if ( ! $product->is_type( array( 'listing_package' ) ) || ! $product->is_purchasable() ) {
					continue;
				}
				?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="subwoo-inner style2 <?php echo esc_attr($product->is_featured())?'highlight':''; ?>">
						<div class="header-sub">
							<div class="inner-sub">
								<?php
                                $icon_class = get_post_meta($product->get_id(), '_listings_icon_class', true);
                                if ( $icon_class ) {
                                    ?>
                                    <div class="icon-wrapper">
                                        <span class="<?php echo esc_attr($icon_class); ?>"></span>
                                    </div>
                                    <?php
                                }
                                ?>
                                
								<h3 class="title"><?php echo trim($product->get_title()); ?></h3>
							</div>
						</div>
						<div class="price">
							<?php echo (!empty($product->get_price())) ? $product->get_price_html() : esc_html__('Free', 'findus'); ?>
						</div>
						<div class="bottom-sub">
							<?php if( get_post_field('post_excerpt', $product->get_id()) ) { ?>
                            	<div class="short-des"><?php echo get_post_field('post_excerpt', $product->get_id()); ?></div>
                            <?php } ?>
							<div class="button-action">
								<button class="button btn btn-danger" type="submit" name="awjm_listing_package" value="<?php echo esc_attr($product->get_id()); ?>" id="package-<?php echo esc_attr($product->get_id()); ?>">
									<?php esc_html_e('Get Started', 'findus') ?>
								</button>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>