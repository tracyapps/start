<?php
/**
 * The template for displaying a "Content Collection" section
 */

// Start building our WP_Query arguments
$query_args = array(
	'ignore_sticky_posts' => true,
);

// Finish building out our WP_Query based on how posts were specified
$collection_type = get_sub_field( 'content_collection_type' );

if ( 'Explicit' === $collection_type ) {

	// Limit to just the posts explicitly specified
	$query_args['post__in'] = get_sub_field( 'content_post_ids' );
	$query_args['post_type'] = 'any';
	$query_args['posts_per_page'] = count( get_sub_field( 'content_post_ids' ) );

} else {

	// Limit to certain post types, if specified
	if ( is_array( get_sub_field( 'content_post_types' ) ) ) {
		$query_args['post_type'] = get_sub_field( 'content_post_types' );
	}

	// Limit to certain categories, if specified
	if ( is_array( get_sub_field( 'content_terms' ) ) ) {
		$query_args['category__in'] = get_sub_field( 'content_terms' );
	}

	// Limit number shown.
	$query_args['posts_per_page'] = get_sub_field( 'content_number_shown' );

}//end if

// Get the posts to show
$post_list = new WP_Query( $query_args );


?>

<div class="content-collection-wrapper style-<?php echo sanitize_html_class( strtolower( get_sub_field( 'content_display_style' ) ) ); ?>">

	<div class="section-intro-text container">

		<?php the_sub_field( 'content_introduction' ); ?>

	</div>

	<?php if ( 'Grid' === get_sub_field( 'content_display_style' ) ) : ?>

		<div class="content-collection archive-grid">

			<?php if ( $post_list->have_posts() ) :

				while ( $post_list->have_posts() ) : $post_list->the_post();

					get_template_part( 'parts/loop', 'archive-grid' );

				endwhile;

				wp_reset_postdata();

			endif; ?>

		</div>
	<?php else : ?>

		<div class="content-collection archive-list">

			<?php if ( $post_list->have_posts() ) :

				while ( $post_list->have_posts() ) : $post_list->the_post();

					get_template_part( 'parts/loop', 'archive-list' );

				endwhile;

				wp_reset_postdata();

			endif; ?>

		</div>

	<?php endif; ?>

</div>