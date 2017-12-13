<?php
/**
 * The template for displaying a hero section
 */

// Get the ID of the background image
$image  = get_sub_field( 'hero_image' );
?>

<div class="hero" data-image="<?php echo esc_attr( $image ); ?>" style="background-image: url('<?php echo esc_attr( $image ); ?>');">

	<div class="hero-text-container">

		<?php the_sub_field( 'hero_text' ); ?>

		<a class="button" href="<?php echo esc_url( get_sub_field( 'hero_button_link' ) ); ?>">
			<?php echo esc_html( get_sub_field( 'hero_button_label' ) ); ?>
		</a>

	</div>

</div>
