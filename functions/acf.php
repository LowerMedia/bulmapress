<?php

if ( class_exists('ACF') ) {

	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Options',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Theme Header Settings',
			'menu_title'	=> 'Header',
			'parent_slug'	=> 'theme-general-settings',
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Theme Footer Settings',
			'menu_title'	=> 'Footer',
			'parent_slug'	=> 'theme-general-settings',
		));
		
	}

	// 9ete
	function get_formatted_acf_image( $image_array, $echo = false, $classes = '' ) {
		$output_image = "<img 
			class='". $classes . "' 
			src='". $image_array['url'] . "' 
			title='". $image_array['title'] . "' 
			alt='". $image_array['alt'] . "' 
			data-id='wp-img-". $image_array['id'] . "' 
			data-caption='". $image_array['caption'] . "' 
			data-description='". $image_array['description'] . "'
		 />";
		
		if ( $echo ) {
			echo $output_image;
		} else {
			return $output_image;
		}
	}

	// format image via passing in image array
	function get_acf_image_from_handle( $handle, $echo = false, $classes = '' ) {
		return get_formatted_acf_image( get_field( $handle, 'option'), $echo, $classes);
	}

	// format image via passing in acf image handle to pass page specific image arrays
	function get_acf_image_from_array( $array, $echo = false, $classes = '' ) {
		return get_formatted_acf_image( $array, $echo, $classes);
	}

	// format phone number
	function get_acf_formatted_phonenumber( $acf_handle = 'phone_number', $link_classes = '', $link_wrap = true ) {
		$number = get_field($acf_handle, 'option');
		$number_length = strlen($number);

		if ( $number_length === 7 ) {
			return "phone number is missing area code";
		}

		if ( $number_length !== 10 && $number_length !== 11 ) {
			return "invalid phone number length";
		}

		if ( $number_length === 10 ) {
			$formatted_number = substr_replace( substr_replace( $number, '-', 6, 0), '-', 3, 0);	
		} elseif ( $number_length === 11 ) {
			$formatted_number = substr_replace( substr_replace( substr_replace( substr_replace( $number, '-', 7, 0), '-', 4, 0), ') ', 1, 0), '(', 0, 0);
		}

		return ( $link_wrap ) ? "<a class='$link_classes' href='tel:$number'>$formatted_number</a>" : $formatted_number;
	}

	// format phone number
	function display_acf_formatted_phonenumber( $acf_handle = 'phone_number', $link_classes = '', $link_wrap = true ) {
		echo get_acf_formatted_phonenumber( $acf_handle, $link_classes, $link_wrap );
	}
} else {

	function acf_deactivated_fallback_warning() {
		return "ACF Must Be enabled and the theme options page must be set";
	}

	function get_acf_image_from_handle() {
		acf_deactivated_fallback_warning();
	}

	function display_acf_formatted_phonenumber() {
		acf_deactivated_fallback_warning();
	}

	function the_field() {
		acf_deactivated_fallback_warning();
	}
}