<?php
/**
 * Theme shortcodes
 */

/**
 * shortcode to make a pull quote from some text/content.
 *
 * @param      $atts
 * @param null $content
 * @return string
 */

function start_pullquote_shortcode( $atts, $content=null ) {
	extract(
		shortcode_atts(
			array(
				"align" => 'right'
			), $atts)
	);

	if ( $align == 'left' ) {
		$position = 'left';
	} elseif ( $align == 'right' ) {
		$position = 'right';
	} else {
		$position = 'right';
	}

	return '<span class="pullquote ' . $position . '">' . $content . '</span>';

}
add_shortcode( 'pullquote', 'start_pullquote_shortcode' );

/**
 * shortcode to place a container around a group of images so they can be styled nicely together instead of having weird floating issues
 *
 * @param      $atts
 * @param null $content
 * @return string
 */
function start_group_photos_shortcode( $atts, $content = null ) {

	return '<div class="group-photos"><div class="inner-group">' . do_shortcode( $content ) . '</div></div>';

}
add_shortcode( 'group-photos', 'start_group_photos_shortcode' );