<?php
/**
 * The default template for displaying search form. 
 * HTML Below will be returned by get_search_form() method.
 * http://codex.wordpress.org/Function_Reference/get_search_form
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>


<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
  <input type="text" value="" name="s" id="s" />
  <input type="submit" id="searchsubmit" value="Search" />
</form>