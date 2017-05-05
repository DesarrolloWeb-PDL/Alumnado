<?php 
include_once 'conexion.php';

if (isset($_POST['carrera']) && isset($_POST['materia'])) { 
	/*<form action="#" class="form-horizontal hidden">
		<div class="col-md-offset-1 col-md-10">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Datos</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-4">
								<label for="carreraNombre" class="control-label">Carrera</label>
								<input type="text" class="form-control" id="carreraNombre" name="carreraNombre">
							</div>
							<div class="col-md-3">
								<label for="materiaNombre" class="control-label">Materia</label>
								<input type="text" class="form-control" id="materiaNombre" name="materiaNombre">
							</div>
							<div class="col-md-1">
								<label for="año" class="control-label">Año</label>
								<input type="text" class="form-control" id="año" name="año">
							</div>
							<div class="col-md-2">
								<label for="duracion" class="control-label">Duración</label>
								<input type="text" class="form-control" id="duracion" name="duracion">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>*/
	echo "<marquee> Ambos campos completos!!!</marquee>";
} else {
	$carrera = $_POST['carrera'];

	$html = '<option value="#">Todas</option>';

	$queryMaterias = $conn->query("SELECT id, NOMBRE FROM materia WHERE idCARRERA = $carrera");

	while ($materias = $queryMaterias->fetch_object()) {
		$html .= '"<option value="'. $materias->id .'" data-tokens="'. $materias->NOMBRE .'">'. $materias->NOMBRE .'</option>';
	}

	$respuesta = array('html' => $html);
	echo json_encode($respuesta);
}


?>