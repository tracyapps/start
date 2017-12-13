/**
 * jquery to smooth scroll down the homepage from hero video section.
 */

jQuery(document).ready( function($) {

	$( "#learnmorebutton" ).click( function() {
		$( 'html, body' ).animate({
			scrollTop: $( "#more" ).offset().top
		}, 1000 );
	});

});