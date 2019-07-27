<?php
/**
 * This is the code that runs right before the end of body.
 * For example, put your third-party tracking scripts here.
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<script>
// polyfills
if (!document.body.classList) {
	document.write('<script src="https://cdn.jsdelivr.net/npm/dom4@2.1.5/build/dom4.js"><\/script>');
}
</script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/app.js' ?>">
</script>

<meta property="wb:webmaster" content="1f71be3e6043edc4" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-55145791-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-55145791-1');
</script>
