<?php
/**
 * The starting tags of any HTML template in this theme.
 * Must be used with html-closing-tags.php.
 * See them in live action at index.php at the root level.
 * 
 * Yes, I know having HTML tags spanning across multiple files is bad,
 * but this enables us to have multiple "base" PHP templates at the root level.
 * This way, we can keep our folder structure of organizing templates,
 * while also reaping the benefit of WordPress template hierarchy at root level.
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since added by Vincent Zhang
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
	<?php get_template_part( 'templates/partials/head' ); ?>

	<body <?php body_class('mangatalk-theme'); ?>>
		<div id="page" class="site maxwidth">
		<?php get_template_part( 'templates/partials/header' ); ?>
			<div id="content">
				<section id="primary">
					<main id="main">