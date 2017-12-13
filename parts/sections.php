<?php
/**
 * If using "Sections" on home page / page (etc), include this file to display the layouts
 */


// check if the repeater field has rows of data
if ( have_rows( 'page_section' ) ):

	// loop through the rows of data
	while ( have_rows( 'page_section' ) ) : the_row();


		while ( have_rows( 'section_type' ) ) :
			the_row();
			$section_type = get_row_layout();
		endwhile;

		// Set up variables for the wrapper
		$section_classes = array();
		$section_classes[] = 'type-'   . sanitize_html_class( $section_type );
		$section_classes[] = esc_html( get_sub_field( 'section_background' ) );

		$display_title_toggle = get_sub_field( 'display_title' );
		?>

		<section class="page-section <?php echo implode( ' ', $section_classes ); ?>">
			<?php
			$section_title = ( ( $display_title_toggle == '1' ) ? '<h2 class="section-title">' . get_sub_field( 'section_title' ) . '</h2>' : '' );
			echo $section_title;
			?>

			<?php while ( have_rows( 'section_type' ) ) : the_row(); ?>
				<?php get_template_part( 'parts/section', $section_type ); ?>
			<?php endwhile; ?>

		</section>
		<?php

	endwhile;

else :

	// no rows found

endif;