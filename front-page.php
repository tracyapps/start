<?php get_header(); ?>

	<div id="content">

		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php

				if ( is_home() ) {
					get_template_part( 'parts/loop', 'archive-list' );
				} else {
					get_template_part( 'parts/loop', 'front-page' );
				}

				?>

			<?php endwhile; endif; ?>

		</main> <!-- end #main -->

	</div> <!-- end #content -->

<?php get_footer(); ?>