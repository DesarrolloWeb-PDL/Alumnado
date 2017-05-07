$(function() {
	$('#carrera').on('change', function() {
		event.preventDefault();
		var $carrera = $(this).val();
		if ($carrera == "") {
			$('#materia').html(respuesta.html);
			$('#materia').selectpicker('refresh');
		} else {
			$.ajax({
				url: '../Controllers/datosMateria.php',
				type: 'POST',
				dataType: 'json',
				data: {'carrera': $carrera},
			})
			.done(function(respuesta) {
				$('#materia').html(respuesta.html);
				$('#materia').selectpicker('refresh');
				console.log("success");
			})
			.fail(function(xhr, err) {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
	});
});