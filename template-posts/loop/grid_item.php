<?php 
    $thumbsize = !isset($thumbsize) ? findus_get_config( 'blog_item_thumbsize', 'full' ) : $thumbsize;
    $thumb = findus_display_post_thumb($thumbsize);
?>
<article <?php post_class('post post-layout post-grid-v1'); ?>>
    <?php if($thumb) {?>
        <div class="top-image">
            <?php
                echo trim($thumb);
            ?>
         </div>
    <?php } ?>
    <div class="inner-bottom">
        <div class="top-info">
            <div class="avatar-wrapper <?php echo esc_attr( (!has_post_thumbnail())?'no-image':'' ); ?>">
                <?php echo get_avatar( get_the_author_meta( 'ID' ),70 ); ?>
            </div>
            <div class="name-author">
                <span class="subfix"><?php echo esc_html__('By','findus') ?></span> <a href="<?php the_permalink(); ?>"><?php echo get_the_author(); ?></a>
            </div>
        </div>
        <div class="top-info-post-gird flex-middle justify-content-center">
            <div class="date">
                <i class="far fa-calendar-check"></i><?php the_time( get_option('date_format', 'd M, Y') ); ?>
            </div>
            <div class="category">
                <i class="far fa-folder-open"></i><?php findus_post_categories_first($post); ?>
            </div>
        </div>
        <?php if (get_the_title()) { ?>
            <h4 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
        <?php } ?>
        <div class="description hidden-xs"><?php echo findus_substring( get_the_excerpt(),12, '' ); ?></div>
        <a class="btn-readmore hidden-xs" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'findus'); ?><i class="fas fa-angle-right"></i></a>
    </div>
</article>