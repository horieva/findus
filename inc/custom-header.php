<?php
/**
 * Custom Header functionality for Findus
 *
 * @package WordPress
 * @subpackage Findus
 * @since Findus 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses findus_header_style()
 */
function findus_custom_header_setup() {
	$color_scheme        = findus_get_color_scheme();
	$default_text_color  = trim( $color_scheme[4], '#' );

	/**
	 * Filter Findus custom-header support arguments.
	 *
	 * @since Findus 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default_text_color     Default color of the header text.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 954.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 1300.
	 *     @type string $wp-head-callback       Callback function used to styles the header image and text
	 *                                          displayed on the blog.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'findus_custom_header_args', array(
		'default-text-color'     => $default_text_color,
		'width'                  => 954,
		'height'                 => 1300,
		'wp-head-callback'       => 'findus_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'findus_custom_header_setup' );

/**
 * Convert HEX to RGB.
 *
 * @since Findus 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function findus_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) == 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) == 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

if ( ! function_exists( 'findus_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @since Findus 1.0
 *
 * @see findus_custom_header_setup()
 */
function findus_header_style() {
	return '';
}
endif; // findus_header_style

