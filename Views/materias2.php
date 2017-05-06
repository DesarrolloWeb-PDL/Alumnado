<?php 
include '../cabecera.php'; 

$queryCarreras = $conn->query('SELECT id, NOMBRE FROM carreras');
$queryProfesor = $conn->query('SELECT id, nombres, apellido FROM profesores');

echo "Prubas con git y github !!!!!!!!!!";

?>

	<style>
		.marquee {
			padding: 50px;
			background: blue;
			color: white;
			font-size: 20px;
		}
	</style>

	<div class="marquee">
		HOLA!!!!!!!!
	</div>

	<form action="#" method="post" align="center">
		<label for="materia">Materia</label>
		<input type="text" name="materia" id="materia"><br><br>

		<label for="carrera">Carrera</label>
		<select name="carrera" id="carrera">
			<option value="#">Elegir carrera</option>
			<?php while ($carrera = $queryCarreras->fetch_object()):	?>
				<option value="<?= $carrera->id; ?>"><?= $carrera->NOMBRE; ?></option>
			<?php endwhile; ?>
		</select><br><br>

		<label for="año">Año</label>
		<input type="text" name="año" id="año"><br><br>

		<label for="planEstudio">Plan de estudio cambia esto para fijo y en label</label>
		<select name="planEstudio" id="planEstudio">
			<option value="#">Elegir Plan de estudio</option>
		</select><br><br>

		<label for="duracion">Duracion</label>
		<select name="duracion" id="duracion">
			<option value="#">...</option>
		</select><br><br>

		<label for="profesor">Profesor</label>
		<select name="profesor" id="profesor">
			<option value="#">Elegir Profesor</option>
			<?php while ($profesor = $queryProfesor->fetch_object()):	?>
				<option value="<?= $profesor->id; ?>"><?= $profesor->apellido .' '. $profesor->nombres; ?></option>
			<?php endwhile; ?>
		</select><br><br>

		<label>Opcional</label><br><br>
		<input type="radio" name="opcional" id="opSi" value="Si"><label for="opSi">Si</label>
		<input type="radio" name="opcional" id="opNo" value="No"><label for="opNo">No</label><br><br>

		<label>Trabajo Final</label><br><br>
		<input type="radio" name="traFinal" id="traFinSi" value="Si"><label for="traFinSi">Si</label>
		<input type="radio" name="traFinal" id="traFinalNo" value="No"><label for="traFinalNo">No</label><br><br>

		<input type="submit" value="Enviar">
	</form>
</body>
</html>