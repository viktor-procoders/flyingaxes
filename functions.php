<?php
/**
 * flyingaxes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package flyingaxes
 */

/** Helpers */
require_once( 'inc/helpers.php' );

/** Various clean up functions */
require_once( 'inc/cleanup.php' );

/** Enqueue scripts */
require_once( 'inc/enqueue-scripts.php' );

/** Functions Advanced Custom Fields.*/
require_once( 'inc/acf.php' );

/** Add theme support */
require_once( 'inc/theme-support.php' );

/** Configure responsive image sizes */
require_once( 'inc/responsive-images.php' );

/** Customization Admin */
require_once( 'inc/custom-admin.php' );

/** CPT */
require_once( 'inc/post-types.php' );

/** Navigation */
require_once( 'inc/navigation.php' );

/** Walker */
require_once( 'inc/TopBarWalker.php' );

/**Editor customizations*/
require_once( 'inc/tiny_mce.php' );


add_shortcode( 'image_separator', function () {

	ob_start(); ?>
	<div class="pc-target-decor">
		<?php
		if ( function_exists( 'starsDisplay' ) ) {
			starsDisplay( 2 );
		}
		?>
		<img loading="lazy" width="60" height="60"
		     src="<?php echo get_template_directory_uri() . '/dist/assets/images/target.png' ?>"
		     alt="target image">
		<?php
		if ( function_exists( 'starsDisplay' ) ) {
			starsDisplay( 2 );
		} ?>
	</div>
	<?php
	$output = ob_get_clean();

	return $output;
} );

