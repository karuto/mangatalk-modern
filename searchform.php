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

<style type="text/css">
#searchform {
  display: inline;
}
#searchform input {
  font-size: 12px;
}
#searchform-text {
  border: 0px;
  border-bottom: 1px solid #d0d0d0;
}
#searchform-submit {
  background: transparent url(<?php echo get_template_directory_uri(); ?>/searchicon.png) no-repeat;
  background-position: center; 
  border: 0;
  height: 20px;
  padding: 0px;
  text-indent: -9999px;
  width: 20px;
}
</style>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
  <input id="searchform-text" type="text" value="" name="s" id="s" />
  <input id="searchform-submit" type="submit" id="searchsubmit" value="Search" />
</form>