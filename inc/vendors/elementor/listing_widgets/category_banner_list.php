<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Findus_Elementor_Listings_Category_List_Banner extends Elementor\Widget_Base {

	public function get_name() {
        return 'apus_listings_category_list_banner';
    }

	public function get_title() {
        return esc_html__( 'Apus Listings Category List Banner', 'findus' );
    }
    
	public function get_categories() {
        return [ 'findus-listings-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Listings', 'findus' ),
                'tab' => Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'findus' ),
                'type' => Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter your Title here', 'findus' ),
            ]
        );

        $repeater->add_control(
            'slug',
            [
                'label' => esc_html__( 'Category Slug', 'findus' ),
                'type' => Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter your Type Slug here', 'findus' ),
            ]
        );

        $repeater->add_control(
            'img_src',
            [
                'name' => 'image',
                'label' => esc_html__( 'Category Image', 'findus' ),
                'type' => Elementor\Controls_Manager::MEDIA,
                'placeholder'   => esc_html__( 'Upload Image Here', 'findus' ),
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'findus' ),
                'type' => Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'category_icon',
                'label_block' => true,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'fa-brands',
                ],
                'recommended' => [
                    'fa-brands' => [
                        'android',
                        'apple',
                        'behance',
                        'bitbucket',
                        'codepen',
                        'delicious',
                        'deviantart',
                        'digg',
                        'dribbble',
                        'elementor',
                        'facebook',
                        'flickr',
                        'foursquare',
                        'free-code-camp',
                        'github',
                        'gitlab',
                        'globe',
                        'google-plus',
                        'houzz',
                        'instagram',
                        'jsfiddle',
                        'linkedin',
                        'medium',
                        'meetup',
                        'mixcloud',
                        'odnoklassniki',
                        'pinterest',
                        'product-hunt',
                        'reddit',
                        'shopping-cart',
                        'skype',
                        'slideshare',
                        'snapchat',
                        'soundcloud',
                        'spotify',
                        'stack-overflow',
                        'steam',
                        'stumbleupon',
                        'telegram',
                        'thumb-tack',
                        'tripadvisor',
                        'tumblr',
                        'twitch',
                        'twitter',
                        'viber',
                        'vimeo',
                        'vk',
                        'weibo',
                        'weixin',
                        'whatsapp',
                        'wordpress',
                        'xing',
                        'yelp',
                        'youtube',
                        '500px',
                    ],
                    'fa-solid' => [
                        'envelope',
                        'link',
                        'rss',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'bg_color',
            [
                'label' => esc_html__( 'Icon Background Color', 'findus' ),
                'type' => Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'url',
            [
                'label' => esc_html__( 'Custom URL', 'findus' ),
                'type' => Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter your custom category url here', 'findus' ),
            ]
        );

        
        $this->add_control(
            'categories',
            [
                'label' => esc_html__( 'Categories Banner', 'findus' ),
                'type' => Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->add_group_control(
            Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->add_control(
            'show_nb_listings',
            [
                'label' => esc_html__( 'Show Number Listings', 'findus' ),
                'type' => Elementor\Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => esc_html__( 'Hide', 'findus' ),
                'label_off' => esc_html__( 'Show', 'findus' ),
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'findus' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'style1' => esc_html__('Style 1', 'findus'),
                    'style2' => esc_html__('Style 2', 'findus'),
                    'style3' => esc_html__('Style 3', 'findus'),
                ),
                'default' => 'style1'
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'findus' ),
                'type' => Elementor\Controls_Manager::TEXT,
                'input_type' => 'number',
                'default' => '3'
            ]
        );

        $this->add_control(
            'show_nav',
            [
                'label' => esc_html__( 'Show Nav', 'findus' ),
                'type' => Elementor\Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => esc_html__( 'Hide', 'findus' ),
                'label_off' => esc_html__( 'Show', 'findus' ),
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label' => esc_html__( 'Show Pagination', 'findus' ),
                'type' => Elementor\Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => esc_html__( 'Hide', 'findus' ),
                'label_off' => esc_html__( 'Show', 'findus' ),
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'         => esc_html__( 'Autoplay', 'findus' ),
                'type'          => Elementor\Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Yes', 'findus' ),
                'label_off'     => esc_html__( 'No', 'findus' ),
                'return_value'  => true,
                'default'       => true,
            ]
        );

        $this->add_control(
            'infinite_loop',
            [
                'label'         => esc_html__( 'Infinite Loop', 'findus' ),
                'type'          => Elementor\Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Yes', 'findus' ),
                'label_off'     => esc_html__( 'No', 'findus' ),
                'return_value'  => true,
                'default'       => true,
            ]
        );

   		$this->add_control(
            'el_class',
            [
                'label'         => esc_html__( 'Extra class name', 'findus' ),
                'type'          => Elementor\Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'findus' ),
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        if ( empty($categories) ) {
            return;
        }
        $migration_allowed = Elementor\Icons_Manager::is_migration_allowed();

        if ( $image_size == 'custom' ) {
            if ( $image_custom_dimension['width'] && $image_custom_dimension['height'] ) {
                $thumbsize = $image_custom_dimension['width'].'x'.$image_custom_dimension['height'];
            } else {
                $thumbsize = 'full';
            }
        } else {
            $thumbsize = $image_size;
        }
        ?>
        <div class="widget-listing-category-list-banner <?php echo esc_attr($style.' '.$el_class); ?>">
            <div class="slick-carousel <?php echo esc_attr($columns < count($categories)?'':'hidden-dots'); ?>" data-items="<?php echo esc_attr($columns); ?>" data-medium="2" data-smallmedium="1" data-extrasmall="1" data-pagination="<?php echo esc_attr($show_pagination ? 'true' : 'false'); ?>" data-nav="<?php echo esc_attr($show_nav ? 'true' : 'false'); ?>" data-autoplay="<?php echo esc_attr($autoplay ? 'true' : 'false'); ?>" data-loop="<?php echo esc_attr($infinite_loop ? 'true' : 'false'); ?>">

                <?php foreach ($categories as $category):
                    if ( empty($category['slug']) ) {
                        continue;
                    }
                    $term = get_term_by( 'slug', $category['slug'], 'job_listing_category' );
                    if ($term) {
                        $icon_style = '';
                        if ( !empty($category['bg_color']) ) {
                            $icon_style = 'style="background-color:'.$category['bg_color'].';"';
                        }
                        $url_cat = get_term_link( $term, 'job_listing_category' );
                        if ( !empty($category['url']) ) {
                            $url_cat = $category['url'];
                        }
                        $title = !empty($category['title']) ? $category['title'] : '';
                        if ( empty($title) ) {
                            $title = $term->name;
                        }
                        ?>
                        <a href="<?php echo esc_url($url_cat); ?>" >
                            <div class="category-banner-list <?php echo esc_attr($style); ?>">
                                <?php if ( !empty($category['img_src']['id']) ) { ?>
                                    <div class="banner-image">
                                        <?php echo findus_get_attachment_thumbnail($category['img_src']['id'], $thumbsize); ?>
                                    </div>
                                <?php } ?>

                                <div class="inner">
                                    <div class="left-inner">
                                        <?php 

                                            $migrated = isset( $category['__fa4_migrated']['icon'] );
                                            $is_new = empty( $category['category_icon'] ) && $migration_allowed;
                                            $social = '';

                                            // add old default
                                            if ( empty( $category['category_icon'] ) && ! $migration_allowed ) {
                                                $category['category_icon'] = isset( $fallback_defaults[ $index ] ) ? $fallback_defaults[ $index ] : 'fa fa-wordpress';
                                            }

                                            if ( ! empty( $category['category_icon'] ) ) {
                                                $social = str_replace( 'fa fa-', '', $category['category_icon'] );
                                            }

                                            if ( ( $is_new || $migrated ) && 'svg' !== $category['icon']['library'] ) {
                                                $social = explode( ' ', $category['icon']['value'], 2 );
                                                if ( empty( $social[1] ) ) {
                                                    $social = '';
                                                } else {
                                                    $social = str_replace( 'fa-', '', $social[1] );
                                                }
                                            }
                                            if ( 'svg' === $category['icon']['library'] ) {
                                                $social = '';
                                            }

                                        ?>
                                        <?php if ( ! empty( $social ) ) { ?>
                                            <div class="category-icon" <?php echo trim($icon_style); ?>>
                                                <?php
                                                    if ( $is_new || $migrated ) {
                                                        Elementor\Icons_Manager::render_icon( $category['icon'] );
                                                    } else { ?>
                                                        <i class="<?php echo esc_attr( $category['category_icon'] ); ?>"></i>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>

                                        <?php if ( !empty($title) ) { ?>
                                            <h4 class="title">
                                                <?php echo trim($title); ?>
                                            </h4>
                                        <?php } ?>

                                        <?php if ( $show_nb_listings ) {
                                                $args = array(
                                                    'tax_query' => array(array(
                                                        'taxonomy'      => 'job_listing_category',
                                                        'field'         => 'slug',
                                                        'terms'         => $term->slug,
                                                        'operator'      => 'IN'
                                                    )),
                                                    'posts_per_page' => 1,
                                                    'post_status' => 'publish',
                                                    'fields' => 'ids'
                                                );
                                                $query = new WP_Query( $args );
                                                $count = $query->found_posts;
                                        ?>
                                            <span class="number"><?php echo sprintf(_n('%d Listing', '%d Listings', $count, 'findus'), $count); ?></span>
                                        <?php } ?>
                                    </div>
                                    <div class="bottom-link">
                                        <span class="btn-forwarded"><?php echo esc_html_e('Browse', 'findus'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}

if ( version_compare(ELEMENTOR_VERSION, '3.5.0', '<') ) {
    Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Findus_Elementor_Listings_Category_List_Banner );
} else {
    Elementor\Plugin::instance()->widgets_manager->register( new Findus_Elementor_Listings_Category_List_Banner );
}