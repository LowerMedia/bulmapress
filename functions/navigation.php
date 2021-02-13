<?php
/**
 * Navigation Functions
 *
 * @package BulmapressStarter
 */

// This theme uses wp_nav_menu() in one location.
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus( array(
		'primary-menu' => esc_html__( 'Primary', 'bulmapress' ),
		'topnav-menu' => esc_html__( 'Top Nav', 'bulmapress' ),
		'footer-button-menu' => esc_html__( 'Footer Vertical Column Left', 'bulmapress' ),
		'footer-social-menu' => esc_html__( 'Footer Vertical Column Right', 'bulmapress' ),
		'footer-menu' => esc_html__( 'Footer Horizontal Bottom', 'bulmapress' ),
		'sidebar-menu-care' => esc_html__( 'Sidebar Specialty Care Menu', 'bulmapress' ),
		'sidebar-menu-team' => esc_html__( 'Sidebar Team Menu', 'bulmapress' ),
	) );
}

// Bulmapress navigation
if ( ! function_exists( 'bulmapress_navigation' ) ) {
	function bulmapress_navigation( $location = 'primary-menu', $depth = 0, $menu_class = 'navbar-end')
	{
		wp_nav_menu( array(
			'theme_location'    => $location,
			'depth'             => $depth,
			'container'         => 'div id="' . $location . 'navigation"',
			'menu_class'        => $menu_class,
			'fallback_cb'       => 'bulmapress_navwalker::fallback',
			'walker'            => new bulmapress_navwalker()
			)
		);
	}
}
