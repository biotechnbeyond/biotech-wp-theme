jQuery(document).ready(function() {	
	var input;
	var preview;
	
	jQuery(".bio-upload-button").click(function() {
		var current = jQuery(this);
		var container = current.parent();
		
		input = jQuery(".bio-upload", container);
		preview = jQuery(".bio-upload-preview", container);
		
	 	tb_show("", "media-upload.php?type=image&amp;TB_iframe=true");
	 	
		return false;
	});
	
	window.send_to_editor = function(html) {
		imgURL = jQuery("img", html).attr("src");
		
	 	input.val(imgURL);
	 	preview.attr("src", imgURL);
	 	
	 	tb_remove();
	}
});