$(window).scroll(function(){				 
	$('#cd-timeline .cd-timeline-block').each(function(){
    	var scrollTop     = $(window).scrollTop(),
        	elementOffset = $(this).offset().top,
       		distance      = (elementOffset - scrollTop),
			    windowHeight  = $(window).height(),
			    breakPoint    = windowHeight*0.9;

			if(distance > breakPoint) {
				$(this).addClass("more-padding");	
			}  if(distance < breakPoint) {
				$(this).removeClass("more-padding");	
			}
	});
});
