<?php
/*
Template Name: Two Column Page (w/sidebar)
*/
?>

<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="row">

			<main id="main" class="main-column" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


					<?php
					if( get_option( 'options_disable_sections_on_pages' ) == 1 ) :
						echo '<div class="container">';
						get_template_part( 'parts/loop', 'page' );
						echo '</div>';
					else :
						get_template_part( 'parts/sections' );
					endif; ?>

				<?php endwhile; endif; ?>

			</main> <!-- end #main -->

			<?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>