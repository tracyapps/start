<?php
/**
 * The template for displaying the child pages, and a grid, with options (coming soon)
 */


if ( has_children() ) :
	echo start_display_child_pages_with_options();
endif;
