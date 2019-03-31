<?php
/**
 * heeeeere we go
 */

function start_add_block_categories( $categories, $post ) {
	return array_merge(

		array(
			array(
				'slug' => 'sections',
				'title' => __( 'Page Sections', 'sections' ),
			),
		),
		$categories
	);
}
add_filter( 'block_categories', 'start_add_block_categories', 10, 2);

add_action('acf/init', 'start_register_blocks');
function start_register_blocks() {

	// check function exists
	//if( function_exists('acf_register_block') ) {

		// register a testimonial block
		acf_register_block(array(
			'name'              => 'block-custom_title',
			'title'             => __('Custom Title Block'),
			'description'       => __('it\'s like a title block, but fancier'),
			'render_template'   => get_template_directory() . '/parts/block-custom_title.php',
			'category'          => 'sections',
			'icon'              => 'format-quote',
			'mode'              => 'edit',
			'keywords'          => array( 'title', 'fancy' ),
		));
		acf_register_block(array(
			'name'              => 'block-hero',
			'title'             => __('Hero section'),
			'description'       => __('a big image with some text over it'),
			'render_template'   => get_template_directory() . '/parts/block-hero.php',
			'category'          => 'sections',
			'icon'              => 'id',
			'mode'              => 'edit',
			'keywords'          => array( 'grid', 'navigation', 'links' ),
		));
		acf_register_block(array(
			'name'              => 'block-image_text_row',
			'title'             => __('Image/Text row'),
			'description'       => __('a section with half image, half text'),
			'render_template'   => get_template_directory() . '/parts/block-image_text_row.php',
			'category'          => 'sections',
			'icon'              => 'forms',
			'mode'              => 'preview',
			'keywords'          => array( 'text', 'image' ),
		));
		acf_register_block(array(
			'name'              => 'block-page_grid',
			'title'             => __('Page Grid'),
			'description'       => __('a grid of pages'),
			'render_template'   => get_template_directory() . '/parts/block-page_grid.php',
			'category'          => 'sections',
			'icon'              => 'screenoptions',
			'mode'              => 'edit',
			'keywords'          => array( 'grid', 'navigation', 'links' ),
		));
	//}
}