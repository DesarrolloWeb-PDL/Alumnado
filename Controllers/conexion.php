<?php 
include_once '../Class/base.php';
include_once '../Common/funciones.php';

$conn = new dataBase('alumnado');
if ( $conn->sqlMsg != "") {
	displaylog("Error al Conectar base");
	echo $conn->sqlMsg ; // "Al conectar con la base";
	exit;
}
$conn->set_charset("utf8");
?>