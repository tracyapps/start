<?php
/**
 * The template for displaying the text / image grid 
 */

// Get the ID of the background image
$image  = get_sub_field( 'text_image_grid_image' );
?>

<div class="text-image-grid-container <?php the_sub_field( 'layout_order' ); ?> <?php the_sub_field( 'layout_dimensions' ); ?>">
	<div class="text-side">
		<div class="padding">
			<?php the_sub_field( 'text_image_grid_content' ); ?>
		</div>
		
	</div>
	<div class="image-side" <?php if( '' != $image ) : ?>data-image="<?php echo esc_attr( $image ); ?>" style="background-image: url('<?php echo esc_attr( $image ); ?>');"<?php endif; ?>>

	</div>
</div>
