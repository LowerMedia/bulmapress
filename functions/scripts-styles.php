<?php
/**
 * Scripts & Styles
 *
 * @package BulmapressStarter
 */

if ( ! function_exists( 'bulmapress_scripts' ) ) {
	/**
	 * Enqueue scripts and styles.
	 */
	function bulmapress_scripts() {
		wp_enqueue_style( 'bulmapress-style', get_stylesheet_uri() );

		wp_enqueue_style( 'bulmapress-fontawesome', "https://use.fontawesome.com/releases/v5.2.0/css/all.css" );

		wp_enqueue_style( 'bulmapress-bulma-style', get_template_directory_uri() . '/frontend/bulmapress/css/bulmapress.css' );

		wp_enqueue_script( 'bulmapress-navigation', get_template_directory_uri() . '/frontend/js/navigation.js', array(), '1.14.'. date( "YmdHis", stat(get_stylesheet_directory())['mtime'] ), true );

		wp_enqueue_script( 'bulmapress-skip-link-focus-fix', get_template_directory_uri() . '/frontend/js/skip-link-focus-fix.js', array(), '1.14.'. date( "YmdHis", stat(get_stylesheet_directory())['mtime'] ), true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Fonts
		
		wp_enqueue_style( 'font-awesome-styles', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );

		wp_enqueue_style( 'typekit-styles', '//use.typekit.net/kvn7kev.css' );
		
		// Slick Slider

		wp_enqueue_script( 'slickslider', get_template_directory_uri() . '/frontend/bulmapress/node_modules/slick-carousel/slick/slick.min.js', array('jquery'), '20151215', true );

		wp_enqueue_script( 'bulmapress-slickslider', get_template_directory_uri() . '/frontend/js/slick-slider.js', array('jquery'), '1.14.'. date( "YmdHis", stat(get_stylesheet_directory())['mtime'] ), true );

		wp_enqueue_style( 'slickslider-styles', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );

		wp_enqueue_style( 'slickslider-theme-styles', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'bulmapress_scripts' );

/********************************************************/
// Enable Dashicons to show publically on the front end
/********************************************************/
function load_dashicons_publically() {
	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'load_dashicons_publically' );