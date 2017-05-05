<?php 
include 'conexion.php';

$queryCarreras = $conn->query('SELECT id, NOMBRE FROM carreras');

while ($carreras = $queryCarreras->fetch_object()):	?>
	<option value="<?= $carreras->id ?>" data-tokens="<?= $carreras->NOMBRE ?>"><?= $carreras->NOMBRE ?></option>
<?php endwhile; ?>