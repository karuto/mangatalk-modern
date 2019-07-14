<?php
/**
 * MangaTalk search form modifications.
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */

function mt_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="form form--mini" action="' . home_url( '/' ) . '" >
    <div class="form__content">
    <input class="form__input" placeholder="搜索关键字" type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input class="form__action" type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    </div>
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'mt_search_form' );
?>