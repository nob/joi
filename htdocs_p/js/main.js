$(document).ready(function(){
	var target_names = [];
	$('.nav a').each(function(){
		target_names.push($(this).attr('href'));
	});
	// console.log(target_names);
	$.each(target_names, function(i, name) {
		$('a[href="' + name + '"]').click(function(){
			var p = $(name).offset().top - 72;
			$('html, body').animate({ scrollTop: p}, 1200);
		});
	});
});
