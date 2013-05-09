//javascript
$(document).ready( function() {
	var pantalla = $(screen).height();
	$("#loginContainer").height(pantalla-100);
	if ($('.loginError').length) {
		$("#login").css('margin-top','0.5em');
	}
	$("#login").submit(function (){
		if ($("#username").val() == "" || $("#password").val()== "") {
			if (! $('.loginError').length) {
				var error = $('<span />', {
				'class': 'loginError',
				'text' : 'Todos los campos son obligatorios'
				});
				$('#login').before(error);
				$("#login").css('margin-top','0.5em');
			}
			else $('.loginError').html("Todos los campos son obligatorios");
			return false;
		}			
		else {
			return true;
		}
	})
});