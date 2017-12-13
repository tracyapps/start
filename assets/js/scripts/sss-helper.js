/**
 * Created by tapps on 5/31/17.
 */

jQuery(document).ready( function($) {

	$('.rotating').sss({
		slideShow : true, // Set to false to prevent SSS from automatically animating.
		startOn : 0, // Slide to display first. Uses array notation (0 = first slide).
		transition : 400, // Length (in milliseconds) of the fade transition.
		speed : 8500, // Slideshow speed in milliseconds.
		showNav : false // Set to false to hide navigation arrows.
	});

});