<?php
/**
 *  Displays archive entries with featured image, tag/category (etc) and short excerpt
 */
?>



<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article">

	<section class="featured-image" itemprop="articleBody">
		<?php the_post_thumbnail( 'full' ); ?>
	</section> <!-- end article section -->

	<header class="article-header">
		<h3 class="title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h3>
		<?php get_template_part( 'parts/content', 'byline' ); ?>
	</header> <!-- end article header -->

	<section class="entry-content" itemprop="articleBody">
		<?php the_content( '<button class="tiny">' . __( 'Read more...', 'start' ) . '</button>' ); ?>
	</section> <!-- end article section -->

</article> <!-- end article -->

	