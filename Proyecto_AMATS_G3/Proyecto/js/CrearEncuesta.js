$(document).ready(function(){
	alert('prueba')
	$.ajax({
		type: 'POST',
		url: 'CrearEncuesta.php',
		data: {'peticion':'CrearEncuesta'}
	})

	.done(function(cuadrosText)){

	}

	.fail(function(){
		alert ('Hubo un error')
	})

})