<?php
// This file handles the admin area and functions - You can use this file to make changes to the dashboard.

/************* DASHBOARD WIDGETS *****************/
// Disable default dashboard widgets
function disable_default_dashboard_widgets() {
	// Remove_meta_box('dashboard_right_now', 'dashboard', 'core');      // Right Now Widget
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' ); // Comments Widget
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );  // Incoming Links Widget
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );         // Plugins Widget
	// Remove_meta_box('dashboard_quick_press', 'dashboard', 'core');    // Quick Press Widget
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );   // Recent Drafts Widget
	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );         // WordPress.com Blog
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );       // Other WordPress News
}

// Add any custom dashboard widgets
function start_custom_dashboard_widgets() {
	wp_add_dashboard_widget( 'start_rss_dashboard_widget', __( 'Custom RSS Feed (Customize in admin.php)', 'start' ),
		'start_rss_dashboard_widget' );
	/*
	Drop any other created Dashboard Widgets in this function and they will all load.
	*/
}

// removing the dashboard widgets
add_action( 'admin_menu', 'disable_default_dashboard_widgets' );
// adding any custom widgets
add_action( 'wp_dashboard_setup', 'start_custom_dashboard_widgets' );

/************* CUSTOMIZE ADMIN *******************/
// Custom Backend Footer
function start_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="http://tapps.design" target="_blank">tapps</a></span>.', 'start' );
}

// adding it to the admin area
add_filter( 'admin_footer_text', 'start_custom_admin_footer' );