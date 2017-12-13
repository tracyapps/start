<?php
/**
 * The template for displaying page grid section
 */


the_sub_field( 'page_grid_intro_text' );

echo '<div class="page-grid-container">';

while ( have_rows( 'page_grid_page' ) ) :
	the_row();
	// Get the Page title from the URL
	$the_page_url = get_sub_field( 'page_select' );
	$the_page_id = url_to_postid( $the_page_url );
	$the_page_title = get_the_title( $the_page_id ); ?>

	<div class="page-grid-item" data-image="<?php echo esc_attr( get_sub_field( 'background_image' ) ); ?>" style="background-image: url('<?php echo esc_attr( get_sub_field( 'background_image' ) ); ?>');">
		<a href="<?php echo esc_url( $the_page_url ); ?>"><?php echo esc_html( $the_page_title ); ?></a>
	</div>

<?php
endwhile;
echo '</div>';
?>
