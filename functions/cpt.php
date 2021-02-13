<?php
function bulmapress_posttype_creator() {
	$custom_post_types_array = [
		['teams', 'Team', 'Team', 'team', 'dashicons-groups', ['title', 'editor', 'thumbnail'], false, true],
		['specialties', 'Specialties', 'Specialty', 'specialty-care', 'dashicons-pets', ['title', 'editor', 'page-attributes'], true, true],
	];
	
	foreach ( $custom_post_types_array as $value ) {
		register_post_type( $value[0],
			array(
				'labels' => array(
					'name' => __( $value[1] ),
					'singular_name' => __( $value[2] )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => $value[3]),
				'show_in_rest' => true,
				'menu_icon' => $value[4],
				'supports' => $value[5],
				'hierarchical' => $value[6]
			)
		);

		if ( $value[7] ) {
			register_taxonomy(
				$value[0] . '_categories',
				$value[0],
				array(
					'label' => __( 'Categories' ),
					'rewrite' => array( 'slug' => $value[3] . '-categories' ),
					'capabilities' => array(
						'assign_terms' => 'edit_posts',
						'edit_terms' => 'publish_posts'
					)
				)
			);
		}

		add_filter( 'get_the_archive_title_prefix', function ( $prefix ) { return '<span class="title-prefix teams">Our </span><span class="title-prefix specialties">OVERVIEW </span>'; });

		// if ( $value[0] === 'teams') {
		// }

		// if ( $value[0] === 'specialties') {

		// 	add_filter( 'get_the_archive_title_prefix', function ( $prefix ) {
		// 		return '';
		// 	});

		// 	add_filter( 'get_the_archive_title', function ( $prefix ) {
		// 		return 'Overview';
		// 	});
		// }
	}
}
add_action( 'init', 'bulmapress_posttype_creator' );