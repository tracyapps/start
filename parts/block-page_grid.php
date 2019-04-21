<?php
/**
 * page grid/list
 *
 */
while ( have_rows( 'page_grid-settings' ) ) : the_row();
	$layout			= get_sub_field( 'page_grid-layout' );
	$display_array	= get_sub_field( 'page_grid-display' );
	$color			= get_sub_field( 'page_grid-color' );
	$type			= get_sub_field( 'page_grid-type' );
endwhile;
?>

<section class="block-page_grid block <?php echo esc_html( $layout ) . ' ' . esc_html( $color ) ?>">
	<?php
	while ( have_rows( 'page_grid-content' ) ) : the_row();
		if( $type == 'manual' ) : // manual choice of pages
			while ( have_rows( 'manual_pages' ) ) : the_row();
				$page = get_sub_field( 'page' );
				$the_page_ID = url_to_postid( $page );
				$override_title = '';
				$override_image = '';
				$override_excerpt = '';
				if ( have_rows( 'overrides' ) ) :
					while ( have_rows( 'overrides' ) ) : the_row();
					$override_title = get_sub_field( 'override_title' );
					$override_image = get_sub_field( 'override_image' );
					$override_excerpt = get_sub_field( 'override_excerpt' );
					endwhile;
				endif;
				$display_title = '';
				$display_image = '';
				$display_excerpt = '';

				// store either the title of the page, or the override title
				if ( in_array( "title", $display_array ) ) :
					$display_title = sprintf(
						'<div class="title">
								<h3>%s</h3> 
							</div>',
						$override_title == '' ? get_post_field('post_title', $the_page_ID) : $override_title
					);
				endif;
				// store either the featured image, or the override image
				if ( in_array( "image", $display_array ) ) :
					$display_image =  sprintf(
						'<div class="image">
								<img src="%s"> 
							</div>',
						$override_image == '' ? wp_get_attachment_url( get_post_thumbnail_id( $the_page_ID ) ) : $override_image
					);
				endif;
				// store either the excerpt, or the override excerpt
				if ( in_array( "excerpt", $display_array ) ) :
					$display_excerpt = sprintf(
						'<div class="excerpt">
								%s 
							</div>',
						$override_excerpt == '' ? get_post_field('post_excerpt', $the_page_ID) : $override_excerpt
					);
				endif;


				printf(
					'<a href="%s">
						<object>
							%s
							%s
							%s 
						
						</object> 
					</a>',
					$page,
					$display_image,
					$display_title,
					$display_excerpt
				);

			endwhile;
		else : // else child page grid

		endif;
	endwhile;
	?>
</section>
