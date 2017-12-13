<?php
/* start Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

*/

// let's create the function for the custom type
function start_custom_post_types() {
	
	/**
	 * CPT: Person
	 */

	$labels = array(
		'name'                => _x( 'People', 'Post Type General Name', 'start' ),
		'singular_name'       => _x( 'Person', 'Post Type Singular Name', 'start' ),
		'menu_name'           => __( 'People', 'start' ),
		'parent_item_colon'   => __( '', 'start' ),
		'all_items'           => __( 'All people', 'start' ),
		'view_item'           => __( '', 'start' ),
		'add_new_item'        => __( 'Add new person', 'start' ),
		'add_new'             => __( 'Add new person', 'start' ),
		'edit_item'           => __( 'Edit person', 'start' ),
		'update_item'         => __( 'Update person', 'start' ),
		'search_items'        => __( 'Search all people', 'start' ),
		'not_found'           => __( 'No people found', 'start' ),
		'not_found_in_trash'  => __( 'No people found in trash', 'start' ),
	);
	$args = array(
		'label'               => __( 'people', 'start' ),
		'description'         => __( 'People', 'start' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 7,
		'menu_icon'           => 'dashicons-nametag',
		'rewrite'             => array( 'slug' => 'the-team' ),
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	// NEVER USE 'action' HERE, IT'S A RESERVED WORD
	register_post_type( 'person', $args );


	/**
	 * CPT: portfolio
	 */
	register_post_type( 'portfolio', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array(
			'labels' => array(
				'name' => __( 'Portfolio', 'start' ),
				'singular_name' => __( 'Portfolio Post', 'start' ),
				'all_items' => __( 'All Portfolio Posts', 'start' ),
				'add_new' => __( 'Add New', 'start' ),
				'add_new_item' => __( 'Add New', 'start' ),
				'edit' => __( 'Edit', 'start' ),
				'edit_item' => __( 'Edit', 'start' ),
				'new_item' => __( 'New Portfolio Post', 'start' ),
				'view_item' => __( 'View Portfolio Post', 'start' ),
				'search_items' => __( 'Search Portfolio', 'start' ),
				'not_found' => __( 'Nothing found.', 'start' ),
				'not_found_in_trash' => __( 'Nothing found in Trash', 'start' ),
				'parent_item_colon' => ''
			),
			/* end of arrays */
			'description' => __( 'All the awesome things we made', 'start' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 4,
			'menu_icon' => 'dashicons-portfolio',
			'rewrite' => array(
				'slug' => 'work',
				'with_front' => false
			),
			/* you can specify its url slug */
			'has_archive' => 'work',
			/* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'custom-fields',
				'revisions',
				'sticky'
			)
		) /* end of options */
	); /* end of register CPT: portfolio */

	/**
	 * CPT: landing page
	 */
	register_post_type( 'landing-page', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array(
			'labels' => array(
				'name' => __( 'Landing Pages', 'start' ),
				'singular_name' => __( 'Landing Page', 'start' ),
				'all_items' => __( 'All Landing Pages', 'start' ),
				'add_new' => __( 'Add New', 'start' ),
				'add_new_item' => __( 'Add New', 'start' ),
				'edit' => __( 'Edit', 'start' ),
				'edit_item' => __( 'Edit', 'start' ),
				'new_item' => __( 'New Landing Page', 'start' ),
				'view_item' => __( 'View Landing Page', 'start' ),
				'search_items' => __( 'Search Pages', 'start' ),
				'not_found' => __( 'Nothing found.', 'start' ),
				'not_found_in_trash' => __( 'Nothing found in Trash', 'start' ),
				'parent_item_colon' => ''
			),
			/* end of arrays */
			'description' => __( 'Landing pages for all the things', 'start' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 20,
			'menu_icon' => 'dashicons-welcome-widgets-menus',
			'rewrite' => array(
				'slug' => '😉',
				'with_front' => false
			),
			/* you can specify its url slug */
			'has_archive' => false,
			/* you can rename the slug here */
			'capability_type' => 'page',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array(
				'title',
				'editor',
				'author',
				'excerpt',
				'custom-fields',
				'revisions'
			)
		) /* end of options */
	); /* end of register CPT: landing-page */

	/* this adds your post categories to your custom post type(s) */
	// register_taxonomy_for_object_type( 'category', 'portfolio' );
	/* this adds your post tags to your custom post type(s) */
	// register_taxonomy_for_object_type( 'post_tag', 'portfolio' );

}

// adding the function to the Wordpress init
add_action( 'init', 'start_custom_post_types' );


/**
 * custom Tax: project_type (hierarchical)
 */

register_taxonomy( 'service',
	array( 'portfolio' ),
	/* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array(
		'hierarchical' => true,
		/* if this is false, it acts like tags */
		'labels' => array(
			'name' => __( 'Service', 'start' ),
			'singular_name' => __( 'Service', 'start' ),
			'search_items' => __( 'Search Services', 'start' ),
			'all_items' => __( 'All Services', 'start' ),
			'parent_item' => __( 'Parent Service', 'start' ),
			'parent_item_colon' => __( 'Parent Service:', 'start' ),
			'edit_item' => __( 'Edit Service', 'start' ),
			'update_item' => __( 'Update Service', 'start' ),
			'add_new_item' => __( 'Add New Service', 'start' ),
			'new_item_name' => __( 'New Service', 'start' )
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'service' ),
	)
);


/**
 * custom Tax: group
 */
register_taxonomy(
	'group',		// Taxonomy machine name.
	'person',		      // Post types supported, can be array('post', 'page' ... )
	array(			      // Labels. See http://codex.wordpress.org/Function_Reference/register_taxonomy for full details.
							'label'        => __( 'Group', 'start' ),
							'rewrite'      => array( 'slug' => 'group' ),
							'hierarchical' => true,
	)
);


/**
 * Modify the post edit screen's title field placeholder
 */
function start_change_person_post_type_title_text( $title ) {
	$screen = get_current_screen();

	if ( 'person' === $screen->post_type ) {
		$title = 'Enter person\'s full name';
	}

	return $title;
}
add_filter( 'enter_title_here', 'start_change_person_post_type_title_text' );


/**
 * On post save, map values from 'person_short_bio' and 'person_photo'
 * to WordPress's native excerpt and featured image fields, respectively
 */
function start_person_proxy_fields( $post_id ) {

	// bail if not a person
	if ( 'person' !== get_post_type( $post_id ) ) {
		return;
	}

	// bail if this is not a normal save
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ||
		( defined( 'DOING_AJAX' ) && DOING_AJAX ) ||
		( defined( 'DOING_CRON' ) && DOING_CRON ) ) {
		return;
	}

	$bio   = strip_tags( get_field( 'person_short_bio', $post_id ) );
	$thumb = get_field( 'person_photo', $post_id );

	if ( $bio ) {
		$the_post = array(
			'ID' => $post_id,
			'post_excerpt' => $bio,
		);

		// update the excerpt
		wp_update_post( $the_post );
	}

	if ( is_integer( $thumb ) ) {
		set_post_thumbnail( $post_id, $thumb );
	}

}
add_action( 'acf/save_post', 'start_person_proxy_fields', 15 );


/**
 * ------ Template Tags for person element display ----- **
 */

/**
 * Display Additional Fields (repeater field)
 *
 * @return string
 */
function start_person_display_additional_fields() {

	$output = '';

	// Displaying additional fields if the profile type is not  set to 'simple'
	// If a profile is set to 'simple' the fields won;t be output, even if empty.
	if ( have_rows( 'person_additional_fields' ) && get_field( 'simple_or_extended_profile' ) !== 'simple' ) :

		$output = '<ul class="person-additional-details">';

		while ( have_rows( 'person_additional_fields' ) ) :

			the_row();

			$output .= sprintf(
				'<li class="row person-detail">
					<span class="label">%s</span>
					<span class="detail">%s</span>
				</li>',
				esc_html( get_sub_field( 'detail_label' ) ),
				wp_kses_post( get_sub_field( 'detail_content' ) )
			);

		endwhile;

		$output .= '</ul>';

	endif;

	return $output;
}



/**
 * Display basic contact information of a person.
 *
 * @return string
 */
function start_person_display_contact_information() {

	$output = '';

	// display basic contact info
	if ( get_field( 'person_email_address' ) || get_field( 'person_phone_number' ) || get_field( 'person_fax' ) ) :

		$output .= '<div class="person-contact-information">';

		$output .= ( get_field( 'person_email_address' ) ) ? '<div class="person-email row"><span class="label">Email: </span><span class="detail"><a href="mailto:' . get_field( 'person_email_address' ) . '">' . get_field( 'person_email_address' ) . '</a></span></div>' : '';
		$output .= ( get_field( 'person_phone_number' ) ) ? '<div class="person-phone row"><span class="label">Phone: </span><span class="detail">' . get_field( 'person_phone_number' ) . '</span></div>' : '';
		$output .= ( get_field( 'person_fax' ) ) ? '<div class="person-phone row"><span class="label">Fax: </span><span class="detail">' . get_field( 'person_fax' ) . '</span></div>' : '';

		$output .= '</div>';
	endif;

	return $output;
}


/**
 * Display Social Media Links (repeater field)
 *
 * @return string
 */
function start_person_display_social_media_profiles() {

	$output = '';

	// displaying social media links (repeater)
	if ( have_rows( 'person_social_media' ) ) :

		$output = '<ul class="person-social-media-profiles">';

		while ( have_rows( 'person_social_media' ) ) :

			the_row();

			$output .= sprintf(
				'<li class="row social-detail %s">
					<a href="%s" class="icon icon-%s">
					<span><svg class="icon-%s-dims icon">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#%s"></use>
						<text>%s</text>
					</svg></span>
					</a>
				</li>',
				esc_html( strtolower( get_sub_field( 'service' ) ) ),
				esc_url( get_sub_field( 'profile_link' ) ),
				esc_html( strtolower( get_sub_field( 'service' ) ) ),
				esc_html( strtolower( get_sub_field( 'service' ) ) ),
				esc_html( strtolower( get_sub_field( 'service' ) ) ),
				esc_html( ucfirst( get_sub_field( 'service' ) ) )
			);

		endwhile;

		$output .= '</ul>';

	endif;

	return $output;
}

/**
 * Display Link to Associated User's author page.
 *
 * @return mixed
 */
function start_person_display_author_posts_link() {
	$user_array = get_field( 'person_associated_user' );
	return esc_url( get_author_posts_url( $user_array['ID'] ) );
}


/**
 * Smarter display of Person Name.
 * if a first name is added in the extended profile, it will display that instead of the title (full name)
 *
 * @return mixed
 */
function start_person_display_name() {

	if ( get_field( 'person_first_name' ) ) :
		$output = esc_html( get_field( 'person_first_name' ) );
	else :
		$output = esc_html( get_the_title() );
	endif;

	return $output;
}