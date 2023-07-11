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
	wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'app.css' ), array(), null );
	wp_enqueue_style('glightbox', 'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css', '', '1.0.0', 'all');

	// register g-blocks styles
	wp_register_style( 'intro-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'intro-section.css' ), null, null );
	wp_register_style( 'experience-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'experience-section.css' ), null, null );
	wp_register_style( 'cta-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'cta-section.css' ), null, null );
	wp_register_style( 'special-events-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'special-events-section.css' ), null, null );
	wp_register_style( 'league-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'league-section.css' ), null, null );
	wp_register_style( 'featured-on-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'featured-on-section.css' ), null, null );
	wp_register_style( 'info-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'info-section.css' ), null, null );
	wp_register_style( 'quote-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'quote-section.css' ), null, null );
	wp_register_style( 'brewery-selection-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'brewery-selection-section.css' ), null, null );
	wp_register_style( 'local-events-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'local-events-section.css' ), null, null );
	wp_register_style( 'local-league-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'local-league-section.css' ), null, null );
	wp_register_style( 'gift-posts-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'gift-posts-section.css' ), null, null );
	wp_register_style( 'seo-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'seo-section.css' ), null, null );
	wp_register_style( 'keywords-slider-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'keywords-slider-section.css' ), null, null );
	wp_register_style( 'event-planning-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'event-planning-section.css' ), null, null );
	wp_register_style( 'safety-section', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'safety-section.css' ), null, null );

	// Deregister the jquery version bundled with WordPress.
	wp_deregister_script( 'jquery' );

	// Deregister the jquery-migrate version bundled with WordPress.
	wp_deregister_script( 'jquery-migrate' );

	// register g-blocks scripts
	wp_register_script( 'tabs', get_stylesheet_directory_uri() . '/dist/assets/js/' . pc_asset_path( 'tabs.js' ), null, null );
	wp_register_script( 'intro-section', get_stylesheet_directory_uri() . '/dist/assets/js/' . pc_asset_path( 'intro-section.js' ), null, null );
	wp_register_script( 'featured-on-section', get_stylesheet_directory_uri() . '/dist/assets/js/' . pc_asset_path( 'featured-on-section.js' ), null, null );
	wp_register_script( 'special-events-section', get_stylesheet_directory_uri() . '/dist/assets/js/' . pc_asset_path( 'special-events-section.js' ), null, null );
	wp_register_script( 'quote-section', get_stylesheet_directory_uri() . '/dist/assets/js/' . pc_asset_path( 'quote-section.js' ), null, null );

	wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/dist/assets/js/' . pc_asset_path( 'app.js' ), null, null );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );

// Setup admin style
add_action( 'admin_enqueue_scripts', function () {
	wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'admin.css' ), '', null );
} );
