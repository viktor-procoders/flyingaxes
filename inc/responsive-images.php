<?php
/**
 * Configure responsive images sizes
 */


add_image_size( '460_310', 460, 310, true );
add_image_size( '920_620', 920, 620, true );

add_image_size( '300_250', 460, 310, true );
add_image_size( '600_500', 920, 620, true );

add_image_size( '1430_270', 1430, 270, true );
add_image_size( '715_270', 715, 270, true );

add_image_size( '470_270', 470, 270, true );
add_image_size( '355_270', 355, 270, true );

add_filter( 'image_size_names_choose', function ( $sizes ) {
	return array_merge( $sizes, [
		'1430_270' => __( '1430_270' ),
		'715_270' => __( '715_270' ),
		'470_270' => __( '470_270' ),
		'355_270' => __( '355_270' ),
	] );
} );
