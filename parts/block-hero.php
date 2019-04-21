<?php
/**
 * if we could be heros.
 *
 * just for one day
 */

while ( have_rows( 'hero_settings' ) ) : the_row();
	$type 		= get_sub_field( 'hero_type' );
	$text_color = get_sub_field( 'hero_text_color' );
endwhile;
while ( have_rows( 'hero_content' ) ) : the_row();
	while ( have_rows( 'hero_layout' ) ) : the_row();
		$size		= get_sub_field( 'hero_size' );
		$layout		= get_sub_field( 'text_position' );
	endwhile;
endwhile;

$hero_background_image = '';
$hero_background_color = '';
while ( have_rows( 'hero_background' ) ) : the_row();
	if( $type == 'hero_type-image' ) :
		$hero_background_image = ' style="background-image: url(' . esc_url( get_sub_field( 'hero_background-image' ) ) .')"';
	elseif( $type == 'hero_type-color' ) :
		$hero_background_color = 'background-' . get_sub_field( 'hero_background-image' );
	endif;
endwhile;
?>
<section class="block-hero block <?php echo esc_html( $type ) . ' ' . esc_html( $size ) . ' text-' . esc_html( $text_color ) . ' text-' . esc_html( $layout ) . ' ' . esc_html( $hero_background_color ); ?>" <?php echo __( $hero_background_image ); ?>>

	<?php if ( $type == 'hero_type-video' ) :
	while ( have_rows( 'hero_background' ) ) : the_row();
		while ( have_rows( 'hero_background-video' ) ) : the_row();
			if ( have_rows( 'video_files' ) ) :
				while ( have_rows( 'video_files' ) ) : the_row(); ?>
				<div class="video-container">
					<video loop muted autoplay class="background-video">
						<?php
						if ( get_sub_field( 'mp4' ) ) :
							echo '<source type="video/mp4" src="' . esc_url( get_sub_field( 'mp4' ) ) . '" />';
						endif;
						if ( get_sub_field( 'webm' ) ) :
							echo '<source type="video/webm" src="' . esc_url( get_sub_field( 'webm' ) ) . '" />';
						endif;
						if ( get_sub_field( 'ogg' ) ) :
							echo '<source type="video/ogg" src="' . esc_url( get_sub_field( 'ogg' ) ) . '" />';
						endif;
						?>
					</video>
				</div>
				<?php endwhile;
			endif;
		endwhile;
	endwhile;
	elseif ( $type == 'hero_type-slides' ) :
	while ( have_rows( 'hero_background' ) ) : the_row();
		while( have_rows( 'hero_background-slides' ) ) : the_row();
			if ( have_rows( 'slides' ) ) : ?>
				<div class="crossfade slideshow-container">
					<?php
					$delay = 0;
					while ( have_rows( 'slides' ) ) : the_row();
					$slide = get_sub_field( 'slide' );

						printf(
							'<figure style="background-image: url(%s); animation-delay: %ss;"></figure>',
							esc_url( $slide ),
							$delay
						);
						$delay += 6;
					endwhile;
					?>
				</div> <style type="text/css">section.block-hero.hero_type-slides .slideshow-container > figure {animation-duration: <?php echo $delay;?>s }</style>
			<?php endif;
		endwhile;
	endwhile;
	endif;?>
	<div class="hero-content">
		<?php while ( have_rows( 'hero_content' ) ) : the_row();
			echo '<div class="hero-content-container">';
			while ( have_rows( 'text_group' ) ) : the_row();
				if( get_sub_field( 'hero_content-title' ) != '' ) : ?>
					<h1><?php the_sub_field( 'hero_content-title' ); ?></h1>
				<?php endif; // if there is a title
				if( get_sub_field( 'hero_content-paragraph' ) != '' ) :?>
					<div class="paragraph-container">
						<?php the_sub_field( 'hero_content-paragraph' ); ?>
					</div>
				<?php endif; // if there is a paragraph
				if ( have_rows( 'cta_button' ) ) :
					echo '<div class="cta-button-container">';
					while ( have_rows( 'cta_button' ) ) : the_row();
						if( get_sub_field( 'text' ) != '' ) :
							$button_url = '';
							if ( get_sub_field( 'external_link' ) == 1 ) {
								$button_url = get_sub_field( 'url' );
							} else {
								$button_url = get_sub_field( 'link_to' );
							}
							?>
							<a href="<?php echo esc_url( $button_url ); ?>" class="button">
								<?php the_sub_field( 'text' ); ?>
							</a>

						<?php endif; // end if the button text is there
					endwhile;
					echo '</div>';
				endif; // if there are any CTA buttons
			endwhile;
			echo '</div>';
		endwhile;?>
	</div>
</section>