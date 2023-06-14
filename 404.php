<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>
	<!-- BEGIN of 404 page -->
	<div class="row columns text-center not-found">
		<h1><?php _e('404: Page Not Found', 'flyingaxes'); ?></h1>
		<h3><?php _e('Keep on looking...', 'flyingaxes'); ?></h3>
		<p><?php printf(__('Double check the URL or head back to the <a class="label" href="%1s">HOMEPAGE</a>', 'flyingaxes'), get_bloginfo('url')); ?></p>
	</div>
	<!-- END of 404 page -->
<?php get_footer(); ?>
