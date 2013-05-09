$(document).ready(function(e){
	var path = document.location.pathname;
	var testing = "/quimica2/"
	var active = "";

	if(testing) {
		url = path.replace(testing, '');
	} else {
		url = path.replace('/', '');
	}

	if(url == "") url = "./";
	$('#menu li a[href="'+url+'"]').parent().addClass('active');

	$('#menu li').hover(function(){
		if($(this).css('opacity') != '0'){
			$('#menu li').css({'opacity': '1'});
			$('.hidden_menu').css({'opacity': '0'});
			var index = $(this).index();
			$(this).css({'opacity': '0'});
			$('.hidden_menu').eq(index).css({'opacity': '1'});
		}
	});

	$('#username').keyup(function(e){
		var val = $(this).val();

		$('#nonexisting-user').hide();

		if(e.which != 8) {
			$.ajax({
				'url' : base_url+'ajax/checkuser',
				'type' : 'post',
				'data' : { 'type' : val },
				'dataType': 'json',
				'beforeSend' : function() {
					$('#checking-user').show();
				},
				'success' : function(data){
					$('#checking-user').hide();
					if(data.msg) {
						$('#nonexisting-user').show();
					}
				}
			});
		}
	});

	$('.cloud').eq(0).animate({
		'margin-top' : '-40px'
	}, 500, function(){
		$(this).fadeOut(200, function(){
			$('.bigger').fadeIn();
		});
	});

	$('.no_correcte').fadeIn(1000);
	var t = window.setTimeout(function(){
		var pos = $('.no_correcte').offset().top();
		$('html, body').animate({
			scrollTop: pos
		}); 
	    $('.no_correcte').fadeIn();
	}, 3000);		
});