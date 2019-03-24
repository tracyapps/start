<?php
/**
 * 💃🏻
 */

$order		= get_field( 'order' );
$image 		= get_field( 'image' );
$text		= get_field( 'text' );

?>
<section class="block-image_text_row block <?php echo esc_html( $order ) ?>">
	<div class="text">
		<?php if ( $text ) : ?>
		<div class="padding">
			<?php echo $text; ?>
		</div>
		<?php endif; ?>
	</div>
	<div class="image"
		 <?php if( '' != $image ) : ?>
			 data-image="<?php echo esc_attr( $image ); ?>" style="background-image: url('<?php echo esc_attr( $image ); ?>');"
		 <?php endif; ?>
	>
	</div>
</section>