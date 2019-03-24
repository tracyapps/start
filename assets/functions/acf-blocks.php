<?php
/**
 * heeeeere we go
 */

add_action('acf/init', 'start_register_blocks');
function start_register_blocks() {

	// check function exists
	//if( function_exists('acf_register_block') ) {

		// register a testimonial block
		acf_register_block(array(
			'name'              => 'section_test',
			'title'             => __('Testing 1234'),
			'description'       => __('oooh please work'),
			'render_template'   => get_template_directory() . '/parts/blocks-hero.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
			'mode'              => 'edit',
			'keywords'          => array( 'test', 'fuckballs' ),
		));

		acf_register_block(array(
			'name'              => 'block-image_text_row',
			'title'             => __('Image/Text row'),
			'description'       => __('a thing'),
			'render_template'   => get_template_directory() . '/parts/block-image_text_row.php',
			'category'          => 'layout',
			'icon'              => 'forms',
			'mode'              => 'preview',
			'keywords'          => array( 'text', 'image' ),
		));
	//}
}