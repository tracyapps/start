<?php
/**
 * ACF helper functions
 */


/**
 * this hooks into the ACF called "icon", and displays the name of the icon choices available
 * (all icons in [theme_directory]/images/svg)
 *
 * eventually i'd like these to display on the admin side as the actual icons, but for now,
 * just the text lables will have to do :)
 *
 * @param $field
 * @return mixed


function start_acf_load_field( $field ) {
	$the_icon_path = get_template_directory() . '/assets/svg/originals/';
	$the_icon_array = array_diff( scandir( $the_icon_path ), array( '..', '.' ) );
	$the_icon_array = array_map( function ( $e ) {
		return pathinfo( $e, PATHINFO_FILENAME );
	}, $the_icon_array );

	$field['choices'] = array();

	// remove any unwanted white space
	$the_icon_array = array_map('trim', $the_icon_array);


	// loop through array and add to field 'choices'
	if( is_array($the_icon_array) ) {

		foreach( $the_icon_array as $the_icon ) {

			$field['choices'][ $the_icon ] = $the_icon;

		}

	}

	return $field;

}


add_filter( 'acf/load_field/name=icon', 'start_acf_load_field' );
  
 */