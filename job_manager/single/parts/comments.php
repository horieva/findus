<?php
global $post;
if ( findus_listing_review_enable($post->ID) ) : ?>
	
	<?php comments_template(); ?>
<?php endif; ?>