<?php
global $post;
$photos = findus_get_listing_gallery( $post->ID );
if ( ! empty( $photos ) ) :
	$slideshow_key = findus_random_key();
	?>
	<div id="listing-photos" class="photos-wrapper widget">
		<h3 class="widget-title"><?php esc_html_e( 'Photos', 'findus' ); ?></h3>
		
		<div class="listing-photos box-inner">
			<div class="slick-carousel slick-carousel-gallery-main" data-carousel="slick" data-items="1" data-smallmedium="1" data-extrasmall="1" data-margin="0" data-verysmall="1" data-pagination="false" data-nav="true" data-slickparent="true">
				<?php $i = 1; foreach ($photos as $thumb_id): ?>
					<?php
					$image_full = wp_get_attachment_image_src( $thumb_id, 'full' );
					$image_full_url = isset($image_full[0]) ? $image_full[0] : '';
					if ($image_full_url) {
					?>	<div class="item">
							<a class="photo-gallery-item" href="<?php echo esc_url($image_full_url); ?>" data-elementor-lightbox-slideshow="<?php echo esc_attr($slideshow_key); ?>">
								<?php echo trim(findus_get_attachment_thumbnail($thumb_id, '710x400')); ?>
							</a>
						</div>
					<?php } ?>
				<?php $i++; endforeach; ?>
			</div>

			<div class="slick-carousel slick-carousel-gallery-thumbnail" data-carousel="slick" data-items="7" data-smallmedium="5" data-extrasmall="5" data-smallest='5' data-pagination="false" data-nav="false" data-asnavfor=".slick-carousel-gallery-main" data-slidestoscroll="1" data-focusonselect="true">
	            <?php foreach ($photos as $thumb_id): ?>
	            	<div class="item">
						<?php
						if ( !empty($thumb_id) ) {
						?>
							<?php echo trim(findus_get_attachment_thumbnail($thumb_id, 'findus-thumb-small')); ?>
						<?php } ?>
					</div>
				<?php endforeach; ?>
	        </div>
		</div>
	</div>
<?php endif; ?>