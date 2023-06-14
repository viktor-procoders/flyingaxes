<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

register_nav_menus(
	[
		'desktop_nav' => esc_html__( 'Desktop Nav', 'flyingaxes' ),
		'footer'      => esc_html__( 'Footer Menu', 'flyingaxes' ),
		'mobile_nav'  => esc_html__( 'Mobile nav', 'flyingaxes' ),
	]
);
