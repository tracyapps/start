/**
 * scripts for the simple mobile menu
 */

jQuery(document).ready( function($) {
	$('#toggle').click( function() {
		$("#menu-main-navigation").toggleClass("open");
	});
});