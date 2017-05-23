<?php 
include '../cabecera.php'; 

// $queryCarreras = $conn->query('SELECT id, NOMBRE FROM carreras');
$queryProfesor = $conn->query('SELECT id, nombres, apellido FROM profesores');

?>
	<body>
		<br><br>
		<div class="container-fluid">
			<div class="row">
				<form class="form-horizontal" role="form">
					<div class="col-md-offset-1 col-md-10">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Consulta Materias</h3>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<div class="col-sm-offset-1 col-sm-4">
										<label for="carrera" class="sr-only">Carrera:</label>
										<select name="carrera" id="carrera" class="selectpicker form-control" data-live-search="true" title="Carrera">
											<option>Todas</option>
											<?php include_once '../Controllers/carreras.php'; ?>								
										</select>
									</div>

									<div class="col-sm-4">
										<label for="materia" class="sr-only">Materia:</label>
										<select name="materia" id="materia" class="selectpicker form-control" data-live-search="true" title="Materia">
											<option>Todas</option>
											<?php include_once '../Controllers/materias.php' ?>
										</select>
									</div>

									<div class="col-sm-2">
										<button type="button" class="btn btn-block btn-primary">Buscar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="row" id="datos">
				
			</div>
		</div>
	</body>
</html>