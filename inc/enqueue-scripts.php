<?php
/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'pc_asset_path' ) ) :
	function pc_asset_path( $filename ) {
		$filename_split = explode( '.', $filename );
		$dir = end( $filename_split );
		$manifest_path = dirname( dirname( __FILE__ ) ) . '/dist/assets/' . $dir . '/rev-manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = [];
		}

		if ( array_key_exists( $filename, $manifest ) ) {
			return $manifest[ $filename ];
		}

		return $filename;
	}
endif;

add_action( 'wp_enqueue_scripts', function () {

	// register g-blocks styles
	$styles = [
		'intro-section'             => 'intro-section.css',
		'experience-section'        => 'experience-section.css',
		'cta-section'               => 'cta-section.css',
		'special-events-section'    => 'special-events-section.css',
		'league-section'            => 'league-section.css',
		'featured-on-section'       => 'featured-on-section.css',
		'info-section'              => 'info-section.css',
		'quote-section'             => 'quote-section.css',
		'brewery-selection-section' => 'brewery-selection-section.css',
		'local-events-section'      => 'local-events-section.css',
		'local-league-section'      => 'local-league-section.css',
		'gift-posts-section'        => 'gift-posts-section.css',
		'seo-section'               => 'seo-section.css',
		'keywords-slider-section'   => 'keywords-slider-section.css',
		'event-planning-section'    => 'event-planning-section.css',
		'safety-section'            => 'safety-section.css',
		'intro-booking-section'     => 'intro-booking-section.css',
		'how-to-play-section'       => 'how-to-play-section.css',
		'join-league-section'       => 'join-league-section.css',
		'schedule-section'          => 'schedule-section.css',
		'newsletter-section'        => 'newsletter-section.css',
	];

	foreach ( $styles as $handle => $filename ) {
		$cssUrl = get_stylesheet_directory() . '/dist/assets/css/' . pc_asset_path( $filename );
		$cssTime = filemtime( $cssUrl );
		wp_register_style( $handle, get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( $filename ), null, $cssTime );
	}

	$cssUrlApp = get_stylesheet_directory() . '/dist/assets/css/' . pc_asset_path( 'app.css' );
	$cssTimeApp = filemtime( $cssUrlApp );
	wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'app.css' ), array(), $cssTimeApp );

	// Deregister the jquery version bundled with WordPress.
	wp_deregister_script( 'jquery' );

	// Deregister the jquery-migrate version bundled with WordPress.
	wp_deregister_script( 'jquery-migrate' );

	// register g-blocks scripts
	$scripts = [
		'tabs'                   => 'tabs.js',
		'intro-section'          => 'intro-section.js',
		'featured-on-section'    => 'featured-on-section.js',
		'special-events-section' => 'special-events-section.js',
		'quote-section'          => 'quote-section.js',
	];

	foreach ( $scripts as $handle => $filename ) {
		$jsUrl = get_stylesheet_directory() . '/dist/assets/js/' . pc_asset_path( $filename );
		$jsTime = filemtime( $jsUrl );
		wp_register_script( $handle, get_stylesheet_directory_uri() . '/dist/assets/js/' . pc_asset_path( $filename ), null, $jsTime, true );
	}


	$jsUrlApp = get_stylesheet_directory() . '/dist/assets/css/' . pc_asset_path( 'app.css' );
	$jsTimeApp = filemtime( $jsUrlApp );
	wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/dist/assets/js/' . pc_asset_path( 'app.js' ), array(), $jsTimeApp );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );

// Setup admin style
add_action( 'admin_enqueue_scripts', function () {
	wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'admin.css' ), '', null );
} );
