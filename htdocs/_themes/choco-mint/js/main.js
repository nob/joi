$(window).load(function(){
	var target_id;
	if (target_id = window.location.hash) {
		scrolltoId(target_id);
	}
	$('.nav a').click(function(){
		if($(this).attr('href').match(/^(#.+)$/)) {
			scrolltoId(RegExp.$1);
			event.preventDefault ? event.preventDefault() : event.returnValue = false;
		}
	});
});

$(document).ready(function(){
	$('#site-header').scrollspy();
});

function scrolltoId (elm_id) {
	var header_h = $('#site-header').height();
	var p = $(elm_id).offset().top - header_h;
	console.log(header_h + ':' + p);
	$('html, body').animate({ scrollTop: p}, 500);
}
