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

	wp_register_style( 'block-border-card', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'border-card.css' ), null, null );
	// Deregister the jquery version bundled with WordPress.
	wp_deregister_script( 'jquery' );
	// Deregister the jquery-migrate version bundled with WordPress.
	wp_deregister_script( 'jquery-migrate' );


	wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/dist/assets/js/' . pc_asset_path( 'app.js' ), null, null );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );

// Setup admin style
add_action( 'admin_enqueue_scripts', function () {
	wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() . '/dist/assets/css/' . pc_asset_path( 'admin.css' ), '', null );
} );
