<?php
/**
 * Site specific helper functions
 */

/**
 * echo out the slug
 *
 * @param bool $echo
 * @return mixed|string|void
 */

function the_slug( $echo=true ){
	$slug = basename( get_permalink() );
	do_action( 'before_slug', $slug );
	$slug = apply_filters( 'slug_filter', $slug );
	if( $echo ) echo $slug;
	do_action( 'after_slug', $slug );
	return $slug;
}


function start_the_archive_title( $before = '', $after = '', $span_class = '' ) {
	$title = start_get_the_archive_title( $span_class );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}


/**
 * Retrieve the archive title based on the queried object.
 *
 * @since 4.1.0
 *
 * @return string Archive title.
 */
function start_get_the_archive_title( $span_class = '' ) {

	if ( is_category() || is_tag() || is_author() || is_year() || is_month() || is_day() || is_post_type_archive() || ( is_tax() && ! is_tax( 'post_format') ) ) {
		if ( ! '' == $span_class ) {
			$span_class = sprintf( 'class="%s"', $span_class );
		}
		if ( is_category() ) {
			$type = __( 'Category: ' );
			$name = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$type = __( 'Tag: ' );
			$name = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$type = __( 'Author: ' );
			$name = sprintf( '<span class="vcard">%s</span>', get_the_author() );
		} elseif ( is_year() ) {
			$type = __( 'Year: ' );
			$name = get_the_date( _x( 'Y', 'yearly archives date format' ) );
		} elseif ( is_month() ) {
			$type = __( 'Month: ' );
			$name = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
		} elseif ( is_day() ) {
			$type =__( 'Day: ' );
			$name = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
		} elseif ( is_post_type_archive() ) {
			$type = __( 'Archives: ' );
			$name = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );

			$type = sprintf( __( '%s: ' ), $tax->labels->singular_name );
			$name =  single_term_title( '', false );
		}
		$format ='<span %s>%s</span>%s';
		$title = sprintf( $format, $span_class, $type, $name );
	}

	elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title' );
		}
	} else {
		$title = __( 'Archives' );
	}

	/**
	 * Filters the archive title.
	 *
	 * @since 4.1.0
	 *
	 * @param string $title Archive title to be displayed.
	 */
	return apply_filters( 'start_get_the_archive_title', $title );
}

/**
 * add excerpts to pages
 */
function start_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}

add_action( 'init', 'start_add_excerpts_to_pages' );



/**
 * For the automatic child page display.
 *
 * @return bool
 */

function has_children() {
	global $post;

	$pages = get_pages( 'child_of=' . $post->ID );

	if ( count( $pages ) > 0 ):
		return true;
	else:
		return false;
	endif;
}

function start_display_child_pages() {
	global $post;


	$all_the_children = get_pages(
		array(
			'post_type'		=> 'page',
			'child_of'		=> $post->ID,
			'parent'		=> $post->ID,
			'sort_column'	=> 'menu_order'

		)
	);

	$output ='<section class="page-children-grid">';

	foreach( $all_the_children as $one_child ) :
		//$featured_image = wp_get_attachment_image_url( get_post_thumbnail_id( $one_child->ID ), array( 800, 550 ) );
		$the_icon = get_field( 'icon', $one_child->ID );
		$the_background = get_field( 'post_background', $one_child->ID );
		$output .= sprintf(
			'<div class="child-page-box">
				<h6><a href="%s">%s</a></h6>
				<div class="child-page-link %s round">
					<a href="%s">
					<svg class="icon-%s-dims icon">
						<use xlink:href="#%s"></use>
					</svg>
					</a>
 				</div>
 				<p><a href="%s" class="button">Learn More</a></p>
			</div>',
			esc_url( get_permalink( $one_child->ID ) ),
			esc_html( $one_child->post_title ),
			esc_html( $the_background ),
			esc_url( get_permalink( $one_child->ID ) ),
			esc_html( $the_icon ),
			esc_html( $the_icon ),
			esc_url( get_permalink( $one_child->ID ) )
		);

	endforeach;

	$output .= '</section>';
	return $output;
}

function start_display_child_pages_with_options() {
	global $post;



	$all_the_children = get_pages(
		array(
			'post_type'		=> 'page',
			'child_of'		=> $post->ID,
			'parent'		=> $post->ID,
			'sort_column'	=> 'menu_order'

		)
	);

	$output ='<section class="page-children-grid">';

	foreach( $all_the_children as $one_child ) :

		$display_icons = get_sub_field( 'display_icons', $one_child->ID);
		$display_page_titles = get_sub_field( 'display_page_titles', $one_child->ID);
		$display_learn_more_buttons = get_sub_field( 'display_learn_more_buttons', $one_child->ID);
		$display_links = get_sub_field( 'make_them_links', $one_child->ID);

		//$featured_image = wp_get_attachment_image_url( get_post_thumbnail_id( $one_child->ID ), array( 800, 550 ) );
		$the_icon = get_field( 'icon', $one_child->ID );
		$the_background = get_field( 'post_background', $one_child->ID );

		$output .= '<div class="child-page-box">';

		if( $display_icons == true ) :
			$output .= '<div class="child-page-link ' . esc_html( $the_background ) . ' round">';
			if( $display_links == true ) :
				$output .= '<a href="' . esc_url( get_permalink( $one_child->ID ) ) . '">';
			else :
				$output .= '<span>';
			endif;
			$output .= '<svg class="icon-' . esc_html( $the_icon ) . '-dims icon"> <use xlink:href="#' . esc_html( $the_icon ) . '"></use> </svg>';
			if( $display_links = true ) :
				$output .= '</a>';
			else :
				$output .= '</span>';
			endif;
			$output .= '</div>';
		endif;

		if( $display_page_titles == true ) :
			$output .= '<h6>' . esc_html( $one_child->post_title ) . '</h6>';
		endif;

		if( $display_learn_more_buttons == true ) :
			$output .= '<p><a href="' . esc_url( get_permalink( $one_child->ID ) ) . '" class="button">Learn More</a></p>';
		endif;

		$output .= '</div>';



	endforeach;

	$output .= '</section>';
	return $output;
}
