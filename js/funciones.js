$(function() {
	$('#buscar').on('click', consultar);
	// 
	function consultar() {
		var $carrera = $('#carrera').val();
		var $materia = $('#materia').val();
		$.ajax({
			url: '../Controllers/Tabla.php',
			type: 'post',
			dataType: 'json',
			data: {
				carrera: $carrera,
				materia: $materia,
				},
		})
		.done(function(respuesta) {
			// console.log("success");
			// Creamos una variable del tipo String con la ruta donde estan los resultados de la consulta.
			$nomFile = "../Controllers/" + respuesta.html;
			// Recarga la tabla 
			$('#mitabla').bootstrapTable('refresh', { url: $nomFile, silent: true});
		})
		.fail(function(xhr,err) {
			console.log("error");
			$nomfile = "../Controllers/json/error.json";
			msgerror( xhr.responseText); 
			$('#mitabla').bootstrapTable('refresh', { url: $nomfile ,silent: true} )
		})
		.always(function() {
			// console.log("complete");
		});
		
	}


	// Cargar Materias en Select
	$('#carrera').on('change', function(event) {
		event.preventDefault();
		var $carrera = $(this).val();
		if ($carrera == "") {
			$('#materia').load('../Controllers/materias.php');
			$('#materia').selectpicker('refresh');
		} else {
			$.ajax({
				url: '../Controllers/materias2.php',
				type: 'POST',
				dataType: 'json',
				data: {carrera: $carrera},
			})
			.done(function(respuesta) {
				$('#materia').html(respuesta.html);
				$('#materia').selectpicker('refresh');
				console.log("success");
			})
			.fail(function(xhr, err) {
				console.log("error");
				$nomfile = "../Controllers/json/error.json";
			msgerror( xhr.responseText); 
			$('#mitabla').bootstrapTable('refresh', { url: $nomfile ,silent: true} )
			})
			.always(function() {
				console.log("complete");
			});
		}	
	}); // Fin Cargar Materias en Select

	$('#materia').on('change', function(event) {
		event.preventDefault();
		var $carrera = $('#carrera').val();
		var $materia = $(this).val();
		if ($carrera == '') {
			
		}
	});

});