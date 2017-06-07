<?php include_once '/Controllers/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Prueba</title>

	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-select.min.css"> 
    <link rel="stylesheet" href="../css/bootstrap-table.min.css"> 
    <link rel="stylesheet" href="../css/formvalidation.min.css">
</head>
<body>
    <div class="modal fade" id="modalerror">
            <div class="modal-dialog">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <b>Error:</b>
                    <div id="lblerror">...completa llamado...</div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                 </div>
                </div>
            </div><!-- /.modal-dialog TIENE QUE IR -->
        </div><!-- /.modal -->