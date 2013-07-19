$(document).ready(function(){
	var target_id;
	if (target_id = window.location.hash) {
		scrolltoId(target_id);
	}

	$('body').scrollspy({offset:350});

	$('.nav a').click(function(){
		if($(this).attr('href').match(/^(#.+)$/)) {
			target_id = RegExp.$1;
			scrolltoId(target_id);
			event.preventDefault ? event.preventDefault() : event.returnValue = false;
		}
	});
});

function scrolltoId (target_id) {
	var header_h = $('#site-header').height();
	 var p = $(target_id).offset().top - header_h;
	$('html, body').animate({ scrollTop: p}, 500);
}
