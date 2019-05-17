<?php
/**
 * SVG icons related functions
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */

/**
 * Gets the SVG code for a given icon.
 */
function twentynineteen_get_icon_svg( $icon, $size = 24 ) {
	return TwentyNineteen_SVG_Icons::get_svg( 'ui', $icon, $size );
}