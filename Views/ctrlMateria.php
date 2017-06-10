<?php include '../cabecera.php'; ?>
<br>
<br>
<br>
<div class="container-fluid">
	<div class="row">
		<form class="form-horizontal" role="form">
			<div class="col-md-offset-1 col-md-10">

			<!-- Panel del Titulo y Filtros -->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Consulta Materias</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-4">
								<label for="carrera" class="sr-only">Carrera:</label>
								<select name="carrera" id="carrera" class="selectpicker form-control" data-live-search="true">
									<option value="0" title="Carrera" data-subtext="Carrera"></option>
									<?php include_once '../Controllers/carreras.php'; ?>								
								</select>
							</div>

							<div class="col-sm-4">
								<label for="materia" class="sr-only">Materia:</label>
								<select name="materia" id="materia" class="selectpicker form-control" data-live-search="true">
									<option value="" title="Materia" data-subtext="Materia"></option>
									<?php include_once '../Controllers/materias.php'; ?>
								</select>
							</div>

							<div class="col-sm-2">
								<button type="button" class="btn btn-block btn-primary" id="buscar">Buscar</button>
							</div>
						</div>
					</div>
				</div> <!-- Fin Panel -->

			</div>
		</form>
	</div>

	<!-- Datos Completos -->
	<div class="row" id="datos">

	</div> <!-- Fin de Datos Completos -->

	<div class="row col-md-12">
		
		<!-- Panel de La Tabla -->
		<div class="panel panel-success">
			<table id="mitabla"
			data-toggle="table"
			data-search="true"
			data-show-export="true"
			data-cache="false"
			data-pagination="true"
			data-page-list=""
			class="table table-striped">
				<thead>
					<tr>
						<th data-halign="center" data-sortable="true">Materia</th>
						<th  data-halign="center" data-sortable="true">Año</th>
						<th  data-halign="center" data-sortable="true">Duración</th>
						<th  data-halign="center" data-sortable="true">Profesor</th>
						<th  data-halign="center" data-sortable="true">Trabajo Final</th>

					</tr>
				</thead>
			</table>
		</div> <!-- Fin Panel Tabla -->
		
	</div>
</div>
<?php include_once '../pie.php'; ?>