$(window).load(function(){
	var target_id;
	if (target_id = window.location.hash) {
		scrolltoId(target_id);
	}
	$('.nav a').click(function(event){
		if($(this).attr('href').match(/^(#.+)$/)) {
			scrolltoId(RegExp.$1);
			event.preventDefault ? event.preventDefault() : event.returnValue = false;
		}
	});
});

$(document).ready(function(){
    //set up scroll spy.
	$('#site-header').scrollspy();

    //force opening new window for pages in other hostname.
    $(document.links).filter(function() {
        return this.hostname != window.location.hostname;
    }).attr('target', '_blank');

    //setup input froms
	$('.carousel').carousel({ interval: false })
	$('textarea[name="inquiry-msg"]').focusin(function(){
		$('#btn-inquiry-next').css('display', 'inline-block');
	});

	// supply the language
	$.tools.validator.localize("ja", {
		':email'  	: '正しいEメールアドレスを記入して下さい。',
		':url' 		: '正しいウェブサイトアドレスを記入して下さい。',
		'[required]'	: 'この項目を記入して下さい。'
	});
	// initialize validator for first form inputs
	var v_conf = {
		lang: 'ja',
		position: 'bottom left',
		offset: [-5, 50],
		message: '<div><em/></div>' // em element is the arrow.
	}
	var textarea = $('textarea[name="inquiry-msg"]').validator(v_conf);
	var all_fields = $('#inquiry').validator(v_conf).submit(function(event){
		var form = $(this);
		// check if client-side validation passed
		if (! event.isDefaultPrevented()) {
			$('#loading').show();
			// submit with AJAX
			$.post(form.attr("action"), form.serialize(), function(json) {
				// everything is ok. (server returned true)
				if (json.accepted === true)  {
					console.log('serverside-ok');
					$('.carousel').carousel('next');
					setTimeout(function(){
						$('#inquiry :input').val('');
						$('textarea[name="inquiry-msg"]').val('');
						all_fields.data("validator").reset();
						$('.carousel').carousel('next');
					}, 4000);
				// server-side validation failed. use invalidate() to show errors
				} else {
					console.log('serverside-ng');
				}
				$('#loading').hide();
			}, 'json');
			// prevent default form submission logic
			event.preventDefault();
		}
	});
	$('#btn-inquiry-next').click(function(event){
		// perform validation.
		if(textarea.data("validator").checkValidity() === true) {
			$('.carousel').carousel('next');
		}
	});
	$('#btn-inquiry-back').click(function(event){
		//remove error msgs.
		all_fields.data("validator").reset();
		$('.carousel').carousel('prev');
	});

	//website address(url) field.
    $('input[name="url"]').focus(function() {
        if (! $(this).val().match(/^http:\/\//i) &&
            $(this).val() != $(this).attr('placeholder')) {
            $(this).val('http://' + $(this).val());
            set_end($(this).get(0));
        }
    });
    $('input[name="url"]').blur(function() {
        if ($(this).val() == 'http://' || $(this).val() == '') {
        	$(this).val('');
        } else if (! $(this).val().match(/^http:\/\//i) &&
            $(this).val() != $(this).attr('placeholder')) {
            $(this).val('http://' + $(this).val());
        }
    });
});

function scrolltoId (elm_id) {
	var header_h = $('#site-header').height();
	var p = $(elm_id).offset().top - header_h;
	$('html, body').animate({ scrollTop: p}, 500);
}

//move cursor to the end of text.
function set_end(input) {
  if (input.createTextRange) {
   //IE
   var FieldRange = input.createTextRange();
   FieldRange.moveStart('character', input.value.length);
   FieldRange.collapse();
   FieldRange.select();
  }
  else {
   //Firefox and Opera
   input.focus();
   var length = input.value.length;
   input.setSelectionRange(length, length);
  }
}
