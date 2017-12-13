<?php
/**
 *  Displays archive entries with just featured image, title, category/tag, 
 * date posted and then the link
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

</article> <!-- end article -->

	