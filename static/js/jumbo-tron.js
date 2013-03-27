/**
 * Scripts for Jumbo-Tron pages.
 */
jQuery(document).ready(function() {
  jQuery(".homepage-about")
		.mouseenter(function() {
  		jQuery(".homepage-about").stop().animate(
  			{
  				"opacity": .01,
  			},
  			"slow"
  		);
  	})
  	.mouseleave(function() {
  		jQuery(".homepage-about").stop().animate(
  			{
  				"opacity": 1,
  			},
  			"slow"
  		);
  	});
});