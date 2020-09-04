$(document).ready(function() {
	
	// Configuration
	
	var miniLogo = true; // Set to false if you do not want to use a mini logo
	
	
	
	// Only edit below if you know what you are doing!!
	
	var showLogo = true;
	
	$(window).scroll(function() {
		
		if(miniLogo && $(window).scrollTop() > 168 && showLogo) {
			showLogo = false;
			$('#logoSmall').animate({
				top: "7px"
			}, 200);
		}
		else if(miniLogo && $(window).scrollTop() <= 168 && !showLogo){
			$('#logoSmall').animate({
				top: "81px"
			}, 200);
			showLogo = true;
		}

	});
});