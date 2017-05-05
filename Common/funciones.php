<?php
function displayLog($msg){
	// Definimos la hora de la accion.
	$hora = str_pad(date("H:i:s"), 10); // HH:MM:SS

	// Definimos el contenido de cada registro de accion por el usuario.
	
	$cadena = $hora ." ". $msg ."\r\n";

	// Creamos el nombre del archivo por dia.
	$pre = $_SERVER['DOCUMENT_ROOT'] . "/alumnado2017/logs/log";
	$date = date('dmy'); // ddmmaa HH:MM:SS
	$fileName = $pre . $date .".TXT";
	file_put_contents($fileName, $cadena, FILE_APPEND); 
}

?>