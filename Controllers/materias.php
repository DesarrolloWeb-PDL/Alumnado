<?php 

include_once '/conexion.php';

if (isset($_POST['carrera'])) {
	$carrera = $_POST['carrera'];
	$query = "SELECT materia.id, materia.NOMBRE, carreras.NOMBRE AS carNOMBRE FROM materia INNER JOIN carreras ON materia.idCARRERA = carreras.id WHERE materia.idCARRERA = $carrera";

} else {
	$query = "SELECT materia.id, materia.NOMBRE, carreras.NOMBRE AS carNOMBRE FROM materia INNER JOIN carreras ON materia.idCARRERA = carreras.id";
}

$queryMaterias = $conn->query($query);

$html = "";

while ($materias = $queryMaterias->fetch_object()) {
	$html .= "<option value='". $materias->id ."' data-tokens='". $materias->NOMBRE ."' data-subtext='". $materias->carNOMBRE ."'>". $materias->NOMBRE;
}

if (isset($_POST['carrera'])) {
	$respuesta = array('html' => $html);
		echo json_encode($respuesta);
} else {
	$respuesta = "";
	echo $respuesta;
}

/*while ($materia = $queryMaterias->fetch_object()): ?>
	<option value="<?= $materia->id ?>" data-tokens="<?= $materia->NOMBRE ?>" data-subtext="<?= $materia->carNOMBRE ?>"><?= $materia->NOMBRE ?></option>
<?php endwhile; ?>*/
 ?>