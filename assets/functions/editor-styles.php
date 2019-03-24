<?php
// Adds your styles to the WordPress editor
/*add_action( 'init', 'add_editor_styles' );
function add_editor_styles() {
	add_editor_style( get_template_directory_uri() . '/assets/css/style.min.css' );
}*/

function start_gutenberg_assets() {
	wp_enqueue_style( 'start-gutenberg-admin', get_stylesheet_directory_uri() . '/assets/css/block_styles.css', array(), '1.0.0' );
}
add_action( 'enqueue_block_assets', 'start_gutenberg_assets' );