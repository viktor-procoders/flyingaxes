<?php
/**
 * Registers a new post type
 */

add_action( 'init', function () {

	$labels = array(
		'name'               => __( 'Events', 'text-domain' ),
		'singular_name'      => __( 'Event', 'text-domain' ),
		'add_new'            => _x( 'Add New Event', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Event', 'text-domain' ),
		'edit_item'          => __( 'Edit Event', 'text-domain' ),
		'new_item'           => __( 'New Event', 'text-domain' ),
		'view_item'          => __( 'View Event', 'text-domain' ),
		'search_items'       => __( 'Search Events', 'text-domain' ),
		'not_found'          => __( 'No Events found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Events found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Event:', 'text-domain' ),
		'menu_name'          => __( 'Events', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-format-gallery',
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => false,
		'can_export'          => true,
		'capability_type'     => 'post',
		'rewrite'             => array( 'with_front' => false ),
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'revisions'
		)
	);

	register_post_type( 'events', $args );

	register_taxonomy(
		'category',
		'events',
		array(
			'label'              => __( 'Categories' ),
//			'rewrite'            => array( 'slug' => 'events' ),
			'hierarchical'       => true,
			'show_in_rest'       => true,
			'show_admin_column'  => true,
			'show_in_nav_menus'  => false,
			'publicly_queryable' => true,
			'public'             => true,
			'show_in_quick_edit' => true,
		)
	);
} );
