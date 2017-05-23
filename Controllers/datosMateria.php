<?php 
include_once 'conexion.php';

$carrera = $_POST['carrera'];

$html = '<option value="">Todas</option>';

$queryMaterias = $conn->query("SELECT id, NOMBRE FROM materia WHERE idCARRERA = $carrera");

while ($materias = $queryMaterias->fetch_object()) {
	$html .= '"<option value="'. $materias->id .'" data-tokens="'. $materias->NOMBRE .'">'. $materias->NOMBRE .'</option>';
}

$respuesta = array('html' => $html);
echo json_encode($respuesta);

?>