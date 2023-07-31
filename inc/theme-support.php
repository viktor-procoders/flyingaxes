<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if (!function_exists('flyingaxes_theme_support')) :
	function flyingaxes_theme_support()
	{
		// Add language support
//		load_theme_textdomain('flyingaxes', get_template_directory() . '/languages');

		// Switch default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Add menu support
		add_theme_support('menus');

		// Let WordPress manage the document title
		add_theme_support('title-tag');

		// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
		add_theme_support('post-thumbnails');

		// RSS thingy
		add_theme_support('automatic-feed-links');

		// Add post formats support: http://codex.wordpress.org/Post_Formats
		add_theme_support('post-formats', ['image', 'video']);

		// Additional theme support for woocommerce 3.0.+
//		add_theme_support( 'wc-product-gallery-zoom' );
//		add_theme_support( 'wc-product-gallery-lightbox' );
//		add_theme_support( 'wc-product-gallery-slider' );

		$defaults = array(
			'height' => 50,
			'width' => 50,
			'flex-height' => true,
			'flex-width' => true
		);
		add_theme_support('custom-logo', $defaults);

//		add_editor_style( 'dist/assets/css/' . flyingaxes_asset_path( 'app.css' ) );
	}

	add_action('after_setup_theme', 'flyingaxes_theme_support');
endif;

if (!function_exists('flyingaxes_customizeer')) :
	/**
	 * Remove the additional CSS and Background image section from the Customizer.
	 * @param $wp_customize WP_Customize_Manager
	 */
	function flyingaxes_customizeer($wp_customize)
	{
		$wp_customize->remove_section('custom_css');
		$wp_customize->remove_section('background_image');
	}

	add_action('customize_register', 'flyingaxes_customizeer', 15);
endif;

add_action( 'upload_mimes', function ( $file_types ) {
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';

	return array_merge( $file_types, $new_filetypes );
} );
